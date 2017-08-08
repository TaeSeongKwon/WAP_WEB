<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
		$this->css[] = "unite-gallery";
		$this->js[] = "jquery-2.1.4.min";
		// $this->js[] = "jquery-11.0.min";
		$this->js[] = "bootstrap.min";
		$this->js[] = "jquery.faloading-0.2.min";
		$this->js[] = "unitegallery.min";
		$this->js[] = "ug-theme-tiles";

		$this->info = $this->session->userdata('userInfo');
		if($this->info == null)
			redirect("member/loginView");
	}
	public function index()
	{
		// $info = $this->session->userdata("userInfo");
		$sql = "SELECT A.regIdx, A.idx, A.name, A.regDate, A.thumbPath, COUNT(B.idx) AS cnt 
		 FROM GALLERY AS A LEFT OUTER JOIN GL_COMMENT AS B ON (A.idx = B.idxOf AND B.isUsable = 'Y') 
		 WHERE A.isUsable = 'Y' 
		GROUP BY A.idx 
		 ORDER BY A.regDate DESC;";
		$galleryList = $this->db->query($sql)->result_array();

		$data = array(
			// 'info'		=>		$info,
			'list'		=>		$galleryList
		);
		$this->js[] = "latae";
		$head = array(
			"info"			=>			$this->info,
			"css"			=>			$this->css,
			"js"				=>			$this->js
		);
		$this->load->view("head", $head);
		$this->load->view("galleryList",$data);
		$this->load->view("tail");
	}

	public function view($idx = 0){
		$sql = "SELECT * FROM GALLERY_IMG WHERE idxOf = $idx;";
		$info = $this->session->userdata("userInfo");
		$list = $this->db->query($sql)->result_array();
		$sql = "SELECT A.idx, A.name, A.regDate, B.idx AS userIdx, B.name AS userName 
				FROM GALLERY AS A LEFT OUTER JOIN MEMBER AS B ON A.regIdx = B.idx 
				WHERE A.idx = $idx;";
		$gallInfo = $this->db->query($sql)->result_array()[0];
		$sql = "SELECT A.main, A.regDate, B.name, A.idx 
				FROM GL_COMMENT AS A LEFT OUTER JOIN MEMBER AS B ON A.regIdx = B.idx 
				WHERE A.idxOf = $idx AND A.isUsable = 'Y' 
				ORDER BY A.regDate DESC ;";
		// print_r($sql);
		// exit;
		$cmtList = $this->db->query($sql)->result_array();
		$data = array(
			"info"		=>		$info,
			"gallInfo"	=>		$gallInfo,
			"list"		=>		$list,
			"cmtList"	=>		$cmtList
		);

		$this->css[] = "fotorama";
		$this->js[] = "fotorama";

		$head = array(
			"info"			=>			$this->info,
			"css"			=>			$this->css,
			"js"				=>			$this->js
		);

		$this->load->view("head", $head);
		$this->load->view("galleryView", $data);
		$this->load->view("tail");
	}
	public function write(){
	
		$head = array(
			"info"			=>			$this->info,
			"css"			=>			$this->css,
			"js"				=>			$this->js
		);

		$this->load->view("head", $head);
		$this->load->view("galleryWrite");
		$this->load->view("tail");
	}
	public function delete($idx = 0){
		$sql = "UPDATE GALLERY SET isUsable = 'N' WHERE idx = $idx;";
		$this->db->query($sql);
		redirect("gallery");
	}
	public function upComment(){
		$idx = $this->input->post("idx");
		$main = $this->input->post("cmtMain");
		$time = date("Y-m-d H:i:s");
		$info = $this->session->userdata("userInfo");
		$name = $info['name'];
		$data = array(
			'regIdx'			=>			$info['idx'],
			'main'			=>			$main,
			'idxOf'			=>			$idx,
			'regDate'		=>			$time,
			'isUsable'		=>			'Y'
		);
		$result = new stdClass();
		$result->name = $name;
		$result->main = $main;
		$result->regDate  = $time;
		$responseData = new stdClass();
		if($this->db->insert('GL_COMMENT', $data)){
			$responseData->code = 200;
			$responseData->result = $result;
		}else 
			$responseData->code = 500;

		echo json_encode($responseData);
	}
	public function upload(){
	

		$title = $this->input->post("title");
		$main = $this->input->post('main');
		$fileCnt = $this->input->post('fileCnt');
		$info = $this->session->userdata('userInfo');
		$filePath = "pictures/";
		
		$time = date('Y-m-d H:i:s');
		$regTime = date('Ymd_his');
		$userIdx = $info['idx'];
		$realIdx = "";
		$data = array(
			'name'		=>		$title,
			'main'		=>		$main,
			'regIdx'		=>		$userIdx,
			'regDate'	=>		$time,
			'isUsable'	=>		'Y'
		);
		$responseData = new stdClass();
		if($this->db->insert('GALLERY', $data)){
			$sql = "SELECT idx FROM GALLERY 
					WHERE regIdx = $userIdx AND name = '$title' 
							AND main = '$main' AND regDate ='$time' ;";
				
			$result = $this->db->query($sql)->result_array()[0];
			// print_r($sql);
			// 	exit;	
			$realIdx = $result['idx'];
			$galleryDir = "gallery_".$realIdx."/";
				

			if(!(is_dir($filePath)))
				mkdir($filePath, 0777);
			if(!(is_dir($filePath.$galleryDir)))
				mkdir($filePath.$galleryDir, 0777);

			$thumbName = "";

			for($idx = 0; $idx<$fileCnt; $idx++){
				$fileIdx = 'file_'.$idx;
				$upFileName = $_FILES[$fileIdx]['name'];
				$ext = substr(strrchr($upFileName,"."),1);	//확장자앞 .을 제거하기 위하여 substr()함수를 이용
				$ext = strtolower($ext);	//확장자를 소문자로 변환
				$realFileName = "img_".$regTime."_".($idx+1).".".$ext;

				if($thumbName == "")
					$thumbName = $realFileName;
				if(!(move_uploaded_file($_FILES[$fileIdx]['tmp_name'], $filePath.$galleryDir.$realFileName))){
					$responseData->code = 301;
					echo json_encode($responseData);
					return;
				}
				$data = array(
					'idxOf'		=>		$realIdx,
					'filePath'	=>		$filePath.$galleryDir,
					'fileName'	=>		$realFileName
				);
				if(!($this->db->insert('GALLERY_IMG', $data))){
					$responseData->code = 302;
					echo json_encode($responseData);
					return ;
				}
			}
			$thumbExt = substr(strrchr($thumbName,"."),1);	//확장자앞 .을 제거하기 위하여 substr()함수를 이용
			$thumbExt = strtolower($thumbExt);	//확장자를 소문자로 변환
			$realThumbName =$filePath.$galleryDir."thumb_".$regTime.".".$thumbExt;
			$this->load->library('image_lib');
			$this->image_lib->clear();
			$config['image_library'] = 'gd2';
			$config['source_image'] =  $_SERVER['DOCUMENT_ROOT']."/".$filePath.$galleryDir.$thumbName;
			$config['maintain_ratio'] = TRUE;
			// $config['create_thumb'] = TRUE;
			 $config['master_dim'] = 'auto';
			$config['width'] = 400;
			$config['new_image'] = $_SERVER['DOCUMENT_ROOT']."/".$realThumbName;
			 $this->image_lib->initialize($config);
			 // $this->image_lib->clear();
			// print_r($_SERVER['DOCUMENT_ROOT']."/".$filePath.$galleryDir.$thumbName);
			if ( ! $this->image_lib->resize() ) {                                                           
				echo $this->image_lib->display_errors();                                                    
			}           
			$realThumbName = "/".$realThumbName;
			$sql = "UPDATE GALLERY SET thumbPath= '$realThumbName' WHERE idx = $realIdx;";

			if(!($this->db->query($sql))){
				$responseData->code = 303;
				echo json_encode($responseData);
				return;
			}
			$responseData->code = 200;
		}else $responseData->code = 500;

		echo json_encode($responseData);
	}
	// public function more($idx=1){

	// }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */