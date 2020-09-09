<!--package details section start-->
<section class="package-details-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="<?php echo site_url('site/save_order_items'); ?>" id="package_add_form">
                    <?php
                    $avail_date = date("d M Y", strtotime("NOW")); ?>
                    <input type="hidden" name="Cart[id]" value="<?php echo $packages->package_id; ?>_<?php echo date("Ymd", strtotime($avail_date)); ?>"/>
                    <input type="hidden" name="Cart[package_id]" value="<?php echo $packages->package_id; ?>"/>
                    <input type="hidden" name="Cart[package_name]" value="<?php echo $packages->package_name; ?>"/>
              <input type="hidden"   name="Cart[deliveryTime]" value="<?php echo  date("Y-m-d ", strtotime("next ".$packages->default_day)); ?>11.00"/>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="package-tumbnail owl-carousel" style="display: block;
">
                            
                            <div class="single-package-item">
                                <!--<a href="#"><img src="<?php echo base_url();?>assets/images/<?php echo $packages->logo_url;?>" alt="No Image"></a>-->
                                <?php if(!empty($packages->logo_url)) {  ?>
                                <a href="#"><img src="<?php echo base_url();?>assets/images/<?php echo $packages->logo_url;?>" alt=""></a>
                                <?php } else { ?>
                                    <a href="#"><img src="<?php echo base_url();?>assets/images/bengali.jpg?>" alt=""></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div id="quantity">
                            
                        </div>
                        <div class="item-counter mt-4">
                                <div class="minus">
                                    <i class="fa fa-minus"  onclick="reduceValue()"></i>
                                </div>
                                <div class="number-show">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Cart[qty]" id="item_count" value="1">
                                    </div>

                                </div>
                                 <div class="plus">
                                    <i class="fa fa-plus" onclick="increaseValue()"></i>
                                </div>
                               <!--  <div class="form-group">
                                    <select class="form-control"  name="Cart[deliveryTime]" >
                                        <option value="<?php echo  date("Y-m-d ", strtotime("next ".$packages->default_day)); ?>11.00"> 11.00AM </option>
                                        <option value="<?php echo  date("Y-m-d ", strtotime("next ".$packages->default_day)); ?>12.00"> 12.00PM </option>
                                        <option value="<?php echo  date("Y-m-d ", strtotime("next ".$packages->default_day)); ?>01.00"> 01.00PM </option>
                                        <option value="<?php echo  date("Y-m-d ", strtotime("next ".$packages->default_day)); ?>02.00"> 02.00PM </option>
                                        <option value="<?php echo  date("Y-m-d ", strtotime("next ".$packages->default_day)); ?>03.00"> 03.00PM </option>
                                    </select>
                                </div> -->

                        </div>
                        <?php echo "<p>" . $packages->description . ' <span style="color: var(--theme-color); font-weight: 600;font-size: 16px">Approx Calories '. $packages->calories.'</span>'."</p>" ?>
                        <!-- <h3>  <?php echo  $packages->description ?></h3> -->
                        <div class="cart-add text-center">
                                <a href="#" id="add-to-cart-btn">add to cart</a>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details-table">
                            <div class="text-center wow fadeInLeft" style="visibility: visible; background: #fff; box-shadow: 0 0 5px #333">
                                <div class="day-title">
                                    <h3><?php echo $packages->package_name; ?></h3>
                                     <span style="float: middle;margin: -33px 7px 0 0;color: var(--secondary-color);"><?php echo  date("d M Y", strtotime("next ".$packages->default_day)); ?></span>
                               
                                </div>
                                <div class="wrapper">

                              <?php
                              $package_price = $packages->package_price;
                              foreach($packages->items as $item):
                                  $package_price += $item->extra_price;
                                  ?>
                                  <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][name]" value="<?php echo $item->item_name; ?>"/>
                                  <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][has_option]" value="<?php echo $item->has_option; ?>"/>
                                  <?php $item_des=$this->db->where('name',$item->item_name)->get('item')->row(); ?>
                                  <?php if(strtoupper($item->has_option)!="YES"): ?>
                                        <div class="item-common-style">
                                            <p><i class="fa fa-check"></i><?php echo $item->item_name; ?></p>
                                         <?php echo "<p class='made-element'>".$item_des->description."</p>";?>
                                         </div>
                                    <?php else: ?>
                                        <div class="item-common-style">
                                            <div class="form-group">
                                                <p class="col-6 pull-left"><i class="fa fa-square"></i><?php echo $item->item_name; ?></p>
                                                <div class="col-6 pull-right">
                                                    <select class="form-control" name="Cart[package_items][<?php echo $item->item_id; ?>][option_name]">
                                                        <option value="">Select</option>
                                                <?php  foreach($options[$item->item_id] as $option):?>
                                                        <option value="Option Name"><?php echo $option->name; ?></option>
                                                <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <?php echo "<p class='made-element'>".$item_des->description."</p>";?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="package-price">
                                            <p>price: £<span><?php echo number_format($package_price, 2); ?></span></p>
                                            <input type="hidden" name="Cart[package_price]" value="<?php echo $package_price; ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>          
                        </div>
                    </div>
                </form>
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
    </div>
</section>


<script type="text/javascript">
    $(document).ready(function () {
        //mobile menu custom js
        $("#add-to-cart-btn").on("click", function (e) {
            e.preventDefault();
            $(".top_cart").html("Loading...");

            var data = $("#package_add_form").serialize();
            var url = $("#package_add_form").attr('action');
            $.post(url, data, function (resp) {

                $(".top_cart").html(resp);

            });
        });

    });
    function increaseValue()
        {
            var value = parseInt(document.getElementById('item_count').value, 10);
            value = isNaN(value) ? 1 : value;
            value = value + 1;
            document.getElementById('item_count').value = value;
        }
    function reduceValue()
        {
            var value = parseInt(document.getElementById('item_count').value, 10);
            value = isNaN(value) ? 1 : value;
            if(value>1)
                value = value - 1;
            else 
               $('#quantity').html(' <div class="alert alert-danger">Quantity at least 1!</div>');
            document.getElementById('item_count').value = value;
        }
</script>
<!--package details section end-->
