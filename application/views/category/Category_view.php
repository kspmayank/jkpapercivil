<h3>Categories</h3>
      <a href = "<?php echo base_url(); ?>index.php/category/add_view">Add</a>
		
      <table border = "1"> 
         <?php 
            $i = 1; 
            echo "<tr>"; 
               echo "<td>ID.</td>"; 
               echo "<td>Name</td>"; 
               echo "<td>Edit</td>"; 
               echo "<td>Delete</td>"; 
            echo "<tr>"; 
				
            foreach($records as $r) { 
               echo "<tr>"; 
                  echo "<td>".$r->id."</td>"; 
                  echo "<td>".$r->name."</td>"; 
                  echo "<td><a href = '".base_url()."index.php/category/edit/"
                     .$r->id."'>Edit</a></td>"; 
                  echo "<td><a href = '".base_url()."index.php/category/delete/"
                     .$r->id."'>Delete</a></td>"; 
               echo "<tr>"; 
            } 
         ?>
      </table> 
		
 