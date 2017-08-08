<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct(){
		parent::__construct();
		// print_r("asdfasdf");
		// exit;
		$this->css = [];
		$this->js = [];
		$this->js[] = "jquery-2.1.4.min";
		$this->js[] = "bootstrap.min";
		$this->js[] = "jquery.faloading-0.2.min";
		$this->info = $this->session->userdata('userInfo');
		if($this->info == null)
			redirect("member/loginView");
	}
	public function index()
	{
		$this->css[] = "bootstrap-datetimepicker.min";
		$this->js[] = "moment";
		$this->js[] = "bootstrap-datetimepicker.min";
		$idx = $this->info['idx'];
		$head = array(
			"info"		=>		$this->info,
			"css"		=>		$this->css,
			"js"			=>		$this->js
		);
		$sql = "SELECT A.idx, A.name, A.startDate, A.endDate, A.regDate 
				FROM PROJECT AS A LEFT OUTER JOIN PROJECT_MEMBER AS B 
				ON A.idx = B.proIdx 
				WHERE B.userIdx = $idx ORDER BY A.regDate DESC ;";

		$rowNumSql = "SELECT COUNT(*) AS CNT 
					FROM PROJECT AS A LEFT OUTER JOIN PROJECT_MEMBER AS B 
					ON A.idx = B.proIdx 
					WHERE B.userIdx = $idx;";

		$data = array(
			// 'info'			=>			$this->info,
			'list'			=>			$this->db->query($sql)->result_array(),
			'rowNum'			=>			$this->db->query($rowNumSql)->result_array()[0]['CNT']
		);
		$this->load->view("head", $head);
		$this->load->view('myProject', $data);
		$this->load->view("tail");
		
	}
	public function all(){
		
		$data = array(
			"info"		=>		$this->info,
			"css"		=>		$this->css,
			"js"			=>		$this->js
		);
		$sql = "SELECT A.idx, A.name, A.startDate, A.endDate, A.regDate 
				FROM PROJECT AS A LEFT OUTER JOIN PROJECT_MEMBER AS B 
				ON A.idx = B.proIdx 
				GROUP BY A.idx ORDER BY A.regDate DESC;";

		$rowNumSql = "SELECT COUNT(*) AS CNT 
						FROM (SELECT DISTINCT A.idx  
							FROM PROJECT AS A 
								LEFT OUTER JOIN PROJECT_MEMBER AS B 
								ON A.idx = B.proIdx
							) AS RESULT ;";

		$mainData = array(
			'list'			=>			$this->db->query($sql)->result_array(),
			'rowNum'			=>			$this->db->query($rowNumSql)->result_array()[0]['CNT']
		);
		$this->load->view("head",$data);
		$this->load->view("allProject", $mainData);
		$this->load->view("tail");
	}

	public function newproject(){
		$info = $this->session->userdata("userInfo");
		$regIdx = $info['idx'];
		$proName = $this->input->post("proName");
		$proDetail = $this->input->post("proDetail");
		$startDate = $this->input->post("startDate");
		$endDate = $this->input->post("endDate");
		$regDate = date("Y-m-d H:i:s");

		$data = array(
			"regIdx"			=>		$regIdx,
			"name"			=>		$proName,
			"main"			=>		$proDetail,
			"startDate"		=>		$startDate,
			"endDate"		=>		$endDate,
			"regDate"		=>		$regDate
		);

		$responseData = new stdClass();
		if(!($this->db->insert("PROJECT", $data))){
			$responseData->code = 500;
			echo json_encode($responseData);
			exit;
		}//else $responseData->code = 200;
		$sql = "SELECT idx 
				FROM PROJECT 
				WHERE regIdx = $regIdx AND name = '$proName' 
					AND startDate = '$startDate' AND endDate = '$endDate' 
					AND regDate = '$regDate' AND main = '$proDetail' ;";
		// echo $sql;
		// exit;
		$proIdx = $this->db->query($sql)->result_array()[0]['idx'];

		$sql = "INSERT INTO PROJECT_MEMBER values( 0, $regIdx, $proIdx);";

		if(!($this->db->query($sql))){
			$responseData->code = 600;
			echo json_encode($responseData);
			exit;
		}

		$responseData->code = 200;
		$responseData->idx = $proIdx;
		echo json_encode($responseData);
		exit;
	}


	public function view($idx = 0){
		$data = array(
			"info"		=>		$this->info,
			"js"			=>		$this->js,
			"css"		=>		$this->css
		);

		//Project Information Query 
		$sql = "SELECT A.idx, A.regIdx, A.name, A.main, A.startDate, A.endDate, A.regDate,
					B.name AS userName, B.idx AS userIdx  
		 FROM PROJECT AS A LEFT OUTER JOIN MEMBER AS B 
		 ON A.regIdx = B.idx 
		 WHERE A.idx = $idx;";

		//Projecct Member Query
		$memberSql = "SELECT B.name, B.idx 
					FROM PROJECT_MEMBER AS A LEFT OUTER JOIN MEMBER AS B 
					ON A.userIdx = B.idx 
					WHERE A.proIdx = $idx;";

		//Project Document File Query
		$startSql = "SELECT * FROM PROJECT_START WHERE proIdx = $idx;";
		$middleSql = "SELECT * FROM PROJECT_MIDDLE WHERE proIdx = $idx;";
		$endSql = "SELECT * FROM PROJECT_END WHERE proIdx = $idx;";

		//Project Information Query Execution
		$prInfo = $this->db->query($sql)->result_array()[0];
		//Project Member Query Execution
		$memberList = $this->db->query($memberSql)->result_array();
		//Project Document File Query Execution
		$startDoc = $this->db->query($startSql)->result_array();
		$middleDoc = $this->db->query($middleSql)->result_array();
		$endDoc = $this->db->query($endSql)->result_array();

		if(!empty($startDoc))
			$startDoc = $startDoc[0];
		if(!empty($middleDoc))
			$middleDoc = $middleDoc[0];
		if(!empty($endDoc))
			$endDoc = $endDoc[0];

		$mainData = array(
			"prInfo"			=>		$prInfo,
			"members"		=>		$memberList,
			"startDoc"		=>		$startDoc,
			"middleDoc"		=>		$middleDoc,
			"endDoc"			=>		$endDoc,
			"viewerIdx"		=>		$this->info['idx']
		);

		$this->load->view("head",$data);
		$this->load->view("projectView", $mainData);
		$this->load->view("tail");
	}

	public function getMember(){
		$sql = "SELECT idx, name 
				FROM MEMBER 
				WHERE levelIdx <> 9 AND levelIdx <> 11 ;";
		$list = $this->db->query($sql)->result_array();

		$responseData = new stdClass();
		if(!(isset($list))){
			$responseData->code = 500;
		}else{
			$responseData->code = 200;
			$responseData->list = $list;
		}
		echo json_encode($responseData);
	}

	public function addMembers(){
		$members = $this->input->post('members');
		$prIdx = $this->input->post('prIdx');
		$responseData = new stdClass();
		foreach($members as $i => $row){
			$data = array(
				"idx"		=>		0,
				"proIdx"		=>		$prIdx,
				"userIdx"	=>		$row
			);
			if(!($this->db->insert("PROJECT_MEMBER", $data))){
				$responseData->code = 500;
				echo json_encode($responseData);
				exit;
			}
		}
		$responseData->code = 200;
		echo json_encode($responseData);
	}

	public function removeMember(){
		$proIdx = $this->input->post("prIdx");
		$userIdx = $this->input->post("userIdx");

		$sql = "DELETE FROM PROJECT_MEMBER WHERE proIdx = $proIdx AND userIdx = $userIdx;";
		$responseData = new stdClass();
		if($this->db->query($sql))
			$responseData->code = 200;
		else
			$responseData->code = 500;

		echo json_encode($responseData);
	}

	public function uploadStart(){
		$proIdx = $this->input->post('proIdx');
		$basePath = "projectFile/";
		$proDir = "project".$proIdx."/";
		$startDir = "startDir/";
		$realPath = $basePath.$proDir.$startDir;

		if(!(is_dir($basePath)))
			mkdir($basePath, 0777);
		if(!(is_dir($basePath.$proDir)))
			mkdir($basePath.$proDir, 0777);
		if(!(is_dir($basePath.$proDir.$startDir)))
			mkdir($basePath.$proDir.$startDir, 0777);

		$fileName = $_FILES['file']['name'];
		$tmpName = $_FILES['file']['tmp_name'];
		$responseData = new stdClass();
		if(move_uploaded_file($tmpName, $realPath.$fileName)){ 
			$data = array(
				"idx"		=>		0,
				"fileName"	=>		$fileName,
				"filePath"	=>		$realPath,
				"proIdx"		=>		$proIdx
			);
			if($this->db->insert("PROJECT_START", $data))
				$responseData->code = 200;
			else
				$responseData->code = 600;
		}else $responseData->code = 500;

		echo json_encode($responseData);
	}
	public function uploadMiddle(){
		$proIdx = $this->input->post('proIdx');
		$basePath = "projectFile/";
		$proDir = "project".$proIdx."/";
		$middleDir = "middleDir/";
		$realPath = $basePath.$proDir.$middleDir;

		if(!(is_dir($basePath)))
			mkdir($basePath, 0777);
		if(!(is_dir($basePath.$proDir)))
			mkdir($basePath.$proDir, 0777);
		if(!(is_dir($basePath.$proDir.$middleDir)))
			mkdir($basePath.$proDir.$middleDir, 0777);

		$fileName = $_FILES['file']['name'];
		$tmpName = $_FILES['file']['tmp_name'];
		$responseData = new stdClass();
		if(move_uploaded_file($tmpName, $realPath.$fileName)){ 
			$data = array(
				"idx"		=>		0,
				"fileName"	=>		$fileName,
				"filePath"	=>		$realPath,
				"proIdx"		=>		$proIdx
			);
			if($this->db->insert("PROJECT_MIDDLE", $data))
				$responseData->code = 200;
			else
				$responseData->code = 600;
		}else $responseData->code = 500;

		echo json_encode($responseData);
	}
	public function uploadEnd(){
		$proIdx = $this->input->post('proIdx');
		$basePath = "projectFile/";
		$proDir = "project".$proIdx."/";
		$endDir = "endDir/";
		$realPath = $basePath.$proDir.$endDir;

		if(!(is_dir($basePath)))
			mkdir($basePath, 0777);
		if(!(is_dir($basePath.$proDir)))
			mkdir($basePath.$proDir, 0777);
		if(!(is_dir($basePath.$proDir.$endDir)))
			mkdir($basePath.$proDir.$endDir, 0777);

		$fileName = $_FILES['file']['name'];
		$tmpName = $_FILES['file']['tmp_name'];
		$responseData = new stdClass();
		if(move_uploaded_file($tmpName, $realPath.$fileName)){ 
			$data = array(
				"idx"		=>		0,
				"fileName"	=>		$fileName,
				"filePath"	=>		$realPath,
				"proIdx"		=>		$proIdx
			);
			if($this->db->insert("PROJECT_END", $data))
				$responseData->code = 200;
			else
				$responseData->code = 600;
		}else $responseData->code = 500;

		echo json_encode($responseData);
	}

	public function removeStart($idx = 0){
		$sql = "SELECT * FROM PROJECT_START WHERE idx = $idx;";
		$result = $this->db->query($sql)->result_array()[0];
		$basePath = $result['filePath'];
		$fileName = $result['fileName'];
		$responseData = new stdClass();

		if(!unlink($basePath.$fileName)){
			$responseData->code = 500;
			echo json_encode($responseData);
			exit;
		}
		$sql = "DELETE FROM PROJECT_START WHERE idx = $idx;";
		if(!$this->db->query($sql)){
			$responseData->code = 600;
			echo json_encode($responseData);
			exit;	
		}
		$responseData->code = 200;
		echo json_encode($responseData);
		
	}

	public function removeMiddle($idx = 0){
		$sql = "SELECT * FROM PROJECT_MIDDLE WHERE idx = $idx;";
		$result = $this->db->query($sql)->result_array()[0];
		$basePath = $result['filePath'];
		$fileName = $result['fileName'];
		$responseData = new stdClass();

		if(!unlink($basePath.$fileName)){
			$responseData->code = 500;
			echo json_encode($responseData);
			exit;
		}
		$sql = "DELETE FROM PROJECT_MIDDLE WHERE idx = $idx;";
		if(!$this->db->query($sql)){
			$responseData->code = 600;
			echo json_encode($responseData);
			exit;	
		}
		$responseData->code = 200;
		echo json_encode($responseData);
		
	}
	public function removeEnd($idx = 0){
		$sql = "SELECT * FROM PROJECT_END WHERE idx = $idx;";
		$result = $this->db->query($sql)->result_array()[0];
		$basePath = $result['filePath'];
		$fileName = $result['fileName'];
		$responseData = new stdClass();

		if(!unlink($basePath.$fileName)){
			$responseData->code = 500;
			echo json_encode($responseData);
			exit;
		}
		$sql = "DELETE FROM PROJECT_END WHERE idx = $idx;";
		if(!$this->db->query($sql)){
			$responseData->code = 600;
			echo json_encode($responseData);
			exit;	
		}
		$responseData->code = 200;
		echo json_encode($responseData);
		
	}

	public function getStartFile($idx = 0){
		$sql = "SELECT * FROM PROJECT_START WHERE idx = $idx;";
		$result = $this->db->query($sql)->result_array()[0];
		$this->file($result['filePath'], $result['fileName']);
	}
	public function getMiddleFile($idx = 0){
		$sql = "SELECT * FROM PROJECT_MIDDLE WHERE idx = $idx;";
		$result = $this->db->query($sql)->result_array()[0];
		$this->file($result['filePath'], $result['fileName']);
	}
	public function getEndFile($idx = 0){
		$sql = "SELECT * FROM PROJECT_END WHERE idx = $idx;";
		$result = $this->db->query($sql)->result_array()[0];
		$this->file($result['filePath'], $result['fileName']);
	}

	public function file($filePath, $fileName){
		
		// $fileName = $result['fileName'];
		// $filePath = $result['filePath'];
 
		$realPath = $filePath.$fileName;
		$filesize = filesize($realPath);

		$filename = $this->mb_basename($realPath);
		if( $this->is_ie() ) $filename = $this->utf2euc($fileName);
		 
		header("Pragma: public");
		header("Expires: 0");
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: $filesize");
		readfile($realPath);
 
	}

	function mb_basename($path) { return end(explode('/',$path)); } 
	function utf2euc($str) { return iconv("UTF-8","cp949//IGNORE", $str); }
	public function is_ie() {
		if(!isset($_SERVER['HTTP_USER_AGENT']))return false;
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) return true; // IE8
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 6.1') !== false) return true; // IE11
		return false;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */