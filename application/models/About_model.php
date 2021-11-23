<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {

    // for admin
    public function fetchAll(){
        $this->db->select('*');
        $this->db->from('tbl_about');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetchActiveAll(){
        $this->db->select('*');
        $this->db->from('tbl_about');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function create($name,$descs)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        $data = array(
            'name'  => $name,
            'dsc'   => $descs,
            'is_active'     => '1',
            'is_recommend'  => '1',
            'create_date'   => $cur_date,
            'update_date'   => $cur_date,
        );
        $this->db->insert('tbl_about', $data);
        return $this->db->affected_rows();
    }

    // update image Cover
    public function updatefileUpload($dataArr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        $data = array(
            'img_cover'     => $dataArr['image_cover'],
            'update_date'   => $cur_date
        );
        $this->db->where('id', $dataArr['about_id']);
        $this->db->update('tbl_about', $data);
        return $this->db->affected_rows();
    }
    public function getDesc($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_about');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
       
        if($arr['image_cover'] !=''){
            $data = array(
                'name'          => $arr['name'],
                'dsc'           => $arr['desc'],
                'img_cover'     => $arr['image_cover'],
                'update_date'   => $cur_date
            );
        } else {
            $data = array(
                'name'          => $arr['name'],
                'dsc'           => $arr['desc'],
                'update_date'   => $cur_date
            );
        }

        $this->db->where('id', $arr['about_id']);
        $this->db->update('tbl_about', $data);
        return $this->db->affected_rows();
        
    }
    public function distroy($id, $st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'is_active'     => $st,
            'update_date'   => $cur_date
        );

        $this->db->where('id', $id);
        $this->db->update('tbl_about', $data);
        return $this->db->affected_rows();
        
    }

}

?>