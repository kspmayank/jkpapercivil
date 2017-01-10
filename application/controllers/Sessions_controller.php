<?php 
   class Sessions_controller extends CI_Controller {

      function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->database(); 
      } 
  
   
      public function index() { 
         //loading session library 
         $this->load->library('session');
         
         $this->load->helper('url'); 
         $this->load->helper('form'); 
         $this->load->view('templates/header'); 
         $this->load->view('login/Session_add'); 
         $this->load->view('templates/footer'); 
      } 

      public function add_user_view() { 
         //loading session library 
         $this->load->library('session');
         
         $this->load->helper('url'); 
         $this->load->helper('form'); 
         $this->load->view('templates/header'); 
         $this->load->view('login/User_add'); 
         $this->load->view('templates/footer');
      } 

      public function add_user() { 
         //loading session library 
         $this->load->library('session');

         $array = array('username' => $this->input->post('username'), 'password' => md5($this->input->post('password')));
         $this->db->insert('users', $array);

         $this->load->helper('url'); 
         $this->load->helper('form'); 
         
           redirect('/Sessions_controller');            
         
      } 

      public function add_session() { 
         //loading session library 
         $this->load->library('session');
         $this->load->helper('url'); 
         $this->load->helper('form'); 

         $this->db->where('username', $this->input->post('username'));
         $this->db->where('password', md5($this->input->post('password')));
         $result = $this->db->get('users');
         
         // If we find a user output correct, else output wrong.
         if($result->num_rows() != 0)
         {
            //adding data to session 
            $this->session->set_userdata('name',$this->input->post('username'));

            redirect('/');            

         }
         else
         {
           $this->load->view('templates/header'); 
           echo 'Wrong Password!';  
           $this->load->view('login/Session_add');            
           $this->load->view('templates/footer');            
         }
       
         
      } 
      
      public function unset_session_data() { 
         //loading session library
         $this->load->library('session');
         
         //removing session data 
         $this->session->unset_userdata('name'); 
         redirect('/Sessions_controller');
      } 
      
   } 
?>