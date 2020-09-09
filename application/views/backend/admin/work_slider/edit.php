<script type="text/javascript">
</script>
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Slider</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>
	<div class="panel-body">
		<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('work_slider/update/'.$work_slider->id); ?>">
		<input type="hidden" value="<?php echo $work_slider->image_link; ?>" name="logo_path">
		<div class="col-md-8">
			<div class="form-group">
			    <label >Title</label>
			    <input type="text"  class="form-control" value="<?= $work_slider->title; ?>" name="title" required="">
			</div>
			<!--<div class="form-group">-->
			<!--    <label >Description</label>-->
			<!--    <input type="text"  class="form-control" value="<?= $work_slider->description; ?>" name="description" required="">-->
			<!--</div>-->
			<div class="form-group">
				<label >Description</label>
				<textarea name="description" class="form-control" required="" cols="40" rows="11" id="content"><?php echo $work_slider->description; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'content' );
				</script>
			</div>
			<div class="form-group">
				<img width="120" src="<?php if(isset($work_slider)){ echo base_url('assets/images/'.$work_slider->image_link); }?>" alt=""><br>
			    <input type="file" class="form-control" name="image_link">
			</div>
			<div class="form-group">
			    <label >Action</label>
			    <input type="text"  class="form-control" value="<?= $work_slider->action_link; ?>" name="action_link" required="">
			</div>
			<div class="form-group">
			    <label >Sort Order</label>
			    <input type="text"  class="form-control" value="<?= $work_slider->sort_order;?>" name="sort_order" required="" >
			</div>
			<button type="submit" class="btn btn-success">Update</button>
		</div>
			
	</div>

</form>

	</div>
</div>


