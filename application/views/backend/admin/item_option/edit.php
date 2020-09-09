<script type="text/javascript">
	</script>
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Update Item Option</h5>
			<?php echo $this->session->flashdata('msg'); ?>					
		</div>
		<div class="panel-body">
			<form method="POST" action="<?php echo site_url('item_option/update/'.$item_option->id); ?>">
				<input type="hidden" name="item_idd" value="<?php echo $item_option->item_id; ?>">
				<input type="hidden" name="item_id" value="<?=$item->id;?>">
			<div class="col-md-8">
				<div class="form-group">
					<label>Item  Name</label> 
					<input type="text"  class="form-control" value="<?=$item->name; ?>" readonly>
					
		   			<!-- <select class="form-control" name="item_id">
	                      
	                       <?php foreach($item as $row) { ?>
	                       <?php if($row->has_option=='Yes'){ ?>
	                       	<option
	                       	<?php if($row->id==$item_option->item_id){echo "selected";} ?>

	                       		 value="<?php echo $row->id; ?>">
	                       		 <?php echo $row->name; ?>
	                       	</option>
	                       <?php  } }?>
	            	</select> -->
				</div>
				<div class="form-group">
				    <label >Option Name</label>
				     <input type="text"  class="form-control" value="<?= $item_option->name; ?>" name="name" required="">
				</div>
				<div class="form-group">
				    <label >Option Price</label>
				    <input type="number"  class="form-control" value="<?= $item_option->price; ?>" name="price" required="">
				</div>
				<button type="submit" class="btn btn-success">Update</button>
			</div>
			</form>
		</div>
	</div>