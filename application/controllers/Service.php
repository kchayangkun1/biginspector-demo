<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Service_model');
	}

    public function index()
	{
		$this->load->view('head');
		$this->load->view('service/service');
		$this->load->view('footer');
	}

	public function detail()
	{
		$s_id = $this->uri->segment(2);
        
        $b64 = strtr($s_id, '-_', '+/'); // Convert Base64URL to Base64 by replacing “-” with “+” and “_” with “/”
        $decoded = base64_decode($b64); // Decode Base64 string and return the original data
		
        if(is_numeric($decoded)){
			$data['s_descs'] = $this->Service_model->getDetails($decoded); 
			$data['s_images'] = $this->Service_model->getImages($decoded); 
			$data['num_img'] = count($data['s_images']);
			$this->load->view('head');
			$this->load->view('service/detail',$data);
			$this->load->view('footer');

		} else {
			redirect('error', 'refresh');
		}

	}
}
