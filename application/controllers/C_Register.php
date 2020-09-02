<?php
defined('BASEPATH') OR exit('No direct script access alREwed');

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
class C_Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		 $this->load->model('M_Register','RE');
		 $this->load->library('session');
		$this->load->library('form_validation');
	}
	

	public function Index()
	{

    }
    public function Check_userdata(){
        $username = $_POST['username'];
        // print_r($username);exit;
        $check_username = $this->RE->Check_username($username);
        echo json_encode($check_username);
    }
	public function Register_Check(){
          
                    $reg_username = $_POST['reg_username'];
                    $reg_password = $_POST['reg_password'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $id_card = $_POST['id_card'];
                    $age = $_POST['age'];
                    $address = $_POST['address'];
                    $prefix = $_POST['prefix'];
                    
                    $this->RE->Register($reg_username,$reg_password);
                    $this->RE->Insert_Userdata($firstname,$lastname,$email,$id_card,$age,$address,$prefix);
                    redirect(base_url());
			
    }
	
}
