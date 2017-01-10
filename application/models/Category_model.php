<?php 
   class Category_Model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   
      public function insert($data) { 
         if ($this->db->insert("category", $data)) { 
            return true; 
         } 
      } 
   
      public function delete($id) { 
         if ($this->db->delete("category", "id = ".$id)) { 
            return true; 
         } 
      } 
   
      public function update($data,$old_id) { 
         $this->db->set($data); 
         $this->db->where("id", $old_id); 
         $this->db->update("category", $data); 
      } 
   } 
?> 