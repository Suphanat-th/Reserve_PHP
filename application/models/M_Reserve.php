<?php
class M_Reserve extends CI_Model{

// echo '<pre>';
// print_r();
// echo '</pre>';
// exit;
    function __construct()
	{
        parent::__construct();
        //load Helper for Form
        $this->load->helper('url', 'form');	
        $this->load->library('form_validation','upload');
    }
    
    public function Insert_Re_Log($id,$code){
        date_default_timezone_set('Asia/Bangkok');
        // print_r();date('Y-m-d')
        $query = $this->db->query("INSERT INTO reservation_log (Code_Table,Re_User) VALUE ('".$code."','".$id."')");

        $query2= $this->db->query("UPDATE reservation_table SET isReserve = 1 WHERE Re_Code = '".$code."'");
    }
}