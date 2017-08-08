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
		$this->js[] = "jquery-2.1.4.min";
		$this->js[] = "bootstrap.min";
		$this->js[] = "jquery.faloading-0.2.min";
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
					echo '<script>alert("이미 가입하신 학번입니다!")</script>';
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
		$pwdHash = password_hash($pwd, PASSWORD_BCRYPT);
		$time = date('Y-m-d H:i:s');
		$data = array(
			'idx'				=>		0,
			'name'				=>		$name,
			'sNumber'			=>		$sNumber,
			'majorIdx'			=>		$major,
			'id'				=>		$id,
			'pwd'				=>		$pwdHash,
			'levelIdx'			=>		10,
			'birthday'			=>		$birthday,
			'phoneNumber'		=>		$phoneNumber,
			'email'				=>		$email,
			'introduction'		=>		$introduce,
			'regDate'			=>		$time,
			'isAllow'			=>		'Y',
			'penalty_date'		=>		0
		);
	
		if($this->db->insert("MEMBER", $data))
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

		// $sql = "UPDATE MEMBER SET pwd = PASSWORD('$pwd') WHERE idx = $idx ;";
		$pwdHash = password_hash($pwd, PASSWORD_BCRYPT);
		
		$sql2 = "UPDATE MEMBER SET pwd = ".$this->db->escape($pwdHash)."WHERE idx = ".$this->db->escape($idx).";";
		$responseData = new stdClass();
		if($this->db->query($sql2))
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

		$sql = "SELECT idx, name, pwd, id, levelIdx, penalty_date FROM MEMBER WHERE id = '$id';";
		
		$resultData = $this->db->query($sql)->result_array();
		if(count($resultData) > 0){
			$resultData = $resultData[0];
			
			if($resultData["pwd"] === "NULL"){

				$head = array(
					"info"			=>			$resultData,
					"js"			=>			$this->js,
					"css"			=>			$this->css
				);

				$this->load->view("head", $head);
				$this->load->view('changePasswordPolicy');
				$this->load->view("tail");
			}else{
				if(password_verify($pwd, $resultData["pwd"])){
					$this->session->set_userdata('userInfo', $resultData);
					redirect("/");
				}else{
					redirect("member/loginView");
				}
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */