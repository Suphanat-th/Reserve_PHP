<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
class C_Config extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		  $this->load->model('M_Config','CF');
	}
	

	public function Index()
	{

		if(empty($_SESSION['user'])){
			$this->load->view('V_Login');
		}else{
			$this->load->view('templete/css');
			$this->load->view('templete/js');
			$this->load->view('templete/Headder');
			$this->load->view('V_Config');
			$this->load->view('templete/Footer');
		}
	}
	function Get_User(){
		$query = $this->CF->Get_User();
		echo json_encode($query);
	}
	function Update_status(){
		$id = $_POST['id'];
		$status = $_POST['status'];
		$query = $this->CF->Update_status($id,$status);
		echo json_encode($query);
	}


}
