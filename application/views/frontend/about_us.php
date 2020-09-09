<!--about us section start-->
<section class="about-us-section section-padding wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="about-us-thumb text-left w-100 wow slideInLeft">
                    <img src="<?php echo base_url();?>/assets/images/<?php echo $settings->image; ?>" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-12 wow slideInRight">
                <div class="about-content">
                    <div class="section-title text-left">
                        <h1><?php echo $settings->first_title; ?></h1>
                    </div><?php echo $settings->first_content; ?>
                   <!-- <div class="template-btn wow fadeInUp">
                        <a href="<?php echo site_url('Site/about_us'); ?>">learn more</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--about us section end-->

