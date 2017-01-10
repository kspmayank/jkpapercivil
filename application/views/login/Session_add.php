<h3>Login</h3>
<div>
	<?php echo form_open('Sessions_controller/add_session'); ?>
	<table>
		<tr>
			<td> <?php echo form_label('Username'); ?> </td>
			<td> <?php echo form_input(array('id'=>'username','name'=>'username')); ?> </td>
		</tr>
		<tr>
			<td> <?php echo form_label('Password'); ?> </td>
			<td> <?php echo form_password(array('id'=>'password','name'=>'password')); ?> </td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit(array('id'=>'submit','value'=>'Login')); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</div>