<?php
class M_Setting extends CI_Model{

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
    
    public function Show_profile($username){
        $query = $this->db->query("SELECT * FROM login lo 
        LEFT JOIN status st
        ON lo.Status = st.ID
        LEFT JOIN user us 
        ON  lo.ID = us.ID 
        LEFT JOIN prefix pf
        ON us.Prefix = pf.ID
        where lo.Username = '".$username."'");
        return $query->result();
    }
    public function Update_user($username,$password){
        $query = $this->db->query("UPDATE login SET Password='".$password."' WHERE Username = '".$username."'");

    }
    public function Update_profile($username,$prefix,$firstname,$lastname,$email,$idcard,$age,$address){
        $query = $this->db->query("UPDATE user 
        SET Firstname='".$firstname."', 
        Firstname='".$firstname."',
        Lastname='".$lastname."',
        Email='".$email."',
        Age=".$age.",
        Address='".$address."',
        Prefix=".$prefix."
        WHERE ID IN (
            SELECT ID 
            FROM login 
            where Username='".$username."')");
    }
}