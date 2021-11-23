<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_model extends CI_Model {

    // for admin
    public function fetchAll(){
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetchActive(){
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>