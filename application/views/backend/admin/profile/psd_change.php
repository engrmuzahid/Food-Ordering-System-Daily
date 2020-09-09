
<script type="text/javascript">


</script>


<!-- Column rendering -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Update Password</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>


	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('admin/update_password'); ?>">

		<div class="col-md-8">
			<div class="form-group">
			    <label >Old Password</label>
			    <input type="password"  class="form-control" name="old_password" required >
			</div>
			<div class="form-group">
			    <label >New Password</label>
			    <input type="password"  class="form-control" name="new_password" required >
			</div>
			<div class="form-group">
			    <label >Confirm Password</label>
			    <input type="password"  class="form-control" name="confirm_password" required >
			</div>
			
			<button type="submit" class="btn btn-success">Update Password</button>
		</div>
			
	</div>

</form>

	</div>
</div>


