

<style type="text/css">
	body{
		margin: 0;
		font-family: sans-serif;
	}

	nav{
		background: #004899;
		position: relative;
		height: 95px;
	}

	.container{
		width: 85%;
		margin: auto;	
		text-align: center;	
	}

	.left{
		float: left;
	}

	.right{
		float: right;
	}

	nav ul{
		/*background: #004899;		*/
		display: inline-block;
		color: #fff;
		position: absolute;
		margin-top: 0; 
		/*height: 75px;*/
	}

	nav ul li{
		display: inline-block;
		list-style: none;
		padding: 10px;
		/*height: 75px;*/
		vertical-align: top;
	}
	nav ul li a{
		color: #fff;
		text-decoration: none;
	}

	nav .leftul{
		left: 0;
	}

	nav .rightul{
		right: 7%;
	}

	nav .rightul{
		position: absolute;
		top: 20px;
	}


	table{
		text-align: left;
		border: 1px solid #000;
	}

	table tr{
		padding: 10px;
		display: block;
	}

	tr td{
		width: 250px;
	}

	.blocks div{
		margin: 1px 5px;
		display: inline-block;
		width: 100px;
	}


	/*Modal*/
	.modal{
		height: 500px; 
		width: 60%; 
		border: 1px solid #000; 
		box-shadow: 5px 2px 3px #ccc8c8;
		background: #fff;
		position: fixed; 
		top:50px; 
		left:20%;
		text-align: center;
	}

	.modal table{
		border: 0;
	}

	.close{
		position: absolute; 
		top:10px; 
		right: 10px; 
		cursor: pointer;
	}
</style>


	
		<div>
            <?php echo form_open('Search_controller/search'); ?>
				<table align="center">
				<tr>
					<td>
					<span><strong>Department : </strong></span>
					<p style="font-size:11px; margin:0;"><a href="<?php echo base_url(); ?>/department">View all Departments</a></p>
					</td>
					<td>
					<?php 
		                $options = array("0"=>"Select Department");
		                foreach ($depart as $key) {
		                     # code...
		                    // array_push($options, $key->name,$key->name);
		                    $options[$key->name] = $key->name;
		                 }
		                 $options['others'] = 'others..';

		                echo form_dropdown('',$options,'',array('id'=>'department','name'=>'department')); 
	                ?>
					<!-- <select id="department">
						<option value="0">Select Department</option>
					<?php /*
						foreach($depart as $r) { 
		                  echo "<option value=".$r->name.">".$r->name."</option>"; 
			            } */
					?>
						<option value="others">Others..</option>
					</select> -->
					</td>
				</tr>
				<tr>
					<td>
					<span><strong>Category : </strong></span>
					<p style="font-size:11px; margin:0;"><a href="<?php echo base_url(); ?>/category">View all Categories</a></p>
					</td>
					<td>
					<!-- <select id="category">
						<option value="0">Select Category</option>
						<?php/* 
							foreach($cat as $r) { 
			                  echo "<option value=".$r->name.">".$r->name."</option>"; 
				            } */
						?>
						<option value="others">Others..</option>
					</select> -->
			        <?php $category_options = array("0"=>"Select Category");
	                foreach ($cat as $key) {
	                     # code...
	                    // array_push($options, $key->name,$key->name);
	                    $category_options[$key->name] = $key->name;
	                 }
	                 $category_options['others'] = 'others..';
	                echo form_dropdown('',$category_options,'',array('id'=>'category','name'=>'category')); 
	                ?>
					</td>
				</tr>

				<tr>
					<td><strong>Assigned To : </strong></td>
					<td>
				        <?php $users_options = array("0"=>"Select Users");
		                foreach ($users as $key) {
		                     # code...
		                    // array_push($options, $key->name,$key->name);
		                    $users_options[$key->username] = $key->username;
		                 }
		                 $users_options['others'] = 'others..';
		                echo form_dropdown('',$users_options,'',array('id'=>'user','name'=>'user')); 
		                ?>						
					</td>
				</tr>

				<tr>
					<td><strong>From : </strong></td>
					<td>
						<?php echo form_input(array('id'=>'from','name'=>'from'));  ?>
					</td>
				</tr>

				<tr>
					<td><strong>To :</strong></td>
					<td>
						<?php echo form_input(array('id'=>'to','name'=>'to'));  ?>						
					</td>
				</tr>

				<tr>
					<td><strong>Status :</strong></td>
					<td>
	                <?php 
	                	$status_options = array('0'=>'Choose Status','open'=>'open','completed'=>'completed','closed'=>'closed');
	                	echo form_dropdown('',$status_options,'',array('id'=>'status','name'=>'status')); ?>						
					</td>
				</tr>
				<!-- <tr><td><strong>Address</strong></td></tr> -->
<!-- 				<tr>
					<td><span><strong>Block : </strong></span></td>
					<td class="blocks">
						<div><input type="radio" name="A"><span>A - Type</span>
						</div><div><input type="radio" name="B"><span>B - Type</span><br/>
						</div><div><input type="radio" name="Q"><span>Q - Type</span>
						</div><div><input type="radio" name="C"><span>C - Type</span><br/>
						</div><div><input type="radio" name="ND"><span>ND - Type</span>
						</div><div><input type="radio" name="D"><span>D - Type</span><br/>
						</div><div><input type="radio" name="E"><span>E - Type</span></div>
					</td>
				</tr>
				<tr>
					<td><strong>House Number : </strong></td>
					<td><input type="textfield" name="hnumber"></td>
				</tr>
 -->				<tr><td style="width: 500px; text-align: center;">
				<!-- <input type="submit" name="Submit"></td></tr> -->

            <?php echo form_submit(array('id'=>'submit','value'=>'Search')); ?>
				</td></tr></table>

            <?php echo form_close(); ?>
		</div>

		<div class="search-results">
			
		</div>

		<script type="text/javascript">
            var m = new Date();

            var frm = m.getFullYear() +"-"+ Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getMonth()), -2),"") +"-"+ Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getDate()), -2),"");
            // document.getElementById('from').value = frm;

            var to = m.getFullYear() +"-"+ Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getMonth()+1), -2),"") +"-"+ Array.prototype.join.call(Array.prototype.slice.call(("0"+m.getDate()), -2),"") + " 00:00:00";
            document.getElementById('to').value = to;

			flatpickr("#from");
			flatpickr("#to");
		</script>