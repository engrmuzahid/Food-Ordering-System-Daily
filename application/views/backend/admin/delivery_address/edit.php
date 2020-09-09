<script type="text/javascript">
</script>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Item</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('delivery_address/update/'.$delivery_address->id); ?>">
		<div class="col-md-8">
			<div class="form-group">
			    <label >Address</label>
			    <input type="text"  class="form-control" value="<?= $delivery_address->city; ?>" name="city" required="">
			</div>
			<button type="submit" class="btn btn-success">Update Address</button>
		</div>
			
	</div>

</form>

	</div>
</div>


