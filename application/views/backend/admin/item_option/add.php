
<script type="text/javascript">
</script>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Add New Item Option</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo site_url('item_option/save_item_option'); ?>">
			<input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
			<div class="col-md-8">
				<div class="form-group">
			   		<label>Item  Name</label>
			   			<input type="text"  class="form-control" value="<?=$item->name; ?>" readonly>
			   		
				</div>
				<div class="form-group">
			    	<label>Option Name</label> 
			    	<input type="text"  class="form-control" name="name" required="">
	            	 
				</div>
				<div class="form-group">
			    	<label>Option Price</label>
			    	<input type="text"  class="form-control" name="price" required="">
				</div>
				<button type="submit" class="btn btn-success">Add Item Option</button>
			</div>
		</form>
	</div>
</div>


