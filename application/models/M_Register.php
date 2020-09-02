<?php
class M_Register extends CI_Model{

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
    
    public function Check_username($username){
        $query = $this->db->query("SELECT * FROM login WHERE username ='".$username."'");

        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
        // $data_login = $query->result();
        // return $data_login;
        
    }
    public function Register($reg_username,$reg_password){
        if($reg_username != '' && $reg_password !=''){
           $this->db->query("INSERT INTO login (Username,Password,Status) VALUE ('$reg_username','$reg_password',3)");
        }
        
    }
    public function Insert_Userdata($firstname,$lastname,$email,$id_card,$age,$address,$prefix){
        $this->db->query("INSERT INTO user (Firstname,Lastname,Email,ID_Card,Age,Address,Prefix) VALUE ('$firstname','$lastname','$email','$id_card',$age,'$address',$prefix)");
    }
}