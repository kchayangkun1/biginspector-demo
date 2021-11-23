<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    // for admin
    public function fetchAll(){

        $this->db->select('
            id,
            name,
            price,
            dsc,
            img_cover,
            create_date,
            update_date,
            is_active,
            is_recommend,
            is_new,
            is_promotion
        ');
        $this->db->from('tbl_product');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    // for admin
    public function getImages($product_id)
    {
        $this->db->select('
            simg_id,
            product_id,
            img_name,
            title,
            order_id,
            is_active,
            create_date
        ');
        $this->db->from('tbl_product_img');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function new_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active','1');
        $this->db->where('is_new','1');
        $this->db->where('is_recommend','0');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetchRecommend()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active','1');
        $this->db->where('is_recommend','1');
        $this->db->where('is_new','0');
        $this->db->order_by('id', 'ASC');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function rands_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countIsNew()
    {   
        return $this->db->where(['is_active'=> '1'])->where(['is_recommend'=> '0'])->where(['is_new'=> '1'])->from("tbl_product")->count_all_results();
    }
    public function countIsRecom()
    {   
        return $this->db->where(['is_active'=> '1'])->where(['is_recommend'=> '1'])->where(['is_new'=> '0'])->from("tbl_product")->count_all_results();
    }
    // ไว้สำหรับนับข้อมูลทั้งหมด total_rows
    public function countAllActive()
    {   
        return $this->db->where(['is_active'=> 1])->from("tbl_product")->count_all_results();
    }
    public function get_page_date($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active', '1');
        $this->db->limit($limit, $start); 
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countImagesActive($pid)
    {   
        return $this->db->where(['is_active'=> 1])->where(['product_id'=> $pid])->from("tbl_product_img")->count_all_results();
    }
    
    public function create($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        /*

        $data = array(
                'name'          => $name,
                'short_dsc'     => $short_dsc,
                'description'   => $description
            );

        */
    
        $data = array(
            'name'          => $arr['name'],
            'dsc'           => $arr['description'],
            'short_dsc'         => $arr['short_dsc'],
            'is_active'     => '1',
            'is_recommend'  => '0',
            'is_new'        => '0',
            'is_promotion'  => '0',
            'create_date'   => $cur_date,
            'update_date'   => $cur_date
        );
        $this->db->insert('tbl_product', $data);
        $insert_id = $this->db->insert_id();
        $result =$this->db->affected_rows();
        if ($result > 0) {
            return $insert_id;
        } else {
            return FALSE;
        }
    }
    // update image Cover
    public function updatefileUpload($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        $data = array(
            'img_cover' => $arr['image_cover'],
            'update_date' => $cur_date
        );
        $this->db->where('id', $arr['art_id']);
        $this->db->update('tbl_product', $data);
        return $this->db->affected_rows();
    }
    // upload product image
    public function insertProductImg($dataArr2,$last_pid)
    {
        $i = 1;
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        foreach($dataArr2 as $val) {
            $dataToSave = array(
                'product_id'    => $last_pid,
                'img_name'      => $val['image_cover'],
                'order_id'      => $i,
                'is_active'     => '1',
                'create_date'   => $cur_date
            );
           $this->db->insert('tbl_product_img', $dataToSave);
            $i++;
         }
        return $this->db->affected_rows() > 0;
    }
    public function getDesc($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getName($id)
    {
        $this->db->select('name,id');
        $this->db->from('tbl_product');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getImg($product_id)
    {
        $this->db->select('
            simg_id,
            product_id,
            img_name,
            title,
            order_id,
            is_active,
            create_date
        ');
        $this->db->from('tbl_product_img');
        $this->db->where('product_id', $product_id);
        $this->db->where('is_active', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_title($id,$title)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'title'         => $title,
            'create_date'   => $cur_date
        );
        $this->db->where('simg_id', $id);
        $this->db->update('tbl_product_img', $data);
        return $this->db->affected_rows();
    }
    // update is_active
    public function update_status($simg_id,$st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'is_active'         => $st,
            'create_date'   => $cur_date
        );
        $this->db->where('simg_id', $simg_id);
        $this->db->update('tbl_product_img', $data);
        return $this->db->affected_rows();
    }

    public function distroy_image($id)
    {
            
        $this->db->select('
            simg_id,
            product_id,
            img_name,
            is_active
        ');
        $this->db->from('tbl_product_img');
        $this->db->where('simg_id', $id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if($num > 0){
            $result = $query->result_array(); 
            
            $prod_id = $result[0]['product_id'];
        
            $path ='assets/images/product/'.$prod_id.'/';
            
            // delete & unlink before upload    
            $this->db->where('simg_id', $id);
            $this->db->delete('tbl_product_img');

            $remove_img = unlink($path . $result[0]['img_name']);

            return $remove_img;
            
        } else{
            return FALSE;
        }
    }

    public function update_isactive($id, $st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'is_active'     => $st,
            'update_date'   => $cur_date
        );

        $this->db->where('id', $id);
        $this->db->update('tbl_product', $data);
        return $this->db->affected_rows();
    }

    public function update_isrecommend($id, $st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'is_recommend'  => $st,
            'update_date'   => $cur_date
        );

        $this->db->where('id', $id);
        $this->db->update('tbl_product', $data);
        return $this->db->affected_rows();
    }

    public function update_isnew($id, $st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'is_new'        => $st,
            'update_date'   => $cur_date
        );

        $this->db->where('id', $id);
        $this->db->update('tbl_product', $data);
        return $this->db->affected_rows();
    }
    public function update_product($arr){
        
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'name'          => $arr['name'],
            'short_dsc'         => $arr['short_dsc'],
            'dsc'           => $arr['description'],
            'update_date'   => $cur_date
        );

        $this->db->where('id', $arr['art_id']);
        $this->db->update('tbl_product', $data);
        return $this->db->affected_rows(); 
    }

}

?>