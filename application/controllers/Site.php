<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

   public function index() {
        $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
        $data['slider'] = $this->db->get('work_slider')->result();
        $packages = $this->db->select("*")->where('status', 'YES')->get('packages')->result();
        foreach ($packages as $row) {
           //  print_r(date("Y-m-d ".$data['settings']->accepting_time, strtotime("NOW"))); exit();
                if(date("Y-m-d ".$data['settings']->accepting_time, strtotime($row->default_day)) >= date("Y-m-d H:i", strtotime("NOW"))){
                    
            $data['packages'][date("Y-m-d",strtotime($row->default_day))] = $row;
                $data['packages'][date("Y-m-d", strtotime($row->default_day))]->items = $this->db->select('package_items.*, item.has_option')->from("package_items")->join('item', 'item.id=package_items.item_id')->where(array('package_id' => $row->package_id))->order_by('package_items.sort_order','DESC')->get()->result();
            
                foreach ($data['packages'][date("Y-m-d", strtotime($row->default_day))]->items as $item) {
                    if (strtoupper($item->has_option) == "YES") {
                        $data['options'][$item->item_id] = $this->db->select('*')->from("item_option")->where(array("item_id" => $item->item_id))->get()->result();
                    }
                }
                }else{
                
                $data['packages'][date("Y-m-d", strtotime("next ".$row->default_day))] = $row;
                $data['packages'][date("Y-m-d", strtotime("next ".$row->default_day))]->items = $this->db->select('package_items.*, item.has_option')->from("package_items")->join('item', 'item.id=package_items.item_id')->where(array('package_id' => $row->package_id))->order_by('package_items.sort_order','DESC')->get()->result();
            // print_r($this->db->last_query());exit();
                foreach ($data['packages'][date("Y-m-d", strtotime("next ".$row->default_day))]->items as $item) {
                    if (strtoupper($item->has_option) == "YES") {
                        $data['options'][$item->item_id] = $this->db->select('*')->from("item_option")->where(array("item_id" => $item->item_id))->get()->result();
                    }
                }
            }
        }
        ksort($data['packages']);
        $extra_packages= $this->db->select("*")->where('status', 'NO')->get('packages')->result();
        $i =0;
        foreach ($extra_packages as $row) {
            
             $data['extra_packages'][$i]  = $row;
             $data['extra_packages'][$i]->items = $this->db->select('package_items.*, item.has_option')->from("package_items")->join('item', 'item.id=package_items.item_id')->where(array('package_id' => $row->package_id))->order_by('package_items.sort_order','DESC')->get()->result();
             foreach ($data['extra_packages'][$i]->items as $item) {
                 if (strtoupper($item->has_option) == "YES") {
                     $data['options'][$item->item_id] = $this->db->select('*')->from("item_option")->where(array("item_id" => $item->item_id))->get()->result();
                 }
             }
             $i++;
       
         }
        //echo "<pre>"; print_r($data['packages']); echo "</pre>"; exit();
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/index';
        $this->load->view('frontend/template', $data);
    }


    public function package_list() {
        $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
        $packages = $this->db->select("*")->where('status', 'YES')->get('packages')->result();
        //   echo "<pre>"; print_r($data['packages']); echo "</pre>"; exit();
        foreach ($packages as $row) {
            if(date("Y-m-d 10:00", strtotime($row->default_day)) >= date("Y-m-d H:i", strtotime("NOW"))){
                
           $data['packages'][date("Y-m-d",strtotime($row->default_day))] = $row;
            $data['packages'][date("Y-m-d", strtotime($row->default_day))]->items = $this->db->select('package_items.*, item.has_option')->from("package_items")->join('item', 'item.id=package_items.item_id')->where(array('package_id' => $row->package_id))->order_by('package_items.sort_order','DESC')->get()->result();
           // print_r($this->db->last_query());exit();
            foreach ($data['packages'][date("Y-m-d", strtotime($row->default_day))]->items as $item) {
                if (strtoupper($item->has_option) == "YES") {
                    $data['options'][$item->item_id] = $this->db->select('*')->from("item_option")->where(array("item_id" => $item->item_id))->get()->result();
                }
            }
            }else{
            
            $data['packages'][date("Y-m-d", strtotime("next ".$row->default_day))] = $row;
            $data['packages'][date("Y-m-d", strtotime("next ".$row->default_day))]->items = $this->db->select('package_items.*, item.has_option')->from("package_items")->join('item', 'item.id=package_items.item_id')->where(array('package_id' => $row->package_id))->order_by('package_items.sort_order','DESC')->get()->result();
           // print_r($this->db->last_query());exit();
            foreach ($data['packages'][date("Y-m-d", strtotime("next ".$row->default_day))]->items as $item) {
                if (strtoupper($item->has_option) == "YES") {
                    $data['options'][$item->item_id] = $this->db->select('*')->from("item_option")->where(array("item_id" => $item->item_id))->get()->result();
                }
            }
        }
        }
        ksort($data['packages']);
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/package_list';
        $this->load->view('frontend/template', $data);
    }

    public function cart_view() {
        $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/cart_view';
        $this->load->view('frontend/template', $data);
    }
    public function download() {
        $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/download';
        $this->load->view('frontend/template', $data);
    }
    public function privacypolicy()
    {
        $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/privacypolicy';
        $this->load->view('frontend/template', $data);
    }
    public function alergyalert()
    {
        $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/alergyalert';
        $this->load->view('frontend/template', $data);
    }
    public function slider($id)
    {
        $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
        $data['top_cart'] = $this->cart_total();
        $data['slider']=$this->db->where('id',$id)->get('work_slider')->row();
        $data['main_content'] = 'frontend/slider';
        $this->load->view('frontend/template', $data);
    }
    public function cookiespolicy()
    {
        $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/cookiespolicy';
        $this->load->view('frontend/template', $data);
    }
    public function package_details() {
        $id = $_GET['id'];
        $data['packages'] = $this->db->get_where('packages', array('package_id' => $id,))->row();
        $data['packages']->items=$this->db->select('*')->from("package_items")->join('item', 'item.id=package_items.item_id')->where(array("package_id" => $id))->get()->result();
        foreach ($data['packages']->items as $item) {
                if (strtoupper($item->has_option) == "YES") {
                    $data['options'][$item->item_id] = $this->db->select('*')->from("item_option")->where(array("item_id" => $item->item_id))->get()->result();
                }
            }
        $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/package_details';
        $this->load->view('frontend/template', $data);
    }

    public function about_us() {
        $data['settings'] = $this->db->where('id', 1)->get('settings')->row();
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/about_us';
        $this->load->view('frontend/template', $data);
    }

    public function faq() {
        $data['settings'] = $this->db->where('id', 1)->get('settings')->row();
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/faq';
        $this->load->view('frontend/template', $data);
    }

    public function contact_us() {
        $data['settings'] = $this->db->where('id', 1)->get('settings')->row();
        $data['top_cart'] = $this->cart_total();
        $data['main_content'] = 'frontend/contact_us';
        $this->load->view('frontend/template', $data);
    }

    public function client_message() {
        $settings = $this->db->where('id', 1)->get('settings')->row();
        $data = array(
            'f_name' => $_POST["f_name"],
            'l_name' => $_POST["l_name"],
            'email' => $_POST["email"],
            'message' => $_POST["message"]
        );
        if ($_POST["f_name"] && $_POST["email"] && $_POST["message"]) {
            $this->db->insert('client_message', $data); 
            $this->load->library('email');
            $this->email->set_newline("\r\n");
            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_header('Content-type', 'text/html');
            $this->email->from($data['email'], $data['f_name'].' '.$data['l_name']);
            $this->email->to($settings->email);
            $this->email->subject('Contacts Us Email From Website');
            $this->email->message($data['message']);
            $this->email->send();  
            $this->session->set_flashdata('message', 'Thanks for providing your important message.');
        }
        redirect('Site/contact_us', 'location');
    }

    public function save_order_items() {
        $_order = $this->input->post('Cart');
        if (!$this->session->has_userdata('cart')) {
            $cart = array($_order);
            $this->session->set_userdata('cart', serialize($cart));
        } else {
          $index = $this->find_index($_order['id']);
            $cart = array_values(unserialize($this->session->userdata('cart')));
          if ($index == -1) {
                array_push($cart, $_order);
                $this->session->set_userdata('cart', serialize($cart));
            } else {
                $cart[$index]['qty'] += $_order['qty'];
                $this->session->set_userdata('cart', serialize($cart));
            }
        }
        return $this->cart_total(true);
    }


    public function remove_order_items($id) {
         $index = $this->find_index($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
        redirect('Site/cart_view','location');
    }

    private function find_index($id) {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    private function cart_total($return_type = false) {
        if (!$this->session->has_userdata('cart')) {
            $_str = '<p><i class="fa fa-shopping-cart"></i><span>' . 0 . '</span>£' . number_format(0, 2) . '</p>';
            if ($return_type) {
                echo $_str;
            } else {
                return $_str;
            }
        } else {
            $items = array_values(unserialize($this->session->userdata('cart')));
            $tPrice = 0;
            $tQty = 0;
            foreach ($items as $item) {
                $tPrice += $item['package_price'] * $item['qty'];
                $tQty += $item['qty'];
            }
            $str = '<p><i class="fa fa-shopping-cart"></i><span>' . $tQty . '</span>£' . number_format($tPrice, 2) . '</p>';
            if ($return_type) {
                echo $str;
            } else {
                return $str;
            }
        }
    }

    public function checkout() {
       // $this->session->unset_userdata('cart');
    //   $session_cart = json_encode(array_values(unserialize($this->session->userdata('cart'))));
    //     $cart =(array)json_decode($session_cart);
    //     print_r($cart);
    //     exit();
        $data['delivery_address'] = $this->db->get('delivery_address')->result();
        if (null == $this->session->userdata('cart')) {
            $this->session->set_flashdata('message', 'Please, add some products in your cart.');
            redirect('Site/cart_view');
        } else {

            $data['settings'] = $this->Common->get_single_row_information('settings', 'id', 1);
            $data['top_cart'] = $this->cart_total();
            $data['main_content'] = 'frontend/checkout';

            $this->load->view('frontend/template', $data);
        }
    }

    public function checkout_process() {
        $data['settings'] = $this->db->where('id', 1)->get('settings')->row();
        $f_name = trim($this->input->post('f_name'));
       // $l_name = trim($this->input->post('l_name'));
        $email = trim($this->input->post('email'));
        $phone = trim($this->input->post('phone'));
        $house = trim($this->input->post('house'));
        $street = trim($this->input->post('street')); 
        $postcode = trim($this->input->post('postcode'));
        $payment_method = $this->input->post('payment_method');
        $city = "";

        if (!$f_name || !$email || !$phone || !$payment_method) {
            redirect('Site/checkout');
        }
        $address = 'House: '.$house.', Street: '.$street.', Postcode: '.$postcode;
        $customer_data = array(
            'f_name' => $f_name,
            'l_name' => "",
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'house' => $house,
            'street' => $street,
            'city' => $city,
            'post_code' => $postcode,
        );

        $customer_id = $this->Common->set_data('customer', $customer_data);
        $order_data = array(
            'customer_id' => $customer_id,
            'delivery_address' => $address,
            'house' => $house,
            'street' => $street,
            'city' => $city,
            'postcode' => $postcode,
            'total_amount' => $this->input->post('total_amount'),
            'paid_amount' => $this->input->post('total_amount'),
            'due_amount' => 0,
            'payment_method' => $this->input->post('payment_method'),
            'order_status' => 'pending',
            'cart_items' => json_encode(array_values(unserialize($this->session->userdata('cart')))),
            'comments' => trim($this->input->post('comments')),
        );

        $order_id = $this->Common->set_data('final_orders', $order_data);
        $session_cart = json_encode(array_values(unserialize($this->session->userdata('cart'))));
        $cart =(array)json_decode($session_cart);
        for ($i = 0; $i < count($cart); $i++) 
        {
            $delivery_date_time = explode(' ', $cart[$i]->deliveryTime);
            $order_items = array(
                'order_id' => $order_id,
                'package_id' => $cart[$i]->package_id,
                'package_name' => $cart[$i]->package_name,
                'package_details' => json_encode($cart[$i]->package_items),
                'qty' => $cart[$i]->qty,
                'delivery_address' => $address,
                'delivery_date' => $delivery_date_time[0],
                'delivery_time' => $delivery_date_time[1],
            );
            $this->Common->set_data('order_items', $order_items);
        }

            $_messege = "Hi ".$customer_data['f_name']."\r\n";
            $_messege .= $data['settings']->order_confirm_text."\r\n";
            $this->load->library('email');
            $this->email->set_newline("\r\n");
            $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_header('Content-type', 'text/html');
            $this->email->from( $data['settings']->email, "PROLUNCH ADMIN");
            $this->email->to($customer_data['email']);
            $this->email->subject('Order Confirmation from PROLUNCH');
            $this->email->message($_messege);
            $this->email->send();  
            
            
        $this->session->unset_userdata('cart');
        $this->session->set_flashdata('success_message', $data['settings']->success_message);
        redirect('site/cart_view');
    }

    public function checkout_with_stripe() {
        if (!empty($_POST["token"])) {
           $successMessage = "FAIL";
             require_once(APPPATH . 'third_party/StripePayment.php');
             
            $stripePayment = new StripePayment();
            $stripeResponse = $stripePayment->chargeAmountFromCard($_POST);
            if ($stripeResponse['amount_refunded'] == 0 && empty($stripeResponse['failure_code']) && $stripeResponse['paid'] == 1 && $stripeResponse['captured'] == 1 && $stripeResponse['status'] == 'succeeded') {
                $successMessage = "DONE";//"Stripe payment is completed successfully. The TXN ID is " . $stripeResponse["balance_transaction"];
            }
            echo  $successMessage;
        }
    }

    /* Extra "Add to Cart" */

// public function add_to_cart(){
//     $this->load->library("cart");
//     $data = array(
//         "id"=>$_POST["id"],
//         "name"=>$_POST["name"],
//         "qty"=>$_POST["quantity"],
//         "price"=>$_POST["price"]
//     );
//     $this->cart->insert($data);
//     $this->session
//     $this->load->view('frontend/cart_view');
// }

    /* End Extra "Add to Cart" */
}
