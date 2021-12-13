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

    public function fetchActive(){
        $this->db->select('*');
        $this->db->from('tbl_type');
        $this->db->where('is_active',1);
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

    public function create($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        if($arr['image_cover'] !=''){
            $data = array(
                'name'          => $arr['name'],
                'img_cover'     => $arr['image_cover'],
                'create_date'   => $cur_date,
                'update_date'   => $cur_date,
                'is_active' => '1'
            );

        } else {
            $data = array(
                'name'          => $name,
                'create_date'   => $cur_date,
                'update_date'   => $cur_date,
                'is_active'     => '1'
            );
        }
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

    public function update($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d H:i:s");
        if($arr['image_cover'] !=''){
            $data = array(
                'name'          => $arr['name'],
                'img_cover'     => $arr['image_cover'],
                'update_date'   => $updated
            );
        } else {
            $data = array(
                'name'          => $arr['name'],
                'update_date'   => $updated
            );
        }
        $this->db->where('id', $arr['cate_id']);
        $this->db->update('tbl_type', $data);
        return $this->db->affected_rows();
    }
    
}

?>