<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

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

	}

	public function index()
	{

		// $sql = "SELECT * FROM member";
		// print_r($this->db->query($sql)->result_array());
		$this->load->view('boardList');
	}
	public function numberCheck(){
		$notice = $this->input->get('notice');
		if($notice != ''){
			switch($notice){
				case 1:
					echo '<script>alert("학번을 입력하세요")</script>';
					break;
				case 2:
					echo '<script>alert("이미 가입하신 학번입니!")</script>';
					break;
			}

		}
		$head = array(
			"info"		=>		$this->info,
			"js"			=>		$this->js,
			"css"		=>		$this->css
		);
		$this->load->view("head", $head);
		$this->load->view('numCheckView');
		$this->load->view("tail");
	}
	public function join(){
		$sNumber = $this->input->post('sNumber');
		$sql = "SELECT COUNT(*) AS CNT FROM MEMBER WHERE sNumber = '$sNumber' ;";
		$resultData = $this->db->query($sql)->result_array()[0];
		if($resultData['CNT'] != 0){
			redirect('member/numberCheck?notice=1');
		}

		$data = array(
			'sNumber' => $sNumber
		);
		$this->js[] = "jquery-birthday-picker.min";
		$head = array(
			"info"		=>			$this->info,
			"js"			=>			$this->js,
			"css"		=>			$this->css
		);
		$this->load->view("head", $head);
		$this->load->view('memberJoin', $data);
		$this->load->view("tail");
	}

	public function idCheck(){
		$id = $this->input->post('userId');

		$sql = "SELECT COUNT(*) AS CNT FROM MEMBER WHERE id = '$id'";
		$resultData = $this->db->query($sql)->result_array();
		$responseData = new stdClass();

		if(isset($resultData)){
			$responseData->code = 200;
			if($resultData[0]['CNT'] == 0)
				$responseData->isExist = "false";
			else 
				$responseData->isExist = "true";
		}else $responseData->code = 500;

		echo json_encode($responseData);
	}
	public function joinControl(){
		
		$id = $this->input->post('userId');
		$pwd = $this->input->post('pwd');
		$name = $this->input->post('name');
		$sNumber = $this->input->post('sNumber');
		$major = $this->input->post('major');
		$phoneNumber = $this->input->post('phoneNumber');
		$email = $this->input->post('email');
		$introduce = $this->input->post('introduce');
		$birthday = $this->input->post('birthDay');

		$data = array(
			'idx'				=>		0,
			'name'				=>		$name,
			'sNumber'			=>		$sNumber,
			'majorIdx'			=>		$major,
			'id'					=>		$id,
			'pwd'				=>		"PASSWORD('$pwd')",
			'levelIdx'			=>		10,
			'birthday'			=>		$birthday,
			'phoneNumber'		=>		$phoneNumber,
			'email'				=>		$email,
			'introduction'		=>		$introduce,
			'regDate'			=>		date('Y-m-d'),
			'isAllow'			=>		'Y'
		);
		$time = date('Y-m-d H:i:s');
		$sql = "INSERT INTO MEMBER 
		VALUES(0, '$name', '$sNumber', $major, '$id', PASSWORD('$pwd'), 10, DATE'$birthday', '$phoneNumber', '$email', '$introduce', DATE'$time', 'Y');";
		// print_r($sql);
		// exit;
		if($this->db->query($sql))
			redirect('/member/success');
		else
			redirect('/member/error');
		
		
	}
	public function error(){
		$this->load->view('error');
	}
	public function success(){
		$this->load->view('successSignup');
	}
	
	public function forget(){

		$head = array(
			"info"			=>			$this->info,
			"js"				=>			$this->js,
			"css"			=>			$this->css
		);
		$this->load->view("head", $head);
		$this->load->view('memberForgot');
		$this->load->view("tail");
	}



	public function findId(){
		$name = $this->input->post('name');
		$sNumber = $this->input->post('sNumber');

		$sql = "SELECT id FROM MEMBER WHERE name = '$name' AND sNumber = '$sNumber' ;";
		$result = $this->db->query($sql)->result_array();
		$responseData = new stdClass();
		if(count($result) > 0){
			$responseData->code = 200;
			$responseData->isExist = 'Y';
			$responseData->id = $result[0]['id'];
		}else
			$responseData->code = 500;
		
		echo json_encode($responseData);
	}

	public function findPwd(){
		$id = $this->input->post('id');
		$sNumber = $this->input->post('sNumber');

		$sql = "SELECT idx FROM MEMBER WHERE id = '$id' AND sNumber = '$sNumber' ;";
		$result = $this->db->query($sql)->result_array();
		$responseData = new stdClass();
		if(count($result) > 0){
			$responseData->code = 200;
			$responseData->isExist = 'Y';
			$responseData->K = $result[0]['idx'];
		}else $responseData->code = 500;

		echo json_encode($responseData);
	}

	public function setPassword(){
		$pwd = $this->input->post('pwd');
		$idx = $this->input->post('idx');

		$sql = "UPDATE MEMBER SET pwd = PASSWORD('$pwd') WHERE idx = $idx ;";
		$responseData = new stdClass();
		if($this->db->query($sql))
			$responseData->code = 200;
		else 
			$responseData->code = 500;

		echo json_encode($responseData);
	}

	
	public function loginView(){
		$this->load->view('loginView');
	}
	public function login(){
		$id = $this->input->post('userId');
		$pwd = $this->input->post('userPwd');

		$sql = "SELECT idx, name, id, levelIdx FROM MEMBER WHERE id = '$id' AND pwd = PASSWORD('$pwd') ;";
	
		$resultData = $this->db->query($sql)->result_array();

		if(isset($resultData[0])){
			$this->session->set_userdata('userInfo', $resultData[0]);
			redirect("/");
		}else redirect("member/loginView");


	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */