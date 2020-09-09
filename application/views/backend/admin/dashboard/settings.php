<script type="text/javascript">
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Website Settings</h5>
        <?php echo $this->session->flashdata('msg'); ?>                    
    </div>
    <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('admin/save_settings'); ?>">
        <input type="hidden" value="<?php echo $settings->logo_url; ?>" name="logo_path">
        <input type="hidden" value="<?php echo $settings->image; ?>" name="image_path">
        <div class="col-md-8">
            <div class="form-group">
                <label >Email Address</label>
                <input type="text"  class="form-control" value="<?php echo $settings->email; ?>" name="email">
            </div>
            <div class="form-group">
                <label >Phone Number</label>
                <input type="text"  class="form-control" value="<?php echo $settings->phone; ?>" name="phone">
            </div>
            <div class="form-group">
                <label >Facebook Link</label>
                <input type="text"  class="form-control" value="<?php echo $settings->facebook; ?>" name="facebook">
            </div>
            <div class="form-group">
                <label >Twitter Link</label>
                <input type="text"  class="form-control" value="<?php echo $settings->twitter; ?>" name="twitter">
            </div>
            <div class="form-group">
                <label >Google Plus Link</label>
                <input type="text"  class="form-control" value="<?php echo $settings->gplus; ?>" name="gplus">
            </div>
            <div class="form-group">
                <label >Location</label>
                <input type="text"  class="form-control" value='<?php echo $settings->location; ?>' name="location">
            </div> 
            <div class="form-group">
                <label >First Title</label>
                <input type="text"  class="form-control" value='<?php echo $settings->first_title; ?>' name="first_title">
            </div> 
            <div class="form-group">
                <label >Accepting Time</label>
                <select name="accepting_time" class="form-control">
                                    <option <?php echo $settings->accepting_time == "08:00"?"selected":""; ?> value="08:00">08:00 AM</option> 
    <option <?php echo $settings->accepting_time == "08:30"?"selected":""; ?> value="08:30">08:30 AM</option> 
    <option <?php echo $settings->accepting_time == "09:00"?"selected":""; ?> value="09:00">09:00 AM</option> 
    <option <?php echo $settings->accepting_time == "09:30"?"selected":""; ?> value="09:30">09:30 AM</option> 
    <option <?php echo $settings->accepting_time == "10:00"?"selected":""; ?> value="10:00">10:00 AM</option> 
    <option <?php echo $settings->accepting_time == "10:30"?"selected":""; ?> value="10:30">10:30 AM</option> 
    <option <?php echo $settings->accepting_time == "11:00"?"selected":""; ?> value="11:00">11:00 AM</option> 
    <option <?php echo $settings->accepting_time == "11:30"?"selected":""; ?> value="11:30">11:30 AM</option>  

                                </select> 
            </div> 
            <!--<div class="form-group">-->
            <!--    <label >First Details</label>-->
            <!--     <textarea name="first_content" class="form-control"><?php echo $settings->first_content; ?></textarea>-->
            <!--</div>-->
            <div class="form-group">
				<label >First Details</label>
				<textarea name="first_content" class="form-control" required="" cols="40" rows="11" id="content"><?php echo $settings->first_content; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'content' );
				</script>
			</div>
            <div class="form-group">
                <img width="120" src="<?php echo base_url('assets/images/'.$settings->image); ?>" alt=""><br>
                <label>First Image</label>
                <input type="file" class="form-control" name="image">
            </div>
             <div class="form-group">
                <label >Second Title</label>
                <input type="text"  class="form-control" value='<?php echo $settings->second_title; ?>' name="second_title">
            </div> 
            <!--<div class="form-group">-->
            <!--    <label >Second Details</label>-->
            <!--    <textarea name="second_content" class="form-control"><?php echo $settings->second_content; ?></textarea>-->
            <!--</div> -->
            <div class="form-group">
				<label >Second Details</label>
				<textarea name="second_content" class="form-control" required="" cols="40" rows="11" id="content1"><?php echo $settings->second_content; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'content1' );
				</script>
			</div>
            <div class="form-group">
                <label >Linkedin Link</label>
                <input type="text"  class="form-control" value="<?php echo $settings->linkedin; ?>" name="linkedin">
            </div>
            <div class="form-group">
                <label >Youtube Link</label>
                <input type="text"  class="form-control" value="<?php echo $settings->youtube; ?>" name="youtube">
            </div>
            <div class="form-group" id="feature_bg">
                <img width="120" src="<?php echo base_url('assets/images/'.$settings->logo_url); ?>" alt=""><br>
                <label>Upload Logo</label>
                <input type="file" class="form-control" name="logo">
            </div>
            <div class="form-group">
                <label>Success Message</label>
                <input type="text"  class="form-control" value="<?php echo $settings->success_message; ?>" name="success_message">
            </div>
            <!--<div class="form-group">-->
            <!--    <label >About Us</label>-->
            <!--    <textarea name="about_us" class="form-control"><?php echo $settings->about_us; ?></textarea>-->
            <!--</div>-->
            <!--<div class="form-group">-->
            <!--    <label >Privacy Policy</label>-->
            <!--    <textarea name="privacy_policy" class="form-control"><?php echo $settings->privacy_policy; ?></textarea>-->
            <!--</div>-->
            <!-- <div class="form-group">-->
            <!--    <label >Cookies Policy</label>-->
            <!--    <textarea name="cookies_policy" class="form-control"><?php echo $settings->cookies_policy; ?></textarea>-->
            <!--</div>-->
            <!--<div class="form-group">-->
            <!--    <label >Alergy Alert</label>-->
            <!--    <textarea name="alergy_alert" class="form-control"><?php echo $settings->alergy_alert; ?></textarea>-->
            <!--</div>-->
            <div class="form-group">
				<label >About Us</label>
				<textarea name="about_us" class="form-control" required="" cols="40" rows="11" id="content2"><?php echo $settings->about_us; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'content2' );
				</script>
			</div>
			<div class="form-group">
				<label >Privacy Policy</label>
				<textarea name="privacy_policy" class="form-control" required="" cols="40" rows="11" id="content3"><?php echo $settings->privacy_policy; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'content3' );
				</script>
			</div>
			<div class="form-group">
				<label >Cookies Policy</label>
				<textarea name="cookies_policy" class="form-control" required="" cols="40" rows="11" id="content4"><?php echo $settings->cookies_policy; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'content4' );
				</script>
			</div>
			<div class="form-group">
				<label >Alergy Alert</label>
				<textarea name="alergy_alert" class="form-control" required="" cols="40" rows="11" id="content5"><?php echo $settings->alergy_alert; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'content5' );
				</script>
			</div>
            <div class="form-group">
                <label >API Key</label>
                <input type="text"  class="form-control" value="<?php echo $settings->api_key; ?>" name="api_key">
            </div>
            <div class="form-group">
                <label >Publish Key</label>
                <input type="text"  class="form-control" value="<?php echo $settings->publish_key; ?>" name="publish_key">
            </div>
            <div class="form-group">
                <label >Copyright Text</label>
                <input type="text"  class="form-control" value="<?php echo $settings->copyright_text; ?>" name="copyright">
            </div>
             
            	<div class="form-group">
			   <label >Order Confirmation Text</label>
				<textarea name="order_confirm_text" class="form-control" required="" cols="40" rows="11" id="order_confirm_text"><?php echo $settings->order_confirm_text; ?></textarea>
				<script type="text/javascript">
					CKEDITOR.replace( 'order_confirm_text' );
				</script>
			</div>
            
            <div class="form-group">
                <label >Theme Color</label>
                <input type="color" value="<?php echo $settings->theme_color; ?>" name="theme_color">
            </div>
             <div class="form-group"> 
                <label >Secondary Color</label>
                <input type="color" value="<?php echo $settings->footer_bg_color; ?>" name="f_bg_color">
            </div>
            
            <button type="submit" class="btn btn-success">Update</button>
        </div>              
        </form>  
    </div>
</div>