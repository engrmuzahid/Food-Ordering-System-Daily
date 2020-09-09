<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Profile</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('login/update_info/'.$users->user_id); ?>">
		<div class="col-md-8">
			<div class="form-group">
			    <label>User name</label>
			    <input type="text"  class="form-control" value="<?= $users->user_name ?>" name="user_name" required="">
			</div>
			<div class="form-group">
			    <label >Phone number</label>
			    <input type="text"  class="form-control" value="<?= $users->user_phone ?>" name="user_phone" required="">
			</div>
			<button type="submit" class="btn btn-success">Update</button>
		</div>
		</form>
	</div>
</div>


