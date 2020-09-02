<?php
class M_Login extends CI_Model{

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
    
    public function Check_user($username,$password){
        $query = $this->db->query("SELECT * FROM login WHERE username ='".$username."' AND password ='".$password."'");

        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
        // $data_login = $query->result();
        // return $data_login;
        
    }
    public function Log_user($username,$password){
            $query = $this->db->query("SELECT * FROM login WHERE username ='".$username."' AND password ='".$password."'");
            return $query->result();
    }





    public function Insert_Data()
    {
        $config = array(
            'upload_path' => "./IMG/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "200", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "1500",
            'max_width' => "1500"
            );
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload('img')){
            
        }else{
            $datad = array('upload_data' =>$this->upload->data());
            $filename = $datad['upload_data']['file_name'];

            $data = array(

                'name' => $this->input->post('name'),
                'code_name' => $this->input->post('code_name'),
                'location' => $this->input->post('location'),
                'img' => $filename
            );
            $query = $this->db->insert('computer',$data);
        }        
    }
    public function CheckHaveValue($id){
        $query = $this->db->query("SELECT * FROM computer WHERE ID=".$id."");
        if($query->num_rows()>0){
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }
    public function Update_Data_By_ID(){

        $config = array(
            'upload_path' => "./IMG/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "200", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "1500",
            'max_width' => "1500",
            'orig_name' => TRUE
            );
        $this->load->library('upload',$config);
       
        
        if($_FILES['img']['name']!="")
        {
                if(! $this->upload->do_upload('img')){
                    echo $this->upload->display_errors();
                }else{
                    $datad = array('upload_data' =>$this->upload->data());
                    $filename = $datad['upload_data']['file_name'];
                }
        }else{
            $filename=$this->input->post('img-old');
        } 

       $data = array(
                'name' => $this->input->post('name'),
                'code_Name' => $this->input->post('code_name'),
                'location' => $this->input->post('location'),
                'img' => $filename
       );
         $this->db->where('ID',$this->input->post('ID'));
        $query = $this->db->update('computer',$data);
        
    }
    public function Del($id){
        $this->db->query("DELETE FROM computer WHERE ID=".$id."");
    }
    public function Search($text){
        $query = $this->db->query("SELECT * FROM computer WHERE Name LIKE '%".$text."%' OR Code_name LIKE '%".$text."%' OR Location LIKE '%".$text."%'");
        $data_search = $query->result();
        	// 	echo '<pre>';
			// print_r($data_search);
			// echo '</pre>';
			// exit;
        return $data_search;
    }
}