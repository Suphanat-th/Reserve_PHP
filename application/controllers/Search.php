<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Computer','com');
	}
	

	public function Index()
	{

	}
	public function Search_Data(){
		
		$text = $_POST['text'];

		if($_POST == null){
			$data_search['rs_search'] =  $this->com->Search($text);
		}else{
			$data_search['rs_search'] =  $this->com->Search($text);
		}
        echo json_encode($data_search['rs_search']);
    }
}
