<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation'); 
		$this->load->model('Product_model');
	}
    public function index()
	{
		$data['new_products'] = $this->Product_model->new_product();
		$data['recom_products'] = $this->Product_model->fetchRecommend();

		$this->load->view('head');
		$this->load->view('banner');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}
}
