<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
         //loading session library 
         $this->load->library('session');
		    $this->load->helper('url');
	     	$this->load->helper('form');
		    $this->load->database(); 

            

         if ($this->session->userdata('name')==NULL) {
            # code...
               redirect('/Sessions_controller');
         }



			$query = $this->db->get("department"); 
	        $data['depart'] = $query->result();
	        $query = $this->db->get("category"); 
	        $data['cat'] = $query->result();
	        $query = $this->db->get("users"); 
	        $data['users'] = $query->result();
			$this->load->view('templates/header');
			$this->load->view('jkplant',$data);
			$this->load->view('templates/footer');
		
	}
}
