<h3>Edit Complaint No. <?php echo $records[0]->id ?></h3>		
<style type="text/css">
    table,tr,td{
        text-align: left;
        border: 1px solid black;
    }
    td{
        padding:5px;
    }
    #id{
      display: none;
    }
</style>

         <?php 
            echo form_open('Complaint_controller/update_complaint'); 
            echo form_hidden('old_id',$old_id); 
            // echo form_label('ID.'); 
            echo form_input(array('id'=>'id',
               'name'=>'id','value'=>$records[0]->id)); 
            echo "<br/>"; 
				
            echo "<table>";
            echo "<tr><td>";                
            echo form_label('Department'); 
                echo "</td><td>";
                $options = array();
                foreach ($department as $key) {
                     # code...
                    // array_push($options, $key->name,$key->name);
                    $options[$key->name] = $key->name;
                 }
                 $options['others'] = 'others..';

                echo form_dropdown('',$options,$records[0]->department,array('id'=>'department','name'=>'department')); 
            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Category'); 
                echo "</td><td>";
                $category_options = array();
                foreach ($category as $key) {
                     # code...
                    // array_push($options, $key->name,$key->name);
                    $category_options[$key->name] = $key->name;
                 }
                 $category_options['others'] = 'others..';
                echo form_dropdown('',$category_options,$records[0]->category,array('id'=>'category','name'=>'category')); 
            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Description'); 
                echo "</td><td>";
                echo form_textarea(array('id'=>'description','name'=>'description','rows'=>'5','value'=>$records[0]->description)); 
            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Assigned To'); 
                echo "</td><td>";
                $status_options = array();
                foreach ($users as $key) {
                     # code...
                    // array_push($options, $key->name,$key->name);
                    $users_options[$key->username] = $key->username;
                 }
                 $users_options['others'] = 'others..';                
                
                echo form_dropdown('',$users_options,$records[0]->user,array('id'=>'user','name'=>'user')); 

            echo "</td></tr>"; 


            // echo "<tr><td>";    
                // echo form_label('Added On'); 
                // echo "</td><td>";
                echo form_hidden('created_at',$records[0]->created_at); 
            // echo "</td><tr/>"; 

            echo "<tr><td>";    
                echo form_label('Attended On'); 
                echo "</td><td>";
                echo form_input(array('id'=>'attended_at','name'=>'attended_at','value'=>$records[0]->attended_at)); 
            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Completed On'); 
                echo "</td><td>";
                echo form_input(array('id'=>'resolved_at','name'=>'resolved_at','value'=>$records[0]->resolved_at)); 
            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Status'); 
                echo "</td><td>";
                $status_options = array("open"=>"open","completed"=>"completed","closed"=>"closed");
                
                echo form_dropdown('',$status_options,$records[0]->status,array('id'=>'status','name'=>'status')); 

            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Remarks'); 
                echo "</td><td>";                
                echo form_textarea(array('id'=>'remarks','name'=>'remarks','rows'=>'3','value'=>$records[0]->remarks)); 

            echo "</td></tr>"; 

            echo "<tr><td></td><td>";    
            echo form_submit(array('id'=>'submit','value'=>'Edit')); 
            echo "</td></tr></table>";
            echo form_close();
         ?> 

         <script type="text/javascript">
            // document.getElementById('id').display = 'none';
             flatpickr("#attended_at");
             flatpickr("#resolved_at");
         </script>
