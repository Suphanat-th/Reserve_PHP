<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
class C_Setting extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		  $this->load->model('M_Setting','ST');
	}
	

	public function Index()
	{

		if(empty($_SESSION['user'])){
			$this->load->view('V_Login');
		}else{
			$this->load->view('templete/css');
			$this->load->view('templete/js');
			$this->load->view('templete/Headder');
			$this->load->view('V_Setting');
			$this->load->view('templete/Footer');
		}
    }
    public function Show_Profile(){
        $username = $_POST['username'];
        $query = $this->ST->Show_profile($username);
        
        echo json_encode($query);
	}
	public function Update_user(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = $this->ST->Update_user($username,$password);
		echo json_encode($query);
	}
	public function Update_profile(){
		$username = $_POST['username'];
		$prefix  = $_POST['prefix'];
		$firstname  = $_POST['firstname'];
		$lastname   = $_POST['lastname'];
		$email   = $_POST['email'];
		$idcard  = $_POST['idcard'];
		$age  = $_POST['age'];
		$address  = $_POST['address'];
		
		$query = $this->ST->Update_profile($username,$prefix,$firstname,$lastname,$email,$idcard,$age,$address);
		echo json_encode($query);

	}

}
