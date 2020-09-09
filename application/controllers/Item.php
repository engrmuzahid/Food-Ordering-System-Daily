<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

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
        $data['active_nav'] = "item";
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/item/add','',TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function save_item(){
        $data = array(
            'name' => trim($this->input->post('name')),
            'description' => trim($this->input->post('description')),
            'sort_order' => trim($this->input->post('sort_order')),
            'has_option' => trim($this->input->post('has_option')),
        );
        $this->Common->set_data("item", $data);
        $this->session->set_flashdata('msg', '<p class="alert alert-success">Item Insert Successfully</p>');
        redirect('dashboard/add_item','location'); 
    }
    public function delete_item($id)
    {
        $this->Common->delete_data("item",'id',$id);
        redirect('dashboard/item_list','location');
    }
    public function edit_item($id)
    {
        $data['active_nav'] = "edit_item";
        $data['item'] = $this->db->where("id",$id)->get("item")->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/item/edit',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    
    public function update($id)
    {
        $data = array(
            'name' => trim($this->input->post('name')),
            'description' => trim($this->input->post('description')),
            'sort_order' => trim($this->input->post('sort_order')),
            'has_option' => trim($this->input->post('has_option')),
        );
        $this->db->where("id", $id);  
        $this->db->update("item", $data);  
        redirect('dashboard/item_list','location');
    }

    public function get_item_list()
    {
        $data['active_nav'] = "get_item_list";
        $data['item_list'] = $this->Common->get_data_sort_order('item','sort_order','asc');
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/item/list',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }

}