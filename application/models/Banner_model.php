<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

    // for admin
    public function fecthAll(){
        $this->db->select('
            id,
            name,
            img_cover,
            create_date,
            update_date,
            is_active
        ');
        $this->db->from('tbl_banner');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    // home slides
    public function fetchActive(){
        $this->db->select('
            id,
            name,
            img_cover,
            is_active
        ');
        $this->db->from('tbl_banner');
        $this->db->where('is_active',1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDetail($id)
    {
        $this->db->select('
            id,
            name,
            img_cover,
            create_date,
            update_date,
            is_active
        ');
        $this->db->from('tbl_banner');
        $this->db->where('id',$id);
        $this->db->order_by('id', 'DESC');
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
                'img_cover'     => $arr['image_cover'],
                'update_date'   => $cur_date
            );
        } else{
            $data = array(
                'name'          => $arr['name'],
                'update_date'   => $cur_date
            );
        }

        $this->db->where('id', $arr['banner_id']);
        $this->db->update('tbl_banner', $data);
        return $this->db->affected_rows();
    }

    public function distroy($id,$status)
    {
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d");

        $data = array(
            'is_active'     => $status,
            'update_date'   => $updated
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_banner', $data);
        return $this->db->affected_rows();;
    }

    // public function create($name)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
    
    //     $data = array(
    //         'name'          => $name,
    //         'create_date'   => $cur_date,
    //         'update_date'   => $cur_date,
    //         'is_active'     => '1'
    //     );
    //     $this->db->insert('tbl_banner', $data);
    //     $insert_id = $this->db->insert_id();
    //     $result =$this->db->affected_rows();
    //     if ($result > 0) {
    //         return $insert_id;
    //     } else {
    //         return FALSE;
    //     }
    // }

    // public function update($arr)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");

    //     $data = array(
    //         'img_cover'     => $arr['image_cover'],
    //         'update_date'   => $cur_date
    //     );

    //     $this->db->where('id', $arr['banner_id']);
    //     $this->db->update('tbl_banner', $data);
    //     return $this->db->affected_rows();

    // }
    // public function getDesc($id)
    // {
    //     $this->db->select('
    //         id,
    //         name,
    //         img_cover,
    //         create_date,
    //         update_date,
    //         is_active
    //     ');
    //     $this->db->from('tbl_banner');
    //     $this->db->where('id', $id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }


    
    
    
    
}

?>