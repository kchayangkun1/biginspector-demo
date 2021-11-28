<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation'); 
		$this->load->model('Product_model');
		$this->load->model('Banner_model');
		$this->load->model('Gallery_model');
	}
    public function index()
	{
		$data['banner'] = $this->Banner_model->fecthAll(); // banner
		$data['recom_gallery'] = $this->Gallery_model->fetchRecommend();

		$this->load->view('head');
		$this->load->view('home',$data);
		$this->load->view('followup');
		$this->load->view('footer');
	}
}
