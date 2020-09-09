<script type="text/javascript">
</script>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Item</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('admin/update_checkout/'.$final_orders->id); ?>">
		<div class="col-md-8">
			<div class="form-group">
			    <label >Order Status</label>
			    <input type="text"  class="form-control" value="<?= $final_orders->order_status; ?>" name="order_status" required="">
			</div>
			<button type="submit" class="btn btn-success">Update Checkout</button>
		</div>
		</form>
	</div>
</div>


