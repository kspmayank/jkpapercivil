<h3>Add Complaint</h3>
<style type="text/css">
    table,tr,td{
        text-align: left;
        border: 1px solid black;
    }
    td{
        padding:5px;
    }
</style>
         <?php 
            echo form_open('Complaint_controller/add_complaint');
            // echo form_label('ID'); 
            echo form_hidden('id',''); 
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

                echo form_dropdown('',$options,'',array('id'=>'department','name'=>'department')); 
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
                echo form_dropdown('',$category_options,'',array('id'=>'category','name'=>'category')); 
            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Description'); 
                echo "</td><td>";
                echo form_textarea(array('id'=>'description','name'=>'description','rows'=>'5')); 
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
                
                echo form_dropdown('',$users_options,'',array('id'=>'user','name'=>'user')); 

            echo "</td></tr>"; 


            // echo "<tr><td>";    
                // echo form_label('Added On'); 
                // echo "</td><td>";
                echo form_hidden('created_at',''); 
            // echo "</td><tr/>"; 

            echo "<tr><td>";    
                echo form_label('Attended On'); 
                echo "</td><td>";
                echo form_input(array('id'=>'attended_at','name'=>'attended_at')); 
            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Completed On'); 
                echo "</td><td>";
                echo form_input(array('id'=>'resolved_at','name'=>'resolved_at')); 
            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Status'); 
                echo "</td><td>";
                $status_options = array("open"=>"open","completed"=>"completed","closed"=>"closed");
                
                echo form_dropdown('',$status_options,'',array('id'=>'status','name'=>'status')); 

            echo "</td></tr>"; 

            echo "<tr><td>";    
                echo form_label('Remarks'); 
                echo "</td><td>";                
                echo form_textarea(array('id'=>'remarks','name'=>'remarks','rows'=>'3')); 

            echo "</td></tr>"; 

            echo "<tr><td></td><td>";    
            echo form_submit(array('id'=>'submit','value'=>'Add')); 
            echo "</td></tr></table>";
            echo form_close();
         ?> 

         <script type="text/javascript">
            var m = new Date();
            // var dateString = m.getFullYear() +"-"+ Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getMonth()+1), -2),"") +"-"+ Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getDate()), -2),"") + " " + Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getHours()), -2),"") + ":" + Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getMinutes()), -2),"") + ":" + Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getSeconds()), -2),"");
            var dateString = m.getFullYear() +"-"+ Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getMonth()+1), -2),"") +"-"+ Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getDate()), -2),"") + " 00:00:00";
            console.log(dateString);
            document.getElementsByName('created_at')[0].value = dateString;
            document.getElementsByName('created_at')[0].id = "created_at";
         </script>

         <script type="text/javascript">
             flatpickr("#attended_at");
             flatpickr("#resolved_at");
         </script>
    