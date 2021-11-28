<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination'); // load pagination
		$this->load->model('Article_model');
	}

    public function page()
	{
		$_get = $this->security->xss_clean($this->input->get());
		$product_id= $this->uri->segment(2);
		
		$config['base_url'] = base_url().'article/';
		if (count($_get) > 0) $config['suffix'] = '/?' . http_build_query($_get, '', "&");
		if (count($_get) > 0) $config['first_url'] = $config['base_url'].'/?'.http_build_query($_get);
		$config['total_rows'] = $this->Article_model->countAllActive(); // จำนวนข้อมูลทั้งหมด

		$config['per_page'] = 9;        
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
		$data['articlies'] = $this->Article_model->page_data($config["per_page"], $page);

		$this->load->view('head');
		$this->load->view('followup');
		$this->load->view('article/article',$data);
		$this->load->view('followup');
		$this->load->view('footer');
	}

	public function detail()
	{
		$art_id = $this->uri->segment(2);

		$data['article_desc'] = $this->Article_model->getDetail($art_id);
		$data['related_articles'] = $this->Article_model->relatedArticles();

		$this->load->view('head');
		$this->load->view('article/detail', $data);
		$this->load->view('followup');
		$this->load->view('footer');
	}
}
