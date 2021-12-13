<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation'); 
		$this->load->model('Banner_model');
		$this->load->model('Category_model');
	}
	public function index()
	{
		$data['banners'] = $this->Banner_model->fetchActive(); // call all banners active
		$data['categories'] = $this->Category_model->fetchActive(); // call all categories active

		$this->load->view('header-script'); // load header script
		$this->load->view('service/service',$data); // render page
		$this->load->view('footer');
	}

}
