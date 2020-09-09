<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $admin_id = $this->session->userdata('admin_id');
        if (isset($admin_id)) {
            redirect('dashboard');
        }
        $data['tittle'] = "Prolunch";
        $data['settings']=$this->db->where('id',1)->get('settings')->row();
        $this->load->view('backend/login/login_view', $data );
    }
    public function authentication_process() {
        $userinformation = $this->set_login_information($this->secure_data());
        $res = $this->User->user_validation("users", $userinformation);
        $confirm = $this->set_confirmation_msg($res, "Login Success", "Email and Password not match");
        if ($confirm == 1) {
            $this->session->set_userdata('admin_id', $res->user_id);
            $this->session->set_userdata('admin_name', $res->user_name);
            $this->session->set_userdata('admin_email', $res->user_email);
            redirect('dashboard', 'location');
        } else {
            redirect('login', 'location');
        }
    }
    public function user_info()
    {
        $data['active_nav'] = "dashboard";
        $data['users']=$this->db->where('user_email',$_SESSION['admin_email'])->get('users')->row();
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
       $data['main_content'] = $this->load->view('backend/admin/dashboard/info_edit','',TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function update_info($id)
    {
       $data = array(
            'user_name' => trim($this->input->post('user_name')),
            //'user_email' => trim($this->input->post('user_email')),
            'user_phone' => trim($this->input->post('user_phone')),
        );
        $this->db->where("user_id", $id);  
        $this->db->update("users", $data);  
        redirect('dashboard','location');
    }
    public function password_change()
    {
        $data['users']=$this->db->where('user_id',$_SESSION['admin_id'])->get('users')->row();
        $data['active_nav'] = "dashboard";
        $data['side_menu']=$this->load->view('backend/admin/side_menu',$data,TRUE);
        $data['main_content'] = $this->load->view('backend/admin/dashboard/pass_edit','',TRUE);
        $this->load->view('backend/admin/layout',$data);
    }
    public function update_pass($id)
    {
        $data['active_nav'] = "dashboard";
        $old_pass=md5(trim($this->input->post('old_pass')));
        $new_pass=md5(trim($this->input->post('new_pass')));
        $conf_pass=md5(trim($this->input->post('conf_pass')));
        $data['users']=$this->db->where('user_email',$_SESSION['admin_email'])->get('users')->row();
        $main_pass=$data['users']->user_password;
        if($old_pass==$main_pass)
        {
            if($new_pass==$conf_pass)
            {
                $this->db->set('user_password',$conf_pass);
                $this->db->where('user_id',$_SESSION['admin_id']);
                $this->db->update('users');
                $this->session->set_flashdata('msg', '<p class="alert alert-success">Updated Successfully</p>');

            }
            else 
            {
                 $this->session->set_flashdata('msg', '<p class="alert alert-warning">Password does not match</p>');
            }
        }
        else 
        {
            $this->session->set_flashdata('msg', '<p class="alert alert-warning">Old Password is incorrect</p>');
        }
        $this->load->view('backend/admin/layout',$data);
        redirect('login/password_change','location');
    }
    public function forgot_password()
    {
        $this->load->view('backend/login/forgot_pass');

    }
    public function send_mail()
    {
        $email=trim($this->input->post('email'));
        $data['users']=$this->db->where('user_email',$email)->get('users')->row();
        $mail=$data['users']->user_email;
        if($email==$mail)
        {
            $this->load->library('email');
            $this->email->from('subhashis.ginilab@gmail.com', 'Your Name');
            $this->email->to('smollickcseiu@gmail.com');
            $this->email->subject('Email Test');
            $rand_code=mt_rand();
            $this->db->set('conf_code',$rand_code)->where('user_email',$email)->update('users');
            $this->email->message('Your Confirmation Code is '.$rand_code);
            $this->email->send();
            $this->session->set_flashdata('msg','<p class="alert alert-success">Please Check Your E-mail</p>');
            $this->load->view('backend/login/forgot_update',$data);
        }
        else 
        {
            $this->session->set_flashdata('msg','<p class="alert alert-warning">Incorrect Email</p>');
            redirect('login/forgot_password','location');
        }
        
        
    }
    public function update($id)
    {
        $data['users']=$this->db->where('user_id',$id)->get('users')->row();
        $this->load->view('backend/login/update_pass',$data);
    }
    public function forgot_update($id)
    {
        $users=$this->db->where('user_id',$id)->get('users')->row();
        $conf_code=$users->conf_code;
        $code=trim($this->input->post('code'));
        if($code==$conf_code)
        {
            redirect('login/update/'.$users->user_id,'location');
        }
        else 
        {
            $this->session->set_flashdata('msg', '<p class="alert alert-warning">Please enter the correct code</p>');
            $this->load->view('backend/login/forgot_update');
        }
    }
    public function forgot_update_pass($id)
    {
        $data['users']=$this->db->where('user_id',$id)->get('users')->row();
        $new_pass=trim($this->input->post('new_pass'));
        $conf_pass=trim($this->input->post('conf_pass'));
        if($new_pass==$conf_pass)
        {
            $this->db->set('user_password',md5($conf_pass))->where('user_id',$id)->update('users');
            $this->session->set_flashdata('msg', '<p class="alert alert-success">Updated Successfully</p>');
           redirect('login','location');
        }
        else 
        {
            $this->session->set_flashdata('msg', '<p class="alert alert-warning">Password does not match</p>');
            $this->load->view('backend/login/update_pass',$data);
        } 
    }
    public function user_logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->sess_destroy();
        redirect('login', 'location');
    }
    private function set_login_information($input_validation) {
        if ($input_validation) {
            
        } else {
            $this->set_confirmation_msg("", "", "Please The Valid Data");
            redirect('login', 'location');
        }
        $userinformation = array('user_email' => $this->input->post('email'),
            'user_password' => md5($this->input->post('password'))
        );
        return $userinformation;
    }

    private function secure_data() {
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            return 0;
        } else {

            return TRUE;
        }
    }

    private function set_confirmation_msg($data, $true_msg, $false_msg) {
        $confirm = 0;
        if ($data == FALSE) {
            $this->session->set_flashdata('error', $false_msg);
        } else {
            $this->session->set_flashdata('success', $true_msg);
            $confirm = 1;
        }
        return $confirm;
    }

    public function admin() {
        echo "Hello Admin";
    }

}
