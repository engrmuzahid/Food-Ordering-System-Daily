<style>
    @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "SL NO."; }
	td:nth-of-type(2):before { content: "PACKAGE"; }
	td:nth-of-type(3):before { content: "QTY"; }
	td:nth-of-type(4):before { content: "PRICE"; }
	td:nth-of-type(5):before { content: "SUB TOTAL"; }
	td:nth-of-type(6):before { content: "ACTION"; } 
}
    
</style>
<?php 
    $total=0;
    $total_item=0;
    $shipping_cost=0;
    $product_tax=0;
 ?>
<!-- cart view start-->
<section class="cart-view-section section-padding">
    <div class="container">
        <?php if($this->session->flashdata('message')){?>
            <p class="alert alert-danger col-md-12">
                <?php echo $this->session->flashdata('message'); ?>
            </p>
    <?php }else if($this->session->flashdata('success_message')){?>
            <img style="width: 18%; margin-left: auto;
                margin-right: auto; display: block;" src=" <?php echo base_url(); ?>/assets/images/success.png"><br><br>
            <p style="text-align: center;" class="alert alert-success col-md-12">
                <?php echo $this->session->flashdata('success_message');?>
            </p>
    <?php exit(); }  ?>   
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="cart-item-details table-responsive">
                    <table class="table table-bordered text-center" style="text-transform: capitalize">
                        <thead style="background: var(--theme-color);color: #ffffff;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">package name</th>
                            <th scope="col">items</th>
                            <th scope="col">price</th>
                            <th scope="col">sub total</th>
                            <th scope="col">Dismiss</th>
                        </tr>
                        </thead>
                        <tbody>
                 <!-------------- PHP code ----------------->
                        <?php 
                            if(null!==$this->session->userdata('cart')){
                                $cart = array_values(unserialize($this->session->userdata('cart')));
                              //  $cart1=$cart;
                                for ($i = 0; $i < count($cart); $i ++) {
                                    echo "<pre>";
                                   // print_r($cart[$i]);
                                    echo "</pre>";
                                    //exit();
                                    $package_id=$cart[$i]['package_id'];
                                    $package_name=$cart[$i]['package_name'];
                                    $package_price=$cart[$i]['package_price'];
                                    $qty=$cart[$i]['qty'];
                                    $total_item+=$qty;
                        ?>

                        <tr>
                            <td><?php echo ($i+1); ?></td>
                            <td>
                                <div data-toggle="collapse" data-target="#<?php echo $package_name; ?>">
                                    <p style="cursor:pointer;margin-bottom: 0;"><?php echo $package_name; ?></p>
                                    <div id="<?php echo $package_name; ?>" class="collapse selected-package-items">
                                       <!-- <ul>
                                            <li>rice</li>
                                            <li>fried rice</li>
                                            <li>egg</li>
                                            <li>vegetable</li>
                                            <li>fish</li>
                                            <li>beef</li>
                                        </ul>-->
                                    </div>
                                </div>
                            </td>
                            <td> <?php echo $qty; ?>   </td>
                            <td><?php echo "£".number_format($package_price, 2); ?></td>
                            <td><?php $total+=($qty*$package_price); echo "£".number_format($qty*$package_price, 2); ?></td>
                           <td><a href="<?php echo base_url('Site/remove_order_items/'.$cart[$i]['id']); ?>"><i class="fa fa-trash"></i></td>
                        </tr>

                        <?php  }}?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cart-totals">
                    <div class="section-header text-center">
                        <h3 class="text-uppercase"><i class="fa fa-shopping-cart"> cart totals</i></h3>
                    </div>
                    <ul class="cart">
                        <li>total items<span><?php echo $total_item ?></span></li>
                        <li>total Amount<span>£<?php echo number_format($total, 2); ?> </span></li>
                      <!--  <li>Shipping cost<span>£0.00</span></li> 
                        <li>product tax<span>£0.00</span></li>-->
                        <li>grand total<span>£<?php echo number_format($total+$shipping_cost+$product_tax, 2); ?></span></li>
                    </ul>
                     <div class="cart-add checkout-btn text-center">
                        <a href="<?php echo base_url('site/checkout'); ?>">checkout</a>
                    </div>
                    <!--<div class="alergy_alert text-center">-->
                    <!--     <a href="<?php echo base_url('Site/alergyalert') ?>">Alergy Alert</a>-->
                    <!--</div>-->
                    <!--<ul class="footer-menu" ">-->
                    <!--    <li ><a style="color: black;text-align: center;background:var(--theme-color)" href="<?php echo base_url('Site/alergyalert') ?>">Alergy Alert</a></li>-->
                    <!--</ul>-->
                    
                    </div>
                    
                    <br>
                    <div style="padding:10px;text-align: justify;background: burlywood;">
                        <h3 style="    text-align: center;text-transform: uppercase;"> Allergy Alert </h3>
                        <hr/>
                        <?php echo $settings->alergy_alert ?>
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
</section>
<!-- cart view end-->
