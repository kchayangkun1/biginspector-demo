

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portfolio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination'); // load pagination
		$this->load->library('form_validation'); 
		$this->load->model('Banner_model');
		$this->load->model('Category_model');
		$this->load->model('Portfolio_model');
		
	}
	public function page()
	{
        $cate_id= $this->uri->segment(2); // get category id
		$data['banners'] = $this->Banner_model->fetchActive(); // call all banners active
		$data['categories'] = $this->Category_model->fetchActive(); // call all categories active

		$_get = $this->security->xss_clean($this->input->get());        
        $config['base_url'] = base_url().'portfolio/'.$cate_id.'/';
        if (count($_get) > 0) $config['suffix'] = '/?' . http_build_query($_get, '', "&");
        if (count($_get) > 0) $config['first_url'] = $config['base_url'].'/?'.http_build_query($_get);
        $config['total_rows'] = $this->Portfolio_model->countByType($cate_id); // จำนวนข้อมูลทั้งหมด
		
		
        $config['per_page'] = 12;        
        $config['uri_segment'] = 3;   
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

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->pagination->initialize($config);        
        $data['page_start'] = $page;
        $data['pagination'] = $this->pagination->create_links();        
        $data['ports'] = $this->Portfolio_model->getPageData($config["per_page"], $page,$cate_id); 
		$data['slug'] = $this->security->xss_clean($this->input->get('slug', TRUE));


		$this->load->view('header-script'); // load header script
		$this->load->view('portfolio/portfolio',$data);
		$this->load->view('footer');
	}
	public function detail()
	{
		$port_id = $this->uri->segment(2);
		$data['categories'] = $this->Category_model->fetchActive(); // call all categories active
		$data['banners'] = $this->Banner_model->fetchActive(); // call all banners active

		$data['port_descs'] = $this->Portfolio_model->get_detail($port_id); 
		$data['port_thumbs'] = $this->Portfolio_model->thumbnailAll($port_id); 
		$data['slug'] = $this->security->xss_clean($this->input->get('slug', TRUE));

		$this->load->view('header-script'); // load header script
		$this->load->view('portfolio/detail',$data);
		$this->load->view('footer');
	}

}
