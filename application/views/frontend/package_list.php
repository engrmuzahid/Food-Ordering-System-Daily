
<!--menu item list section start-->
<?php if (!empty($packages)) : ?>
    <section class="package-section section-padding" id="package_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center wow fadeInDown">
                        <h1>our packages</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="menu-items owl-carousel">

                    <?php
                    $inc = 1;
                    foreach ($packages as $package) :
                        ?>
                        <form method="POST" action="<?php echo site_url('site/save_order_items'); ?>" id="package_add_form_<?php echo $inc; ?>">
                            <input type="hidden" name="Cart[id]" value="<?php echo $package->package_id; ?>_<?php echo date("Ymd",strtotime($package->available_date)); ?>"/>
                            <input type="hidden" name="Cart[package_id]" value="<?php echo $package->package_id; ?>"/>
                            <input type="hidden" name="Cart[package_name]" value="<?php echo $package->package_name; ?>"/>
                            <input type="hidden" name="Cart[package_price]" value="<?php echo $package->package_price; ?>"/>
                            <div class="single-item text-center wow fadeInLeft">
                                <div class="day-title">
                                    <h3><?php echo $package->package_name; ?></h3>
                                </div>
                                <div class="wrapper">
                                    <div class="package-price">
                                        <p>price: £<span><?php echo $package->package_price; ?></span></p>
                                    </div>
                                    <div class="brif">
                                        <?php echo "<p>" . $package->description . "</p>" ?>
                                        <a href="<?php echo site_url('Site/package_details'); ?>?id=<?php echo $package->package_id; ?>">details</a>
                                    </div>
                                    <div class="menu-list">
                                        <?php ?>
                                        <?php foreach ($package->items as $item): ?>
                                            <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][name]" value="<?php echo $item->item_name; ?>"/>
                                            <input type="hidden" name="Cart[package_items][<?php echo $item->item_id; ?>][has_option]" value="<?php echo $item->has_option; ?>"/>

                                            <div class="item-common-style">
                                                <?php if ($item->has_option == "YES"): ?>
                                                    <div class="item-common-style">
                                                        <div class="form-group">
                                                            <select class="form-control"  name="Cart[package_items][<?php echo $item->item_id; ?>][option]" >
                                                                <option value="<?php echo $item->item_id; ?>">Select <?php echo $item->item_name; ?></option>
                                                                <?php foreach ($options[$item->item_id] as $option): ?>
                                                                    <option value="<?php echo $option->id; ?>"><?php echo $option->name; ?></option>

                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div> 
                                                    </div> 
                                                    <?php
                                                else:
                                                    echo "<p>" . $item->item_name . "</p>";
                                                endif;
                                                ?>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="form-group">
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
                                </div>
                                <div class="cart-add"> 

                                    <a href="#" class="add-to-cart-btn" data-id="<?php echo $inc++; ?>">add to cart</a>
                                </div>
                            </div> 

                        </form>


                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!--menu item list section end-->

<script type="text/javascript">
    $(document).ready(function () {
        //mobile menu custom js
        $(".add-to-cart-btn").on("click", function (e) {
            e.preventDefault();
            var data_id = $(this).attr("data-id");
            var data = $("#package_add_form_" + data_id).serialize();
            var url = $("#package_add_form_" + data_id).attr('action');
            $.post(url, data, function (resp) {
                 
                $("#top_cart").html(resp);

            });
        });

    });

</script>


