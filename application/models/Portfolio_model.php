<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model {

    // for admin
    public function fetchAll(){

        $this->db->select('
            tbl_portfolio.id,
            tbl_portfolio.name,
            tbl_portfolio.type_id,
            tbl_portfolio.short_dsc,
            tbl_portfolio.dsc,
            tbl_portfolio.create_date,
            tbl_portfolio.update_date,
            tbl_portfolio.is_active,
            tbl_portfolio.is_recommend,
            tbl_portfolio.is_new,
            tbl_portfolio.is_promotion,
            tbl_type.id AS t_id,
            tbl_type.`name` AS t_name
        ');
        $this->db->from('tbl_portfolio');
        $this->db->join('tbl_type','tbl_portfolio.type_id = tbl_type.id','inner');
        $this->db->order_by('tbl_portfolio.id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countByType($cate_id)
    {
        return $this->db->where(['is_active'=> 1])->where('type_id',$cate_id)->from("tbl_portfolio")->count_all_results();
    }
    public function getPageData($limit, $start, $cate_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_portfolio');
        $this->db->where('is_active', '1');
        $this->db->where('type_id', $cate_id);
        $this->db->limit($limit, $start); 
        $query = $this->db->get();
        
        return $query->result_array();
        
    }
    public function recommended()
    {
        $this->db->select('
            tbl_portfolio.id,
            tbl_portfolio.name,
            tbl_portfolio.type_id,
            tbl_portfolio.short_dsc,
            tbl_portfolio.dsc,
            tbl_portfolio.img_cover,
            tbl_portfolio.is_active,
            tbl_portfolio.is_recommend,
            tbl_type.id AS t_id,
            tbl_type.name AS t_name,
            tbl_type.dsc AS t_dsc,
            tbl_type.is_active AS t_active
        ');
        $this->db->from('tbl_portfolio');
        $this->db->join('tbl_type','tbl_portfolio.type_id = tbl_type.id','inner');
        $this->db->where('tbl_portfolio.is_active', '1');
        $this->db->where('tbl_portfolio.is_recommend', '1');
        $this->db->order_by('tbl_portfolio.id', 'ASC');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function create($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        $data = array(
            'name'          => $arr['name'],
            'type_id'      => $arr['category'],
            'short_dsc'     => $arr['caption'],
            'create_date'   => $cur_date,
            'update_date'   => $cur_date,
            'is_active'     => '1'
        );
        $this->db->insert('tbl_portfolio', $data);
        $insert_id = $this->db->insert_id();
        $result =$this->db->affected_rows();
        if ($result > 0) {
            return $insert_id;
        } else {
            return FALSE;
        }
    }
        // // update image Cover
    public function updatefileUpload($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d H:i:s");
        $data = array(
            'img_cover'     => $arr['image_cover'],
            'update_date'   => $updated
        );
        $this->db->where('id', $arr['port_id']);
        $this->db->update('tbl_portfolio', $data);
        return $this->db->affected_rows();
    }
        // // upload product image
    public function insertProductImg($dataArr2,$port_id)
    {
        $i = 1;
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        foreach($dataArr2 as $val) {
            $dataToSave = array(
                'portfolio_id'  => $port_id,
                'img_name'      => $val['image_cover'],
                'order_id'      => $i,
                'is_active'     => '1',
                'create_date'   => $cur_date
            );
           $this->db->insert('tbl_portfolio_img', $dataToSave);
            $i++;
         }
        return $this->db->affected_rows() > 0;
    }
    public function get_detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_portfolio');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d H:i:s");
        $data = array(
            'name'          => $arr['name'],
            'type_id'       => $arr['category'],
            'short_dsc'     => $arr['caption'],
            'update_date'   => $updated
        );
        $this->db->where('id', $arr['port_id']);
        $this->db->update('tbl_portfolio', $data);
        return $this->db->affected_rows();
    }
    public function update_isactive($id, $st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d H:i:s");
        
        $data = array(
            'is_active'     => $st,
            'update_date'   => $updated
        );

        $this->db->where('id', $id);
        $this->db->update('tbl_portfolio', $data);
        return $this->db->affected_rows();
    }
    public function update_isrecommend($id, $st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d H:i:s");
        
        $data = array(
            'is_recommend'  => $st,
            'update_date'   => $updated
        );

        $this->db->where('id', $id);
        $this->db->update('tbl_portfolio', $data);
        return $this->db->affected_rows();
    }
    public function getName($id)
    {
        $this->db->select('name,id');
        $this->db->from('tbl_portfolio');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function thumbnailAll($port_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_portfolio_img');
        $this->db->where('portfolio_id', $port_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_thumb_status($id, $st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d H:i:s");
        
        $data = array(
            'is_active'     => $st,
            'create_date'   => $updated
        );

        $this->db->where('img_id', $id);
        $this->db->update('tbl_portfolio_img', $data);
        return $this->db->affected_rows();
    }
    public function update_title($id,$title)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'title'         => $title,
            'create_date'   => $cur_date
        );
        $this->db->where('img_id', $id);
        $this->db->update('tbl_portfolio_img', $data);
        return $this->db->affected_rows();
    }
    public function distroy_image($id)
    {
            
        $this->db->select('
            img_id,
            portfolio_id,
            img_name
        ');
        $this->db->from('tbl_portfolio_img');
        $this->db->where('img_id', $id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if($num > 0){
            $result = $query->result_array(); 
            
            $port_id = $result[0]['portfolio_id'];
        
            $path ='assets/images/portfolio/'.$port_id.'/';
            
            // delete & unlink before upload    
            $this->db->where('img_id', $id);
            $this->db->delete('tbl_portfolio_img');

            $remove_img = unlink($path . $result[0]['img_name']);

            return $remove_img;
            
        } else{
            return FALSE;
        }
    }
    // public function new_product()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_product');
    //     $this->db->where('is_active',1);
    //     $this->db->where('is_new',1);
    //     $this->db->order_by('id', 'ASC');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    // public function fetchRecommend()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_product');
    //     $this->db->where('is_active',1);
    //     $this->db->where('is_recommend',1);
    //     $this->db->order_by('id', 'ASC');
    //     $this->db->limit(8);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    // public function rands_list()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_product');
    //     $this->db->where('is_active', 1);
    //     $this->db->order_by('is_active', 'RANDOM');
    //     $this->db->limit(8);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    // // ไว้สำหรับนับข้อมูลทั้งหมด total_rows
    // public function countAllActive()
    // {   
    //     return $this->db->where(['is_active'=> 1])->from("tbl_product")->count_all_results();
    // }
    // public function countImagesActive($pid)
    // {   
    //     return $this->db->where(['is_active'=> 1])->where(['product_id'=> $pid])->from("tbl_product_img")->count_all_results();
    // }
    // public function get_page_date($limit, $start)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_product');
    //     $this->db->where('is_active', '1');
    //     $this->db->limit($limit, $start); 
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    

    // public function getImg($product_id)
    // {
    //     $this->db->select('
    //         simg_id,
    //         product_id,
    //         img_name,
    //         title,
    //         order_id,
    //         is_active,
    //         create_date
    //     ');
    //     $this->db->from('tbl_product_img');
    //     $this->db->where('product_id', $product_id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }


    // // update is_active
    // public function update_status($simg_id,$st)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
        
    //     $data = array(
    //         'is_active'         => $st,
    //         'create_date'   => $cur_date
    //     );
    //     $this->db->where('simg_id', $simg_id);
    //     $this->db->update('tbl_product_img', $data);
    //     return $this->db->affected_rows();
    // }







    // public function update_isnew($id, $st)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
        
    //     $data = array(
    //         'is_new'        => $st,
    //         'update_date'   => $cur_date
    //     );

    //     $this->db->where('id', $id);
    //     $this->db->update('tbl_product', $data);
    //     return $this->db->affected_rows();
    // }
    // public function update_product($arr){
        
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
        
    //     $data = array(
    //         'name'          => $arr['name'],
    //         'price'         => $arr['price'],
    //         'dsc'           => $arr['description'],
    //         'update_date'   => $cur_date
    //     );

    //     $this->db->where('id', $arr['product_id']);
    //     $this->db->update('tbl_product', $data);
    //     return $this->db->affected_rows(); 
    // }

}

?>