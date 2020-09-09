<!-- single DETAILS SECTION START-->
<section class="single-details-section section-padding wow fadeInUp">
    <div class="container">
        <?php if($this->session->flashdata('message')){?>
            <p class="alert alert-success col-md-12">
                <?php echo $this->session->flashdata('message'); ?>
            </p>
    <?php }  ?>  
      
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-post-area">
                    <div class="single-post-title">
                        <!--- <h2></h2> -->
                    </div>
                    <div class="single-post-content">

                    	
<!---------------------contact us section start ---------------------------------->
<section class="contact-us-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="contact-form wow fadeInUp">
                    <form method="POST" action="<?php echo site_url('Site/client_message');?>">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-center">
                                    <h1>send your message</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-custom-style">
                                    <label for="f-name">First Name</label>
                                    <input required=""  type="text" class="form-control" name="f_name" placeholder="Ex: John">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-custom-style">
                                    <label for="l-name">Last Name</label>
                                    <input type="text" class="form-control" name="l_name" placeholder="Ex: Doe">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input required="" type="email" class="form-control" name="email"
                                           placeholder="Ex: example@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea required="" class="form-control" name="message" rows="3"
                                              placeholder="Write Your Message here..."></textarea>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="submit-btn">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> 
<!------------------------contact us section end--------------------------------->


                    </div>
                </div>
                <!---------------------------- Google Map ---------------------------------------->
          
            <section class="g-map-section">
                <div class="map-widget wow fadeInUp">
                    <?php echo $settings->location; ?>
                </div>
            </section>
            
<!---------------------------- Google Map End---------------------------------->
            </div>

        </div>
    </div>
</section>
<!-- single DETAILS SECTION END-->