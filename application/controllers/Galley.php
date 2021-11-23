<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class galley extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		// $this->load->model('home');
	}

    public function index()
	{
		$this->load->view('head');
		$this->load->view('galley');
		$this->load->view('followup');
		$this->load->view('footer');
	}
}
