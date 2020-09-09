
<script type="text/javascript">


</script>

<!-- Column rendering -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Add New Item</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" action="<?php echo base_url('item/save_item'); ?>">
			<div class="col-md-8">
				<div class="form-group">
					<label >Item Name</label>
					<input type="text"  class="form-control" name="name" required="">
				</div>
				<div class="form-group">
					<label >Item Description</label>
					<!-- <input type="textarea"  class="form-control" name="description" required=""> -->
					<textarea name="description" class="form-control" required="" cols="40" rows="11" id="content"></textarea>
					<script type="text/javascript">
						CKEDITOR.replace( 'content' );
					</script>
				</div>
				<div class="form-group">
					<label >Sort Order</label>
					<input type="text"  class="form-control" name="sort_order" >
				</div>
				<div class="form-group">
					<label >Has Option</label>
					<div class="hasOption"> 
						<select name="has_option" class="form-control">
							<option value="Yes">YES</option>
							<option value="No">NO</option>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-success">Add Item</button>
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


