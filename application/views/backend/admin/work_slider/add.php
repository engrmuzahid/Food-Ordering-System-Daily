

<script type="text/javascript">


</script>
<!-- Column rendering -->
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Add New Slider</h5>
		<?php echo $this->session->flashdata('msg'); ?>					
	</div>


	<div class="panel-body">
		<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('work_slider/save_work_slider'); ?>">
		<input type="hidden" value="<?php if(isset($work_slider)){ echo $work_slider->image_link; }?>" name="logo_path">
		<div class="col-md-8">
			<div class="form-group">
			    <label >Title</label>
			    <input type="text"  class="form-control" name="title" required="">
			</div>
			<!--<div class="form-group">-->
			<!--    <label >Description</label>-->
			<!--    <input type="text"  class="form-control" name="description" >-->
			<!--</div>-->
			<div class="form-group">
                    <label >Description</label>
                    <textarea name="description" class="form-control" required="" cols="40" rows="11" id="content"></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'content' );
                    </script>
                    <!-- <input type="text"  class="form-control" value="" name="description" > -->
                </div>
			<div class="form-group" id="feature_bg">
				<!-- <img width="120" src="<?php if(isset($work_slider)){ echo base_url('assets/images/'.$work_slider->image_link); }?>" alt=""><br> -->
			    <label>Upload Image</label>
			    <input type="file" class="form-control" name="logo">
			</div>
			 <div class="form-group">
				<label>Action</label>
				<input type="text" class="form-control" name="action_link">
			</div>
			<div class="form-group">
			    <label >Sort Order</label>
			    <input type="text"  class="form-control" name="sort_order" >
			</div>
			<button type="submit" class="btn btn-success">Add slider</button>
		</div>
			
	</div>

</form>

	</div>
</div>


