<!--hero section start-->
<section class="hero-section">
    <div class="slider owl-carousel" id="hero-slider">
        <div class="single-slide-item hero-bg-1">
            <div class="overlay-bg"></div>
            <div class="hero-content">
                <div class="hero-cont-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <h1>Lorem ipsum dolor sit amet.</h1>
                                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto fugit minima
                                    quo sint temporibus. Expedita in minima neque rerum temporibus.</h3>
                                <div class="view-btn">
                                    <a href="#">details</a>
                                </div>
                                <div class="buy-btn">
                                    <a href="#">buy now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide-item hero-bg-2">
            <div class="overlay-bg"></div>
            <div class="hero-content">
                <div class="hero-cont-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <h1>Lorem ipsum dolor sit amet.</h1>
                                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto fugit minima
                                    quo sint temporibus. Expedita in minima neque rerum temporibus.</h3>
                                <div class="view-btn">
                                    <a href="#">details</a>
                                </div>
                                <div class="buy-btn">
                                    <a href="#">buy now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide-item hero-bg-3">
            <div class="overlay-bg"></div>
            <div class="hero-content">
                <div class="hero-cont-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <h1>Lorem ipsum dolor sit amet.</h1>
                                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto fugit minima
                                    quo sint temporibus. Expedita in minima neque rerum temporibus.</h3>
                                <div class="view-btn">
                                    <a href="#">details</a>
                                </div>
                                <div class="buy-btn">
                                    <a href="#">buy now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--hero section end-->
<!--menu item list section start-->
<?php if($packages) : ?>
<section class="package-section section-padding">
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
                <?php foreach($packages->result() as $row) :?>
                <div class="single-item text-center wow fadeInLeft">
                    <div class="day-title">
                        <h3><?php echo $row->package_name; ?></h3>
                    </div>
                    <div class="wrapper">
                        <div class="package-price">
                            <p>price: £<span><?php echo $row->package_price; ?></span></p>
                        </div>
                        <div class="brif">
                            <?php echo "<p>".$row->description."</p>" ?>
                            <a href="#">details</a>
                        </div>
                        <div class="menu-list">
                            <?php  ?>
                            <?php foreach($items->result() as $row2): ?>
                            <div class="item-common-style">
                                <?php
                                    if($row->package_id==$row2->package_id){
                                        if($row2->has_option=="YES"){ ?>
                                            <div class="item-common-style">
                                                <form>
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option>Select <?php echo $row2->item_name; ?></option>
                                                             <?php foreach($item_option->result() as $row3){
                                                                    if($row2->item_id==$row3->item_id)
                                                                    echo "<option>".$row3->name."</option>";
                                                             } ?>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div> 
                                         <?php }else{
                                            echo "<p>".$row2->item_name."</p>";
                                        }
                                    }
                                 ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="cart-add">
                        <?php $id=9; ?>
                        <a href="<?php echo base_url('Site/cart?id=$id'); ?>">add to cart</a>
                    </div>
                </div>
            <?php endforeach; ?>




            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!--menu item list section end-->
<!--about us section start-->
<section class="about-us-section section-padding wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="about-us-thumb text-left w-100 wow slideInLeft">
                    <img src="assets/frontend/images/Depositphotos_22928632_m-2015.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6 col-sm-12 wow slideInRight">
                <div class="about-content">
                    <div class="section-title text-left">
                        <h1>About us</h1>
                    </div>
                    <p>We understand that your to-do list is endless and that’s why we’re here to take away the hassle
                        and sort out those super-boring but really necessary tasks, like managing your business
                        utilities.</p>
                    <p>We’ll find the right deal for your business and switch you over with zero fuss. We’ll then manage
                        your account for you. Simple! Try our online business utility comparison to find out if you
                        could save.
                    <div class="template-btn wow fadeInUp">
                        <a href="#">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--about us section end-->
<!--instruction section start-->
<section class="instruction-section section-padding wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInLeft">
                    <h1 class="text-left">How to Order online</h1>
                </div>
                <div class="instruction-content wow fadeInRight">
                    <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta dolor eos, ex
                        facere fugit in, iure molestiae molestias nam nihil non nostrum omnis, praesentium quis quod
                        ratione sed tempora?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta dolor
                        eos, ex facere fugit in, iure molestiae molestias nam nihil non nostrum omnis, praesentium quis
                        quod ratione sed tempora?</p>
                    <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt earum et ex illum
                        labore quas repudiandae sapiente sunt veniam veritatis. Deserunt earum et ex illum labore quas
                        repudiandae sapiente sunt veniam veritatis.</p>
                    <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, reiciendis?</p>
                    <div class="template-btn wow fadeInLeft">
                        <a href="#">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--instruction section end-->
<!--contact us section start-->
<section class="contact-us-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="contact-form wow fadeInUp">
                    <form>
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
                                    <input type="text" class="form-control" id="f-name" placeholder="Ex: John">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-custom-style">
                                    <label for="l-name">Last Name</label>
                                    <input type="text" class="form-control" id="l-name" placeholder="Ex: Doe">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email"
                                           placeholder="Ex: example@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea class="form-control" id="message" rows="3"
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
<!--contact us section end-->
<!--google map section start-->
<section class="g-map-section">
    <div class="map-widget wow fadeInUp">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2294.230879727785!2d-1.40005123593961!3d54.898869777953394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487e64286c095bb1%3A0x4467a47da613a882!2s41+Eden+House+Rd%2C+Sunderland+SR4+7LB!5e0!3m2!1sen!2suk!4v1548613313131"></iframe>
    </div>
</section>
<!--google map section end-->