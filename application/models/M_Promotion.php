<?php
class M_Promotion extends CI_Model{

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
    public function Set_Promotion(){
        $query = $this->db->query("SELECT Pic_Name FROM promotion_pic WHERE isActive = 1");
        return $query->result();
    }
    public function get_floor(){
        $query = $this->db->query("SELECT * FROM floor WHERE Floor_Status = 1");
        return $query->result();
    }
    public function get_floorindex($floor,$read){
        if($read == 'ALL' && $floor == 'ALL' ){
            $query = $this->db->query("SELECT * FROM reservation_table ");
        }else if($read == 'ALL' && $floor !='ALL'){
            $query = $this->db->query("SELECT * FROM reservation_table WHERE Re_Floor = ".$floor."");
        }else if($read != 'ALL' && $floor == 'ALL'){
            $query = $this->db->query("SELECT * FROM reservation_table WHERE isReserve = ".$read."");
        }else{
            $query = $this->db->query("SELECT * FROM reservation_table WHERE isReserve = ".$read." AND Re_Floor = ".$floor."");
        }
        
        return $query->result();
    }
    public function Show_Floor(){
        $query = $this->db->query("SELECT * FROM floor WHERE Floor_Status = 1");
        return $query->result();
    }
}