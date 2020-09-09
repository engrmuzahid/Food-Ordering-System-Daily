<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common extends CI_Model {
    public function set_data($table, $data){
        $this->db->trans_start();
        $this->db->insert($table, $data);
        $returnValue = $this->db->insert_id();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            $error = $this->db->error();
            print_r($error);
        }else{
            return $returnValue;
        }
    }

    public function get_data($table){
        $query= $this->db->get($table);
        if( $this->db->affected_rows()>0){
            return $query;
        } else {
            return FALSE;
        }
    }

    public function get_data_sort_order($table, $order_by, $order_type){
        $this->db->order_by($order_by, $order_type);
        $query= $this->db->get($table);
        if($this->db->affected_rows()>0){
            return $query;
        }else{
            return FALSE;
        }
    }

    public function get_data_multi_conditional($table,$data){
        $this->db->where($data);
        $query = $this->db->get($table);
        if($this->db->affected_rows()>0){
            return $query;
        }else{
            return FALSE;
        }
    }

    public function get_data_single_conditional($table,$index,$data){
        $this->db->where($index, $data);
        $query = $this->db->get($table);
        if($this->db->affected_rows()>0){
            return $query;
        }else{
            return FALSE;
        }
    }

    public function get_single_row_information($table,$index,$data){
        $this->db->where($index, $data);
        $query = $this->db->get($table);
        if ($this->db->affected_rows() > 0 ) {
            return $query->row();
        }else{
            return FALSE;
        }
    }

    function delete_data($table,$index,$data){
        $this->db->where($index, $data);
        $this->db->delete($table);

        if ( $this->db->affected_rows() > 0 ) {
            return true;
        } else {
            return false;
        }
    }


    public function update_data($table,$index,$identifier,$data){
        $this->db->where($index, $identifier);
        $this->db->update($table, $data);
        if ( $this->db->affected_rows() > 0 ) {
            return true;
        } else {
            return false;
        } 
    }

    public function get_project_list(){
        $this->db->order_by('project_sort_order', 'ASC');
        $query= $this->db->get('projects');
        if ( $this->db->affected_rows() > 0 ) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function get_project_intro_feature($id){
        $this->db->select('*');
        $this->db->where(array('project_id'=>$id,'feature_type'=>'intro'));
        $result = $this->db->get('project_features')->row();
        return $result;
    }

    public function get_project_video_feature($id){
        $this->db->select('*');
        $this->db->where(array('project_id'=>$id,'feature_type'=>'video'));
        $result = $this->db->get('project_features')->row();
        return $result;
    }

    public function get_project_image_feature($id){
        $this->db->select('*');
        $this->db->where(array('project_id'=>$id,'feature_type'=>'image'));
        $result = $this->db->get('project_features')->result();
        return $result;
    }
}