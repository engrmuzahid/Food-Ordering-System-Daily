<style type="text/css">

    #frmStripePayment {

        padding: 25px;
        border: #D0D0D0 1px solid;
        border-radius: 4px;
    }

    .test-data {
        margin-top: 40px;
    }

    .tutorial-table {
        border: #D0D0D0 1px solid;
        font-size: 0.8em;
        color: #4e4e4e;
    }

    .tutorial-table th {
        background: #efefef;
        padding: 12px;
        border-bottom: #e0e0e0 1px solid;
        text-align: left;
    }

    .tutorial-table td {
        padding: 12px;
        border-bottom: #D0D0D0 1px solid;
    }

    #frmStripePayment .field-row {
        margin-bottom: 20px;
    }

    #frmStripePayment div label {
        margin: 5px 0px 0px 5px;
        color: #49615d;
        width: auto;
    }

    .demoInputBox {
        padding: 10px;
        border: #d0d0d0 1px solid;
        border-radius: 4px;
        background-color: #FFF;
        width: 100%;
        margin-top: 5px;
        box-sizing: border-box;
    }

    .demoSelectBox {
        padding: 10px;
        border: #d0d0d0 1px solid;
        border-radius: 4px;
        background-color: #FFF;
        margin-top: 5px;
    }

    select.demoSelectBox {
        height: 40px;
        margin-right: 10px;
    }

    .error {
        background-color: #FF6600;
        padding: 8px 10px;
        border-radius: 4px;
        font-size: 0.9em;
    }

    .success {
        background-color: #c3c791;
        padding: 8px 10px;
        border-radius: 4px;
        font-size: 0.9em;
    }

    .info {
        font-size: .8em;
        color: #FF6600;
        letter-spacing: 2px;
        padding-left: 5px;
    }

    .btnAction {
        background-color: #586ada;
        padding: .5rem 2rem;
        color: #FFF;
        border: #5263cc 1px solid;
        border-radius: 4px;
        cursor: pointer;
    }

    .btnAction:focus {
        outline: none;
    }

    .column-right {
        margin-right: 6px;
    }

    .contact-row {
        display: inline-block;
    }

    .cvv-input {
        width: 60px;
    }

    #error-message {
        margin: 0px 0px 10px 0px;
        padding: 5px 25px;
        border-radius: 4px;
        line-height: 25px;
        font-size: 0.9em;
        color: #ca3e3e;
        border: #ca3e3e 1px solid;
        display: none;
        width: 300px;
    }

    #success-message {
        margin: 0px 0px 10px 0px;
        padding: 5px 25px;
        border-radius: 4px;
        line-height: 25px;
        font-size: 0.9em;
        color: #3da55d;
        border: #43b567 1px solid;
        width: 300px;
    }

    .display-none {
        display: none;
    }

    #response-container {
        padding: 40px 20px;
        width: 270px;
        text-align: center;
    }


    .ack-message {
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    #response-container.success {
        border-top: #b0dad3 2px solid;
        background: #e9fdfa;
    }

    #response-container.error {
        border-top: #c3b4b4 2px solid;
        background: #f5e3e3;
    }

    .img-response {
        margin-bottom: 30px;
    }

    #loader {
        display: none;
    }

    #loader img {
        width: 45px;
        vertical-align: middle;
    }
    .input_error
    {
        border: 2px solid red !important;
    }

</style>


