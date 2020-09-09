
<!--hero section start-->
<section class="hero-section">
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
                                        <a href="<?php echo $slider[$i]->action_link; ?>">details</a>
                                    </div>
                                    <div class="buy-btn">
                                        <a href="<?php echo $slider[$i]->action_link; ?>">buy now</a>
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
<!--menu item list section start-->
<?php if (!empty($packages)) : ?>
    <section class="package-section section-padding" id="package_section">
        <div class="overlay-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center wow fadeInDown">
                        <h1>our packages</h1>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                $inc = 1;
                foreach ($packages as $package) :
                    $package_price = $package->package_price;
                    ?>


                    <div class="col-4">
                        <div class="package-item">
                            <form method="POST" action="<?php echo site_url('site/save_order_items'); ?>" id="package_add_form_<?php echo $inc; ?>">
                                <input type="hidden" name="Cart[id]" value="<?php echo $package->package_id; ?>_<?php echo date("Ymd", strtotime($package->available_date)); ?>"/>
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
                                            <?php echo "<p>" . $package->description . "</p>" ?>
                                        </div>
                                        <div class="menu-list">
                                            <?php ?>
                                            <?php foreach ($package->items as $item): 
                                                $package_price += $item->extra_price;
                                                
                                                ?>
                                            
                                                <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][name]" value="<?php echo $item->item_name; ?>"/>
                                                <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][has_option]" value="<?php echo $item->has_option; ?>"/>
    
                                                <div class="item-common-style">
                                                    <?php if (strtoupper($item->has_option) == "YES"): ?>
                                                        <div class="item-common-style">
                                                            <div class="form-group">
                                                                <p class="option-label"><?php echo $item->item_name; ?></p>
                                                                <i class='fa fa-square'></i><select class="form-control"  name="Cart[package_items][<?php echo $item->item_id; ?>][option]" >
                                                                   <option value="<?php echo $item->item_id; ?>">Select</option>
                                                                    <?php foreach ($options[$item->item_id] as $option): ?>
                                                                        <option value="<?php echo $option->id; ?>"><?php echo $option->name; ?></option>
    
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        <?php
                                                    else:

                                                        echo "<p>" . '<i class="fa fa-check"></i> ' . $item->item_name . "</p>";
                                                    endif;
                                                    ?>
                                                </div>
                                            <?php endforeach; ?>
                                                
                                                <div class="clearfix"></div>
                                                <hr/>
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
                                            <div class="package-price">
                                                <p>price: £<span id="package_price_show_<?php echo $inc; ?>"><?php echo $package_price; ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-add"> 
    
                                        <a href="#" class="add-to-cart-btn" data-id="<?php echo $inc; ?>">add to cart</a>
                                    </div>
                                </div> 
                                <input type="hidden" id="package_price_<?php echo $inc++; ?>" name="Cart[package_price]" value="<?php echo $package_price; ?>"/>
    
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
<section class="instruction-section section-padding wow fadeInUp">
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
<!--instruction section end-->
<!---------------------contact us section start ---------------------------------->
<section class="contact-us-section section-padding">
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

<script type="text/javascript">
    $(document).ready(function () {
        //mobile menu custom js
        $(".add-to-cart-btn").on("click", function (e) {
            e.preventDefault();
            $("#top_cart").html("Loading...");

            var data_id = $(this).attr("data-id");
            var data = $("#package_add_form_" + data_id).serialize();
            var url = $("#package_add_form_" + data_id).attr('action');
            $.post(url, data, function (resp) {

                $("#top_cart").html(resp);

            });
        });

    });

</script>
<section class="g-map-section">
    <div class="map-widget wow fadeInUp">
        <?php echo $settings->location; ?>
    </div>
</section>



<!--hero section start-->
<section class="hero-section">
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
                                        <a href="<?php echo $slider[$i]->action_link; ?>">details</a>
                                    </div>
                                    <div class="buy-btn">
                                        <a href="<?php echo $slider[$i]->action_link; ?>">buy now</a>
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

<!--menu item list section start-->
    <section class="package-section section-padding" id="package_section">
        <div class="overlay-bg"></div>
        <div class="container">
            <div class="row" style="margin-bottom: -35px;">
                <div class="col-12">
                    <div class="section-title text-center wow fadeInDown">
                        <h1>our packages</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $count=0; 
                foreach ($packages as $row): 
                    $count++;
                    if($count>6) break;
                    ?>
                    <div class="col-4" style="margin-top: 35px;">
                        <div class="package-item">
                            <form method="POST" action="#" id="package">
                                <div class="text-center wow fadeInLeft">
                                    <div class="day-title">
                                        <a href="#">
                                            <h3>
                                                <?php echo $row->package_name; ?><i class="fa fa-angle-right pl-2"></i>
                                            </h3>
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <div class="brif">
                                           <p> <?php echo $row->description; ?></p>
                                        </div>
                                        <div class="menu-list">
                                                <?php foreach ( $row->items as $item) :?>
                                                        <div class="item-common-style">
                                                            <?php if(strtoupper($item->has_option)=="YES"): ?>
                                                            <div class="form-group">
                                                                    <?php 
                                                                    echo "<p class='col-6 pull-left'>" . '<i class="fa fa-square"></i> ' . $item->item_name . "</p>"; 
                                                                     ?>
                                                                
                                                                <!-- <i class='fa fa-square'></i> -->
                                                                <div class="col-6 pull-right">
                                                                <select class="form-control"  name="" >
                                                                   <option value="">Select</option>
                                                                   <?php foreach($options[$item->item_id] as $option): ?>
                                                                        <option value="Option Name"><?php echo $option->name; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                            <?php
                                                             else:
                                                        echo "<p>" . '<i class="fa fa-check"></i> ' . $item->item_name . "</p>"; 
                                                        endif;
                                                             ?>
                                                        </div> 
                                                <?php endforeach ?>
                                                <div class="clearfix"></div>
                                                <hr/>
                                            <div class="form-group">
                                                <div class="col-6 pull-left">
                                                    Quantity  
                                                </div>
                                                <div class="col-6 pull-right">
                                                <select class="form-control" id="<?php echo $row->package_id; ?>"  name="quantity" >
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
                                            <div class="package-price">
                                                <p>price: £<span id="package_price_show_99"><?php echo $row->package_price; ?></span></p>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="cart-add"> 
                                        <a href="#" name="add-cart" data-name="<?php echo $row->package_name;?>" data-price="<?php $row->package_price; ?>" data-id="<?php echo $row->package_id; ?>"  class="add-to-cart-btn" data-id="">add to cart</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

<!--menu item list section end-->
<!--instruction section start-->
<section class="instruction-section section-padding wow fadeInUp">
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
<!--instruction section end-->
<!---------------------contact us section start ---------------------------------->
<section class="contact-us-section section-padding">
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

<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart-btn').click(function(){
            var id = $(this).data("id");
            var name = $(this).data("name");
            var price = $(this).data("price");
            var quantity =$('#'+id).val();
            if(quantity!=''&&quantity>0){
                $.ajax({
                    url: "<?php echo base_url();?>Site/add_to_cart",
                    method: "POST",
                    data: {id:id, name:name, price:price, quantity:quantity},
                    success:function(data){
                        alert("Product Added into Cart");
                        $('#top_cart').html(data);
                    }
                });
            }
        });
    });

</script>
<section class="g-map-section">
    <div class="map-widget wow fadeInUp">
        <?php echo $settings->location; ?>
    </div>
</section>


