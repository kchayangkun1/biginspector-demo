

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portfolio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation'); 
		$this->load->model('Banner_model');
	}
	public function index()
	{
		$data['banners'] = $this->Banner_model->fetchActive(); // call all banners active

		$this->load->view('header-script'); // load header script
		$this->load->view('portfolio/portfolio',$data);
		$this->load->view('footer');
	}
	public function detail()
	{
		$data['banners'] = $this->Banner_model->fetchActive(); // call all banners active

		$this->load->view('header-script'); // load header script
		$this->load->view('portfolio/detail',$data);
		$this->load->view('footer');
	}

}
