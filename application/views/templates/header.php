<!DOCTYPE html>
<html>
<head>
	<title>J K Paper Civil Department</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/flatpicker.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/flatpicker.min.js"></script>

</head>
<body>

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

	.title-head{
	    font-size: 30px;
	    padding: 28px 0;
	}

	table{
		margin: auto;	
	}
/*

	table tr{
		padding: 10px;
		display: block;
	}

	tr td{
		width: 250px;
	}*/

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
<?php $this->load->library('session'); ?>
<div class="body-wrapper">
	<nav>
		<div class="container">
			<ul class="leftul">
				<li><img src="<?php echo base_url(); ?>/assets/jklogo.jpg" width="75"></li>
				<li class="title-head">Civil Department</li>
			</ul>
			<ul class="rightul">
				<?php if ($this->session->userdata('name')) { ?>
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url(); ?>/complaint/add_view">Add Complaint</a></li>
					<li><a href="#"><?php echo "Hi ".$this->session->userdata('name'); ?></a></li>
					<li><a href="<?php echo base_url(); ?>Sessions_controller/unset_session_data">Logout</a></li>
				<?php }else{ ?>
					<li><a href="<?php echo base_url(); ?>Sessions_controller/">Login</a></li>			
					<li><a href="<?php echo base_url(); ?>Sessions_controller/add_user_view">Signup</a></li>			
				<?php } ?>					
			</ul>
		</div>
	</nav>

	<div class="container">
		<h1>Complaints Tracking Portal - Plant</h1>
		<hr>
