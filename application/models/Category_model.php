<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    // for admin
    public function fetchAll(){
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchActvie(){
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDesc($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function create($name)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
    
        $data = array(
            'name'          => $name,
            'create_date'   => $cur_date,
            'update_date'   => $cur_date,
            'is_active' => '1'
        );
        $this->db->insert('tbl_type', $data);
        return $this->db->affected_rows();
    }

    public function update_status($c_id,$st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d H:i:s");

        $data = array(
            'is_active'     => $st,
            'update_date'   => $updated
        );
        $this->db->where('id', $c_id);
        $this->db->update('tbl_type', $data);
        return $this->db->affected_rows();
    }

    public function update($name,$cate_id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d H:i:s");

        $data = array(
            'name'          => $name,
            'update_date'   => $updated
        );
        
        $this->db->where('id', $cate_id);
        $this->db->update('tbl_type', $data);
        return $this->db->affected_rows();
    }
    
}

?>