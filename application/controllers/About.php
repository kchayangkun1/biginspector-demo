<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Banner_model');
	}

    public function index()
	{
		$data['banners'] = $this->Banner_model->fetchActive();//  call all banners active

		$this->load->view('header-script'); // load header scripts
		$this->load->view('about',$data);
		$this->load->view('footer');
	}
}