<?php
$total = 0;
$total_item = 0;
$shipping_cost = 0;
$product_tax = 0;
?>
<?php
if (null !== $this->session->userdata('cart')) {
    $cart = array_values(unserialize($this->session->userdata('cart')));
    for ($i = 0; $i < count($cart); $i++) {
        $package_id = $cart[$i]['package_id'];
        $package_name = $cart[$i]['package_name'];
        $package_price = $cart[$i]['package_price'];
        $qty = $cart[$i]['qty'];
        $total_item += $qty;
        $total += ($qty * $package_price);
    }
}
?>
<section class="checkout-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout-form" style="border: 1px solid #ddd; padding: 10px;">
                    <form action="<?php echo base_url('site/checkout_process'); ?>" method="post" id="checkout_from">
                        <input type="hidden" name="total_amount"
                               value="<?php echo $total + $shipping_cost + $product_tax; ?>">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-center">
                                    <h1> checkout </h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-custom-style">
                                    <label for="f_name">First Name *</label>
                                    <input type="text" class="form-control" name="f_name" id="f_name" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- <div class="form-group form-custom-style">
                                    <label for="l_name">Last Name</label>
                                    <input type="text" class="form-control" name="l_name" id="l_name"
                                           placeholder="eg: Doe">
                                </div> -->
                                <div class="form-group form-custom-style">
                                    <label for="phone">Phone Number *</label>
                                    <input type="text" class="form-control" name="phone" id="phone" required="">
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useremail">Email Address *</label>
                                    <input type="email" class="form-control" id="useremail"  name="email" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="house">House *</label>
                                    <input type="text" class="form-control text_required" id="house" name="house" required="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group form-custom-style">
                                    <label for="street">Street *</label>
                                    <input type="text" class="form-control text_required" name="street" id="street"  required="">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group form-custom-style">
                                    <label for="postcode">Postcode *</label>
                                    <input type="text" class="form-control" name="postcode" id="postcode"  required="">
                                <span id="postcodeError"> </span>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                 
                         <div class="col-md-12">
                                <div class="form-group form-custom-style">
                                    <label for="phone">Leave a note for the order</label>
                                    <textarea class="form-control" name="comments"       style="min-height: 120px;"></textarea>
                                </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5><strong>Payment Method *</strong></h5>
                                <hr>

                                <!-- Default inline 1-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="stripe" value="stripe" name="payment_method">
                                    <label class="custom-control-label" for="stripe"><i
                                                class="fa fa-credit-card-alt margin-right-md"></i> Card Payment </label>
                                </div>

                                <!-- Default inline 2-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="cash" value="cash" name="payment_method"
                                           checked>
                                    <label class="custom-control-label" for="cash"><i
                                                class="fa fa-money margin-right-md"></i> Cash On Delivery </label>
                                </div>

                            </div>
                            <div class="col-12">
                                <div id="error-message-div"></div>
                                <div class="clearfix"></div>
                                <div class="submit-section">
                                    <button type="submit" class="submit-btn" id="submitBtn">place order</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                        <!---<li>Shipping cost<span>£0.00</span></li>
                        <li>product tax<span>£0.00</span></li>-->
                        <li>grand
                            total<span>£<?php echo number_format($total + $shipping_cost + $product_tax, 2); ?></span>
                        </li>
                    </ul>
                  
                </div>
                   <br>
                    <div style="padding:10px;text-align: justify;background: burlywood;">
                        <h3 style="    text-align: center;text-transform: uppercase;"> Allergy Alert </h3>
                        <hr/>
                        <?php echo $settings->alergy_alert ?>
                    </div> 
            </div>

            <div id="stripeModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 style="border-bottom: 5px solid green;text-align: center;" class="modal-title">CARD
                                PAYMENT</h1>
                        </div>
                        <form id="frmStripePayment" action="<?php echo base_url('site/checkout_with_stripe'); ?>"
                              method="post">
                            <div class="modal-body">
                                <div class="field-row">
                                    <label>Card Holder Name</label> <span
                                            id="card-holder-name-info" class="info"></span><br>
                                    <input type="text" id="name" name="name"
                                           class="demoInputBox" required>
                                </div>
                                <div class="field-row">
                                    <label>Email</label> <span id="email-info" class="info"></span><br>
                                    <input type="email"  id="email" name="email"  class="demoInputBox" required>
                                            <div id="error-email"></div>

                                </div>
                                <div class="field-row">
                                    <label>Card Number</label> <span
                                            id="card-number-info" class="info"></span><br> <input
                                            type="text" id="card-number" name="card-number"
                                            class="demoInputBox" required>
                                </div>
                                <div class="field-row">
                                    <div class="contact-row column-right">
                                        <label>Expiry Month / Year</label> <span
                                                id="userEmail-info" class="info"></span><br>
                                        <select name="month" id="month"
                                                class="demoSelectBox">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option> 
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            </select> <select name="year" id="year" class="demoSelectBox">
                                                <option value="19">2019</option>
                                                <option value="20">2020</option>
                                                <option value="21">2021</option>
                                                <option value="22">2022</option>
                                                <option value="23">2023</option>
                                                <option value="24">2024</option>
                                                <option value="25">2025</option>
                                                <option value="26">2026</option>
                                                <option value="27">2027</option>
                                                <option value="28">2028</option>
                                                <option value="29">2029</option>
                                                <option value="30">2030</option>
                                            </select>
                                    </div>
                                    <div class="contact-row cvv-box">
                                        <label>CVC</label> <span id="cvv-info" class="info"></span><br> <input type="text"
                                                            name="cvc" id="cvc" class="demoInputBox cvv-input">
                                    </div>
                                </div>
                                <div>
                                    <div id="loader">
                                        <img alt="loader" src="<?php echo base_url(); ?>assets/images/LoaderIcon.gif">
                                    </div>
                                </div>
                                <input type='hidden' name='amount'
                                       value='<?php echo $total + $shipping_cost + $product_tax; ?>'> <input
                                        type='hidden' name='currency_code' value='GBP'> <input
                                        type='hidden' name='item_name' value='Delivary order'>
                                <input type='hidden' name='item_number'
                                       value='PHPPOTEG#1'>
                                <?php if (!empty($successMessage)) { ?>
                                    <div id="success-message"><?php echo $successMessage; ?></div>
                                <?php } ?>
                                <div id="error-email"></div>
                                <div id="error-message"></div>
                            </div>
                            <div class="modal-footer" style="float: left;">
                                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>

                                <input type="submit" name="pay_now"
                                       value="&pound;<?php echo number_format($total + $shipping_cost + $product_tax, 2); ?> to Pay"
                                       id="StripeSubmitBtn" class="btnAction">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
 var postcodeArea = ['sr1','sr2','sr3','sr4','sr5','sr6']
 

