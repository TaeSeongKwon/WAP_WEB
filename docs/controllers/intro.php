<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro extends CI_Controller {

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
		$this->js[] = "waypoints.min";
		$this->css[] = "animate";
		$head = array(
			"css"		=>		$this->css,
			"js"			=>		$this->js,
			"info"		=>		$this->info
		);
		$this->load->view("head", $head);
		$this->load->view('introMain');
		$this->load->view("tail");
	}
	public function staff(){
		$info = $this->session->userdata('userInfo');
		$data = array(
			'info'			=>			$info
		);
		
		// $sql = "SELECT * FROM member";
		// print_r($this->db->query($sql)->result_array());
		$this->load->view('introStaff', $data);	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */