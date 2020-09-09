<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spice Guru</title>
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/responsive.css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.jpg">
<!--back to end-->
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/owl.carousel.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
<style type="text/css">
.items{
    margin-top: 12px;
    margin-bottom: -10px;
}
section.top-bar-section {
    padding: 12px 0;
}

.logo img {
    width: auto;
    height: auto;
}
:root {
    --theme-color: <?php echo $settings->theme_color;?>;
}

:root {
    --secondary-color: <?php echo $settings->footer_bg_color;?>;
}

@media only screen and (max-width: 767px) {
   .desktop_app{
       display:none;
   }
}

</style>
</head>
<body>
<!--- Facebook Page Embade ---->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3"></script>
<!--- Facebook Page Embade  End---->

<!--mobile view start-->
<div class="mobile_view">
   
    <div class="sticky-area-mobile-view">
        <div class="mobile-home-btn text-center mobile-sticky-bar-common-style">
           <a href="<?php echo base_url();?>"> <i class="fa fa-home"></i>
            <p>home</p></a>
        </div> 
        <div class="mobile-call-btn text-center mobile-sticky-bar-common-style">
          <a href="tel:<?php echo $settings->phone; ?>">  <i class="fa fa-phone"></i>
            <p>call</p></a>
        </div>
        <div class="mobile-cart-btn text-center mobile-sticky-bar-common-style">
           <a href="<?php echo base_url();?>#package_section"> <i class="fa fa-shopping-cart"></i>
            <p>order</p></a>
        </div>
        <div class="mobile-menu-btn text-center mobile-sticky-bar-common-style"  data-toggle="modal" data-target="#myModal" style="color:#FFF">
            <i class="fa fa-info"></i>
            <p >Policy</p>
        </div>
    </div>
</div>









<!--<div class="mobile_view">-->
<!--    <div class="mobile-menu-area">-->
<!--        <ul class="mobile-menu">-->
<!--            <li><i class="fa fa-times" id="close"></i></li>-->
<!--            <li><a class="nav-link" href="#">Home</a></li>-->
<!--            <li><a class="nav-link" href="#">Package List</a></li>-->
<!--            <li><a class="nav-link" href="#">About Us</a></li>-->
<!--            <li><a class="nav-link" href="#">Order Process</a></li>-->
<!--            <li><a class="nav-link" href="#">Contact Us</a></li>-->
<!--            <li><a class="nav-link" href="<?php //echo site_url('Site/about_us'); ?>">about us</a></li>-->
<!--            <li><a class="nav-link" href="<?php //echo site_url('Site/contact_us') ?>">contact us</a></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--    <div class="sticky-area-mobile-view">-->
<!--        <div class="mobile-menu-btn">-->
<!--            <i class="fa fa-bars"></i>-->
<!--        </div>-->
<!--        <div class="phone">-->
<!--            <i class="fa fa-phone"></i> <?php //echo $settings->phone; ?>-->
<!--        </div>-->
<!--        <div class="email">-->
<!--            <i class="fa fa-envelope"></i> <?php //echo $settings->email; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--mobile header start-->
<div class="mobile-header">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="mobile-logo">
                    <a href="#">
                         <img src="<?php echo base_url(); ?>assets/images/<?php echo $settings->logo_url; ?>">
                    </a>
                </div>
            </div>
            <div class="col-6">
                <a href="<?php echo site_url('Site/cart_view'); ?>">
                <div class="item-cart-option top_cart">
                    <?= $top_cart; ?>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!--mobile header end-->
<!--mobile view end-->
<!--header start-->
<header>
    <section class="top-bar-section" style="background:#fff;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo text-left">
                        <a href="index.html">
                            <a href="<?php echo base_url('Site'); ?>"><img src="<?php echo base_url(); ?>assets/images/<?php echo $settings->logo_url; ?>"></a>
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="top-bar-right">
                        <div class="top-info">
                            <p><i class="fa fa-phone"></i>Phone<br/><span><?php echo $settings->phone; ?></span></p>
                        </div>
                        <div class="top-info">
                            <p><i class="fa fa-envelope"></i>email<br/><span><?php echo $settings->email; ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-menu-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <ul id="nav">
                        <li><a href="<?php echo base_url();?>#slider_section">Home</a></li>
                        <li><a href="<?php echo base_url();?>#about_us_section">About Us</a></li>
                        <li><a href="<?php echo base_url();?>#package_section">Our Menu</a></li>
                        <li><a href="<?php echo site_url('Site/download'); ?>">Download</a></li>
                        <li><a href="<?php echo base_url();?>#post_2_setion">FAQ</a></li>
                        <li><a href="<?php echo base_url();?>#contact_us_section">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo site_url('Site/cart_view'); ?>">
                    <div class="item-cart-option top_cart">
                        <?= $top_cart; ?>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</header>
<!--header end-->


<?php 
    $this->load->view($main_content);
 ?>



<!--footer section start-->
<footer>
    <!--footer top section start-->
    <section class="footer-top-section section-padding wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget-1">
                        <div class="desktop_app">
                              <h2>Download our apps</h2>
                        <a href="https://play.google.com/store/apps/details?id=com.ginilab.prolunch"><img src="<?php echo base_url();?>assets/images/playstore-app.png"></a>
                        <a href="https://apps.apple.com/us/app/prolunch/id1470874824"><img src="<?php echo base_url();?>assets/images/ios-app.png"></a>
                        
                        </div>
                       <ul class="footer-menu">
                            <li><a href="<?php echo base_url('Site/privacypolicy') ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url('Site/cookiespolicy') ?>">Cookies Policy</a></li>
                        </ul>
                        <!--<ul class="footer-menu">-->
                        <!--    <li><a href="<?php echo base_url();?>#slider_section">Home</a></li>-->
                        <!--    <li><a href="<?php echo base_url();?>#about_us_section">About Us</a></li>-->
                        <!--    <li><a href="<?php echo base_url();?>#package_section">Our Menu</a></li>-->
                        <!--    <li><a href="<?php echo base_url();?>#post_2_setion">FAQ</a></li>-->
                        <!--    <li><a href="<?php echo base_url();?>#contact_us_section">Contact Us</a></li>-->
                        <!--    <li data-toggle="modal" data-target="#myModal" style="color:#FFF">Privacy Policy</li> -->
                        <!--    <div class="modal fade" id="myModal" role="dialog">-->
                        <!--        <div class="modal-dialog">-->
                                
                                  <!-- Modal content-->
                        <!--          <div class="modal-content">-->
                        <!--            <div class="modal-header">-->
                                     <!--<button type="button" class="close" data-dismiss="modal" style="float:left;">&times;</button>-->
                        <!--              <h4 class="modal-title" style="float: left">Our Privacy Policy</h4>-->
                        <!--            </div>-->
                        <!--            <div class="modal-body">-->
                        <!--              <?php echo "<p>".$settings->privacy_policy."</p>"?>-->
                        <!--            </div>-->
                        <!--            <div class="modal-footer">-->
                        <!--              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        <!--            </div>-->
                        <!--          </div>-->
                                  
                        <!--        </div>-->
                        <!--      </div>-->
                        <!--</ul>-->
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="footer-widget-2">
                       <div class="fb-page" data-href="<?php echo $settings->facebook; ?>" data-tabs="timeline" data-width="500" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget-4">
                        <div class="branding">
                           <a href="<?php echo site_url('Site'); ?>"><img src="<?php echo base_url(); ?>assets/images/download.jpg"></a>
                        </div>
                        <div class="footer-social-links">
                            <h3>Follow Us</h3>
                            <ul>
                                <?php if($settings->facebook!='') {?>
                                <li><a target="_blank" href="https://<?php echo $settings->facebook; ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
                                 <?php if($settings->twitter!='') {?>
                                <li><a target="_blank" href="https://<?php echo $settings->twitter; ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                                 <?php if($settings->gplus!='') {?>
                                <li><a target="_blank" href="https://<?php echo $settings->gplus; ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                                 <?php if($settings->youtube!='') {?>
                                <li><a target="_blank" href="https://<?php echo $settings->youtube; ?>"><i class="fa fa-youtube"></i></a></li><?php } ?>
                                 <?php if($settings->linkedin!='') {?>
                                <li><a target="_blank" href="https://<?php echo $settings->linkedin; ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--footer top section end-->
    <!--footer bottom section start-->
    <section class="footer-bottom-section wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-widget">
                        <p style="float: left;"><?php echo $settings->copyright_text; ?><a href="#"></a></p>
                        <p style="float: right; margin-right: -60px;">Developed By<span>  </span><a target="_blank" href="http://ginilab.com/"><img style="width: 40%;" src="<?php echo base_url();?>assets/images/ginilab.png"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--footer bottom section end-->
</footer>
<!--footer section end-->
<!--back to top-->
<div class="back_to_top_area">
    <div class="container">
        <div class="row">
            <div class="back_to_top">
                <i class="fa fa-angle-up"></i>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="float: left">Privacy Policy</h4>
            </div>
            <div class="modal-body">
                <?php echo "<p>".$settings->privacy_policy."</p>"?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
              
