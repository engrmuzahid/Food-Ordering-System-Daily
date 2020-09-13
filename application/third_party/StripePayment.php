<?php 
 
require_once(APPPATH . 'third_party/stripe/init.php');
use \Stripe\Stripe;
use \Stripe\Customer;
use \Stripe\ApiOperations\Create;
use \Stripe\Charge;

class StripePayment
{

    private $apiKey;

    private $stripeService;

    public function __construct()
    { 
        $this->apiKey = STRIPE_SECRET_KEY;
        $this->stripeService = new \Stripe\Stripe();
        $this->stripeService->setVerifySslCerts(false);
        $this->stripeService->setApiKey($this->apiKey);
    }

    public function addCustomer($customerDetailsAry)
    {
        
        $customer = new Customer();
        
        $customerDetails = $customer->create($customerDetailsAry);
        
        return $customerDetails;
    }

    public function chargeAmountFromCard($cardDetails)
    {
        $customerDetailsAry = array(
            'email' => $cardDetails['email'],
            'source' => $cardDetails['token']
        );
        $customerResult = $this->addCustomer($customerDetailsAry);

        $stripe_total_payments = $cardDetails['amount']*100;
        $charge = new Charge();
        $cardDetailsAry = array(
            'customer' => $customerResult->id,
            'amount' => $stripe_total_payments,
            'currency' => $cardDetails['currency_code'],
            'description' => $cardDetails['item_name'],
            'metadata' => array(
                'order_id' => $cardDetails['item_number']
            )
        );
        
        $accountId = accountId;
        $accountFee = accountFee;
        $feeType = feeType;
        


        if(!is_null($accountId)) {
            //application charge
            if(!is_null($accountFee)) {
                if($feeType == 'percentage') {
                    $accountFee = number_format(($stripe_total_payments/100) * ($accountFee/100), 2) * 100;
                } else {
                    $accountFee = number_format($accountFee,2) * 100;
                }
            } else {
                $accountFee = 0;
            }
            $cardDetailsAry['application_fee_amount'] = $accountFee;
            $result = $charge->create($cardDetailsAry, array(
                "stripe_account" => $accountId
            )); 

        } else {
           // \Stripe\Charge::create($chargeData);
            $result = $charge->create($cardDetailsAry); 
        }

      


        return $result->jsonSerialize();
    }

   
    
  
}
