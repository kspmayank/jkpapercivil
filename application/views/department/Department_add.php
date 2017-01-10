<h3>Add Department</h3>
         <?php 
            echo form_open('Department_controller/add_department');
            echo form_label('ID'); 
            echo form_input(array('id'=>'id','name'=>'id')); 
            echo "<br/>"; 
			
            echo form_label('Name'); 
            echo form_input(array('id'=>'name','name'=>'name')); 
            echo "<br/>"; 
			
            echo form_submit(array('id'=>'submit','value'=>'Add')); 
            echo form_close(); 
         ?> 
