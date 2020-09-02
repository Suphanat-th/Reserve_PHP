<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
class C_Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		 $this->load->model('M_Login','LO');
		 $this->load->library('session');
		$this->load->library('form_validation');
	}
	

	public function Index()
	{

	}
	public function Login_Check(){

		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run())
		{
			$check = $this->LO->Check_user($username,$password);
			if($check){
				$data = $this->LO->Log_user($username,$password);

				$_SESSION['user'] = $_POST['username'];
				$_SESSION['status'] = $data[0]->Status;
				$_SESSION['id'] = $data[0]->ID;

				redirect(base_url().'C_Login/Session_username');
				
			}else{
				$_SESSION['isLog'] = 1;
				$this->session->set_flashdata('error', 'Invalid username or password !!!!');
				// redirect(base_url().'C_Login/Session_username');
				redirect(base_url());
			}
		}
		else
		{
			redirect(base_url());
		}


	}
	

	public function Session_username(){
		// echo '<pre>';
		// print_r($_SESSION);
		// echo '</pre>';
		// exit;
	
		if($this->session->userdata('user')){
			
			redirect(base_url().'C_Home/index');
			// echo '<pre>';
			// print_r($_SESSION);
			// echo '</pre>';
			// exit;
		}else{
			redirect(base_url());
			// echo '<pre>';
			// print_r($_SESSION);
			// echo '</pre>';
			// exit;
		}
	}

	public function Register_Check(){

	}


}
