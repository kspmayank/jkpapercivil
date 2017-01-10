<?php 
   class Search_controller extends CI_Controller {
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->database();

         //loading session library 
         $this->load->library('session');
            

         if ($this->session->userdata('name')==NULL) {
            # code...
               redirect('/Sessions_controller');
         }

         
      } 
  
      public function search() { 

         $data = array( 
            'department' => $this->input->post('department'), 
            'category' => $this->input->post('category'), 
            'user' => $this->input->post('user'), 
            'from' => $this->input->post('from'), 
            'to' => $this->input->post('to'),
            'status' => $this->input->post('status') 
         ); 
         $query_str = "SELECT * FROM complaint WHERE created_at BETWEEN '".$data['from']."' AND '".$data['to']."'";

         if ($data['department']!="0") {
            # code...
            $query_dep = " AND department='".$data['department']."'";            
         }
         else{
            $query_dep = "";
         }
         
         if($data['category']!="0"){
            $query_cat = " AND category='".$data['category']."'";
         }
         else{
            $query_cat = "";
         }

         if($data['user']!="0"){
            $query_user = " AND user='".$data['user']."'";
         }
         else{
            $query_user = "";
         }

         if ($data['status']!="0") {
            # code...
            $query_status = " AND status='".$data['status']."'";
         }
         else{
            $query_status = "";
         }
         $query_str = $query_str.$query_dep.$query_cat.$query_user.$query_status.";";
         // echo $query_str;
         // $query_str = "SELECT * FROM complaint WHERE department='".$data['department']."' AND category='".$data['category']."' AND created_at BETWEEN '".$data['from']."' AND '".$data['to']."';";
         $query = $this->db->query($query_str); 
         $data['complaints'] = $query->result(); 
         $data['query'] = $data['department'];
         $this->load->helper('url'); 
         $this->load->view('templates/header'); 
         $this->load->view('complaint/Complaint_view',$data); 
         $this->load->view('templates/footer');
      } 
  
      
   } 
?>