<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
	public function index()
	{

		// $sql = "SELECT * FROM member";
		// print_r($this->db->query($sql)->result_array());
		// $this->session->set_userdata('username', 'Kwon TaeSeong');
		// $this->session->set_userdata('userlevel', '1');
		
		$info  = $this->session->userdata('userInfo');
		$sql = "SELECT * FROM BOARD_TYPE LIMIT 3;";
		// print_r($sql);
		// exit;
		$result = $this->db->query($sql)->result_array();

		for($i = 0; $i<count($result); $i++){
			$idxOf = $result[$i]['idx'];
			$sql = "SELECT A.idx, A.title, (COUNT(B.idx) )  AS numOfCmt, A.idxOf AS boardType 
					FROM BOARD AS A LEFT OUTER JOIN COMMENT AS B 
					ON (B.idxOf = A.idx AND B.isUsable = 'Y') 
					WHERE A.idxOf = $idxOf AND A.isUsable = 'Y' 
					GROUP BY A.idx 
					ORDER BY A.idx DESC 
					LIMIT 6;";
			// print_r($sql);
			// exit;
			$list = $this->db->query($sql)->result_array();
			$result[$i]['dataList'] = $list;
		}
		// $headers = 'From: xotjd183@naver.com' . "\r\n" .
		// 		    'Reply-To: xotjd183@naver.com' . "\r\n" .
  //   					'X-Mailer: PHP/' . phpversion();

		// mail('xotjd183@gmail.com', 'WAP_MAIL_TEST', 'HELLO WORLD!! WAP_CIRCLE!!!',$headers);
		// print_r("123");
		// exit;
		$gallerySql = "SELECT A.name, A.idx, COUNT(B.idx) AS cnt 
						FROM GALLERY AS A LEFT OUTER JOIN GL_COMMENT AS B ON (A.idx = B.idxOf AND B.isUsable = 'Y') 
						WHERE A.isUsable = 'Y' 
						GROUP BY A.idx 
						ORDER BY A.regDate LIMIT 6 ;";
		$galleryList = $this->db->query($gallerySql)->result_array();
		$data=array(
			'info' 		=> 		$info,
			'boardData'	=>		$result,
			'galleryData'	=>	$galleryList

		);
		$this->load->view('main', $data);


		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */