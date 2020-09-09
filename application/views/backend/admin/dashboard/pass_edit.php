<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Password</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('login/update_pass/'.$users->user_id); ?>">
		<div class="col-md-8">
			<div class="form-group">
			    <label>Old Password</label>
			    <input type="Password"  class="form-control" name="old_pass" required="">
			</div>
			<div class="form-group">
			    <label>New Password</label>
			    <input type="Password"  class="form-control" name="new_pass" required="">
			</div>
			<div class="form-group">
			    <label>Confirm Password</label>
			    <input type="Password"  class="form-control" name="conf_pass" required="">
			</div>
			<button type="submit" class="btn btn-success">Update</button>
		</div>
		</form>
	</div>
</div>


