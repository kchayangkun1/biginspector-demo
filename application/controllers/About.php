<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Banner_model');
		$this->load->model('Category_model');
		
	}

    public function index()
	{
		$data['categories'] = $this->Category_model->fetchActive(); // call all categories active
		$data['banners'] = $this->Banner_model->fetchActive();//  call all banners active

		$this->load->view('header-script'); // load header scripts
		$this->load->view('about',$data);
		$this->load->view('footer');
	}
}
