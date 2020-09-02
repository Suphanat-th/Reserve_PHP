<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
class C_HOME extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_Promotion','PM');
		$this->load->model('M_Reserve','RE');
	}
	

	public function Index()
	{

		if(empty($_SESSION['user'])){
			$this->load->view('V_Login');
		}else{
			$this->load->view('templete/css');
			$this->load->view('templete/js');
			$this->load->view('templete/Headder');
			$this->load->view('V_Home');
			$this->load->view('templete/Footer');
		}
	}
	public function Show_Promotion(){
		$query = $this->PM->Set_Promotion();
		echo json_encode($query);
	}
	public function Show_Floor(){
		$floor = $_POST['floor'];
		$read = $_POST['read'];
		$query['Floor_data'] = $this->PM->get_floorindex($floor,$read);
		echo json_encode($query);
	}
	public function Get_Floor_index(){
		$query= $this->PM->get_floor();
		echo json_encode($query);
	}
    public function Show_Pic(){
        $query = $this->PM->Show_Floor();
        echo json_encode($query);
	}
	public function Insert_Reserve(){
		$id = $_POST['id'];
		$code = $_POST['code'];
		$query = $this->RE->Insert_Re_Log($id,$code);
		echo json_encode($query);
	}

}
