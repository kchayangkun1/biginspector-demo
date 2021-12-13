<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation'); 
		$this->load->model('Banner_model');
		$this->load->model('Category_model');
		$this->load->model('Portfolio_model');
	}
	public function index()
	{
		$data['banners'] = $this->Banner_model->fetchActive(); // call all banners active
		$data['categories'] = $this->Category_model->fetchActive(); // call all categories active


		$data['port_recoms'] = $this->Portfolio_model->recommended(); 

		$this->load->view('header-script'); // load header script
		$this->load->view('home',$data);
		$this->load->view('footer');
	}

}
