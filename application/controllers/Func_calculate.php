<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_calculate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('Service_model');
	}
    public function filterFloor()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name
		$this->security->get_csrf_hash(); // get CSRF Token generate
        // filterCarBrand
        // 
        $action = $this->security->xss_clean($this->input->post('action', TRUE));
        // for add new
        if($action =='addNew'){
            $proptype_id = $this->security->xss_clean($this->input->post('typeid', TRUE));
            $results = $this->Service_model->getFloor($proptype_id);
            $opt ='';
            $opt .='<option value="">-- กรุณาเลือก --</option>';
            foreach ($results as $item) {
                $opt .='<option value="'.$item['floor'].'">'.$item['floor'].'</option>';
            }  
        }         
        echo  $opt;
    }

	public function search()
    {
        // data:stringArray,diskm:distance_kilometer, action:'serviceCharge',
        $metropolitan = array(
            '0' => 'กรุงเทพมหานคร',
            '1' => 'Bangkok',
            '2' => 'นครปฐม',
            '3' => 'Nakhon Pathom',
            '4' => 'นนทบุรี',
            '5' => 'Nonthaburi',
            '6' => 'ปทุมธานี',
            '7' => 'Pathum Thani',
            '8' => 'สมุทรปราการ',
            '9' => 'Samut Prakan',
            '10' => 'สมุทรสาคร',
            '11' => 'Samut Sakhon'
        );
        
        $arrString = $this->security->xss_clean($this->input->post('data', TRUE));
        $distance = $this->security->xss_clean($this->input->post('diskm', TRUE));
        $housingType = $this->security->xss_clean($this->input->post('housingType', TRUE)); // ประเภท
        $floor = $this->security->xss_clean($this->input->post('floor', TRUE)); // ชั้น
        $usableArea = $this->security->xss_clean($this->input->post('usableArea', TRUE)); // พื้นที่ใช้สอย
        $action = $this->security->xss_clean($this->input->post('action', TRUE));
        // $output = array_merge($metropolitan, $arrString);
        $commonValue = array_intersect($metropolitan, $arrString); // to check two arrays for find duplicates
        $count_metro = count(array_filter($commonValue));

        $results = $this->Service_model->search($housingType,$usableArea); // call search relateds
        
        echo '<pre>';
        print_r($arrString);
        echo '</pre>';
        echo 'distance='.$distance;
        echo '<br>';
        echo 'housingType='.$housingType;
        echo '<br>';
        echo 'floor='.$floor;
        echo '<br>';
        echo 'usableArea='.$usableArea;
        echo '<br>';
        
        echo '<pre>';
        print_r($commonValue);
        echo '</pre>';
        echo '$count_metro='.$count_metro;


        echo '<pre>';
        print_r($results);
        echo '</pre>';
        // check distance less than 300 km./kilometers
        if($distance <=300){
            // bkk
            if($distance <=300 && $count_metro > 0){
                echo 'Y';
            } else {
                echo 'N';
            }
        } else {
            echo 'ขออภัยในความไม่สะดวก ปัจจุบันพื้นที่ดังกล่าวยังไม่อยู่ในพื้นที่ให้บริการของเรา';
        }
        
    }
}
