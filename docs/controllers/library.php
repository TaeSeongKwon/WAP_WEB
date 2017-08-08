<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Library extends CI_Controller {

	function __construct(){
		parent::__construct();
		// print_r("asdfasdf");
		// exit;
		$this->css = [];
		$this->js = [];
		$this->js[] = "code_convert";
		$this->js[] = "jquery-2.1.4.min";
		$this->js[] = "bootstrap.min";
		$this->js[] = "jquery.faloading-0.2.min";
		$this->js[] = "angular.min";
		$this->DAY = 1000 * 60 * 60 * 24;

		$this->info = $this->session->userdata('userInfo');
		if($this->info == null)
			redirect("member/loginView");
	}

	public function index()
	{
		$this->js[] = "libraryPage";

		$data=array(
			'info' 		=> 		$this->info,
			"css"		=>		$this->css,
			"js"		=>		$this->js
		);


		$this->load->view('head', $data);
		$this->load->view("library");
	}
	public function search(){
		$keyword = $this->input->get("keyword");
		$this->load->model("library_model", "bookModel");

		$result = $this->bookModel->search($keyword);
		// print_r($keyword);
		
		print_r(json_encode($result));
	}

	public function set_barcode($code){
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}
	public function manage(){
		// if($this->info['levelIdx'] == 5 || $this->info['levelIdx'] == 1){
			$this->js[] = "ui-bootstrap.min";
			$this->js[] = "libraryManagePage";

			$data=array(
				'info' 		=> 		$this->info,
				"css"		=>		$this->css,
				"js"		=>		$this->js
			);

			$this->load->view('head', $data);
			$this->load->view("libraryManage");
		// }else{
		// 	redirect("/");
		// }
	}
	public function getAllBook(){
		$this->load->model("library_model", "bookModel");
		$bookList = $this->bookModel->getAllBook();
		$resData = new stdClass();
		$resData->books = $bookList;
		print_r(json_encode($resData));
	}

	public function getCategorys(){
		$this->load->model("library_model", "bookModel");
		$categoryList = $this->bookModel->getCategorys();
		print_r(json_encode($categoryList));
	}

	public function getCurrentSerialNum(){
		$idx = $this->input->get("category");
		$this->load->model("library_model", "bookModel");
		$result = $this->bookModel->getCurrentSerialNum($idx);
		$resData = new stdClass();
		$resData->size = 0;
		if(count($result) > 0){
			$resData->book = $result[0];
			$resData->size = count($result);
		}
		print_r(json_encode($resData));
	}

	public function insertBook(){
		$this->load->model("library_model", "bookModel");

		$request= json_decode(file_get_contents('php://input'), TRUE);
		// AngularJS Post Paramater Parsing

		$serialNum = $request["bookSerial"];
		$bookName = $request["bookName"];
		$category = $request["categoryIdx"];
		$bookAuthor = $request["bookAuthor"];
		$publishCorp = $request["publishCorp"];
		$base64Image = $request["base64Image"];
		
		$insertData = array(
			"num"		=>		$serialNum,
			"category"	=>		$category,
			"name"		=>		$bookName,
			"author"	=>		$bookAuthor,
			"publish"	=>		$publishCorp,
			"is_use"	=>		true,
			"barcode"	=>		$base64Image
		);
		
		$resData = new stdClass();
		$resData->isSuccess = false;
		if($this->bookModel->insertBook($insertData)){
			$resData->isSuccess = true;
		}
		print_r(json_encode($resData));
	}

	public function disableBook(){
		$this->load->model("library_model", "bookModel");
		$num = $this->input->get("num");
		$resData = new stdClass();
		$resData->isSuccess = false;
		if($this->bookModel->disableBook($num))
			$resData->isSuccess = true;
		print_r(json_encode($resData));
	}
	public function usableBook(){
		$this->load->model("library_model", "bookModel");
		$num = $this->input->get("num");
		$resData = new stdClass();
		$resData->isSuccess = false;
		if($this->bookModel->usableBook($num))
			$resData->isSuccess = true;
		print_r(json_encode($resData));
	}
	public function saveCode(){
		$this->load->model("library_model", "bookModel");
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$num = $request["num"];
		$code = $request["code"];
		$resData = new stdClass();
		$resData->isSuccess = false;
		if($this->bookModel->saveCode($num, $code)){
			$resData->isSuccess = true;
		}
		print_r(json_encode($resData));
	}
	public function editBook(){
		$this->load->model("library_model", "bookModel");
		$request= json_decode(file_get_contents('php://input'), TRUE);

		$num = $request["bookNum"];
		$name = $request["bookName"];
		$author = $request["bookAuthor"];
		$publish = $request["bookPublish"];

		$resData = new stdClass();
		$resData->isSuccess = false;
		if($this->bookModel->editBook($num, $name, $author, $publish)){
			$resData->isSuccess = true;
		}
		print_r(json_encode($resData));
	}
	public function getPolicy(){
		$this->load->model("library_model", "bookModel");
		$result = $this->bookModel->getPolicy();
		$resData = new stdClass();
		$resData->statusCode = 500;

		if(count($result) > 0){
			$resData->statusCode = 200;
			$resData->policy = $result[0];
		}else{
			$resData->statusCode = 400;
		}
		print_r(json_encode($resData));	
	}
	public function updatePolicy(){
		$this->load->model("library_model", "bookModel");
		$request= json_decode(file_get_contents('php://input'), TRUE);
		$resData = new stdClass();
		$resData->statusCode = 400;
		if($this->bookModel->insertPolicy($request)){
			$resData->statusCode = 200;
		}

		print_r(json_encode($resData));
	}

	public function lentBook() {
		$this->load->model("library_model", "bookModel");
		$request = json_decode(file_get_contents('php://input'), TRUE);
		$bookCode = $request["bookCode"];
		$lentDate = $request["lentDate"];
		$searchBook = $this->bookModel->isExistBook($bookCode);

		$memberIdx = $this->info["idx"];
		// $memberIdx = 1;
		$paneltyDate = $this->info["penalty_date"];
		// $paneltyDate = time();
		$resData = new stdClass();
		$resData->statusCode = 400;
		$resData->statusText = "";

		if(count($searchBook) > 0 && $searchBook[0]["isExist"] > 0){
			$isLentBook = $this->bookModel->isLentBook($bookCode)[0]["isLent"];
			if(!$isLentBook){
				if($lentDate > $paneltyDate){
					if($this->bookModel->lentBook($bookCode, $lentDate, $memberIdx)){
						$resData->statusCode = 200;
						$resData->statusText = "도서를 대여하였습니다.";
					}else{
						$resData->statusCode = 400;
						$resData->statusText = "도서를 대여할 수 없습니다. 관리자에게 문의하세요.";
					}
				}else{
					$resData->statusCode = 200;
					$resData->statusText = "회원님은 현재 연체로 ".date("Y-m-d", $paneltyDate)."까지 도서를 대여할 수 있다.";
				}
			}else{
				$resData->statusCode = 400;
				$resData->statusText = "대여중인 도서이므로 대여하실 수 없습니다.";
			}
			
		}else if(count($searchBook) > 0){
			$resData->statusCode = 400;
			$resData->statusText = "해당 도서는 존재하지 않습니다.";
		}

		

		// print_r($request["bookCode"])
		print_r(json_encode($resData));
	}
	public function returnBook(){
		$this->load->model("library_model", "bookModel");
		$request = json_decode(file_get_contents('php://input'), TRUE);
		$bookCode = $request["bookCode"];
		$returnDate = $request["returnDate"];

		$resData = new stdClass();
		$resData->statusCode = 200;
		$resData->statusText = "";

		$memberIdx = $this->info["idx"];
		// $memberIdx = 1;

		$isLent = $this->bookModel->isLentBookByMember($bookCode, $memberIdx);

		if(count($isLent) > 0){
			$policy = $this->bookModel->getPolicy()[0];
			$extendDay = $policy["extend_day"];
			$lentDay = $policy["lent_day"];
			$expectDay = $isLent[0]["lent_date"] + (($this->DAY * $lentDay) + ($this->DAY * $extendDay * $isLent[0]["extend_cnt"]));
			// 예상반납일 보다 일찍 또는 맞게 반납했다.

			if( $returnDate <= $expectDay){
				// 도서 반납
				if($this->bookModel->returnBook($isLent[0]["idx"], $returnDate)){
					$resData->statusText = "반납하였습니다.";
				}else{
					$resData->statusCode = 400;
					$resData->statusText = "연체되어 반납하였습니다.";	
				}
			}else{		// 연체하여 반납했다.
				// 연체된 일수 만큼 도서를 대여할수 없다.
				$paneltyDay = $returnDate + ($returnDate - $expectDay);
				// 패널티 적용
				if($this->bookModel->updatePenalty($memberIdx, $paneltyDay)){
					// 도서 반납
					if($this->bookModel->returnBook($isLent[0]["idx"], $returnDate)){
						$resData->statusText = "연체되어 반납하였습니다.";
					}else{
						$resData->statusCode = 400;
						$resData->statusText = "연체되어 반납하였습니다.";	
					}	
				}else{
					$resData->statusCode = 400;
					$resData->statusText = "도서를 반납할 수 없습니다. 관리자에게 문의하세요.";
				}
			}
			
		}else{
			$resData->statusText = "대여하신 도서가 아닙니다!";
		}

		print_r(json_encode($resData));

	}
	public function getMyInfo(){
		$this->load->model("library_model", "bookModel");
		$resData = new stdClass();
		$resData->statusCode = 200;
		$resData->statusText = "";

		$memberIdx = $this->info["idx"];
		// $memberIdx = 1;
		$paneltyDate = $this->info["penalty_date"];
		// $paneltyDate = time();

		$policy = $this->bookModel->getPolicy()[0];
		$extendDay = $policy["extend_day"];
		$lentDay = $policy["lent_day"];

		$bookList = $this->bookModel->getMyLentBookList($memberIdx, $extendDay, $lentDay);
		if(count($bookList) > 0 ){
			$resData->statusCode = 200;
			$resData->statusText = "Success Load Your Lent Book List";
			$resData->lentList = $bookList;
		}else{
			$resData->statusCode = 200;
			$resData->statusText = "Empty Your Lent BookList";
			$resData->lentList = null;
		}
		print_r(json_encode($resData));
	}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}?>