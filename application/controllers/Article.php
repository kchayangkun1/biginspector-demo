<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		// $this->load->model('home');
	}

    public function index()
	{
		$this->load->view('head');
		$this->load->view('article');
		$this->load->view('followup');
		$this->load->view('footer');
	}
	public function detailarticle()
	{
		$this->load->view('head');
		$this->load->view('detailarticle');
		$this->load->view('followup');
		$this->load->view('footer');
	}
}
