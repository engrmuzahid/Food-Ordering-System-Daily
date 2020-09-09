<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
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
        $data['active_nav'] = "users";
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/users/add','',TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function save_user(){
        $user_password = trim($this->input->post('user_password'));
        $confirm_password =trim($this->input->post('confirm_password'));
        $data = array(
            'user_name' => trim($this->input->post('user_name')),
            'user_email' => trim($this->input->post('user_email')),
            'user_phone' => trim($this->input->post('user_phone')),
            'user_password' => md5(trim($this->input->post('user_password'))),
        );
        if($user_password==$confirm_password)
        {
            $this->Common->set_data("users", $data);
            $this->session->set_flashdata('msg', '<p class="alert alert-success">User Added Successfully</p>');
        }
        else 
        {
            $this->session->set_flashdata('msg', '<p class="alert alert-warning">Password does not match</p>');
        }
        redirect('dashboard/add_users','location'); 
    }
    public function delete_users($id)
    {
        $this->Common->delete_data("users",'user_id',$id);
        redirect('dashboard/users_list','location');
    }
    public function edit_users($id)
    {
        $data['active_nav'] = "edit_users";
        $data['users'] = $this->db->where("user_id",$id)->get("users")->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/users/edit',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    
    public function update($id)
    {
        $user_password = trim($this->input->post('user_password'));
        $confirm_password = trim($this->input->post('confirm_password'));
        $data = array(
            'user_name' => trim($this->input->post('user_name')),
            'user_phone' => trim($this->input->post('user_phone')),
            'user_password' => md5(trim($this->input->post('user_password'))),
        );
        if($user_password==$confirm_password)
        {
            $this->session->set_flashdata('msg', '<p class="alert alert-success">Updated Successfully</p>');
            $this->db->where("user_id", $id);  
            $this->db->update("users", $data);  
            redirect('dashboard/users_list','location');
        }
        else 
        {
            $this->session->set_flashdata('msg', '<p class="alert alert-warning">Password does not match</p>');
             redirect('dashboard/edit_users/'.$id,'location');
        }
        
    }

    public function users_list()
    {
        $data['active_nav'] = "users_list";
        $data['users_list'] = $this->db->get('users')->result();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/users/list',$data,TRUE);
        $this->load->view('backend/admin/layout',$data);
    }

}