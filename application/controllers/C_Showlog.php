<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
class C_Showlog extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_system','SYS');
	}
	

	public function Index()
	{
			$this->load->view('templete/css');
			$this->load->view('templete/js');
			$this->load->view('V_Showlog');
	}
	public function Show_Log_Data(){
		$query = $this->SYS->Show_Log_Data();
		$i=1;
		// $_SESSION['data'] = "<div class='row text-center'>";

		$_SESSION['data'] = "<table id='table_id' class='table table-striped table-bordered dt-responsive nowrap' style='width:100%'>";
		$_SESSION['data'] .="<thead>";
		$_SESSION['data'] .="<tr>";
		$_SESSION['data'] .="<th>NO.</th>";
		$_SESSION['data'] .="<th>FLOOR</th>";
		$_SESSION['data'] .="<th>TABLE</th>";
		$_SESSION['data'] .="<th>STATUS</th>";
		$_SESSION['data'] .="<th>TIME</th>";
		$_SESSION['data'] .="<th>LAST UPDATE TIME</th>";
		$_SESSION['data'] .="</tr>";
		$_SESSION['data'] .="</thead>";
		$_SESSION['data'] .="<tbody>";
		foreach($query as $v){
			if($v->Floor_Status == 1 ){
				$_SESSION['data'] .= "<tr class='bg-success'>";
				$_SESSION['data'] .= "<td>".$i."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_index."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_table."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_Status."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_time_old."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_time."</td>";
				$_SESSION['data'] .= "</tr>";
				$i++;
			}else{
				$_SESSION['data'] .= "<tr>";
				$_SESSION['data'] .= "<td>".$i."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_index."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_table."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_Status."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_time_old."</td>";
				$_SESSION['data'] .= "<td>".$v->Floor_time."</td>";
				$_SESSION['data'] .= "</tr>";
				$i++;
			}

		}
		$_SESSION['data'] .="</tbody>";
		$_SESSION['data'] .="</table>";
		// $_SESSION['data'] .="</div>";
		echo json_encode($query);
		

	}
}
