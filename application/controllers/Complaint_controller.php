<?php 
   class Complaint_controller extends CI_Controller {
	
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
  
      public function index() { 
         $query = $this->db->get("complaint"); 
         $data['complaints'] = $query->result(); 
			
         $this->load->helper('url'); 
         $this->load->view('templates/header'); 
         $this->load->view('complaint/Complaint_view',$data); 
         $this->load->view('templates/footer'); 
      } 
  
      public function add_complaint_view() { 
         $query = $this->db->get("department"); 
         $data['department'] = $query->result();
         $query = $this->db->get("category"); 
         $data['category'] = $query->result();  
         $query = $this->db->get("users"); 
         $data['users'] = $query->result();
         $this->load->helper('form'); 
         $this->load->view('templates/header'); 
         $this->load->view('complaint/Complaint_add',$data); 
         $this->load->view('templates/footer'); 
      } 
  
      public function add_complaint() { 
         $this->load->model('Complaint_model');
			
         $data = array( 
            'id' => $this->input->post('id'), 
            'department' => $this->input->post('department'), 
            'category' => $this->input->post('category'), 
            'description' => $this->input->post('description'), 
            'created_at' => $this->input->post('created_at'), 
            'user' => $this->input->post('user'), 
            'attended_at' => $this->input->post('attended_at'), 
            'resolved_at' => $this->input->post('resolved_at'), 
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
         ); 
			
         $this->Complaint_model->insert($data); 
   
         $query = $this->db->get("complaint"); 
         $data['complaints'] = $query->result(); 
         $this->load->view('templates/header'); 
         $this->load->view('complaint/Complaint_view',$data); 
         $this->load->view('templates/footer'); 
      } 
  
      public function update_complaint_view() { 
         $query = $this->db->get("department"); 
         $data['department'] = $query->result();
         $query = $this->db->get("category"); 
         $data['category'] = $query->result();
         $query = $this->db->get("users"); 
         $data['users'] = $query->result();
         $this->load->helper('form'); 
         $id = $this->uri->segment('3'); 
         $query = $this->db->get_where("complaint",array("id"=>$id));
         $data['records'] = $query->result(); 
         $data['old_id'] = $id; 
         $this->load->view('templates/header'); 
         $this->load->view('complaint/Complaint_edit',$data); 
         $this->load->view('templates/footer'); 
      } 
  
      public function update_complaint(){ 
         $this->load->model('Complaint_model');
			
         $data = array( 
            'id' => $this->input->post('id'), 
            'department' => $this->input->post('department'), 
            'category' => $this->input->post('category'), 
            'description' => $this->input->post('description'), 
            'created_at' => $this->input->post('created_at'), 
            'user' => $this->input->post('user'), 
            'attended_at' => $this->input->post('attended_at'), 
            'resolved_at' => $this->input->post('resolved_at'), 
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks') 
         ); 
			
         $old_id = $this->input->post('old_id'); 
         $this->Complaint_model->update($data,$old_id); 
			
         $query = $this->db->get("complaint"); 
         $data['complaints'] = $query->result(); 
         $this->load->view('templates/header'); 
         $this->load->view('complaint/Complaint_view',$data); 
         $this->load->view('templates/footer'); 
      } 
  
      public function delete_complaint() { 
         $this->load->model('Complaint_model'); 
         $id = $this->uri->segment('3'); 
         $this->Complaint_model->delete($id); 
   
         $query = $this->db->get("complaint"); 
         $data['complaints'] = $query->result(); 
         $this->load->view('templates/header'); 
         $this->load->view('complaint/Complaint_view',$data); 
         $this->load->view('templates/footer'); 
      } 
   } 
?>