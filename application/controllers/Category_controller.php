<?php 
   class Category_controller extends CI_Controller {
	
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
         $query = $this->db->get("category"); 
         $data['records'] = $query->result(); 
			
         $this->load->helper('url'); 
         $this->load->view('templates/header'); 
         $this->load->view('category/Category_view',$data); 
         $this->load->view('templates/footer'); 
      } 
  
      public function add_category_view() { 
         $this->load->helper('form'); 
         $this->load->view('templates/header'); 
         $this->load->view('category/Category_add'); 
         $this->load->view('templates/footer'); 
      } 
  
      public function add_category() { 
         $this->load->model('Category_model');
			
         $data = array( 
            'id' => $this->input->post('id'), 
            'name' => $this->input->post('name') 
         ); 
			
         $this->Category_model->insert($data); 
   
         $query = $this->db->get("category"); 
         $data['records'] = $query->result(); 
         $this->load->view('templates/header'); 
         $this->load->view('category/Category_view',$data); 
         $this->load->view('templates/footer'); 
      } 
  
      public function update_category_view() { 
         $this->load->helper('form'); 
         $id = $this->uri->segment('3'); 
         $query = $this->db->get_where("category",array("id"=>$id));
         $data['records'] = $query->result(); 
         $data['old_id'] = $id; 
         $this->load->view('templates/header'); 
         $this->load->view('category/Category_edit',$data); 
         $this->load->view('templates/footer'); 
      } 
  
      public function update_category(){ 
         $this->load->model('Category_model');
			
         $data = array( 
            'id' => $this->input->post('id'), 
            'name' => $this->input->post('name') 
         ); 
			
         $old_id = $this->input->post('old_id'); 
         $this->Category_model->update($data,$old_id); 
			
         $query = $this->db->get("category"); 
         $data['records'] = $query->result(); 
         $this->load->view('templates/header'); 
         $this->load->view('category/Category_view',$data); 
         $this->load->view('templates/footer'); 
      } 
  
      public function delete_category() { 
         $this->load->model('Category_model'); 
         $id = $this->uri->segment('3'); 
         $this->Category_model->delete($id); 
   
         $query = $this->db->get("category"); 
         $data['records'] = $query->result(); 
         $this->load->view('templates/header'); 
         $this->load->view('category/Category_view',$data); 
         $this->load->view('templates/footer'); 
      } 
   } 
?>