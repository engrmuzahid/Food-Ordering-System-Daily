<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if(!isset($admin_id))
        {
            redirect('login');
        }
    }
   public function index()
   {  $data['active_nav'] = "dashboard";
       $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
       $data['main_content'] = $this->load->view('backend/admin/dashboard/dashboard','',TRUE);
       $this->load->view('backend/admin/layout',$data);
   }
   public function website_settings()
   {
       $data['settings'] = $this->Common->get_single_row_information('settings','id',1);
       // echo $data['settings']->email;
        $data['active_nav'] = "website_settings";
    
       $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
       $data['main_content'] = $this->load->view('backend/admin/dashboard/settings',$data,TRUE);
       $this->load->view('backend/admin/layout',$data);
   }
   public function checkout_settings()
   {
        $data['active_nav'] = "checkout_settings";
        $data['item_option']=$this->db->get('item_option');
        $this->db->select('final_orders.*,customer.f_name,customer.l_name,customer.phone');
         $this->db->from('final_orders');
        $this->db->join('customer', 'customer.id = final_orders.customer_id');
        $data['checkout_settings'] = $this->db->order_by('order_status','DESC')->get()->result();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/dashboard/checkout',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
   }
   public function order_filter()
   {
        $data['active_nav'] = "order_filter";
        $data['delivery_address'] = $this->db->get('delivery_address')->result();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/dashboard/order_filter',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
   }
    public function filtering_order() {
        
        $delivery_address = $this->input->post('delivery_address');
        $delivery_date = $this->input->post('delivery_date');
        
        $payment_method = $this->input->post('payment_method');
        if(!empty($delivery_address) && !empty($delivery_date) && !empty($payment_method)) {
            $filter_condition = array('final_orders.delivery_address' => $delivery_address, 'order_items.delivery_date' => $delivery_date, 'final_orders.payment_method' => $payment_method);
        }else if(!empty($delivery_address) && !empty($delivery_date)) {
            $filter_condition = array('final_orders.delivery_address' => $delivery_address,'order_items.delivery_date' => $delivery_date);
        } else if(!empty($delivery_address) && !empty($payment_method)) {
            $filter_condition = array('final_orders.delivery_address' => $delivery_address, 'final_orders.payment_method' => $payment_method);
        } else if(!empty($delivery_address) &&  empty($payment_method) &&  empty($delivery_date)) {
           $filter_condition = array('final_orders.delivery_address' => $delivery_address);
        }  else if(empty($delivery_address) &&  empty($payment_method) &&  !empty($delivery_date)) {
           $filter_condition = array('order_items.delivery_date' => $delivery_date);
        }  else if(empty($delivery_address) &&  !empty($payment_method) &&  empty($delivery_date)) {
           $filter_condition = array('final_orders.payment_method' => $payment_method);
        } else {
            $filter_condition = array();
        }
        $this->db->select('order_items.*,customer.f_name,customer.l_name,customer.email,customer.phone,final_orders.payment_method');
        $this->db->from('order_items');
        $this->db->join('final_orders', 'final_orders.id = order_items.order_id');
        $this->db->join('customer', 'customer.id = final_orders.customer_id');
        $this->db->where($filter_condition);
        $data['orders'] = $this->db->get()->result();
        $this->load->view('backend/admin/dashboard/orderListing',$data);
//        $this->session->set_flashdata('filter_order', $filter_order);
//        redirect('dashboard/order_filter','location');
    }
    public function edit_checkout($id) {
        $data['active_nav'] = "edit_checkout";
        $data['item_option']=$this->db->get('item_option');
        $this->db->select('final_orders.*,customer.*');
        $this->db->from('final_orders');
        $this->db->join('customer', 'customer.id = final_orders.customer_id');
        $this->db->where('final_orders.id',$id);
        $data['final_orders'] = $this->db->get()->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/dashboard/edit_checkout',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function view_checkout($id)
    {   
        $data['active_nav'] = "view_checkout";
        $data['item_option']=$this->db->get('item_option');
        $this->db->select('final_orders.*,customer.f_name,customer.l_name');
        $this->db->from('final_orders');
        $this->db->join('customer', 'customer.id = final_orders.customer_id');
        $this->db->where('final_orders.id',$id);
        $data['final_orders'] = $this->db->get()->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/dashboard/checkout',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function update_checkout($id)
    {
        $data['active_nav'] = "update_checkout";
        $data = array(
            'order_status' => trim($this->input->post('order_status')),
        );
        $this->db->where("id", $id);  
        $this->db->update("final_orders", $data);  
        redirect('dashboard/checkout','location');
    }
   public function save_settings()
   {
      $data['active_nav'] = "dashboard";
      $file_path="./assets/images/";
      $logo_path = $this->input->post('logo_path');
      $image_path = $this->input->post('image_path');
      if($_FILES['logo']['name'])
        {
          // unlink($file_path.$this->input->post('logo_path'));
          $this->load->library('backend'); 
          $logo_path = $this->backend->image_upload('logo',$file_path);
        }
      if($_FILES['image']['name'])
        {
          // unlink($file_path.$this->input->post('logo_path'));
          $this->load->library('backend'); 
          $image_path = $this->backend->image_upload('image',$file_path);
        }
       $data = array(
                   'email' => $this->input->post('email'),
                   'phone' => $this->input->post('phone'),
                   'facebook' => $this->input->post('facebook'),
                   'twitter' => $this->input->post('twitter'),
                   'gplus' => $this->input->post('gplus'),
                   'location'=>trim($this->input->post('location')),
                   'linkedin' => $this->input->post('linkedin'),
                   'youtube' => $this->input->post('youtube'),
                   'first_title' => $this->input->post('first_title'),
                   'first_content' => $this->input->post('first_content'),
                   'image' => $image_path,
                   'second_title' => $this->input->post('second_title'),
                   'second_content' => $this->input->post('second_content'),
                   'logo_url' => $logo_path,
                   'success_message' => $this->input->post('success_message'),
                   'about_us' => $this->input->post('about_us'),
                   'privacy_policy' => $this->input->post('privacy_policy'),
                   'cookies_policy' => $this->input->post('cookies_policy'),
                   'alergy_alert' => $this->input->post('alergy_alert'),
                   'api_key' => $this->input->post('api_key'),
                   'publish_key' => $this->input->post('publish_key'),
                   'copyright_text' => $this->input->post('copyright'),
                   'footer_bg_color' => $this->input->post('f_bg_color'),
                   'theme_color' => $this->input->post('theme_color'),
                   'order_confirm_text' => $this->input->post('order_confirm_text'),
                   'accepting_time' => $this->input->post('accepting_time'),
               );
       $this->Common->update_data("settings",'id',1,$data);
       $this->session->set_flashdata('msg', '<p class="alert alert-success">Settings Saved Successfully</p>');
       redirect('dashboard/settings','location');
   }
}