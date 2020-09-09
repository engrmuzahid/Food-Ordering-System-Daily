<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daily_package extends CI_Controller {

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
        $data['packages']=$this->db->get('packages');
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/daily_package/add','',TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function save_daily_package()
    {
        $data = array(
            'package_id' => trim($this->input->post('package_id')),
            'available_date' => trim($this->input->post('available_date')),
            'price' => trim($this->input->post('price')),
        );
        $this->db->insert('daily_packages', $data);
        $this->session->set_flashdata('msg', '<p class="alert alert-success">Daily Package Insert Successfully</p>');
        redirect('dashboard/add_daily_package','location'); 
    }
    public function delete_daily_package($id)
    {
        $this->Common->delete_data("daily_packages",'id',$id);
        redirect('dashboard/daily_package_list','location');
    }
    public function edit_daily_package($id)
    {
        //echo $id;
        $data['daily_package'] = $this->db->where("id",$id)->get("daily_packages")->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu','',TRUE);
        $data['main_content'] = $this->load->view('backend/admin/daily_package/edit',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    
    public function update($id)
    {
        $data = array(
            'package_id' => trim($this->input->post('package_id')),
            'available_date' => trim($this->input->post('available_date')),
            'price' => trim($this->input->post('price')),
        );
        $this->db->where("id", $id);  
        $this->db->update("daily_packages", $data);  
        redirect('dashboard/daily_package_list','location');
    }
    public function get_daily_package()
    {
        $data['daily_package_list'] = $this->Common->get_data_sort_order('daily_packages','price','asc');
        $data['side_menu']=$this->load->view('backend/admin/side_menu','',TRUE);
        $data['main_content'] = $this->load->view('backend/admin/daily_package/list',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }

}