<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$this->css = [];
		$this->js = [];
		$this->info = $this->session->userdata('userInfo');
		if($this->info == null)
			redirect("member/loginView");
	}
	public function index()
	{
		// print_r("HelloWorld!");
		// 	exit;

		// $sql = "SELECT * FROM member";
		// print_r($this->db->query($sql)->result_array());
		// $this->session->set_userdata('username', 'Kwon TaeSeong');
		$start = $this->session->userdata('identity_time');
		$nowTime = time();

		// $info = $this->session->userdata('userInfo');

		$data=array(
			// 'info'		=>			$info,
			'checkUrl'	=>			'/profile/check'
		);

		$head = array(
			"js"			=>		$this->js,
			"css"		=>		$this->css,
			"info"		=>		$this->info
		);

		$this->load->view("head", $head);
		if($start == null)
			$this->load->view('userIdentity', $data);
		else if(($nowTime-$start) > (60*60))
			$this->load->view('userIdentity', $data);
		else{
			$idx = $this->info['idx'];
			$sql = "SELECT * FROM MEMBER WHERE idx = $idx ;";
			$result = $this->db->query($sql)->result_array()[0];
			$data['userInfo'] = $result;

			$this->load->view('profile', $data);
		}
		$this->load->view("tail");
		
	}
	public function check(){
		$pwd = $this->input->post('userPwd');
		$info = $this->session->userdata('userInfo');
		$id = $info['id'];
		$sql = "SELECT COUNT(*) AS CNT FROM MEMBER WHERE id='$id' AND pwd=PASSWORD('$pwd'); ";
		$cnt = $this->db->query($sql)->result_array()[0]['CNT'];
		if($cnt != 0)
			$this->session->set_userdata('identity_time', time());

		redirect('profile'); 
	}

	public function update(){
		$idx = $this->session->userdata('userInfo')['idx'];
		$pwd =$this->input->post('pwd');
		$email = $this->input->post('email');
		$intro = $this->input->post('intro');
		$phoneNumber = $this->input->post('phoneNumber');

		$sql = '';
		if($pwd != null)
			$sql = "UPDATE MEMBER 
					SET email = '$email', 
						introduction = '$intro', 
						phoneNumber = '$phoneNumber',
						pwd = PASSWORD('$pwd') 
					WHERE idx = $idx;";
		else
			$sql = "UPDATE MEMBER 
					SET email = '$email', 
						introduction = '$intro', 
						phoneNumber = '$phoneNumber' 
					WHERE idx = $idx;";

		$responseData = new stdClass();
		if($this->db->query($sql))
			$responseData->code = 200;
		else 
			$responseData->code = 500;

		echo json_encode($responseData);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */