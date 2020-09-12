
<!--hero section start-->
<section id="slider_section" class="hero-section">
    <div class="slider owl-carousel" id="hero-slider">
        <?php for ($i = 0; $i < count($slider); $i++): ?>
            <div class="single-slide-item hero-bg-1" style="background-image: url('<?php echo base_url(); ?>assets/images/<?php echo $slider["$i"]->image_link; ?>');">
                <div class="overlay-bg"></div>
                <div class="hero-content">
                    <div class="hero-cont-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10">
                                    <h1><?php echo $slider[$i]->title; ?></h1>
                                    <h3><?php echo $slider[$i]->description; ?></h3>
                                    <div class="view-btn">
                                        <a href="<?php echo site_url('Site/slider/'.$slider[$i]->id); ?>">details</a>
                                    </div>
                                    <div class="buy-btn">
                                        <a id="buy_now" href="#package_section">order now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</section>
<!--hero section end-->
<!--about us section start-->
<section class="about-us-section section-padding wow fadeInUp" id="about_us_section">
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

<!--food alergy section start-->
<section class="food-alergy-section section-padding wow fadeInUp" style="background: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-10 offset-md-1">
                <div class="food-alergy-thumb text-center w-100 wow slideInLeft">
                
                    <video width="860" autoplay>
                    <source src="<?= base_url(); ?>assets/videos/video.mp4" type="video/mp4"> 
                    </video>
                       </div>
            </div>
            </div>
        </div>
    </div>
</section>
<!--food alergy section end-->

<!--menu item list section start-->
<?php if (!empty($packages)) : ?>
    <section class="package-section section-padding" id="package_section">
        <div class="overlay-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-12" style="margin-bottom: -25px;">
                    <div class="section-title text-center wow fadeInDown">
                        <h1>Our Menu</h1>
                    </div>
                </div>
            </div>
            <div class="row">

            <?php
                $inc = 1;
                foreach ($packages as $KEY=>$package) :
                    $package_price = $package->package_price;
                    if($inc>7) break;

                    $avail_date = date("Ymd", strtotime("NOW"));
                    ?>
                    <div class="col-lg-4 col-sm-6" style="margin-top: 25px;">
                        <div class="package-item">
                            <form method="POST" action="<?php echo site_url('site/save_order_items'); ?>" id="package_add_form_<?php echo $inc; ?>">
                             <input type="hidden" name="Cart[id]" value="<?php echo $package->package_id; ?>_<?php echo date("Ymd", strtotime($avail_date)); ?>"/> 
                                <input type="hidden" name="Cart[package_id]" value="<?php echo $package->package_id; ?>"/>
                                <input type="hidden" name="Cart[package_name]" value="<?php echo $package->package_name; ?>"/>
                                <div class="text-center wow fadeInLeft">
                                    <div class="day-title">
                                        <a href="<?php echo site_url('Site/package_details'); ?>?id=<?php echo $package->package_id; ?>">
                                            <h3>
                                                <?php echo $package->package_name; ?> <i class="fa fa-angle-right pl-2"></i>
                                            </h3>
                               
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <div class="date-area package-price">
                                            <p><?php echo  date("d F Y", strtotime($KEY)); ?></p>
                                        </div>
                                        <div class="brif">
                                            <?php echo "<p>" . $package->description . ' <span style="color: var(--theme-color); font-weight: 600;font-size: 16px">Approx Calories '. $package->calories.'</span>'."</p>" ?>
                                        </div>
                                        <hr>
                                        <div class="menu-list">
                                            <?php ?>
                                            <?php foreach ($package->items as $item): 
                                                $package_price += $item->extra_price;
                                                ?>
                                                <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][name]" value="<?php echo $item->item_name; ?>"/>
                                                <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][has_option]" value="<?php echo $item->has_option; ?>"/>
                                                <div class="item-common-style">
                                                <?php $item_des=$this->db->where('name',$item->item_name)->get('item')->row(); ?>
                                                    <?php if (strtoupper($item->has_option) == "YES"): ?>
                                                        
                                                            <div class="form-group">
                                                                    <?php 
                                                                    echo "<p class='col-6 pull-left'>" . '<i class="fa fa-square"></i> ' . $item->item_name . "</p>"; 
                                                                     ?>
                                                                
                                                                <!-- <i class='fa fa-square'></i> -->
                                                                <div class="col-6 pull-right">
                                                                <select class="form-control option_<?php echo $inc; ?>" required  name="Cart[package_items][<?php echo $item->item_id; ?>][option_name]" >
                                                                   <option value="">Select</option>
                                                                   <?php foreach($options[$item->item_id] as $option): ?>
                                                                        <option value="<?php echo $option->name; ?>"><?php echo $option->name; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        
                                                         <?php echo "<p class='made-element'>".$item_des->description."</p>";?>
                                                        <hr>
                                                        <?php
                                                    else:
                                                        
                                                        echo "<p>" . '<i class="fa fa-check"></i> ' . $item->item_name . "</p>";
                                                        echo "<p class='made-element'>".$item_des->description."</p>";
                                                        echo "<hr>";
                                                    endif;
                                                    ?>
                                                </div>
                                            <?php endforeach; ?>
                                                
                                                <div class="clearfix"></div>
                                            <div class="form-group">
                                                <div class="col-6 pull-left">
                                                    Quantity  
                                                </div>
                                                <div class="col-6 pull-right">
                                                <select class="form-control"  name="Cart[qty]" >
                                                    <option value="1"> 01 </option>
                                                    <option value="2"> 02 </option>
                                                    <option value="3"> 03 </option>
                                                    <option value="4"> 04 </option>
                                                    <option value="5"> 05 </option>
                                                    <option value="6"> 06 </option>
                                                    <option value="7"> 07 </option>
                                                    <option value="8"> 08 </option>
                                                    <option value="9"> 09 </option>
                                                    <option value="10"> 10 </option>
                                                </select>
                                                </div>
                                            </div>
                                                
                                                 <div class="clearfix"></div>
                                                <hr/>
                                            <!-- <div class="form-group">
                                                <div class="col-6 pull-left">
                                                    Delivery Time  
                                                </div>
                                                <div class="col-6 pull-right">
                                                <select class="form-control"  name="Cart[deliveryTime]" >
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>11.00"> 11.00AM </option>
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>12.00"> 12.00PM </option>
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>01.00"> 01.00PM </option>
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>02.00"> 02.00PM </option>
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>03.00"> 03.00PM </option>
                                                </select>
                                                </div>
                                            </div> -->
                                                <div class="clearfix"></div>
                                                <hr/>
                                            <div class="package-price">
                                                <p>price: £<span id="package_price_show_<?php echo $inc; ?>"><?php echo number_format($package_price, 2); ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-add"> 
                                        <a href="#" class="add-to-cart-btn" data-id="<?php echo $inc; ?>">add to cart</a>
                                        
                                    </div>
                                </div> 
                                <input type="hidden" id="package_price_<?php echo $inc++; ?>" name="Cart[package_price]" value="<?php echo $package_price; ?>"/>
                                              <input type="hidden"   name="Cart[deliveryTime]" value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>11.00"/>
    
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<!--menu item list section start-->
<?php if (!empty($extra_packages)) : ?>
    <section class="package-section section-padding" id="package_section">
        <div class="overlay-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-12" style="margin-bottom: -25px;">
                    <div class="section-title text-center wow fadeInDown">
                        <h1>Extra Menu</h1>
                    </div>
                </div>
            </div>
            <div class="row">

            <?php
                $inc = 100;
                foreach ($extra_packages as $KEY=>$package) :
                    $package_price = $package->package_price;
                     

                    $avail_date = date("Ymd", strtotime("NOW"));
                    ?>
                    <div class="col-lg-4 col-sm-6" style="margin-top: 25px;">
                        <div class="package-item">
                            <form method="POST" action="<?php echo site_url('site/save_order_items'); ?>" id="package_add_form_<?php echo $inc; ?>">
                             <input type="hidden" name="Cart[id]" value="<?php echo $package->package_id; ?>"/> 
                                <input type="hidden" name="Cart[package_id]" value="<?php echo $package->package_id; ?>"/>
                                <input type="hidden" name="Cart[package_name]" value="<?php echo $package->package_name; ?>"/>
                                <div class="text-center wow fadeInLeft">
                                    <div class="day-title">
                                        <a href="<?php echo site_url('Site/package_details'); ?>?id=<?php echo $package->package_id; ?>">
                                            <h3>
                                                <?php echo $package->package_name; ?> <i class="fa fa-angle-right pl-2"></i>
                                            </h3>
                               
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                       
                                        <div class="brif">
                                            <?php echo "<p>" . $package->description . ' <span style="color: var(--theme-color); font-weight: 600;font-size: 16px">Approx Calories '. $package->calories.'</span>'."</p>" ?>
                                        </div>
                                        <hr>
                                        <div class="menu-list">
                                            <?php ?>
                                            <?php foreach ($package->items as $item): 
                                                $package_price += $item->extra_price;
                                                ?>
                                                <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][name]" value="<?php echo $item->item_name; ?>"/>
                                                <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][has_option]" value="<?php echo $item->has_option; ?>"/>
                                                <div class="item-common-style">
                                                <?php $item_des=$this->db->where('name',$item->item_name)->get('item')->row(); ?>
                                                    <?php if (strtoupper($item->has_option) == "YES"): ?>
                                                        
                                                            <div class="form-group">
                                                                    <?php 
                                                                    echo "<p class='col-6 pull-left'>" . '<i class="fa fa-square"></i> ' . $item->item_name . "</p>"; 
                                                                     ?>
                                                                
                                                                <!-- <i class='fa fa-square'></i> -->
                                                                <div class="col-6 pull-right">
                                                                <select class="form-control option_<?php echo $inc; ?>" required  name="Cart[package_items][<?php echo $item->item_id; ?>][option_name]" >
                                                                   <option value="">Select</option>
                                                                   <?php foreach($options[$item->item_id] as $option): ?>
                                                                        <option value="<?php echo $option->name; ?>"><?php echo $option->name; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        
                                                         <?php echo "<p class='made-element'>".$item_des->description."</p>";?>
                                                        <hr>
                                                        <?php
                                                    else:
                                                        
                                                        echo "<p>" . '<i class="fa fa-check"></i> ' . $item->item_name . "</p>";
                                                        echo "<p class='made-element'>".$item_des->description."</p>";
                                                        echo "<hr>";
                                                    endif;
                                                    ?>
                                                </div>
                                            <?php endforeach; ?>
                                                
                                                <div class="clearfix"></div>
                                            <div class="form-group">
                                                <div class="col-6 pull-left">
                                                    Quantity  
                                                </div>
                                                <div class="col-6 pull-right">
                                                <select class="form-control"  name="Cart[qty]" >
                                                    <option value="1"> 01 </option>
                                                    <option value="2"> 02 </option>
                                                    <option value="3"> 03 </option>
                                                    <option value="4"> 04 </option>
                                                    <option value="5"> 05 </option>
                                                    <option value="6"> 06 </option>
                                                    <option value="7"> 07 </option>
                                                    <option value="8"> 08 </option>
                                                    <option value="9"> 09 </option>
                                                    <option value="10"> 10 </option>
                                                </select>
                                                </div>
                                            </div>
                                                
                                                 <div class="clearfix"></div>
                                                <hr/>
                                            <!-- <div class="form-group">
                                                <div class="col-6 pull-left">
                                                    Delivery Time  
                                                </div>
                                                <div class="col-6 pull-right">
                                                <select class="form-control"  name="Cart[deliveryTime]" >
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>11.00"> 11.00AM </option>
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>12.00"> 12.00PM </option>
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>01.00"> 01.00PM </option>
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>02.00"> 02.00PM </option>
                                                    <option value="<?php echo  date("Y-m-d ", strtotime($KEY)); ?>03.00"> 03.00PM </option>
                                                </select>
                                                </div>
                                            </div> -->
                                                <div class="clearfix"></div>
                                                <hr/>
                                            <div class="package-price">
                                                <p>price: £<span id="package_price_show_<?php echo $inc; ?>"><?php echo number_format($package_price, 2); ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-add"> 
                                        <a href="#" class="add-to-cart-btn" data-id="<?php echo $inc; ?>">add to cart</a>
                                        
                                    </div>
                                </div> 
                                <input type="hidden" id="package_price_<?php echo $inc++; ?>" name="Cart[package_price]" value="<?php echo $package_price; ?>"/>
                                              <input type="hidden"   name="Cart[deliveryTime]" value="<?php echo  date("Y-m-d ", strtotime("NOW")); ?>11.00"/>
    
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<!--menu item list section end-->
<!--instruction section start-->
<section id="post_2_setion" class="instruction-section section-padding wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInLeft">
                    <h1 class="text-left"><?php echo $settings->second_title; ?></h1>
                </div>
                <div class="instruction-content wow fadeInRight">
                    <p><?php echo $settings->second_content; ?></p>
                   <!-- <div class="template-btn wow fadeInLeft">
                        <a href="#">learn more</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
