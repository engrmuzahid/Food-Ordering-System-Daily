
<script type="text/javascript">


</script>

<!-- Column rendering -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Add Delivery Address</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('delivery_address/save_delivery_address'); ?>">
		<div class="col-md-8">
			<div class="form-group">
			    <label >Address</label>
			    <input type="text"  class="form-control" name="city" required="">
			</div>
			<button type="submit" class="btn btn-success">Add Delivery Address</button>
		</div>
		</form>	
	</div>



	</div>
</div>


