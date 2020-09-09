<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Backend extends CI_Controller
{
    public function __construct() {     
            $xcaliver =& get_instance();
    }
	public function set_confirmation_msg($data,$true_msg,$false_msg){
        $confirm=0;
        $xcaliver =& get_instance();
        if ($data==FALSE) {
            $xcaliver->session->set_flashdata('error',$false_msg);

            
        }
        else
        {
            $xcaliver->session->set_flashdata('success',$true_msg);
            $confirm=1;
        }
        return $confirm;
    }

    public function image_upload($file_name,$file_path){
    	$xcaliver = & get_instance();
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'gif|jpg|png';
        
        $xcaliver->load->library('upload', $config);
        if (!$xcaliver->upload->do_upload($file_name)) {
            $error = array('error' => $xcaliver->upload->display_errors());
            print_r($error);
           // echo "<script>alert('image does not supported ')</script>";

            
        } else {
            return $xcaliver->upload->data('file_name');
        }

    }

    public function image_upload_mod($file_name,$file_path,$extra){
        $xcaliver =& get_instance();
        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'gif|jpg|png';
        
        $xcaliver->load->library('upload', $config);
        if (!$xcaliver->upload->do_upload($file_name)) {
            $error = array('error' => $xcaliver->upload->display_errors());
            
             return $extra;
            
        } else {
           
            return $xcaliver->upload->data('file_name');
        }

    }

    public function x_debug($data){
        print_r($data);
        echo "<br>";
        exit();
    }


}