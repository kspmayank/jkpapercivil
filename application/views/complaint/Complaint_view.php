<h3>Complaints</h3>
<style type="text/css">
   table{
      font-size: 14px;
   }
   td,th{
      padding: 5px;
   }
   @media print{
      nav{
         display: none;
      }
      h1{
         font-size: 16px;
      }
      .edit,.delete,.alink{
         display: none;
      }
   }
</style>
      <a class="alink" href = "<?php echo base_url(); ?>complaint/add_view">Add</a>
		
      <table border = "1"> 
         <?php 
            $i = 1; 
            echo "<tr>"; 
               echo "<th>ID</th>"; 
               echo "<th>Department</th>"; 
               echo "<th>Category</th>"; 
               echo "<th>Description</th>"; 
               echo "<th>Added On</th>"; 
               echo "<th>Assigned To</th>"; 
               echo "<th>Attended On</th>"; 
               echo "<th>Response Time</th>"; 
               echo "<th>Completed On</th>"; 
               echo "<th>Status</th>"; 
               echo "<th class='edit'>Edit</th>"; 
               echo "<th class='delete'>Delete</th>"; 
            echo "</tr>";

            $complaints_r = array_reverse($complaints);
				$avg_resp = 0;
            $counter = 0; 
            foreach($complaints_r as $complaint) { 
               echo "<tr>"; 
                  echo "<td>".$complaint->id."</td>"; 
                  echo "<td>".$complaint->department."</td>"; 
                  echo "<td>".$complaint->category."</td>"; 
                  echo "<td>".$complaint->description."</td>"; 
                  $ct = strtotime($complaint->created_at);
                  echo "<td>".date("d-m-Y", $ct)."</td>";
                  echo "<td>".$complaint->user."</td>"; 

                  if ($complaint->attended_at=="0000-00-00 00:00:00") {
                     # code...
                     $attend = "-";
                     $response_time = "-";                     
                  }
                  else{
                     $attend = strtotime($complaint->attended_at);
                     $attend = date("d-m-Y", $attend);

                     $time1 = new DateTime($complaint->attended_at);
                     $time2 = new DateTime($complaint->created_at);
                     $interval = $time1->diff($time2);
                     // $response_time = $interval->format('%Y-%m-%d');
                     $year_days = intval($interval->format('%Y'))*365;
                     $month_days = intval($interval->format('%m'))*30;
                     $days = intval($interval->format('%d'));
                     $t_days = $year_days+$month_days+$days;
                     $response_time = $t_days;
                     $avg_resp = $avg_resp+$t_days;
                     $counter = $counter + 1;
                  }
                  echo "<td>".$attend."</td>"; 
                  echo "<td>".$response_time."</td>";

                  if ($complaint->resolved_at=="0000-00-00 00:00:00") {
                     # code...
                     $resolved = "-";
                  }
                  else{
                     $resolved = strtotime($complaint->resolved_at);
                     $resolved = date("d-m-Y", $resolved);
                  }
                  echo "<td>".$resolved."</td>"; 
                  echo "<td>".$complaint->status."</td>"; 
                  echo "<td class='edit'><a href = '".base_url()."index.php/complaint/edit/"
                     .$complaint->id."'>Edit</a></td>"; 
                  echo "<td class='delete'><a href = '".base_url()."index.php/complaint/delete/"
                     .$complaint->id."'>Delete</a></td>"; 
               echo "</tr>"; 
            } 
         ?>
      </table> 
      <style type="text/css">
         .avg-resp{
            position: absolute;
            top: 150px;
            right: 7%;
         }
         @media print{
            .avg-resp{
               position: absolute;
               top: 50px;
               right: 7%;
            }            
         }
      </style>
      <div class="avg-resp">
         <span>Avg Response Time : <strong><?php if($counter!=0){echo $avg_resp/$counter;} ?> Days<strong></span>
      </div>
		
 