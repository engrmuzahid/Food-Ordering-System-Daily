<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Add New User</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('users/save_user'); ?>">
		<div class="col-md-8">
			<div class="form-group">
			    <label >Username</label>
			    <input type="text"  class="form-control" name="user_name" required="">
			</div>
			<div class="form-group">
			    <label >Email</label>
			    <input type="email"  class="form-control" name="user_email" required="">
			</div>
			<div class="form-group">
			    <label >Phone</label>
			    <input type="text"  class="form-control" name="user_phone" >
			</div>
			<div class="form-group">
			    <label >Password</label>
			    <input type="Password"  class="form-control" name="user_password" >
			</div>
			<div class="form-group">
			    <label >Confirm Password</label>
			    <input type="Password"  class="form-control" name="confirm_password" >
			</div>
			<button type="submit" class="btn btn-success">Add User</button>
		</div>
		</form>	
	</div>



	</div>
</div>