<section id="contact_us_section" class="contact-us-section section-padding">
        <div class="overlay-bg"></div>
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
                                    <input required=""  type="text" class="form-control" name="f_name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-custom-style">
                                    <label for="l-name">Last Name</label>
                                    <input type="text" class="form-control" name="l_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input required="" type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea required="" class="form-control" name="message" rows="3"></textarea>
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

<script type="text/javascript">
    $(document).ready(function () {
        //mobile menu custom js
        $(".add-to-cart-btn").on("click", function (e) {
            e.preventDefault();
           
            var optionSelectedStatus = false;
            var data_id = $(this).attr("data-id");
          
            $(".option_"+data_id).each(function(index,el){
                if($(el).val() != "") {
                    optionSelectedStatus = true;
                }
            });
          
           if(optionSelectedStatus){
                $(".top_cart").html("Loading...");
            var data = $("#package_add_form_" + data_id).serialize();
            var url = $("#package_add_form_" + data_id).attr('action');
            $.post(url, data, function (resp) {

                $(".top_cart").html(resp);

            });
            
            }else{
                 swal("Warning","Please select option!","error");
               // alert("Please select option");
                //swal("Please select option");
            }
            
        });
        
/*     Smooth Scroll      */
         $("#nav li a, #buy_now").click(function (e) {
           e.preventDefault();
           var hash = this.hash;
           var position = $(hash).offset().top;
           $("html").animate({
               scrollTop: position - 100
           }, 800);
       });
    });

</script>

<!--food alergy section start-->
<section class="food-alergy-section section-padding wow fadeInUp" id="food_alergy_section">
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="section-title text-center wow fadeInLeft">
                    <h1 class="text-left">DOWNLOAD OUR MENU</h1>
                </div>
                <div class="instruction-content wow fadeInRight">
                    <a href="<?php echo base_url();?>/assets/menu.pdf" download="SPICE-GURU-MENU" class="btn btn-primary"><i class="fa fa-download"></i> CLICK HERE TO DOWNLOAD </a>
                </div>
            </div>
            
        <!--food alergy section start-->
            <section class="food-alergy-section section-padding wow fadeInUp" id="food_alergy_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="food-alergy-thumb text-left w-100 wow slideInLeft">
                                <img  style="box-shadow: 0 0 10px #999; border: 2px solid var(--theme-color);" src="<?php echo base_url();?>/assets/images/food_alergy_1.jpg" alt="">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
        <!--food alergy section end-->
            
        </div>
    </div>
    </div>
</section>
<!--food alergy section end-->
<section class="g-map-section">
    <div class="map-widget wow fadeInUp">
        <?php echo $settings->location; ?>
    </div>
</section>
