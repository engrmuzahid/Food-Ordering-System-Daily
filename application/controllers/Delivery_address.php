<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_address extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if(!isset($admin_id))
        {
            redirect('login');
        }
    }

    public function index()
    {
        $data['active_nav'] = "delivery_address";
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/delivery_address/add','',TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function save_delivery_address(){
        $data = array(
            'city' => trim($this->input->post('city')),
            );
        $this->Common->set_data("delivery_address", $data);
        $this->session->set_flashdata('msg', '<p class="alert alert-success">Address Insert Successfully</p>');
        redirect('dashboard/add_delivery_address','location'); 
    }
    public function delete_delivery_address($id)
    {
        $this->Common->delete_data("delivery_address",'id',$id);
        redirect('dashboard/delivery_address_list','location');
    }
    public function edit_delivery_address($id)
    {
        $data['active_nav'] = "edit_delivery_address";
        $data['delivery_address'] = $this->db->where("id",$id)->get("delivery_address")->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/delivery_address/edit',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    
    public function update($id)
    {
        $data = array(
            'city' => trim($this->input->post('city')),
        );
        $this->db->where("id", $id);  
        $this->db->update("delivery_address", $data);  
        redirect('dashboard/delivery_address_list','location');
    }

    public function get_delivery_address_list()
    {
         $data['active_nav'] = "get_delivery_address_list";
        $data['delivery_address'] = $this->Common->get_data_sort_order('delivery_address','id','asc');
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/delivery_address/list',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }

}