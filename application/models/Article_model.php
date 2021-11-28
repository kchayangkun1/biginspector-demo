<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {

    // ไว้สำหรับนับข้อมูลทั้งหมด total_rows
    public function countAllActive()
    {   
        return $this->db->where(['is_active'=> '1'])->from("tbl_product")->count_all_results();
    }
    public function page_data($limit, $start)
    {
        $this->db->select('
            id,
            name,
            short_dsc,
            dsc,
            price,
            img_cover,
            create_date,
            update_date,
            is_active,
            is_recommend,
            is_new,
            is_promotion
        ');
        $this->db->from('tbl_product');
        $this->db->where('is_active', '1');
        $this->db->order_by('id', 'ASC');
        $this->db->limit($limit, $start); 
        $query = $this->db->get();
        return $query->result_array();
    }
    

    public function getDetail($id)
    {
        $this->db->select('
            id,
            name,
            short_dsc,
            dsc,
            price,
            img_cover,
            create_date,
            update_date,
            is_active,
            is_recommend,
            is_new,
            is_promotion
        ');
        $this->db->from('tbl_product');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();

    }

    public function relatedArticles()
    {
        $this->db->select('
            id,
            name,
            short_dsc,
            dsc,
            price,
            img_cover,
            create_date,
            update_date,
            is_active,
            is_recommend,
            is_new,
            is_promotion
        ');
        $this->db->from('tbl_product');
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function fetchRecommend()
    // {
    //     $this->db->select('
    //         id,
    //         name,
    //         short_dsc,
    //         dsc,
    //         img_cover,
    //         is_active,
    //         is_recommend,
    //         is_new
    //     ');
    //     $this->db->from('tbl_gallery');
    //     $this->db->where('is_recommend', '1');
    //     $this->db->order_by('id', 'ASC');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // // ไว้สำหรับนับข้อมูลทั้งหมด total_rows
    // public function countAllActive()
    // {   
    //     return $this->db->where(['is_active'=> '1'])->from("tbl_gallery")->count_all_results();
    // }
    // public function page_data($limit, $start)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_gallery');
    //     $this->db->where('is_active', '1');
    //     $this->db->limit($limit, $start); 
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function countIsNew()
    // {   
    //     return $this->db->where(['is_active'=> '1'])->where(['is_recommend'=> '0'])->where(['is_new'=> '1'])->from("tbl_gallery")->count_all_results();
    // }

    // public function countIsRecom()
    // {   
    //     return $this->db->where(['is_active'=> '1'])->where(['is_recommend'=> '1'])->where(['is_new'=> '0'])->from("tbl_gallery")->count_all_results();
    // }
    
    // public function create($arr)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
    //     /*

    //     $data = array(
    //             'name'          => $name,
    //             'short_dsc'     => $short_dsc,
    //             'description'   => $description
    //         );

    //     */
    
    //     $data = array(
    //         'name'          => $arr['name'],
    //         'short_dsc'     => $arr['short_dsc'],
    //         'is_active'     => '1',
    //         'is_recommend'  => '0',
    //         'is_new'        => '0',
    //         'is_promotion'  => '0',
    //         'create_date'   => $cur_date,
    //         'update_date'   => $cur_date
    //     );
    //     $this->db->insert('tbl_gallery', $data);
    //     $insert_id = $this->db->insert_id();
    //     $result =$this->db->affected_rows();
    //     if ($result > 0) {
    //         return $insert_id;
    //     } else {
    //         return FALSE;
    //     }
    // }

    //     // update image Cover
    // public function updatefileUpload($arr)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");

    //     $data = array(
    //         'img_cover' => $arr['image_cover'],
    //         'update_date' => $cur_date
    //     );
    //     $this->db->where('id', $arr['g_id']);
    //     $this->db->update('tbl_gallery', $data);
    //     return $this->db->affected_rows();
    // }

    // // upload product image
    // public function insertProductImg($dataArr2,$last_gid)
    // {
    //     $i = 1;
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
        
    //     foreach($dataArr2 as $val) {
    //         $dataToSave = array(
    //             'gallery_id'    => $last_gid,
    //             'img_name'      => $val['image_cover'],
    //             'order_id'      => $i,
    //             'is_active'     => '1',
    //             'create_date'   => $cur_date
    //         );
    //        $this->db->insert('tbl_gallery_img', $dataToSave);
    //         $i++;
    //      }
    //     return $this->db->affected_rows() > 0;
    // }

    // public function getName($id)
    // {
    //     $this->db->select('name,id');
    //     $this->db->from('tbl_gallery');
    //     $this->db->where('id', $id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // // for admin
    // public function getImages($g_id)
    // {
    //     $this->db->select('
    //         gimg_id,
    //         gallery_id,
    //         img_name,
    //         title,
    //         order_id,
    //         is_active,
    //         create_date
    //     ');
    //     $this->db->from('tbl_gallery_img');
    //     $this->db->where('gallery_id', $g_id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function update_title($id,$title)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
        
    //     $data = array(
    //         'title'         => $title,
    //         'create_date'   => $cur_date
    //     );
    //     $this->db->where('gimg_id', $id);
    //     $this->db->update('tbl_gallery_img', $data);
    //     return $this->db->affected_rows();
    // }

    // // update is_active
    // public function update_status($gimg_id,$st)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
        
    //     $data = array(
    //         'is_active'     => $st,
    //         'create_date'   => $cur_date
    //     );
    //     $this->db->where('gimg_id', $gimg_id);
    //     $this->db->update('tbl_gallery_img', $data);
    //     return $this->db->affected_rows();
    // }

    // public function distroy_image($id)
    // {
            
    //     $this->db->select('
    //         gimg_id,
    //         gallery_id,
    //         img_name,
    //         is_active
    //     ');
    //     $this->db->from('tbl_gallery_img');
    //     $this->db->where('gimg_id', $id);
    //     $query = $this->db->get();
    //     $num = $query->num_rows();
    //     if($num > 0){
    //         $result = $query->result_array(); 
            
    //         $gallery_id = $result[0]['gallery_id'];
        
    //         $path ='assets/images/gallery/'.$gallery_id.'/';
            
    //         // delete & unlink before upload    
    //         $this->db->where('gimg_id', $id);
    //         $this->db->delete('tbl_gallery_img');

    //         $remove_img = unlink($path . $result[0]['img_name']);

    //         return $remove_img;
            
    //     } else{
    //         return FALSE;
    //     }
    // }

    // public function getDesc($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_gallery');
    //     $this->db->where('id', $id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function update_product($arr){
        
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
        
    //     $data = array(
    //         'name'          => $arr['name'],
    //         'short_dsc'     => $arr['short_dsc'],
    //         'update_date'   => $cur_date
    //     );

    //     $this->db->where('id', $arr['g_id']);
    //     $this->db->update('tbl_gallery', $data);
    //     return $this->db->affected_rows(); 
    // }

    // public function update_isrecommend($id, $st)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
        
    //     $data = array(
    //         'is_recommend'  => $st,
    //         'update_date'   => $cur_date
    //     );

    //     $this->db->where('id', $id);
    //     $this->db->update('tbl_gallery', $data);
    //     return $this->db->affected_rows();
    // }

    // public function getDetail($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_gallery');
    //     $this->db->where('id', $id);
    //     $this->db->limit(1);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    // public function getThumbnail($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_gallery_img');
    //     $this->db->where('gallery_id', $id);
    //     $this->db->where('is_active', $id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function countThumbnail($id)
    // {
    //     return $this->db->where(['gallery_id'=> $id])->where(['is_active'=> '1'])->from("tbl_gallery_img")->count_all_results();

    // }
    

}

?>