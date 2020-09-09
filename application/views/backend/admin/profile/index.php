
<script type="text/javascript">


</script>


<!-- Column rendering -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Update Profile</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>


	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('admin/update_profile'); ?>">

		<div class="col-md-8">
			<div class="form-group">
			    <label >Name</label>
			    <input type="text"  class="form-control" value="<?php echo $admin_data->user_name; ?>" name="name">
			</div>
			<div class="form-group">
			    <label >Email Address</label>
			    <input type="email"  class="form-control" value="<?php echo $admin_data->user_email; ?>" name="email">
			</div>
			<div class="form-group">
			    <label >Phone Number</label>
			    <input type="text"  class="form-control" value="<?php echo $admin_data->user_phone; ?>" name="phone">
			</div>
			
			<button type="submit" class="btn btn-success">Update</button>
		</div>
			
	</div>

</form>

	</div>
</div>


