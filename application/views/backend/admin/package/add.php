<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Add New Package</h5>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('package/save_package'); ?>">
        <!--<input type="hidden" value="<?php echo $packages->logo_url; ?>" name="logo_path">-->
            <div class="col-md-8">
                <div class="form-group">
                    <label>Default Day</label>
                    <select class="form-control" name="default_day">
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >Package Name</label>
                    <input type="text"  class="form-control" value=""  name="name"  required="">
                </div>
                <div class="form-group">
                    <label >Package Price</label>
                    <input type="text"  class="form-control" value="" name="price" required="">
                </div>
                <div class="form-group" id="feature_bg">
                    <img width="120" src="" alt=""><br>
                    <label>Upload Image</label>
                    <input type="file" class="form-control" name="logo" required="">
                </div>
                <div class="form-group">
                    <label >Calories</label>
                    <input type="text"  class="form-control" value="0" name="calories" >
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <textarea name="description" class="form-control" required="" cols="40" rows="11" id="content"></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'content' );
                    </script>
                    <!-- <input type="text"  class="form-control" value="" name="description" > -->
                </div>
                <div class="form-group">
                    <label >Sort Order</label>
                    <input type="text"  class="form-control" value="" name="sort_order" >
                </div>
                 <div class="form-group">
                    <label >Package Type</label>
                    <select class="form-control" name="status">
                        <option value="YES">Ones in a week</option>
                        <option value="NO">Everyday</option>
                    </select>
                   <!--  <input type="text"  class="form-control" value="" name="status" > -->
                </div>
                <button type="submit" class="btn btn-success">Add Package</button>
            </div>    
        </form>
    </div>
</div>