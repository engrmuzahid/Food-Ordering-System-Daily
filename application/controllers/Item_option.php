<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class item_option extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if(!isset($admin_id)){
            redirect('login');
        }
    }
    public function index($id){
        $data['active_nav'] = "item_option";
        $data['item_id']=$id;
        $data['item']=$this->db->where('id',$id)->get('item')->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/item_option/add','',TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function delete_item_option($id)
    {
        $this->db->select('item_id');
        $this->db->where('id', $id);
        $item_id = $this->db->get('item_option')->row();
        $this->Common->delete_data("item_option",'id',$id);
        $this->session->set_flashdata('msg', '<p class="alert alert-success">Item Option Deleted Successfully</p>');
        redirect('dashboard/item_option2_list/'.$item_id->item_id,'location');
    }
    public function save_item_option(){
        $item_id = $this->input->post('item_id');

        $data = array
        (
            'item_id' => $item_id,
            'name' => trim($this->input->post('name')),
            'price' => trim($this->input->post('price')),
        );

        $this->Common->set_data("item_option", $data);
        $this->session->set_flashdata('msg', '<p class="alert alert-success">Item Insert Successfully</p>');
        redirect('dashboard/add_item_option/'.$item_id,'location'); 
    }
    public function edit_item_option($id)
    {
       // echo $id;
        $data['active_nav'] = "edit_item_option";
        $data['item_option1']=$this->db->select('item_id')->where('id',$id)->get('item_option')->row();
        $data['item']=$this->db->where('id',$data['item_option1']->item_id)->get('item')->row();
        $data['item_option']=$this->db->where('id',$id)->get("item_option")->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/item_option/edit',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function update($id)
    {
        $item_idd = $this->input->post('item_idd');
        $data = array
        (
            'item_id' => trim($this->input->post('item_id')),
            // 'item_name' => trim($this->input->post('item_name')),
            'name' => trim($this->input->post('name')),
            'price' => trim($this->input->post('price')),
        );
        $this->db->where("id", $id);  
        $this->db->update("item_option", $data);  
        redirect('dashboard/item_option2_list/'.$item_idd,'location');
    }
    public function get_item_option_list(){
        $data['active_nav'] = "get_item_option_list";
        $this->db->select('item_option.*, item.name as item_name');
        $this->db->from('item_option');
        $this->db->join('item', 'item.id = item_option.item_id');
        $data['item_option_list'] = $this->db->get();  
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/item_option/list',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function get_item_option2_list($id)
        {
             $data['active_nav'] = "get_item_list";
            $this->db->select('item_option.*, item.name as item_name');
            $this->db->from('item_option');
            $this->db->join('item','item.id = item_option.item_id');
            $this->db->where('item_option.item_id',$id);
            $data['item_option_list'] = $this->db->get()->result();
           if(!empty($data['item_option_list']))
            {
                $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
                $data['main_content'] = $this->load->view('backend/admin/item_option/list',$data,TRUE);
                $this->load->view('backend/admin/layout',$data);
            }
            else 
            {
                $this->session->set_flashdata('msg', '<p class="alert alert-warning">Please at first add item option</p>');
                $data['side_menu']=$this->load->view('backend/admin/side_menu','',TRUE);
                $data['main_content'] = $this->load->view('backend/admin/item_option/list','',TRUE);
                redirect('dashboard/add_item_option/'.$id,'location'); 
            }
        }
}
