<?php
class M_Config extends CI_Model{

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

    public function Get_User(){
        $query = $this->db->query('SELECT lo.ID,lo.Username,lo.Status,st.Status_Name 
        FROM login lo
        LEFT JOIN status st
        ON lo.Status = st.ID');
        return $query->result();
    }
    public function Update_status($id,$status){
        $this->db->query("UPDATE login SET Status = ".$status." WHERE ID=".$id."");
    }
}