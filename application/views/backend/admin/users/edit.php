<script type="text/javascript">
</script>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit User</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('users/update/'.$users->user_id); ?>">
		<div class="col-md-8">
			<div class="form-group">
			    <label>User Name</label>
			    <input type="text"  class="form-control" value="<?= $users->user_name;?>" name="user_name" required="">
			</div>
			<div class="form-group">
			    <label>Phone</label>
			    <input type="text"  class="form-control" value="<?=$users->user_phone;?>" name="user_phone" required="">
			</div>
			<div class="form-group">
			    <label >Password</label>
			    <input type="Password"  class="form-control" name="user_password" >
			</div>
			<div class="form-group">
			    <label >Confirm Password</label>
			    <input type="Password"  class="form-control" name="confirm_password" >
			</div>
			<button type="submit" class="btn btn-success">Update User</button>
		</div>
			
	</div>

</form>

	</div>
</div>


