<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

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
		if($this->info == null)
			redirect("member/loginView");
	}
	public function index()
	{

		// $sql = "SELECT * FROM member";
		// print_r($this->db->query($sql)->result_array());
		// $this->session->set_userdata('username', 'Kwon TaeSeong');
		
		
	}
	public function mbCheck(){
		$pwd = $this->input->post('userPwd');
		$info = $this->session->userdata('userInfo');
		$id = $info['id'];
		$sql = "SELECT pwd FROM MEMBER WHERE id=".$this->db->escape($id).";";

		$result = $this->db->query($sql)->result_array();
		if(count($result) > 0){
			if(password_verify($pwd, $result[0]['pwd'])){
				$this->session->set_userdata('identity_time', time());
				redirect('/manage/member');
			}else{
				print_r("<meta charset='utf-8'><script>alert('비밀번호가 틀리셨습니다.'); location.replace('/manage/member');</script>");	
			}
		}else{
			print_r("<meta charset='utf-8'><script>alert('비밀번호가 틀리셨습니다.'); location.replace('/manage/member');</script>");	
		}
	}

	public function member(){
		$start = $this->session->userdata('identity_time');
		$nowTime = time();
		
		$data=array(
			// 'info'		=>			$info,
			'checkUrl'	=>			'/manage/mbCheck'				
			//Shared userIdentity View Form URL
		);

		$head = array(
			"info"		=>		$this->info,
			"js"			=>		$this->js,
			"css"		=>		$this->css
		);

		$this->load->view("head", $head);
		if($start == null)
			$this->load->view('userIdentity', $data);
		else if(($nowTime-$start) > (60*60))
			$this->load->view('userIdentity', $data);
		else{
			$sql = "SELECT COUNT(*) AS CNT 
					FROM MEMBER 
					WHERE isAllow = 'N' 
					ORDER BY regDate DESC ;";
			$cnt = $this->db->query($sql)->result_array()[0]['CNT'];

			$sql = "SELECT A.idx, A.name, A.sNumber, A.regDate, B.name AS major, C.name AS level 
					FROM MEMBER AS A LEFT OUTER JOIN MAJOR AS B ON A.majorIdx = B.idx 
					LEFT OUTER JOIN LEVEL AS C ON A.levelIdx = C.idx 
					WHERE isAllow = 'N' 
					ORDER BY regDate DESC ;";
			$noAllow = $this->db->query($sql)->result_array();
			$sql = "SELECT A.idx, A.name, A.sNumber, A.regDate, B.name AS major, C.name AS level 
					FROM MEMBER AS A LEFT OUTER JOIN MAJOR AS B ON A.majorIdx = B.idx 
					LEFT OUTER JOIN LEVEL AS C ON A.levelIdx = C.idx 
					WHERE A.isAllow = 'Y' AND A.levelIdx <= 10; ";
			$yeList = $this->db->query($sql)->result_array();

			$sql = "SELECT A.idx, A.name, A.sNumber, A.regDate, B.name AS major, C.name AS level 
					FROM MEMBER AS A LEFT OUTER JOIN MAJOR AS B ON A.majorIdx = B.idx 
					LEFT OUTER JOIN LEVEL AS C ON A.levelIdx = C.idx 
					WHERE A.isAllow = 'Y' AND A.levelIdx = 11; ";

			$badList = $this->db->query($sql)->result_array();

			$sql = "SELECT * FROM LEVEL ;";
			$levelList = $this->db->query($sql)->result_array();

			$data['levelList'] = $levelList;
			$data['noList'] = $noAllow;
			$data['noCnt'] = $cnt;
			$data['yeList'] = $yeList;
			$data['badList'] = $badList;
			$this->load->view('manageMember', $data);
		}
		$this->load->view("tail");
	}

	public function brdCheck(){
		$pwd = $this->input->post('userPwd');
		$info = $this->session->userdata('userInfo');
		$id = $info['id'];
		$sql = "SELECT pwd FROM MEMBER WHERE id=".$this->db->escape($id).";";

		$result = $this->db->query($sql)->result_array();
		if(count($result) > 0){
			if(password_verify($pwd, $result[0]['pwd'])){
				$this->session->set_userdata('identity_time', time());
				redirect('manage/board');
			}else{
				print_r("<meta charset='utf-8'><script>alert('비밀번호가 틀리셨습니다.'); location.replace('/manage/board');</script>");	
			}
		}else{
			print_r("<meta charset='utf-8'><script>alert('비밀번호가 틀리셨습니다.'); location.replace('/manage/board');</script>");	
		}	

		
		
	}

	
	public function board(){
		$start = $this->session->userdata('identity_time');
		$nowTime = time();
		$name = $this->session->userdata('username');
		$level = $this->session->userdata('userlevel');

		$info = array(
			'name'			=>			$name,
			'level'			=>			$level
		);

		$data=array(
			'info'		=>			$info,
			'checkUrl'	=>			'/manage/brdCheck'				
			//Shared userIdentity View Form URL
		);

		if($start == null)
			$this->load->view('userIdentity', $data);
		else if(($nowTime-$start) > (60*60))
			$this->load->view('userIdentity', $data);
		else
			$this->load->view('manageBoard', $data);

	}


	public function getMemberInfo($idx = -1){
		$responseData  = new stdClass();
		if($idx < 0){
			$responseData->code = 500;
			echo json_encode($responseData);
			exit;
		}

		$sql = "SELECT A.idx, A.name, A.sNumber, A.id, A.phoneNumber, A.email, A.introduction,  B.name AS major, C.name AS level,  C.idx AS levelIdx 
				FROM MEMBER AS A LEFT OUTER JOIN MAJOR AS B ON A.majorIdx = B.idx 
				LEFT OUTER JOIN LEVEL AS C ON A.levelIdx = C.idx 
				WHERE A.idx = $idx ;";
		$result = $this->db->query($sql)->result_array()[0];
		if(!(isset($result))){
			$responseData->code = 501;
			echo json_encode($responseData);
			exit;	
		}

		$responseData->code = 200;
		$responseData->info = $result;

		echo json_encode($responseData);
	}

	public function mbLevelUpdate($idx = -1){
		$responseData  = new stdClass();
		if($idx < 0){
			$responseData->code = 500;
			echo json_encode($responseData);
			exit;
		}
		$level = $this->input->post("level");
		$sql = "UPDATE MEMBER SET levelIdx = $level WHERE idx = $idx ;";
		if(!($this->db->query($sql))){
			$responseData->code = 501;
			echo json_encode($responseData);
			exit;	
		}
		$responseData->code = 200;
		echo json_encode($responseData);
	}
	public function setPwd($idx = -1){
		$responseData  = new stdClass();
		if($idx < 0){
			$responseData->code = 500;
			echo json_encode($responseData);
			exit;
		}

		$sql = "UPDATE MEMBER SET pwd = PASSWORD('0000') WHERE idx = $idx;";

		if(!($this->db->query($sql))){
			$responseData->code = 501;
			echo json_encode($responseData);
			exit;	
		}
		$responseData->code = 200;
		echo json_encode($responseData);
	}

	public function allowMember($idx = -1){
		$responseData  = new stdClass();
		if($idx < 0){
			$responseData->code = 500;
			echo json_encode($responseData);
			exit;
		}
		$sql = "UPDATE MEMBER SET isAllow = 'Y' WHERE idx = $idx;";

		if(!($this->db->query($sql))){
			$responseData->code = 501;
			echo json_encode($responseData);
			exit;	
		}
		$responseData->code = 200;
		echo json_encode($responseData);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */