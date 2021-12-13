<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

    // for admin
    public function service_rating(){
        $this->db->select('
            tbl_service_rate.id,
            tbl_service_rate.prop_type,
            tbl_service_rate.floor,
            tbl_service_rate.usable_area,
            tbl_service_rate.travel_expenses_id,
            tbl_service_rate.price,
            tbl_service_rate.add_charge,
            tbl_service_rate.discount,
            tbl_service_rate.discount_type,
            tbl_service_rate.create_date,
            tbl_service_rate.update_date,
            tbl_service_rate.is_active,
            tbl_service_rate.remark,
            tbl_type.id AS t_id,
            tbl_type.name AS t_name,
            tbl_travel_expenses.id AS travel_id,
            tbl_travel_expenses.name AS travel_name,
            tbl_travel_expenses.tr_distance,
            tbl_travel_expenses.price AS travel_price
        ');
        $this->db->from('tbl_service_rate');
        $this->db->join('tbl_type','tbl_service_rate.prop_type = tbl_type.id','left');
        $this->db->join('tbl_travel_expenses','tbl_service_rate.travel_expenses_id = tbl_travel_expenses.id','left');
        $this->db->order_by('tbl_service_rate.id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fecthTravelExpenses()
    {
        $this->db->select('*');
        $this->db->from('tbl_travel_expenses');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function create($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
       
        $data = array(
            'prop_type'             => $arr['housing_type'],
            'floor'                 => $arr['floor'],
            'usable_area'           => $arr['usable_area'],
            'travel_expenses_id'    => $arr['travel_expense'],
            'price'                 => $arr['price_rate'],
            'add_charge'            => $arr['price_add'],
            'discount'              => $arr['promo_price'],
            'discount_type'         => $arr['discount_type'],
            'create_date'           => $cur_date,
            'update_date'           => $cur_date,
            'is_active'             => '1',
            'remark'                => $arr['usable_remark']
        );

        $this->db->insert('tbl_service_rate', $data);
        // $insert_id = $this->db->insert_id();
        return $this->db->affected_rows();
    }
    public function create_expenses($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
       
        $data = array(
            'name'          => $arr['position'],
            'dsc'           => $arr['dsc'],
            'tr_distance'   => $arr['distance'],
            'price'         => $arr['tr_price'],
            'create_date'   => $cur_date,
            'update_date'   => $cur_date,
            'is_active'     => '1'
        );

        $this->db->insert('tbl_travel_expenses', $data);
        return $this->db->affected_rows();
    }
    public function get_expenses_desc($id){
        $this->db->select('*');
        $this->db->from('tbl_travel_expenses');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_expenses($arr){
        date_default_timezone_set("Asia/Bangkok");
        $updated = date("Y-m-d H:i:s");

        $data = array(
            'name'          => $arr['position'],
            'dsc'           => $arr['dsc'],
            'tr_distance'   => $arr['distance'],
            'price'         => $arr['tr_price'],
            'update_date'   => $updated
        );
        $this->db->where('id', $arr['tr_expn_id']);
        $this->db->update('tbl_travel_expenses', $data);
        return $this->db->affected_rows();;
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
        $this->db->update('tbl_travel_expenses', $data);
        return $this->db->affected_rows();;
    }
    public function get_proptype(){
        $this->db->select('id,name');
        $this->db->from('tbl_type');
        $this->db->where('is_active',1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getFloor($id){
        $this->db->select('DISTINCT(floor)');
        $this->db->from('tbl_service_rate');
        $this->db->where('prop_type', $id);
        $this->db->order_by('floor','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function search($housingType,$usableArea)
    {
        $this->db->select('
            tbl_service_rate.id,
            tbl_service_rate.prop_type,
            tbl_service_rate.floor,
            tbl_service_rate.usable_area,
            tbl_service_rate.travel_expenses_id,
            tbl_service_rate.price,
            tbl_service_rate.add_charge,
            tbl_service_rate.discount,
            tbl_service_rate.discount_type,
            tbl_service_rate.is_active,
            tbl_service_rate.remark,
            tbl_travel_expenses.id AS tr_id,
            tbl_travel_expenses.name AS tr_name,
            tbl_travel_expenses.tr_distance,
            tbl_travel_expenses.price AS tr_price,
            tbl_type.id AS t_id,
            tbl_type.name AS t_name
        ');
        $this->db->from('tbl_service_rate');
        $this->db->join('tbl_travel_expenses','tbl_service_rate.travel_expenses_id = tbl_travel_expenses.id','inner');
        $this->db->join('tbl_type','tbl_service_rate.prop_type = tbl_type.id','inner');
        $this->db->where('tbl_service_rate.prop_type', $housingType);
        $this->db->where('tbl_service_rate.usable_area <=', $usableArea);
        $this->db->where('tbl_service_rate.is_active', '1');
        $this->db->order_by('tbl_service_rate.id','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    // // home slides
    // public function fetchActive(){
    //     $this->db->select('
    //         id,
    //         name,
    //         img_cover,
    //         is_active
    //     ');
    //     $this->db->from('tbl_banner');
    //     $this->db->where('is_active',1);
    //     $this->db->order_by('id', 'ASC');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function getDetail($id)
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
    //     $this->db->where('id',$id);
    //     $this->db->order_by('id', 'DESC');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function update($arr)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
    //     if($arr['image_cover'] !=''){
    //         $data = array(
    //             'name'          => $arr['name'],
    //             'img_cover'     => $arr['image_cover'],
    //             'update_date'   => $cur_date
    //         );
    //     } else{
    //         $data = array(
    //             'name'          => $arr['name'],
    //             'update_date'   => $cur_date
    //         );
    //     }

    //     $this->db->where('id', $arr['banner_id']);
    //     $this->db->update('tbl_banner', $data);
    //     return $this->db->affected_rows();
    // }

    // public function distroy($id,$status)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $updated = date("Y-m-d");

    //     $data = array(
    //         'is_active'     => $status,
    //         'update_date'   => $updated
    //     );
    //     $this->db->where('id', $id);
    //     $this->db->update('tbl_banner', $data);
    //     return $this->db->affected_rows();;
    // }
    
    
    
    
}

?>