<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination'); // load pagination
		$this->load->library('form_validation'); 
		$this->load->model('Gallery_model');
	}

    public function page()
	{
		
		$_get = $this->security->xss_clean($this->input->get());
		$product_id= $this->uri->segment(2);
		
		$config['base_url'] = base_url().'gallery/';
		if (count($_get) > 0) $config['suffix'] = '/?' . http_build_query($_get, '', "&");
		if (count($_get) > 0) $config['first_url'] = $config['base_url'].'/?'.http_build_query($_get);
		$config['total_rows'] = $this->Gallery_model->countAllActive(); // จำนวนข้อมูลทั้งหมด
		echo '<pre>';
		print_r($config['total_rows']);
		echo '</pre>';

		$config['per_page'] = 8;        
		$config['uri_segment'] = 2;   
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['first_link']       = false;
		$config['last_link']        = false;
		$config['full_tag_open']    = '<ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul>';
		$config['attributes']       = ['class' => 'page-link'];
		$config['first_tag_open']   = '<li class="page-item">';
		$config['first_tag_close']  = '</li>';
		$config['prev_tag_open']    = '<li class="page-item">';
		$config['prev_tag_close']   = '</li>';
		$config['next_tag_open']    = '<li class="page-item">';
		$config['next_tag_close']   = '</li>';
		$config['last_tag_open']    = '<li class="page-item">';
		$config['last_tag_close']   = '</li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['num_tag_open']     = '<li class="page-item">';
		$config['num_tag_close']    = '</li>';

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$this->pagination->initialize($config);        
		$data['page_start'] = $page;
		$data['pagination'] = $this->pagination->create_links();        
		$data['list_galleries'] = $this->Gallery_model->page_data($config["per_page"], $page);

		$this->load->view('head');
		$this->load->view('gallery/gallery',$data);
		$this->load->view('followup');
		$this->load->view('footer');

	}
	public function detail()
	{
		$g_id = $this->uri->segment(2);
	
		$data['g_desc'] = $this->Gallery_model->getDetail($g_id);
		$data['g_thumbnail'] = $this->Gallery_model->getThumbnail($g_id);
		$data['g_nums'] = $this->Gallery_model->countThumbnail($g_id);

		$this->load->view('head');
		$this->load->view('gallery/detail',$data);
		$this->load->view('followup');
		$this->load->view('footer');
	}
}
