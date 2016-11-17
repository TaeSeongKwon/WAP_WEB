<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		// print_r("asdfasdf");
		// exit;
		$this->js = [];
		$this->css = [];

		$this->info = $this->session->userdata('userInfo');
		if($this->info == null)
			redirect("member/loginView");
	}
	public function index()
	{
		$keyword = $this->input->get("keyword");
		$sql = "SELECT A.idx, A.title, A.main, A.idxOf, A.regDate, B.name, C.name AS userName, C.idx AS userIdx, COUNT(D.idx) AS cnt 
				FROM BOARD AS A LEFT OUTER JOIN BOARD_TYPE AS B ON A.idxOf = B.idx 
				LEFT OUTER JOIN MEMBER AS C ON A.regIdx = C.idx 
				LEFT OUTER JOIN COMMENT AS D ON A.idx = D.idxOf 
				WHERE (A.title LIKE '%$keyword%' OR A.main LIKE '%$keyword%') 
						AND A.isUsable = 'Y' AND B.isUsable = 'Y'
				GROUP BY A.idx  
				ORDER BY A.regDate DESC ;";
		$result = $this->db->query($sql)->result_array();
		// print_r($result);
		// exit;
		for($idx = 0; $idx< count($result); $idx++)
			$result[$idx]['main'] = strip_tags($result[$idx]['main']);
		
		$data = array(
			// "info"		=>			$this->info,
			"list"		=>			$result,
			"keyword"	=>			$keyword
		);
		$head = array(
			"info"		=>		$this->info,
			"css"		=>		$this->css,
			"js"			=>		$this->js
		);
		// $sql = "SELECT * FROM member";
		// print_r($this->db->query($sql)->result_array());
		$this->load->view("head", $head);
		$this->load->view('searchView', $data);
		$this->load->view("tail");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */