<script type="text/javascript">
</script>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Item</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('item/update/'.$item->id); ?>">
			<div class="col-md-8">
				<div class="form-group">
					<label >Item Name</label>
					<input type="text"  class="form-control" value="<?= $item->name; ?>" name="name" required="">
				</div>
				<div class="form-group">
					<label >Item Description</label>
					<!-- <input type="textarea"  class="form-control" value="<?= $item->description; ?>" name="description" required=""> -->
					<textarea name="description" class="form-control" required="" cols="40" rows="11" id="content"><?php echo  $item->description; ?></textarea>
					<script type="text/javascript">
						CKEDITOR.replace( 'content' );
					</script>
				</div>
				<div class="form-group">
					<label >Sort Order</label>
					<input type="text"  class="form-control" value="<?= $item->sort_order;?>" name="sort_order" >
				</div>
				<div class="form-group">
					<label >Has Option</label>
					<?php $selected=$item->has_option;?>
					<select name="has_option" class="form-control">
						<option <?php if($selected == 'No') { echo "selected"; } ?> value="No">No</option>
						<option <?php if($selected == 'Yes') { echo "selected"; } ?> value="Yes">Yes</option>
					</select>
				</div>
				<button type="submit" class="btn btn-success">Update Item</button>
				<?php
				if(isset($_POST['submit']))
				{
					$has_option = $_POST['hasOption'];
				}
				?>
			</div>
		</form>
	</div>

</div>


