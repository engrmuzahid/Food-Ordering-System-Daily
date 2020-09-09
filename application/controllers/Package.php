<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Package extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $admin_id = $this->session->userdata('admin_id');
            if(!isset($admin_id)){
                redirect('login');
            }
        }
        public function index()
        {
            $data['active_nav'] = "package";
            $day = date('l');
            $data['default']=$this->db->where('default_day',$day)->get("packages")->row();
            $data['packages'] = $this->db->get("packages")->row();
            $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
            $data['main_content'] = $this->load->view('backend/admin/package/add',$data,TRUE);
            $this->load->view('backend/admin/layout',$data);
        }
        public function delete_package($id)
        {
            $this->Common->delete_data("packages",'package_id',$id);
            redirect('dashboard/package_list','location');
        }
        public function save_package(){
            $file_path="./assets/images/";
            $logo_path = $this->input->post('logo_path');
            if($_FILES['logo']['name'])
            {
                //unlink($file_path.$this->input->post('logo_path'));
                $this->load->library('backend');
                $logo_path = $this->backend->image_upload('logo',$file_path);  
            }
            $package_data = array(
                'package_name' => trim($this->input->post('name')),
                'package_price' => trim($this->input->post('price')),
                'description' => trim($this->input->post('description')),
                'default_day' => trim($this->input->post('default_day')),
                'calories' => trim($this->input->post('calories')),
                'logo_url' => $logo_path,
                'sort_order' => trim($this->input->post('sort_order')),
                'status' => trim($this->input->post('status')),
            );
            $this->Common->set_data("packages", $package_data);
            $this->session->set_flashdata('msg', '<p class="alert alert-success">Package Insert Successfully</p>');
            redirect('dashboard/add_package','location'); 
        }
        public function edit_package($id)
        {
            $data['active_nav'] = "edit_package";
            $data['package'] = $this->db->where("package_id",$id)->get("packages")->row();
            $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
            $data['main_content'] = $this->load->view('backend/admin/package/edit',$data,TRUE);
            $this->load->view('backend/admin/layout',$data);
        }
        public function update($id)
        {
            $file_path="./assets/images/";
            $logo_path = $this->input->post('logo_path');
            if($_FILES['logo']['name'])
            {
                //unlink($file_path.$this->input->post('logo_path'));
                $this->load->library('backend');
                $logo_path = $this->backend->image_upload('logo',$file_path);  
            }
            $data = array(
                'package_name' => trim($this->input->post('package_name')),
                'package_price' => trim($this->input->post('package_price')),
                'description' => trim($this->input->post('description')),
                'default_day' => trim($this->input->post('default_day')),
                'calories' => trim($this->input->post('calories')),
                'logo_url' => $logo_path,
                'sort_order' => trim($this->input->post('sort_order')),
                'status' => trim($this->input->post('status')),
            );
            $this->db->where("package_id", $id);  
            $this->db->update("packages", $data);  
            redirect('dashboard/package_list','location');
        }
        public function get_package_list(){
            $data['active_nav'] = "get_package_list";
            $data['package_list'] = $this->Common->get_data_sort_order('packages','sort_order','asc');
            $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
            $data['main_content'] = $this->load->view('backend/admin/package/list',$data,TRUE);
            $this->load->view('backend/admin/layout',$data);
        }
        public function add_items($id)
        {
            $data['active_nav'] = "add_items";
            $data['package'] = $this->db->where("package_id",$id)->get("packages")->row();
            $data['all_items'] =  $this->db->get("item")->result();
            $package_items= $this->db->where("package_id",$id)->get("package_items")->result();
            $data['final'] = array();
            foreach ($data['all_items'] as $row) 
            { 
                $data['final'][$row->id]= $row;
                $data['final'][$row->id]->status = false;
                $data['final'][$row->id]->extra_price = 0;
                foreach($package_items as $package_item)
                {
                     if($package_item->item_id == $row->id)
                     {
                       $data['final'][$row->id]->status = true;
                         $data['final'][$row->id]->extra_price = $package_item->extra_price;
                         $data['final'][$row->id]->sort_order = $package_item->sort_order;
                     } 
                } 
            } 
            $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
            $data['main_content'] = $this->load->view('backend/admin/package/add_items',$data,TRUE);
            $this->load->view('backend/admin/layout',$data);
        }
        public function save_package_items()
        {
           $package_items= $this->db->where("package_id",$_POST['package_id'])->delete("package_items");
            foreach($_POST['item_id'] as $key=>$item){
            $insert_data=  array
            (
                'package_id' => $_POST['package_id'],
                'item_id' =>$key,
                'item_name' => $item,
                'extra_price' => $_POST['item_price'][$key],
                //'has_option'=>$_POST['has_option'][$key],
                'sort_order' => $_POST['sort_orde'][$key],
                //'status' => $_POST['status'][$key],
            );
            $this->Common->set_data("package_items", $insert_data);
        }
        $this->get_package_list();
    }
}?>