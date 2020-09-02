<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
class C_system extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		 $this->load->model('M_system','SYS');
	}
	

	public function Index()
	{

		if(empty($_SESSION['user'])){
			$this->load->view('V_Login');
		}else{
			$this->load->view('templete/css');
			$this->load->view('templete/js');
			$this->load->view('templete/Headder');
			$this->load->view('V_system');
			$this->load->view('templete/Footer');
		}
    }
    
    public function Add_floor(){
        $floor_index = $_POST['floor_index'];
        $this->SYS->Insert_Floor($floor_index);
		redirect(base_url().'C_system/index');
    }
    public function Show_Floor(){
        $query = $this->SYS->Show_Floor();
        echo json_encode($query);
	}
	public function Add_Promotion(){
		$Pro_index = $_POST['Pic_Name'];
        $this->SYS->Insert_Promotion($Pro_index);
		redirect(base_url().'C_system/index');

	}


}
