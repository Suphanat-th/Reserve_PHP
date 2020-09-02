<?php
class M_system extends CI_Model{

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
    
    public function Insert_Floor($floor_index){
         $this->db->query("UPDATE floor SET Floor_Status = 0 ,Floor_time_old = Floor_time WHERE Floor_Status = 1");
         $this->db->query("DELETE FROM reservation_table");
        for($i=1;$i<=$floor_index;$i++){
            $config = array(
                'upload_path' => "./IMG/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "200", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1500",
                'max_width' => "1500"
                );
            $this->load->library('upload',$config);
            if(! $this->upload->do_upload('img'.$i.'')){
                
            }else{
                $datad = array('upload_data' =>$this->upload->data());
                $filename = $datad['upload_data']['file_name'];
                date_default_timezone_set('Asia/Bangkok');
                $table =$this->input->post('reservation_table'.$i.'');
                $data = array(

                    'floor_index' => $i,
                    'floor_img' => $filename,
                    'floor_Status' => 1,
                    'floor_table' => $this->input->post('reservation_table'.$i.''),
                    'floor_time_old' => date('Y-m-d H:i:s')
                );
                for($j=1;$j<=$table;$j++){
                    if($j<=9){
                        $data_reserve_table = array(
                            're_code' => 'F'.$i.'00'.$j.'',
                            're_floor'=> $i
                         );
                    }else if($j<=99){
                        $data_reserve_table = array(
                            're_code' => 'F'.$i.'0'.$j.'',
                            're_floor'=> $i
                        );
                    }else{
                        $data_reserve_table = array(
                            're_code' => 'F'.$i.''.$j.'',
                            're_floor'=> $i
                        );
                    }
                     $query_table = $this->db->insert('reservation_table',$data_reserve_table);
                }
                $query = $this->db->insert('floor',$data);
            }        
        }
    }
    public function Insert_Promotion($Pro_index){
        $this->db->query("UPDATE promotion_pic SET isActive = 0 ,Update_Time = CURRENT_TIMESTAMP WHERE isActive = 1");
       for($i=1;$i<=$Pro_index;$i++){
           $config = array(
               'upload_path' => "./IMG/",
               'allowed_types' => "gif|jpg|png|jpeg|pdf",
               'overwrite' => TRUE,
               'max_size' => "200", // Can be set to particular file size , here it is 2 MB(2048 Kb)
               'max_height' => "1500",
               'max_width' => "1500"
               );
           $this->load->library('upload',$config);
           if(! $this->upload->do_upload('img'.$i.'')){
               
           }else{
               $datad = array('upload_data' =>$this->upload->data());
               $filename = $datad['upload_data']['file_name'];
               date_default_timezone_set('Asia/Bangkok');
               $data = array(
                   'pic_name' => $filename,
                   'isActive' => 1,
                   'time' => date('Y-m-d H:i:s'),
                   'update_time' => date('Y-m-d H:i:s')
               );
               $query = $this->db->insert('promotion_pic',$data);
           }        
       }
   }
    public function Show_Floor(){
        $query = $this->db->query("SELECT * FROM floor WHERE Floor_Status = 1");
        return $query->result();
    }
    public function Show_Log_Data(){
        $query = $this->db->query("SELECT * FROM floor");
        return $query->result();
    }
}