function postcodeAreaSearch(item) {
    var address = $('#postcode').val(); 
    console.log(item);  
    
    var returnValue = false;
  if(address.substring(0, 3).toLowerCase() == item){
    console.log("item "+ address.substring(0, 3));  
    console.log("item "+ item);  
    returnValue = true;
  }
  return returnValue;
}
 function checkPostcode() {

   return postcodeArea.find(postcodeAreaSearch); 
}
     
    function fromValidation() {
        var valid = true;
        var valid1 = true;
        var fname = $('#f_name').val();
        var lname = $('#l_name').val();
        var email = $('#useremail').val();
        var phone = $('#phone').val();
        var address = $('#postcode').val();
        $("#error-message-div").html("").hide();
        $("#error-email-div").html("").hide();

        if (fname.trim() == "") {
            valid = false;
            $('#f_name').addClass('input_error');
            
        } else {
            $('#f_name').removeClass('input_error');
        }
        if (email.trim() == "") 
        {
            valid = false;
            $('#useremail').addClass('input_error');
        } 
        else 
        {
            $('#useremail').removeClass('input_error');
            if(IsEmail(email)==false)
            {
                valid1=false;
                // alert('das');
            }
        }
        
        if (phone.trim() == "") {
            valid = false;
            $('#phone').addClass('input_error');
        } else {
            $('#phone').removeClass('input_error');
        }

        if (address.trim() == "") 
        {
            valid = false;
            $('#postcode').addClass('input_error');
        } else {

         if (!checkPostcode()) 
        {
            valid = false;
            $('#postcode').addClass('input_error');
            $('#postcodeError').html("Postcode Invalid."); 

        }else{
            $('#postcode').removeClass('input_error');
            $('#postcodeError').html(""); 
        }
         
        }
      
        $(".text_required" ).each(function( index ) {

            if ($(this).val().trim() == "") {
                valid = false;
                $(this).addClass('input_error');
            } else {
                $(this).removeClass('input_error');
            }
           // console.log(index + ": " + $(this).text());

        });

        if (valid == false) {
            $("#error-message-div").html("<p  class='alert alert-danger'> All Fields are required </p>").show();
        }

        return valid;
    }
    function emailvalidation() {
        var valid = true;
        var email = $('#useremail').val();
        $("#error-message-div").html("").hide();
        if (email.trim() == "") 
        {
            valid = false;
            $('#useremail').addClass('input_error');
        } 
        else 
        {
            $('#useremail').removeClass('input_error');
            if(IsEmail(email)==false)
            {
                valid=false;
                $('#useremail').addClass('input_error');
            }
        }
        if (valid == false) {
            $("#error-message-div").html("<p  class='alert alert-danger'>Email Invalid</p>").show();
        }

        return valid;
    }
    function numbervalidation()
    {
        var valid = true;
        var phone = $('#phone').val();
        $("#error-message-div").html("").hide();
        if (phone.trim() == "") 
        {
            valid = false;
            $('#phone').addClass('input_error');
        } 
        else 
        {
            $('#phone').removeClass('input_error');
            if(IsNumber(phone)==false)
            {
                valid=false;
                $('#phone').addClass('input_error');
            }
        }
        if (valid == false) {
            $("#error-message-div").html("<p  class='alert alert-danger'>Phone Number Invalid</p>").show();
        }

        return valid;
    }
    function IsEmail(email) 
    {
         var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         if(!regex.test(email)) 
         {
            return false;
         }
         else
         {
            return true;
         }
    }
    function IsNumber(phone) 
    {
        //alert('check number');
        var phoneNum = /^([0-9\+])+$/;
        if(!phoneNum.test(phone)) 
         {
            return false;
         }
         else
         {
            return true;
         }
    }
    function cardValidation() {
        var valid = true;
        var name = $('#name').val();
        var email = $('#email').val();
        var cardNumber = $('#card-number').val();
        var month = $('#month').val();
        var year = $('#year').val();
        var cvc = $('#cvc').val();

        $("#error-message").html("").hide();

        if (name.trim() == "") {
            valid = false;
        }
        if (email.trim() == "") {
            valid = false;
        }
        if (cardNumber.trim() == "") {
            valid = false;
        }

        if (month.trim() == "") {
            valid = false;
        }
        if (year.trim() == "") {
            valid = false;
        }
        if (cvc.trim() == "") {
            valid = false;
        }

        if (valid == false) {
            $("#error-message").html("All Fields are required").show();
        }

        return valid;
    }

    //set your publishable key
    Stripe.setPublishableKey("<?php echo STRIPE_PUBLISHABLE_KEY; ?>");

    //callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //enable the submit button
            $("#submit-btn").show();
            $("#loader").css("display", "none");
            //display the errors on the form
            $("#error-message").html(response.error.message).show();
        } else {
            //get token id
            var token = response['id'];
            //insert the token into the form
            $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
            var url = '<?php echo base_url('site/checkout_with_stripe'); ?>';
            var data = $("#frmStripePayment").serialize();
            $.post(url, data, function (resp) {
                if (resp == "DONE") {
                    $("#checkout_from").submit();
                } else {
                    $("#error-message").html("Error occurs.").show();
                }
            });
        }
    }

    function stripePay(e) {
    }
    $(document).ready(function () 
    {
        $("#submitBtn").on('click', function (e) 
        {
            e.preventDefault();
            var url = '<?php echo base_url('site/checkout_process'); ?>';
            var data = $("#checkout_from").serialize();
            var valid = fromValidation();
            if (valid == true) 
                {
                    if ($("#stripe").prop('checked')) 
                    {
                        //   alert("card Pay");
                        $("#stripeModal").modal('show');
                    } 
                    else 
                    {
                        var valid = emailvalidation();
                        if (valid == true) 
                            {
                                if ($("#stripe").prop('checked')) 
                                {
                                    //   alert("card Pay");
                                    $("#stripeModal").modal('show');
                                } 
                                else 
                                {

                                    var valid = numbervalidation();
                                    if (valid == true) 
                                        {
                                            if ($("#stripe").prop('checked')) 
                                            {
                                                //   alert("card Pay");
                                                $("#stripeModal").modal('show');
                                            } 
                                            else 
                                            {

                                                $("#checkout_from").submit();
                                            }
                                        }
                                    else
                                        {
                                            $("#error-message-div").html("<p  class='alert alert-danger'>Phone number Invalid</p>").show();
                                        }
                                }
                            }
                        else
                            {
                                $("#error-message-div").html("<p  class='alert alert-danger'>Email Invalid</p>").show();
                            }
                        // $("#checkout_from").submit();
                    }
                }
            else
                {
                    $("#error-message-div").html("<p  class='alert alert-danger'> All Fields are required </p>").show();
                }
        });
        $("#StripeSubmitBtn").on('click', function (e) 
        {
            e.preventDefault();
            $("#error-message").html("").hide();
            var valid = cardValidation();

            if (valid == true) 
            {
                $("#submit-btn").hide();
                $("#loader").css("display", "inline-block");
                Stripe.createToken(
                {
                    number: $('#card-number').val(),
                    cvc: $('#cvc').val(),
                    exp_month: $('#month').val(),
                    exp_year: $('#year').val()
                }, stripeResponseHandler);

                return false;
            } 
            else 
            {
                $("#error-message").html("<p  class='alert alert-danger'> All Fields are required </p>").show();
            }

        });

    });
</script>