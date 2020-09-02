<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
class C_Logout extends CI_Controller {

	public function __construct(){
		parent::__construct();
		 $this->load->library('session');
		$this->load->library('form_validation');
	}
	

	public function Index()
	{

	}
	public function Logout(){
		session_destroy();
		redirect(base_url());
	}

}
