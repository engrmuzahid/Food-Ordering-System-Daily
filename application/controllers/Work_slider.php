<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Work_slider extends CI_Controller 
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
        {
            $data['active_nav'] = "slider";
            $data['work_slider'] = $this->db->get("work_slider")->row();
            $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
            $data['main_content'] = $this->load->view('backend/admin/work_slider/add',$data,TRUE);
            $this->load->view('backend/admin/layout',$data);
        }
        public function save_work_slider()
        {
            //  if($_FILES['logo']['size']>2097152)
            //     {
            //         $this->session->set_flashdata('msg', '<p class="alert alert-warning">File size is so much large</p>');
            //          redirect('dashboard/add_work_slider','location'); 
            //     }
            // else
                {
                    $file_path="./assets/images/";
                    $logo_path = $this->input->post('logo_path');
                    if($_FILES['logo']['name'])
                    {
                        //unlink($file_path.$this->input->post('logo_path'));
                        $this->load->library('backend');
                        $logo_path = $this->backend->image_upload('logo',$file_path);  
                    }
                    $work_slider_data = array
                    (
                        'title' => trim($this->input->post('title')),
                        'description' => trim($this->input->post('description')),
                        'image_link' => $logo_path,
                        'action_link' => trim($this->input->post('action_link')),
                        'sort_order' => trim($this->input->post('sort_order')),
                    );
                    $this->Common->set_data("work_slider", $work_slider_data);
                    $this->session->set_flashdata('msg', '<p class="alert alert-success">Slider Insert Successfully</p>');
                    redirect('dashboard/add_work_slider','location'); 
                }
            
        }
        public function get_work_slider_list()
            {
                $data['active_nav'] = "get_work_slider_list";
                $data['work_slider'] = $this->Common->get_data_sort_order('work_slider','sort_order','asc');
                $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
                $data['main_content'] = $this->load->view('backend/admin/work_slider/list',$data,TRUE);
                $this->load->view('backend/admin/layout',$data);
            }
        public function delete_work_slider($id)
            {
                $this->Common->delete_data("work_slider",'id',$id);
                redirect('dashboard/work_slider_list','location');
            }
        public function update($id)
            {
               $file_path="./assets/images/";
                $logo_path = $this->input->post('logo_path');
                if($_FILES['image_link']['name'])
                {
                    unlink($file_path.$this->input->post('logo_path'));
                    $this->load->library('backend');
                    $logo_path = $this->backend->image_upload('image_link',$file_path);  
                }
                $data = array(
                    'title' => trim($this->input->post('title')),
                    'description' => trim($this->input->post('description')),
                    'image_link' => $logo_path,
                    'action_link' => trim($this->input->post('action_link')),
                    'sort_order' => trim($this->input->post('sort_order')),
                );
                $this->db->where("id", $id);  
                $this->db->update("work_slider", $data);  
                redirect('dashboard/work_slider_list','location');
            }
        public function edit_work_slider($id)
            {
                $data['active_nav'] = "edit_work_slider";
                $data['work_slider'] = $this->db->where("id",$id)->get("work_slider")->row();
                $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
                $data['main_content'] = $this->load->view('backend/admin/work_slider/edit',$data,TRUE);
                $this->load->view('backend/admin/layout',$data);
            }
    }