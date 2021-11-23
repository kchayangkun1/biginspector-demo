<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

    // for admin == banner home
    public function fecthAll(){
        $this->db->select('
            id,
            name,
            img_cover,
            create_date,
            update_date,
            is_active
        ');
        $this->db->from('tbl_homebanner');
        $this->db->order_by('id', 'ASC');
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
            'is_active'     => '1'
        );
        $this->db->insert('tbl_homebanner', $data);
        $insert_id = $this->db->insert_id();
        $result =$this->db->affected_rows();
        if ($result > 0) {
            return $insert_id;
        } else {
            return FALSE;
        }
    }

    public function update($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        $data = array(
            'img_cover'     => $arr['image_cover'],
            'update_date'   => $cur_date
        );

        $this->db->where('id', $arr['banner_id']);
        $this->db->update('tbl_homebanner', $data);
        return $this->db->affected_rows();

    }
    public function getDesc($id)
    {
        $this->db->select('
            id,
            name,
            img_cover,
            create_date,
            update_date,
            is_active
        ');
        $this->db->from('tbl_homebanner');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update2($arr)
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
        $this->db->update('tbl_homebanner', $data);
        return $this->db->affected_rows();
    }

    // for abmin banner about
    public function fecthAbout()
    {
        $this->db->select('*');
        $this->db->from('tbl_bannerabout');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fecthAboutActive()
    {
        $this->db->select('*');
        $this->db->from('tbl_bannerabout');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAboutDesc($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_bannerabout');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_about($arr)
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
        $this->db->update('tbl_bannerabout', $data);
        return $this->db->affected_rows();

    }
    public function fecthService()
    {
        $this->db->select('*');
        $this->db->from('tbl_bannerservice');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getServiceDesc($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_bannerservice');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_service($arr)
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
        $this->db->update('tbl_bannerservice', $data);
        return $this->db->affected_rows();
        
    }
    public function fecthPersonal()
    {
        $this->db->select('*');
        $this->db->from('tbl_bannerpersonal');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getPersonalDesc($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_bannerpersonal');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_personal($arr)
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
        $this->db->update('tbl_bannerpersonal', $data);
        return $this->db->affected_rows();
    }
    
    
}

?>