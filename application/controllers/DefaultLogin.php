<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
class DefaultLogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//  $this->load->model('','');
	}
	

	public function Index()
	{

			$this->load->view('V_Login');
		
	}


}
