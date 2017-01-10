<h3>Edit Department</h3>		
         <?php 
            echo form_open('Department_controller/update_department'); 
            echo form_hidden('old_id',$old_id); 
            echo form_label('ID.'); 
            echo form_input(array('id'=>'id',
               'name'=>'id','value'=>$records[0]->id)); 
            echo "<br/>"; 
				
            echo form_label('Name'); 
            echo form_input(array('id'=>'name','name'=>'name',
               'value'=>$records[0]->name)); 
            echo "<br/>"; 
				
            echo form_submit(array('id'=>'submit','value'=>'Edit')); 
            echo form_close();
         ?> 
	