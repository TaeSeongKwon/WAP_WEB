<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board extends CI_Controller {

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
		$this->load->view('boardList');
	}
	public function lists($type, $page=1){
		$this->load->library('pagination');

		$page--;
		$perPage = 15;
		$segment = $page / $perPage;
		floor($segment);
		$segment++;
		if($page == null)
			$page = 0;
		$realPage = $page * $perPage;
		$info = $this->session->userdata('userInfo');

		$bInfoSql = "SELECT idx, name, accessLevel FROM BOARD_TYPE WHERE idx = $type ;";
		$boardInfo = $this->db->query($bInfoSql)->result_array()[0];

		$sql = "SELECT A.idx, A.title, A.regDate, A.regIdx, B.name AS boardName, B.idx AS boardType, C.name, ( COUNT(D.idx)  ) AS numOfCmt  
				FROM BOARD AS A LEFT OUTER JOIN BOARD_TYPE AS B ON A.idxOf = B.idx 
				LEFT OUTER JOIN MEMBER AS C ON A.regIdx = C.idx  
				LEFT OUTER JOIN COMMENT AS D ON (A.idx = D.idxOf AND D.isUsable = 'Y')  
				WHERE A.idxOf = $type AND A.isUsable = 'Y'  
				GROUP BY A.idx 
				ORDER BY A.idx DESC  LIMIT $perPage OFFSET $realPage;";
		$list = $this->db->query($sql)->result_array();

		$totalRowSql = "SELECT COUNT(*) AS CNT FROM BOARD WHERE idxOf = $type AND isUsable='Y' ;";

		$totalRow = $this->db->query($totalRowSql)->result_array()[0]['CNT'];

		$config['base_url'] = "/board/lists/$type/";
		$config['total_rows'] = $totalRow;
		$config['per_page'] = $perPage;
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 4;
		
		$config['full_tag_open'] ="<nav><ul class='pagination'>";
		$config['full_tag_close'] ="</ul></nav>";
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		
		$this->pagination->initialize($config);

		// $config['next_tag_open'] =
							    // <li>
							    //   <a href="#" aria-label="Previous">
							    //     <span aria-hidden="true">&laquo;</span>
							    //   </a>
							    // // </li>
							    
							    // <li>
							    //   <a href="#" aria-label="Next">
							    //     <span aria-hidden="true">&raquo;</span>
							    //   </a>
							    // </li>
							  
		$head = array(
			"info"			=>			$this->info,
			"js"				=>			$this->js,
			"css"			=>			$this->css
		);
		$data = array(
			'info'		=>		$info,
			'boardInfo'	=>		$boardInfo,
			'list'		=>		$list,
			'rowNum'		=>		($totalRow - $realPage),
			'pagination'	=>		$this->pagination->create_links()	,
			'type'		=>		$type
		);
		$this->load->view('head', $head);
		$this->load->view('boardList', $data);
		$this->load->view("tail");
	}	

	public function view($type, $idx){
		$sql = "SELECT a.idx, a.title, a.idxOf, a.regIdx, a.main, a.isFileUp, a.isImageUp, a.isUsable, a.regDate,
					b.idx AS userIdx, b.name, c.name AS boardName, c.idx AS boardType, c.accessLevel 
				 FROM BOARD AS a LEFT OUTER JOIN MEMBER as b ON a.regIdx = b.idx 
				 LEFT OUTER JOIN BOARD_TYPE AS c ON a.idxOf = c.idx 
				 WHERE a.idx = $idx ;";
				
		$result = $this->db->query($sql)->result_array()[0];
		$fileSql = "SELECT idx, idxOf, fileName FROM FILE_LIST WHERE idxOf = $idx;";
		$fileList = $this->db->query($fileSql)->result_array();
		$info  = $this->session->userdata('userInfo');
		
		$cmtSql = "SELECT A.idx, A.main, A.regDate, B.name, B.idx AS userIdx  
				FROM COMMENT AS A LEFT OUTER JOIN MEMBER AS B ON A.regIdx = B.idx 
				WHERE A.isUsable = 'Y' AND A.idxOf = $idx ORDER BY A.regDate DESC;";
		$cmtList = $this->db->query($cmtSql)->result_array();

		$head = array(
			"info"			=>			$this->info,
			"js"				=>			$this->js,
			"css"			=>			$this->css
		);

		$data = array(
			'info'		=>			$info,
			'boardMain'	=>			$result,
			'cmtList'	=>			$cmtList,
			'fileList'	=>			$fileList,
			'type'		=>			$type,
			'idx'		=>			$idx
		); 
		$this->load->view('head', $head);
		$this->load->view('boardView', $data);
		$this->load->view("tail");
	}

	public function delete($type, $idx){

		$sql = "UPDATE BOARD SET isUsable = 'N' WHERE idxOf = $type AND idx = $idx ;";
		$this->db->query($sql);
		redirect("board/lists/$type/");
	}

	public function file($idxOf, $idx){
		$sql = "SELECT fileName, filePath FROM FILE_LIST WHERE idx = $idx AND idxOf = $idxOf; ";
		$result = $this->db->query($sql)->result_array()[0];
		$fileName = $result['fileName'];
		$filePath = $result['filePath'];
 
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
	// public function (){
	// 	// print_r("123");
	// 	$this->load->view('boardList');
	// }
	public function write($type){
		$data = array(
			'type'		=>			$type
			
		); 
		$this->css[] = "summernote";
		$this->js[] = "summernote.min";
		$this->css[] = "tsEditor";
		$this->js[] = "tsEditor";
		$head = array(
			"info"			=>			$this->info,
			"js"				=>			$this->js,
			"css"			=>			$this->css
		);

		$this->load->view('head', $head);
		$this->load->view('boardWrite', $data);
		$this->load->view("tail");
	}
	public function edit($type, $idx){

		$sql = "SELECT idx, idxOf, title, main FROM BOARD WHERE idx= $idx AND idxOf = $type ;";
		$result = $this->db->query($sql)->result_array()[0];

		$this->css[] = "tsEditor";
		$this->js[] = "tsEditor";
		$this->css[] = "summernote";
		$this->js[] = "summernote.min";
		$head = array(
			"info"			=>			$this->info,
			"js"				=>			$this->js,
			"css"			=>			$this->css
		);

		$data = array(
			'idx'		=>		$idx,
			'type'		=>		$type,
			'mainData'	=>		$result	
		);
		// print_r("1243");
		$this->load->view('head', $head);
		$this->load->view('boardEdit', $data);
		$this->load->view('tail');
	}
	public function search($type, $keyword = null, $page = 1){
		$this->load->library('pagination');
		if($keyword == null)
			$keyword = $this->input->post('keyword');
		
		$keyword = urldecode($keyword);

		if($keyword == null)
			redirect("board/lists/$type");
		
		$page--;
		$perPage = 15;
		$segment = $page / $perPage;
		floor($segment);
		$segment++;
		if($page == null)
			$page = 0;
		$realPage = $page * $perPage;
		$info = $this->session->userdata('userInfo');

		$bInfoSql = "SELECT idx, name, accessLevel FROM BOARD_TYPE WHERE idx = $type ;";
		$boardInfo = $this->db->query($bInfoSql)->result_array()[0];

		$sql = "SELECT A.idx, A.title, A.regDate, A.regIdx, B.name AS boardName, B.idx AS boardType, C.name, ( COUNT(D.idx)  ) AS numOfCmt  
				FROM BOARD AS A LEFT OUTER JOIN BOARD_TYPE AS B ON A.idxOf = B.idx 
				LEFT OUTER JOIN MEMBER AS C ON A.regIdx = C.idx  
				LEFT OUTER JOIN COMMENT AS D ON (A.idx = D.idxOf AND D.isUsable = 'Y')  
				WHERE A.idxOf = $type AND A.isUsable = 'Y' AND (A.title LIKE '%$keyword%' || A.main LIKE '%$keyword%')  
				GROUP BY A.idx 
				ORDER BY A.idx DESC  LIMIT $perPage OFFSET $realPage;";
		$list = $this->db->query($sql)->result_array();

		$totalRowSql = "SELECT COUNT(*) AS CNT FROM BOARD WHERE idxOf = $type AND isUsable='Y' AND (title LIKE '%$keyword%' || main LIKE '%$keyword%') ;";

		$totalRow = $this->db->query($totalRowSql)->result_array()[0]['CNT'];

		$config['base_url'] = "/board/search/$type/$keyword/";
		$config['total_rows'] = $totalRow;
		$config['per_page'] = $perPage;
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 5;
		
		$config['full_tag_open'] ="<nav><ul class='pagination'>";
		$config['full_tag_close'] ="</ul></nav>";
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		
		$this->pagination->initialize($config);

		// $config['next_tag_open'] =
							    // <li>
							    //   <a href="#" aria-label="Previous">
							    //     <span aria-hidden="true">&laquo;</span>
							    //   </a>
							    // // </li>
							    
							    // <li>
							    //   <a href="#" aria-label="Next">
							    //     <span aria-hidden="true">&raquo;</span>
							    //   </a>
							    // </li>
		$head = array(
			"info"			=>			$this->info,
			"js"				=>			$this->js,
			"css"			=>			$this->css
		);				  

		$data = array(
			'info'		=>		$info,
			'boardInfo'	=>		$boardInfo,
			'list'		=>		$list,
			'rowNum'		=>		($totalRow - $realPage),
			'pagination'	=>		$this->pagination->create_links()	,
			'type'		=>		$type
		);
		// print_r("123");
		$this->load->view('head', $head);
		$this->load->view('boardList', $data);
		$this->load->view('tail');

	}
	public function editBoard($type, $idx){
		$title = $this->input->post('title');
		$main = $this->input->post('main');
		$fileCnt = $this->input->post('fileCnt');
		// $fileCnt = "";
		$info = $this->session->userdata('userInfo');
		$userIdx = $info['idx'];

		$sql = "UPDATE BOARD SET main = '$main', title = '$title' WHERE idx = $idx AND idxOf = $type ;";

		$responseData = new stdClass();
		if($this->db->query($sql)){
			$upDir = 'upload/';
			$userDir = 'user_'.$userIdx.'/';
			$dir = 'board_'.$idx.'/';
			
			if($fileCnt != null){
				if(!(is_dir($upDir)))
					mkdir($upDir, 0777);
				
				if(!(is_dir($upDir.$userDir)))
					mkdir($upDir.$userDir, 0777);
				if(!(is_dir($upDir.$userDir.$dir)))
					mkdir($upDir.$userDir.$dir, 0777);

				$path = $upDir.$userDir.$dir;

				for($i = 1; $i <= $fileCnt; $i++){
					$fileName = $_FILES['file_'.$i]['name'];
					$tmpName = $_FILES['file_'.$i]['tmp_name'];
					if(move_uploaded_file($tmpName, $path.$fileName)){

						$insertData = array(
							'filePath'		=>		$path,
							'fileName'		=>		$fileName,
							'idxOf'			=>		$idx
						);
						$this->db->insert('FILE_LIST', $insertData);
						$responseData->fileCode = 200;
					}else $responseData->fileCode = 500;
				}
			}else $responseData->fileCode = 201;

			$responseData->code = 200;
			$responseData->redirect = "/board/view/$type/$idx";
		}else $responseData->code = 500; 
		

		echo json_encode($responseData);	
	}

	public function uploadBoard(){
		$type =$this->input->post('type');
		$title = $this->input->post('title');
		$main = $this->input->post('main');
		$fileCnt = $this->input->post('fileCnt');
		// $fileCnt = "";
		$info = $this->session->userdata('userInfo');
		$userIdx = $info['idx'];
		$time = date('Y-m-d H:i:s');
		$data = array(
			 'title'			=>			$title,
			 'idxOf'			=>			$type,
			 'main'			=>			$main,
			 'regDate'		=>			$time,
			 'regIdx'		=>			$userIdx,
			 'isImageUp'		=>			'N', 
			 'isUsable'		=>			'Y'
		);
		$responseData = new stdClass();
		if($this->db->insert('BOARD', $data)){
			$sql = "SELECT idx 
					FROM BOARD 
					WHERE title = '$title' AND idxOf = $type 
							AND regDate = DATE'$time' AND isUsable = 'Y' 
							AND regIdx = $userIdx AND main = '$main' ;";
			$idx = $this->db->query($sql)->result_array()[0]['idx'];
			$upDir = 'upload/';
			$userDir = 'user_'.$userIdx.'/';
			$dir = 'board_'.$idx.'/';
			
			if($fileCnt != null){
				if(!(is_dir($upDir)))
					mkdir($upDir, 0777);
				
				if(!(is_dir($upDir.$userDir)))
					mkdir($upDir.$userDir, 0777);
				if(!(is_dir($upDir.$userDir.$dir)))
					mkdir($upDir.$userDir.$dir, 0777);

				$path = $upDir.$userDir.$dir;

				for($i = 1; $i <= $fileCnt; $i++){
					$fileName = $_FILES['file_'.$i]['name'];
					$tmpName = $_FILES['file_'.$i]['tmp_name'];
					if(move_uploaded_file($tmpName, $path.$fileName)){

						$insertData = array(
							'filePath'		=>		$path,
							'fileName'		=>		$fileName,
							'idxOf'			=>		$idx
						);
						$this->db->insert('FILE_LIST', $insertData);
						$responseData->fileCode = 200;
					}else $responseData->fileCode = 500;
				}
			}else $responseData->fileCode = 201;

			$responseData->code = 200;
			$responseData->redirect = "/board/view/$type/$idx";
		}else $responseData->code = 500; 
		

		echo json_encode($responseData);
	}
	public function upComment(){
		$main = $this->input->post('cmtMain');
		$typeOf = $this->input->post('typeOf');
		$idxOf = $this->input->post('idxOf');
		$time = date("Y-m-d H:i:s");
		$info = $this->session->userdata('userInfo');
		$idx = $info['idx'];
		$name = $info['name'];

		$insertData = array(
			'idx'		=>			0,
			'typeOf'		=>			$typeOf,
			'regIdx'		=>			$idx, 
			"idxOf"		=>			$idxOf, 
			"main"		=>			$main, 
			"regDate"	=>			$time, 
			"isUsable"	=>			'Y'
		);
		$result = new stdClass();
		$result->name = $name;
		$result->main = $main;
		$result->regDate  = $time;
		$responseData = new stdClass();
		if($this->db->insert('COMMENT', $insertData)){
			$responseData->code = 200;
			$responseData->result = $result;
		}else 
			$responseData->code = 500;

		echo json_encode($responseData);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */