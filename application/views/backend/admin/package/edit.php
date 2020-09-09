<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Update Package</h5>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('package/update/'.$package->package_id); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label >Package Name</label>
                    <input type="text"  class="form-control" value="<?= $package->package_name; ?>" name="package_name" required="">
                </div>
                <div class="form-group">
                    <label >Package Price</label>
                    <input type="text"  class="form-control" value="<?= $package->package_price; ?>" name="package_price" required="">
                </div>
               <div class="form-group">
                    <label >Package Description</label>
                    <textarea name="description" class="form-control" required="" cols="40" rows="11" id="content"><?php echo $package->description; ?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'content' );
                    </script>
                    <!-- <input type="text"  class="form-control" value="" name="description" > -->
                </div>
                <div class="form-group">
                    <label>Default Day</label>
                    <?php $selected=$package->default_day;?>
                <select name="default_day" class="form-control">
                    <option <?php if($selected == 'saturday') { echo "selected"; } ?> value="saturday">saturday</option>
                    <option <?php if($selected == 'sunday') { echo "selected"; } ?> value="sunday">sunday</option>
                    <option <?php if($selected == 'monday') { echo "selected"; } ?> value="monday">monday</option>
                    <option <?php if($selected == 'tuesday') { echo "selected"; } ?> value="tuesday">tuesday</option>
                    <option <?php if($selected == 'wednesday') { echo "selected"; } ?> value="wednesday">wednesday</option>
                    <option <?php if($selected == 'thursday') { echo "selected"; } ?> value="thursday">thursday</option>
                    <option <?php if($selected == 'friday') { echo "selected"; } ?> value="friday">friday</option>
                </select>
                    <!-- <input type="text"  class="form-control" value="<?= $package->default_day; ?>" name="default_day" required=""> -->
                </div>
                 <div class="form-group">
                    <label >Calories</label>
                    <input type="text"  class="form-control" value="<?= $package->calories; ?>" name="calories" required="">
                </div>
                <div class="form-group">
                    <img width="120" src="<?php echo base_url('assets/images/'.$package->logo_url); ?>" alt=""><br>
                    <!--<label>First Image</label>-->
                    <input type="file" class="form-control" name="logo">
                </div>
                <div class="form-group">
                    <label >Sort Order</label>
                    <input type="number"  class="form-control" value="<?= $package->sort_order; ?>" name="sort_order" required="">
                </div>
                <div class="form-group">
                    <label >Status</label>
                    <?php $selected=$package->status;?>
                <select name="status" class="form-control">
                    <option <?php if($selected == 'YES') { echo "selected"; } ?> value="YES">YES</option>
                    <option <?php if($selected == 'NO') { echo "selected"; } ?> value="NO">NO</option>
                </select>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>