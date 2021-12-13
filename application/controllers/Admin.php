<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation'); 
        $this->load->library('upload'); 
        $this->load->library('session');
        $this->load->model('Product_model'); 
        $this->load->model('Upload_product_model'); 
        $this->load->model('Upload_portfolio_model'); 
        $this->load->model('Banner_model'); 
        $this->load->model('Category_model'); 
        $this->load->model('Portfolio_model');
        $this->load->model('Service_model');
        
	}
    
	public function home(){
        if(!empty($this->session->userdata('user'))){
           
            $this->load->view('admin/home');
        }
        else{
            
            redirect('Login','refresh');
        }
    }
    public function banner()
    {
        $data['banners'] = $this->Banner_model->fecthAll();
        $this->load->view('admin/list_banner', $data);
    }
    public function edit_banner()
    {
        if(!empty($this->session->userdata('user'))){
            $banner_id = $this->uri->segment(3);
            $data['banner_dsc'] = $this->Banner_model->getDetail($banner_id); 
            $this->load->view('admin/form_banner_edit', $data);
        }else{
            redirect('Login','refresh');
        }

    }

    public function update_banner()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $bh_name = $this->security->xss_clean($this->input->post('name', TRUE));
            $bh_id = $this->security->xss_clean($this->input->post('banner_id', TRUE));
            
            if(!empty($_FILES['covImg']['name'])){
                $config['upload_path'] = './assets/images/banner/';
                $config['file_name']        = $_FILES['covImg']['name'];
                $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                $config['file_ext_tolower'] = TRUE; 
                $config['overwrite']        = TRUE; 
                $config['max_size']         = '0';  
                $config['max_width']        = '0';  
                $config['max_height']       = '0'; 
                $config['max_filename']     = '0'; 
                $config['remove_spaces']    = TRUE; 
                $config['detect_mime']      = TRUE; 
                $config['encrypt_name']     = TRUE; 

                $this->upload->initialize($config);
                $this->upload->do_upload('covImg');
                    
                @$file_upload=$this->upload->data('file_name');
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                }else{  
                    @$image_type=$this->upload->data('image_type');
                    @$file_size=$this->upload->data('file_size');
                    @$file_path=$this->upload->data('file_path');

                    $data = array(
                        'name'          => @$bh_name,
                        'image_cover'   =>  @$file_upload,
                        'banner_id'     => @$bh_id
                    );
                }
            } else {
                $data = array(
                    'name'          => $bh_name,
                    'image_cover'   =>  '',
                    'banner_id'     => @$bh_id
                );
            }
  
            $response = $this->Banner_model->update($data);
            if($response > 0){
                echo "<script>
                    alert('Success!');
                    window.location.href='".base_url("Admin/banner")."';
                </script>";
            } else {
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/banner")."';
                </script>";
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    
    public function distroy_banner()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $b_id = $this->security->xss_clean($this->input->post('sid', TRUE));
            $sts = $this->security->xss_clean($this->input->post('sts', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($b_id) && $action =='delSlide'){
                $response = $this->Banner_model->distroy($b_id,$sts);
                if($response > 0){
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function categories()
    {
        if(!empty($this->session->userdata('user'))){
            $data['categories'] = $this->Category_model->fetchAll(); 
            $this->load->view('admin/list_category', $data);
        }else{
            redirect('Login','refresh');
        }
    }
    public function form_category()
    {
        if(!empty($this->session->userdata('user'))){
            $this->load->view('admin/form_category');
        }else{
            redirect('Login','refresh');
        }
    }
    public function create_category()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            // insert image cover
            if(!empty($_FILES['covImg']['name'])){
                $config['upload_path'] = './assets/images/category/';
                $config['file_name']        = $_FILES['covImg']['name'];
                $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                $config['file_ext_tolower'] = TRUE; 
                $config['overwrite']        = TRUE; 
                $config['max_size']         = '0';  
                $config['max_width']        = '0';  
                $config['max_height']       = '0'; 
                $config['max_filename']     = '0'; 
                $config['remove_spaces']    = TRUE; 
                $config['detect_mime']      = TRUE; 
                $config['encrypt_name']     = TRUE; 
    
                $this->upload->initialize($config);
                $this->upload->do_upload('covImg');
                        
                @$file_upload=$this->upload->data('file_name');
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                }else{  
                    @$image_type=$this->upload->data('image_type');
                    @$file_size=$this->upload->data('file_size');
                    @$file_path=$this->upload->data('file_path');
    
                    $data = array(
                        'name'          => @$name,
                        'image_cover'   =>  @$file_upload
                    );
                }
            } else {
                $data = array(
                    'name'          => $name,
                    'image_cover'   =>  ''
                );
            }
            $response = $this->Category_model->create($data); 
            if($response > 0){
                echo "<script>
                    alert('Success!');
                    window.location.href='".base_url("Admin/categories")."';
                </script>";
            } else {
                echo "<script>
                    alert('Failed!');
                    window.location.href='".base_url("Admin/categories")."';
                </script>";
            }
            // end
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function distroy_categoty()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $c_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $st = $this->security->xss_clean($this->input->post('st', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($c_id) && $action =='changeStatus'){
                $response = $this->Category_model->update_status($c_id,$st);
                if($response > 0){
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function edit_category()
    {
        if(!empty($this->session->userdata('user'))){
            $cate_id = $this->uri->segment(3);
            $data['cate_dsc'] = $this->Category_model->getDesc($cate_id); 
            $this->load->view('admin/form_category_edit', $data); 
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function update_category()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            $cate_id = $this->security->xss_clean($this->input->post('cate_id', TRUE));
            
            if(!empty($_FILES['covImg']['name'])){
                $config['upload_path'] = './assets/images/category/';
                $config['file_name']        = $_FILES['covImg']['name'];
                $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                $config['file_ext_tolower'] = TRUE; 
                $config['overwrite']        = TRUE; 
                $config['max_size']         = '0';  
                $config['max_width']        = '0';  
                $config['max_height']       = '0'; 
                $config['max_filename']     = '0'; 
                $config['remove_spaces']    = TRUE; 
                $config['detect_mime']      = TRUE; 
                $config['encrypt_name']     = TRUE; 
    
                $this->upload->initialize($config);
                $this->upload->do_upload('covImg');
                        
                @$file_upload=$this->upload->data('file_name');
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                }else{  
                    @$image_type=$this->upload->data('image_type');
                    @$file_size=$this->upload->data('file_size');
                    @$file_path=$this->upload->data('file_path');
    
                    $data = array(
                        'name'          => @$name,
                        'image_cover'   =>  @$file_upload,
                        'cate_id'       => @$cate_id
                    );
                }
            } else {
                $data = array(
                    'name'          => @$name,
                    'image_cover'   =>  '',
                    'cate_id'       => @$cate_id
                );
            }
            $response = $this->Category_model->update($data); 
            if($response > 0){
                echo "<script>
                    alert('Success!');
                    window.location.href='".base_url("Admin/categories")."';
                </script>";
            } else {
                echo "<script>
                    alert('Success!');
                    window.location.href='".base_url("Admin/categories")."';
                </script>";
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function portfolio()
    {
        if(!empty($this->session->userdata('user'))){
            $data['portfolios'] = $this->Portfolio_model->fetchAll(); 
            $this->load->view('admin/list_portfolio', $data);
        }else{
            redirect('Login','refresh');
        }
    }
    public function form_portfolio()
    {
        if(!empty($this->session->userdata('user'))){
            $data['categories'] = $this->Category_model->fetchActive(); 
            $this->load->view('admin/form_portfolio', $data);
        }else{
            redirect('Login','refresh');
        }
    }
    public function create_portfolio()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name();
            $this->security->get_csrf_hash();
    
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            $category = $this->security->xss_clean($this->input->post('category', TRUE));
            $caption = $this->security->xss_clean($this->input->post('caption', TRUE));
            
            $data = array(
                'name'      => $name,
                'category'  => $category,
                'caption'   => $caption
            );
            $last_id = $this->Portfolio_model->create($data); 
            if($last_id > 0){
                $response=1;
                // insert image cover
                if(!empty($_FILES['covImg']['name'])){
                    $folderName = './assets/images/portfolio/cover/'.$last_id.'/';
                    if(!is_dir($folderName))
                    {
                        mkdir($folderName,0755);
                        $config['upload_path'] = $folderName; 
                    } else{
                        $config['upload_path'] = $folderName;
                    }

                    $config['file_name']        = $_FILES['covImg']['name'];
                    $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG';
                    $config['file_ext_tolower'] = TRUE; 
                    $config['overwrite']        = TRUE; 
                    $config['max_size']         = '0';  
                    $config['max_width']        = '0';  
                    $config['max_height']       = '0'; 
                    $config['max_filename']     = '0'; 
                    $config['remove_spaces']    = TRUE; 
                    $config['detect_mime']      = TRUE;
                    $config['encrypt_name']     = FALSE;
        
                    $this->upload->initialize($config);    
                    $this->upload->do_upload('covImg'); 
                        
                    $file_upload=$this->upload->data('file_name');  
                    if($this->upload->display_errors()){ 
                        echo $this->upload->display_errors();  
                    }else{  
                        $image_type=$this->upload->data('image_type');
                        $file_size=$this->upload->data('file_size');
                        $file_path=$this->upload->data('file_path');
        
                        $dataCover = array(
                            'image_cover'   => $file_upload,
                            'port_id'         => $last_id
                        );
                        // update image_cover where last id
                        $resCov = $this->Portfolio_model->updatefileUpload($dataCover);
                    }
                } 
                // insert album images
                if($last_id > 0){
                    $countfiles = count(array_filter($_FILES['productImg']['name']));
                    if($countfiles > 0){
                        $folderName = './assets/images/portfolio/'.$last_id.'/';
                        if(!is_dir($folderName))
                        {
                            mkdir($folderName,0755);
                            $config['upload_path'] = $folderName; 
                        } else{
                            $config['upload_path'] = $folderName;
                        }
                        // Looping all files 
                        for($i=0;$i<$countfiles;$i++){
                            if(!empty($_FILES['productImg']['name'][$i])){
                                $_FILES['file']['name'] = $_FILES['productImg']['name'][$i];
                                $_FILES['file']['type'] = $_FILES['productImg']['type'][$i];
                                $_FILES['file']['tmp_name'] = $_FILES['productImg']['tmp_name'][$i];
                                $_FILES['file']['error'] = $_FILES['productImg']['error'][$i];
                                $_FILES['file']['size'] = $_FILES['productImg']['size'][$i];
                
                                $config['upload_path'] = $folderName;
                                $config['file_name'] = $_FILES['productImg']['name'][$i];
                                $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                                $config['file_ext_tolower'] = TRUE; 
                                $config['overwrite']        = TRUE; 
                                $config['max_size']         = '0'; 
                                $config['max_width']        = '0'; 
                                $config['max_height']       = '0'; 
                                $config['max_filename']     = '0'; 
                                $config['remove_spaces']    = TRUE; 
                                $config['detect_mime']      = TRUE;
                                $config['encrypt_name']     = FALSE;
                    
                                $this->upload->initialize($config);
                                if($this->upload->do_upload('file')){
                                    $uploadData = $this->upload->data();
                                    $filename1 = $uploadData['file_name'];

                                    $dataImages[] = array(
                                        'image_cover'   => $filename1,
                                    );
                                }
                            }
                        }
                        $resImg = $this->Portfolio_model->insertProductImg($dataImages,$last_id);
                    }
                }
                // end
                if($response > 0 || $resCov > 0 || $resImg > 0){
                    echo "<script>
                        alert('Success!');
                            window.location.href='".base_url("Admin/portfolio")."';
                    </script>";
                } else {
                    echo "<script>
                        alert('failed!');
                        window.location.href='".base_url("Admin/portfolio")."';
                    </script>";
                }
            } else {
                echo "<script>
                    alert('failed! Please try again!');
                    window.location.href='".base_url("Admin/form_portfolio")."';
                </script>";
            }   
        }
        else{
            redirect('Login','refresh');
        }

    }
    public function edit_portfolio()
    {
        if(!empty($this->session->userdata('user'))){
            $port_id = $this->uri->segment(3);
            $data['categories'] = $this->Category_model->fetchActive(); 
            $data['port_descs'] = $this->Portfolio_model->get_detail($port_id); 
            $this->load->view('admin/form_portfolio_edit', $data);
        }else{
            redirect('Login','refresh');
        }
    }
    public function update_portfolio()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name();
            $this->security->get_csrf_hash();
    
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            $category = $this->security->xss_clean($this->input->post('category', TRUE));
            $caption = $this->security->xss_clean($this->input->post('caption', TRUE));
            $port_id = $this->security->xss_clean($this->input->post('port_id', TRUE));
            
            $data = array(
                'name'      => $name,
                'category'  => $category,
                'caption'   => $caption,
                'port_id'   => $port_id
            );
            $res = $this->Portfolio_model->update($data); 
            // insert image cover
            if(!empty($_FILES['covImg']['name'])){
                $folderName = './assets/images/portfolio/cover/'.$port_id.'/';
                if(!is_dir($folderName))
                {
                    mkdir($folderName,0755);
                    $config['upload_path'] = $folderName; 
                } else{
                    $config['upload_path'] = $folderName;
                }

                $config['file_name']        = $_FILES['covImg']['name'];
                $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG';
                $config['file_ext_tolower'] = TRUE; 
                $config['overwrite']        = TRUE; 
                $config['max_size']         = '0';  
                $config['max_width']        = '0';  
                $config['max_height']       = '0'; 
                $config['max_filename']     = '0'; 
                $config['remove_spaces']    = TRUE; 
                $config['detect_mime']      = TRUE;
                $config['encrypt_name']     = FALSE;
        
                $this->upload->initialize($config);    
                $this->upload->do_upload('covImg'); 
                        
                $file_upload=$this->upload->data('file_name');  
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                }else{  
                    $image_type=$this->upload->data('image_type');
                    $file_size=$this->upload->data('file_size');
                    $file_path=$this->upload->data('file_path');
        
                    $dataCover = array(
                        'image_cover'   => $file_upload,
                        'port_id'         => $port_id
                    );
                    // update image_cover where last id
                    $resCov = $this->Portfolio_model->updatefileUpload($dataCover);
                }
            } 
            // insert album images
            $countfiles = count(array_filter($_FILES['productImg']['name']));
            if($countfiles > 0){
                $folderName = './assets/images/portfolio/'.$port_id.'/';
                if(!is_dir($folderName))
                {
                    mkdir($folderName,0755);
                    $config['upload_path'] = $folderName; 
                } else{
                    $config['upload_path'] = $folderName;
                }
                // Looping all files 
                for($i=0;$i<$countfiles;$i++){
                    if(!empty($_FILES['productImg']['name'][$i])){
                        $_FILES['file']['name'] = $_FILES['productImg']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['productImg']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['productImg']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['productImg']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['productImg']['size'][$i];
                
                        $config['upload_path'] = $folderName;
                        $config['file_name'] = $_FILES['productImg']['name'][$i];
                        $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                        $config['file_ext_tolower'] = TRUE; 
                        $config['overwrite']        = TRUE; 
                        $config['max_size']         = '0'; 
                        $config['max_width']        = '0'; 
                        $config['max_height']       = '0'; 
                        $config['max_filename']     = '0'; 
                        $config['remove_spaces']    = TRUE; 
                        $config['detect_mime']      = TRUE;
                        $config['encrypt_name']     = FALSE;
                    
                        $this->upload->initialize($config);
                        if($this->upload->do_upload('file')){
                            $uploadData = $this->upload->data();
                            $filename1 = $uploadData['file_name'];

                            $dataImages[] = array(
                                'image_cover'   => $filename1,
                            );
                        }
                    }
                }
                $resImg = $this->Portfolio_model->insertProductImg($dataImages,$port_id);
            }
            // end 
            if($res > 0 || $resCov > 0 || $resImg > 0){
                echo "<script>
                    alert('Success!');
                        window.location.href='".base_url("Admin/portfolio")."';
                </script>";
            } else {
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/portfolio")."';
                </script>";
            }  
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function changePortStatus()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            // id:$('#serv_id').val(),st:$('#serv_st').val(), action:'changeStatus',
            $port_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $port_st = $this->security->xss_clean($this->input->post('st', TRUE));
            $port_action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($port_id) && $port_action =='changeStatus'){
                $response = $this->Portfolio_model->update_isactive($port_id,$port_st);
                
                if($response == 1){
                    echo 'true';
                } else {
                    echo 'false';
                }

            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function change_isrecommend()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $p_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $p_st = $this->security->xss_clean($this->input->post('st', TRUE));
            $p_action = $this->security->xss_clean($this->input->post('action', TRUE));
            if(!empty($p_id) && $p_action =='change'){
                $response = $this->Portfolio_model->update_isrecommend($p_id,$p_st);
                
                if($response == 1){
                    echo 'true';
                } else {
                    echo 'false';
                }

            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function albums()
    {
        if(!empty($this->session->userdata('user'))){
            $p_id = $this->uri->segment(3);
            $data['port_name'] = $this->Portfolio_model->getName($p_id); 
            $data['port_images'] = $this->Portfolio_model->thumbnailAll($p_id); 

            $this->load->view('admin/portfolio_album', $data);
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function change_port_thumb_isactive()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
           
            $pimg_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $st = $this->security->xss_clean($this->input->post('st', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($pimg_id) && $action =='change'){
                $response = $this->Portfolio_model->update_thumb_status($pimg_id,$st);
                if($response > 0){
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function addTitlePortImg()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $port_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            $title = $this->security->xss_clean($this->input->post('title', TRUE));
            
            if(!empty($port_id) && $action =='addTitle'){
                $response = $this->Portfolio_model->update_title($port_id,$title);
                
                if($response == 1){
                    echo 'true';
                } else {
                    echo 'false';
                }

            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function distroyPortImage()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $img_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($img_id) && $action =='distroy'){
                $response = $this->Portfolio_model->distroy_image($img_id);
                if($response > 0){
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    // ยังไม่เสร็จ
    public function service()
    {
        if(!empty($this->session->userdata('user'))){
            $data['services'] = $this->Service_model->service_rating(); 
            
            $this->load->view('admin/list_service', $data);
        }else{
            redirect('Login','refresh');
        }
    }
    public function form_service()
    {
        if(!empty($this->session->userdata('user'))){
            $data['categories'] = $this->Category_model->fetchActive(); 
            $data['expenses'] = $this->Service_model->fecthTravelExpenses(); // ค่าเดินทางเพิ่ม
            $this->load->view('admin/form_service', $data);
        }else{
            redirect('Login','refresh');
        }
    }
    public function create_service()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $housing_type = $this->security->xss_clean($this->input->post('housing_type', TRUE)); // ประเภทที่อยู่อาศัย
            $floor = $this->security->xss_clean($this->input->post('floor', TRUE)); // จำนวนชั้น
            $usable_area = $this->security->xss_clean($this->input->post('usable_area', TRUE)); // ขนาดพื้นที่ใช้สอย(ตรม.)
            $usable_remark = $this->security->xss_clean($this->input->post('usable_remark', TRUE)); // หมายเหตุ
            $travel_expense = $this->security->xss_clean($this->input->post('travel_expense', TRUE)); // ค่าเดินทางเพิ่มเติม(กม.ละ X บ.)
            $price_rate = $this->security->xss_clean($this->input->post('price_rate', TRUE)); // ค่าบริการ
            $price_add = $this->security->xss_clean($this->input->post('price_add', TRUE)); // ค่าบริการเพิ่มเติม(เช่น กรณีขนาดพื้นที่ใช้สอย มากกว่า 80 ตารางเมตรขึ้นไป คำนวณ ตรม.ละ 40 บาท)
            $promo_type = $this->security->xss_clean($this->input->post('promo_type', TRUE)); // ส่วนลด / โปรโมชั่น
            if($promo_type != 0){
                $discount_type = $this->security->xss_clean($this->input->post('promo_type', TRUE)); // ส่วนลด / โปรโมชั่น
                @$promo_price = $this->security->xss_clean($this->input->post('promo_price', TRUE)); // ราคาส่วนลด                
            } else {
                @$discount_type ='';
                @$promo_price = 0;
            }

            $data = array(
                'housing_type'      => $housing_type,
                'floor'             => $floor,
                'usable_area'       => $usable_area,
                'usable_remark'     => $usable_remark,
                'travel_expense'    => $travel_expense,
                'price_rate'        => $price_rate,
                'price_add'         => $price_add,
                'discount_type'     => $discount_type,
                'promo_price'       => @$promo_price,
            );
            $response = $this->Service_model->create($data);
            if($response > 0){
                echo "<script>
                    alert('Success!');
                        window.location.href='".base_url("Admin/service")."';
                </script>";
            } else {
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/service")."';
                </script>";
            }  
            
        }
        else{
            redirect('Login','refresh');
        }

    }
    public function edit_service()
    {
        # code...
    }
    public function update_service()
    {
        # code...
    }
    public function travel_expenses()
    {
        if(!empty($this->session->userdata('user'))){
            $data['expenses'] = $this->Service_model->fecthTravelExpenses(); 
            $this->load->view('admin/list_travel_expenses', $data);
        }else{
            redirect('Login','refresh');
        }
    }
    public function form_expenses()
    {
        if(!empty($this->session->userdata('user'))){
            $this->load->view('admin/form_expenses');
        }else{
            redirect('Login','refresh');
        }
    }
    public function create_expenses()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $position = $this->security->xss_clean($this->input->post('position', TRUE)); // พื้นที่
            $distance = $this->security->xss_clean($this->input->post('distance', TRUE)); // ระยะทางไม่เกิน(รัศมี) กม. **ระบุตัวเลขเท่านั้น
            $tr_price = $this->security->xss_clean($this->input->post('tr_price', TRUE)); // ราคา/กม.

            $data = array(
                'position'  => $position,
                'dsc'       => $position,
                'distance'  => $distance,
                'tr_price'  => $tr_price
            );
            $response = $this->Service_model->create_expenses($data);
            if($response > 0){
                echo "<script>
                    alert('Success!');
                        window.location.href='".base_url("Admin/travel_expenses")."';
                </script>";
            } else {
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/travel_expenses")."';
                </script>";
            }  
            
        }
        else{
            redirect('Login','refresh');
        }

    }
    public function edit_expenses()
    {
        if(!empty($this->session->userdata('user'))){
            $tr_id = $this->uri->segment(3);
            $data['tr_expns'] = $this->Service_model->get_expenses_desc($tr_id); 
            
            $this->load->view('admin/form_expenses_edit', $data);
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function update_expenses()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $position = $this->security->xss_clean($this->input->post('position', TRUE)); // พื้นที่
            $distance = $this->security->xss_clean($this->input->post('distance', TRUE)); // ระยะทางไม่เกิน(รัศมี) กม. **ระบุตัวเลขเท่านั้น
            $tr_price = $this->security->xss_clean($this->input->post('tr_price', TRUE)); // ราคา/กม.
            $tr_expn_id = $this->security->xss_clean($this->input->post('tr_expn_id', TRUE)); // id

            $data = array(
                'position'      => $position,
                'dsc'           => $position,
                'distance'      => $distance,
                'tr_price'      => $tr_price,
                'tr_expn_id'    => $tr_expn_id
            );
            $response = $this->Service_model->update_expenses($data);
            if($response > 0){
                echo "<script>
                    alert('Success!');
                        window.location.href='".base_url("Admin/travel_expenses")."';
                </script>";
            } else {
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/travel_expenses")."';
                </script>";
            }  
            
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function distroy_expenses()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $c_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $st = $this->security->xss_clean($this->input->post('st', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($c_id) && $action =='changeStatus'){
                $response = $this->Service_model->update_status($c_id,$st);
                if($response > 0){
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    
    // public function article()
    // {
    //     if(!empty($this->session->userdata('user'))){

    //         $data['products'] = $this->Product_model->fetchAll();
    //         $data['isnew'] = $this->Product_model->countIsNew();
    //         $data['isrecom'] = $this->Product_model->countIsRecom();
    //         // 
    //         $this->load->view('admin/list_article', $data); //    
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // public function form_article()
    // {
    //     if(!empty($this->session->userdata('user'))){
            
    //         $this->load->view('admin/form_article'); //  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // // add new product
    // public function create_article(){ 
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name();
    //         $this->security->get_csrf_hash();
    
    //         $name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $short_dsc = $this->security->xss_clean($this->input->post('short_dsc', TRUE));
    //         $description = $this->input->post('description', FALSE);
    
    //         $data = array(
    //             'name'          => $name,
    //             'short_dsc'     => $short_dsc,
    //             'description'   => $description
    //         );
            
    //         $last_pid = $this->Product_model->create($data); 
    //         if($last_pid > 0){
    //             if(!empty($_FILES['covImg']['name'])){
    //                 $folderName = './assets/images/article/cover/'.$last_pid.'/';
    //                 if(!is_dir($folderName))
    //                 {
    //                     mkdir($folderName,0777);
    //                     $config['upload_path'] = $folderName; 
    //                 } else{
    //                     $config['upload_path'] = $folderName;
    //                 }

    //                 $config['file_name']        = $_FILES['covImg']['name'];
    //                 $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG';
    //                 $config['file_ext_tolower'] = TRUE; 
    //                 $config['overwrite']        = TRUE; 
    //                 $config['max_size']         = '0';  
    //                 $config['max_width']        = '0';  
    //                 $config['max_height']       = '0'; 
    //                 $config['max_filename']     = '0'; 
    //                 $config['remove_spaces']    = TRUE; 
    //                 $config['detect_mime']      = TRUE;
    //                 $config['encrypt_name']     = FALSE;
        
    //                 $this->upload->initialize($config);    
    //                 $this->upload->do_upload('covImg'); 
                        
    //                 $file_upload=$this->upload->data('file_name');  
    //                 if($this->upload->display_errors()){ 
    //                     echo $this->upload->display_errors();  
    //                 }else{  
    //                     $image_type=$this->upload->data('image_type');
    //                     $file_size=$this->upload->data('file_size');
    //                     $file_path=$this->upload->data('file_path');
        
    //                     $dataArr = array(
    //                         'image_cover'   => $file_upload,
    //                         'art_id'         => $last_pid
    //                     );
    //                     // update image_cover where last id
    //                     $resimg = $this->Product_model->updatefileUpload($dataArr);

    //                     // if($resimg > 0){
    //                     //     $dataimg = array(); // Count total files
    //                     //     $countfiles = count($_FILES['productImg']['name']);
    //                     //     if($countfiles > 0){
    //                     //         $folderName = './assets/images/product/'.$last_pid.'/';
    //                     //         if(!is_dir($folderName))
    //                     //         {
    //                     //             mkdir($folderName,0777);
    //                     //             $config['upload_path'] = $folderName; 
    //                     //         } else{
    //                     //             $config['upload_path'] = $folderName;
    //                     //         }
    //                     //         // Looping all files 
    //                     //         for($i=0;$i<$countfiles;$i++){
    //                     //             if(!empty($_FILES['productImg']['name'][$i])){
    //                     //                 $_FILES['file']['name'] = $_FILES['productImg']['name'][$i];
    //                     //                 $_FILES['file']['type'] = $_FILES['productImg']['type'][$i];
    //                     //                 $_FILES['file']['tmp_name'] = $_FILES['productImg']['tmp_name'][$i];
    //                     //                 $_FILES['file']['error'] = $_FILES['productImg']['error'][$i];
    //                     //                 $_FILES['file']['size'] = $_FILES['productImg']['size'][$i];
                        
    //                     //                 $config['upload_path'] = $folderName;
    //                     //                 $config['file_name'] = $_FILES['productImg']['name'][$i];
    //                     //                 $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
    //                     //                 $config['file_ext_tolower'] = TRUE; 
    //                     //                 $config['overwrite']        = TRUE; 
    //                     //                 $config['max_size']         = '0'; 
    //                     //                 $config['max_width']        = '0'; 
    //                     //                 $config['max_height']       = '0'; 
    //                     //                 $config['max_filename']     = '0'; 
    //                     //                 $config['remove_spaces']    = TRUE; 
    //                     //                 $config['detect_mime']      = TRUE;
    //                     //                 $config['encrypt_name']     = FALSE;
                            
    //                     //                 $this->upload->initialize($config);
    //                     //                 if($this->upload->do_upload('file')){
    //                     //                     $uploadData = $this->upload->data();
    //                     //                     $filename1 = $uploadData['file_name'];

    //                     //                     $dataArr2[] = array(
    //                     //                         'image_cover'   => $filename1,
    //                     //                     );
    //                     //                 }
    //                     //             }
    //                     //         }
    //                     //         $response = $this->Product_model->insertProductImg($dataArr2,$last_pid);

    //                     //         if($response > 0){
    //                     //             echo "<script>
    //                     //                 alert('Success!');
    //                     //                     window.location.href='".base_url("Admin/product")."';
    //                     //             </script>";
    //                     //         } else {
    //                     //             echo "<script>
    //                     //                 alert('failed!');
    //                     //                 window.location.href='".base_url("Admin/product")."';
    //                     //             </script>";
    //                     //         }
    //                     //     }
    //                     // } else {
    //                     //     echo "<script>
    //                     //         alert('Product Updated, Warning! The Images Cover.');
    //                     //         window.location.href='".base_url("Admin/product")."';
    //                     //     </script>";
    //                     // }
    //                 }
    //                 if($resimg > 0){
    //                     echo "<script>
    //                         alert('Success!');
    //                         window.location.href='".base_url("Admin/article")."';
    //                     </script>";
    //                 } else {
    //                     echo "<script>
    //                         alert('failed!');
    //                         window.location.href='".base_url("Admin/article")."';
    //                     </script>";
    //                 }
    //             } else{
    //                 echo "<script>
    //                     alert('Please Upload image Cover');
    //                     window.location.href='".base_url("Admin/article")."';
    //                 </script>";
    //             }    
    //         } else {
    //             echo "<script>
    //                 alert('failed! Please try again!');
    //                 window.location.href='".base_url("Admin/form_article")."';
    //             </script>";
    //         }   
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    


    






    // public function change_isnewpd()
    // {
    //     if(!empty($this->session->userdata('user'))){
            
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
           
    //         $p_id = $this->security->xss_clean($this->input->post('id', TRUE));
    //         $p_st = $this->security->xss_clean($this->input->post('st', TRUE));
    //         $p_action = $this->security->xss_clean($this->input->post('action', TRUE));
            
    //         if(!empty($p_id) && $p_action =='change'){
    //             $response = $this->Product_model->update_isnew($p_id,$p_st);
                
    //             if($response == 1){
    //                 echo 'true';
    //             } else {
    //                 echo 'false';
    //             }

    //         } else{
    //             echo 'false';
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function edit_article()
    // {   
    //     if(!empty($this->session->userdata('user'))){
    //         $pid = $this->uri->segment(3);
    //         $data['prod_descs'] = $this->Product_model->getDesc($pid); 

    //         $this->load->view('admin/form_article_edit', $data); //  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    
    // public function updateArticle(){
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    
    //         $name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $short_dsc = $this->security->xss_clean($this->input->post('short_dsc', TRUE));
    //         $description = $this->input->post('description', FALSE);
    //         $art_id = $this->security->xss_clean($this->input->post('art_id', TRUE));
            
    //         $data = array(
    //             'name'          => $name,
    //             'short_dsc'         => $short_dsc,
    //             'description'   => $description,
    //             'art_id'    => $art_id
    //         );
    //         // update text
    //         $res1 = $this->Product_model->update_product($data); 
    //         // print_r($_FILES['covImg']['name']);
    //         // die();
            
    //         if(!empty($_FILES['covImg']['name'])){
    //             $folderName = './assets/images/product/cover/'.$art_id.'/';
    //             if(!is_dir($folderName))
    //             {
    //                 mkdir($folderName,0777);
    //                 $config['upload_path'] = $folderName; 
    //             } else{
    //                 $config['upload_path'] = $folderName;
    //             }
    //             $config['file_name']        = $_FILES['covImg']['name'];
    //             $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
    //             $config['file_ext_tolower'] = TRUE; 
    //             $config['overwrite']        = TRUE; 
    //             $config['max_size']         = '0';  
    //             $config['max_width']        = '0';  
    //             $config['max_height']       = '0'; 
    //             $config['max_filename']     = '0'; 
    //             $config['remove_spaces']    = TRUE; 
    //             $config['detect_mime']      = TRUE; 
    //             $config['encrypt_name']     = FALSE;
                
    //             $this->upload->initialize($config);
    //             $this->upload->do_upload('covImg');
    //             $file_upload=$this->upload->data('file_name'); 
    //             if($this->upload->display_errors()){ 
    //                 echo $this->upload->display_errors();  
    //             }else{      
    //                 @$dataArr = array(
    //                     'image_cover'   => $file_upload,
    //                     'art_id'        => $art_id
    //                 );

    //                 $res2 = $this->Product_model->updatefileUpload(@$dataArr);
    //             }
    //         } 
    //         // $dataimg = array(); 
    //         // $countfiles = count($_FILES['productImg']['name']);
    //         // if($countfiles > 0){
    //         //     $folderName = './assets/images/product/'.$product_id.'/'; 
    //         //     if(!is_dir($folderName))
    //         //     {
    //         //         mkdir($folderName,0777);
    //         //         $config['upload_path'] = $folderName; 
    //         //     } else{
    //         //         $config['upload_path'] = $folderName;
    //         //     }
    //         //     for($i=0;$i<$countfiles;$i++){
    //         //         if(!empty($_FILES['productImg']['name'][$i])){
    //         //             $_FILES['file']['name'] = $_FILES['productImg']['name'][$i];
    //         //             $_FILES['file']['type'] = $_FILES['productImg']['type'][$i];
    //         //             $_FILES['file']['tmp_name'] = $_FILES['productImg']['tmp_name'][$i];
    //         //             $_FILES['file']['error'] = $_FILES['productImg']['error'][$i];
    //         //             $_FILES['file']['size'] = $_FILES['productImg']['size'][$i];
            
    //         //             $config['upload_path'] = $folderName;
    //         //             $config['file_name'] = $_FILES['productImg']['name'][$i];
    //         //             $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
    //         //             $config['file_ext_tolower'] = TRUE; 
    //         //             $config['overwrite']        = TRUE; 
    //         //             $config['max_size']         = '0'; 
    //         //             $config['max_width']        = '0'; 
    //         //             $config['max_height']       = '0'; 
    //         //             $config['max_filename']       = '0';
    //         //             $config['remove_spaces']    = TRUE; 
    //         //             $config['detect_mime']    = TRUE;
    //         //             $config['encrypt_name'] = FALSE; 
                
    //         //             $this->upload->initialize($config);

    //         //             // File upload
    //         //             if($this->upload->do_upload('file')){
    //         //                 $uploadData = $this->upload->data();
    //         //                 @$filename1 = $uploadData['file_name'];

    //         //                 @$dataArr2[] = array(
    //         //                     'image_cover'   => $filename1,
    //         //                 );
    //         //             }
    //         //         }
    //         //     }
    //         //     $res3 = $this->Product_model->insertProductImg(@$dataArr2,$product_id);
                
    //         // }
    //         if($res1 > 0 || $res2 > 0){
    //             echo "<script>
    //                 alert('Success!');
    //                     window.location.href='".base_url("Admin/article")."';
    //             </script>";
    //         } else {
    //             echo "<script>
    //                 alert('failed!');
    //                 window.location.href='".base_url("Admin/article")."';
    //             </script>";
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }   
    // }

    // public function gallery()
    // {
    //     if(!empty($this->session->userdata('user'))){

    //         $data['galleries'] = $this->Gallery_model->fetchAll();

    //         $data['isnew'] = $this->Gallery_model->countIsNew();
    //         $data['isrecom'] = $this->Gallery_model->countIsRecom();
            
    //         $this->load->view('admin/list_gallery', $data);    
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function form_gallery()
    // {
    //     if(!empty($this->session->userdata('user'))){
            
    //         $this->load->view('admin/form_gallery'); //  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function create_gallery(){ 
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name();
    //         $this->security->get_csrf_hash();
    
    //         $name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $short_dsc = $this->security->xss_clean($this->input->post('short_dsc', TRUE));
    
    //         $data = array(
    //             'name'          => $name,
    //             'short_dsc'     => $short_dsc,
    //         );
    //         echo '<pre>';
    //         print_r($data);
    //         echo '</pre>';

    //         $last_gid = $this->Gallery_model->create($data); 
    //         if($last_gid > 0){
    //             if(!empty($_FILES['covImg']['name'])){
    //                 $folderName = './assets/images/gallery/cover/'.$last_gid.'/';
    //                 if(!is_dir($folderName))
    //                 {
    //                     mkdir($folderName,0755);
    //                     $config['upload_path'] = $folderName; 
    //                 } else{
    //                     $config['upload_path'] = $folderName;
    //                 }

    //                 $config['file_name']        = $_FILES['covImg']['name'];
    //                 $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG';
    //                 $config['file_ext_tolower'] = TRUE; 
    //                 $config['overwrite']        = TRUE; 
    //                 $config['max_size']         = '0';  
    //                 $config['max_width']        = '0';  
    //                 $config['max_height']       = '0'; 
    //                 $config['max_filename']     = '0'; 
    //                 $config['remove_spaces']    = TRUE; 
    //                 $config['detect_mime']      = TRUE;
    //                 $config['encrypt_name']     = FALSE;
        
    //                 $this->upload->initialize($config);    
    //                 $this->upload->do_upload('covImg'); 
                        
    //                 $file_upload=$this->upload->data('file_name');  
    //                 if($this->upload->display_errors()){ 
    //                     echo $this->upload->display_errors();  
    //                 }else{  
    //                     $image_type=$this->upload->data('image_type');
    //                     $file_size=$this->upload->data('file_size');
    //                     $file_path=$this->upload->data('file_path');
        
    //                     $dataArr = array(
    //                         'image_cover'   => $file_upload,
    //                         'g_id'         => $last_gid
    //                     );
    //                     // update image_cover where last id
    //                     $resimg = $this->Gallery_model->updatefileUpload($dataArr);

    //                     if($resimg > 0){
    //                         $countfiles = count($_FILES['productImg']['name']);
    //                         if($countfiles > 0){
    //                             $folderName = './assets/images/gallery/'.$last_gid.'/';
    //                             if(!is_dir($folderName))
    //                             {
    //                                 mkdir($folderName,0755);
    //                                 $config['upload_path'] = $folderName; 
    //                             } else{
    //                                 $config['upload_path'] = $folderName;
    //                             }
    //                             // Looping all files 
    //                             for($i=0;$i<$countfiles;$i++){
    //                                 if(!empty($_FILES['productImg']['name'][$i])){
    //                                     $_FILES['file']['name'] = $_FILES['productImg']['name'][$i];
    //                                     $_FILES['file']['type'] = $_FILES['productImg']['type'][$i];
    //                                     $_FILES['file']['tmp_name'] = $_FILES['productImg']['tmp_name'][$i];
    //                                     $_FILES['file']['error'] = $_FILES['productImg']['error'][$i];
    //                                     $_FILES['file']['size'] = $_FILES['productImg']['size'][$i];
                        
    //                                     $config['upload_path'] = $folderName;
    //                                     $config['file_name'] = $_FILES['productImg']['name'][$i];
    //                                     $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
    //                                     $config['file_ext_tolower'] = TRUE; 
    //                                     $config['overwrite']        = TRUE; 
    //                                     $config['max_size']         = '0'; 
    //                                     $config['max_width']        = '0'; 
    //                                     $config['max_height']       = '0'; 
    //                                     $config['max_filename']     = '0'; 
    //                                     $config['remove_spaces']    = TRUE; 
    //                                     $config['detect_mime']      = TRUE;
    //                                     $config['encrypt_name']     = TRUE;
                            
    //                                     $this->upload->initialize($config);
    //                                     if($this->upload->do_upload('file')){
    //                                         $uploadData = $this->upload->data();
    //                                         $filename1 = $uploadData['file_name'];

    //                                         $dataArr2[] = array(
    //                                             'image_cover'   => $filename1,
    //                                         );
    //                                     }
    //                                 }
    //                             }
    //                             $response = $this->Gallery_model->insertProductImg($dataArr2,$last_gid);

    //                             if($response > 0){
    //                                 echo "<script>
    //                                     alert('Success!');
    //                                         window.location.href='".base_url("Admin/gallery")."';
    //                                 </script>";
    //                             } else {
    //                                 echo "<script>
    //                                     alert('failed!');
    //                                     window.location.href='".base_url("Admin/gallery")."';
    //                                 </script>";
    //                             }
    //                         }
    //                     } else {
    //                         echo "<script>
    //                             alert('Product Updated, Warning! The Images Cover.');
    //                             window.location.href='".base_url("Admin/product")."';
    //                         </script>";
    //                     }
    //                 }
    //                 if($resimg > 0){
    //                     echo "<script>
    //                         alert('Success!');
    //                         window.location.href='".base_url("Admin/gallery")."';
    //                     </script>";
    //                 } else {
    //                     echo "<script>
    //                         alert('failed!');
    //                         window.location.href='".base_url("Admin/gallery")."';
    //                     </script>";
    //                 }
    //             } else{
    //                 echo "<script>
    //                     alert('Please Upload image Cover');
    //                     window.location.href='".base_url("Admin/gallery")."';
    //                 </script>";
    //             }    
    //         } else {
    //             echo "<script>
    //                 alert('failed! Please try again!');
    //                 window.location.href='".base_url("Admin/form_gallery")."';
    //             </script>";
    //         }   
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function gallery_albums()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $g_id = $this->uri->segment(3);
    //         $data['gallery_name'] = $this->Gallery_model->getName($g_id); 
    //         $data['gallery_images'] = $this->Gallery_model->getImages($g_id); 

    //         $this->load->view('admin/gallery_album', $data); //  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // public function addTitleGallery()
    // {
    //     if(!empty($this->session->userdata('user'))){
            
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    //         // id:$('#g_id').val(),title:$('#img_title').val(), action:'addTitle',
    //         $g_id = $this->security->xss_clean($this->input->post('id', TRUE));
    //         $action = $this->security->xss_clean($this->input->post('action', TRUE));
    //         $title = $this->security->xss_clean($this->input->post('title', TRUE));
            
    //         if(!empty($g_id) && $action =='addTitle'){
    //             $response = $this->Gallery_model->update_title($g_id,$title);
                
    //             if($response == 1){
    //                 echo 'true';
    //             } else {
    //                 echo 'false';
    //             }

    //         } else{
    //             echo 'false';
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function gallery_img_isactive()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
           
    //         $gimg_id = $this->security->xss_clean($this->input->post('id', TRUE));
    //         $st = $this->security->xss_clean($this->input->post('st', TRUE));
    //         $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
    //         if(!empty($gimg_id) && $action =='change'){
    //             $response = $this->Gallery_model->update_status($gimg_id,$st);
    //             if($response > 0){
    //                 echo 'true';
    //             } else {
    //                 echo 'false';
    //             }
    //         } else{
    //             echo 'false';
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function distroyGalleryThumbnail()
    // {
    //     if(!empty($this->session->userdata('user'))){
            
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    //         $gimg_id = $this->security->xss_clean($this->input->post('id', TRUE));
    //         $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
    //         if(!empty($gimg_id) && $action =='distroy'){
    //             $response = $this->Gallery_model->distroy_image($gimg_id);
    //             if($response > 0){
    //                 echo 'true';
    //             } else {
    //                 echo 'false';
    //             }
    //         } else{
    //             echo 'false';
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function edit_gallery()
    // {   
    //     if(!empty($this->session->userdata('user'))){
    //         $gid = $this->uri->segment(3);
    //         $data['gallery_descs'] = $this->Gallery_model->getDesc($gid); 
    //         $this->load->view('admin/form_gallery_edit', $data);
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function updateGallery(){
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    
    //         $name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $short_dsc = $this->security->xss_clean($this->input->post('short_dsc', TRUE));
    //         $g_id = $this->security->xss_clean($this->input->post('g_id', TRUE));
            
    //         $data = array(
    //             'name'          => $name,
    //             'short_dsc'     => $short_dsc,
    //             'g_id'          => $g_id
    //         );
    //         // update text
    //         $res1 = $this->Gallery_model->update_product($data); 
            
    //         if(!empty($_FILES['covImg']['name'])){
    //             $folderName = './assets/images/gallery/cover/'.$g_id.'/';
    //             if(!is_dir($folderName))
    //             {
    //                 mkdir($folderName,0755);
    //                 $config['upload_path'] = $folderName; 
    //             } else{
    //                 $config['upload_path'] = $folderName;
    //             }
    //             $config['file_name']        = $_FILES['covImg']['name'];
    //             $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
    //             $config['file_ext_tolower'] = TRUE; 
    //             $config['overwrite']        = TRUE; 
    //             $config['max_size']         = '0';  
    //             $config['max_width']        = '0';  
    //             $config['max_height']       = '0'; 
    //             $config['max_filename']     = '0'; 
    //             $config['remove_spaces']    = TRUE; 
    //             $config['detect_mime']      = TRUE; 
    //             $config['encrypt_name']     = FALSE;
                
    //             $this->upload->initialize($config);
    //             $this->upload->do_upload('covImg');
    //             $file_upload=$this->upload->data('file_name'); 
    //             if($this->upload->display_errors()){ 
    //                 echo $this->upload->display_errors();  
    //             }else{      
    //                 @$dataArr = array(
    //                     'image_cover'   => $file_upload,
    //                     'g_id'        => $g_id
    //                 );

    //                 $res2 = $this->Gallery_model->updatefileUpload(@$dataArr);
    //             }
    //         } 
            
    //         $countfiles = count($_FILES['productImg']['name']);
    //         if($countfiles > 0){
    //             $folderName = './assets/images/gallery/'.$g_id.'/'; 
    //             if(!is_dir($folderName))
    //             {
    //                 mkdir($folderName,0755);
    //                 $config['upload_path'] = $folderName; 
    //             } else{
    //                 $config['upload_path'] = $folderName;
    //             }
    //             for($i=0;$i<$countfiles;$i++){
    //                 if(!empty($_FILES['productImg']['name'][$i])){
    //                     $_FILES['file']['name'] = $_FILES['productImg']['name'][$i];
    //                     $_FILES['file']['type'] = $_FILES['productImg']['type'][$i];
    //                     $_FILES['file']['tmp_name'] = $_FILES['productImg']['tmp_name'][$i];
    //                     $_FILES['file']['error'] = $_FILES['productImg']['error'][$i];
    //                     $_FILES['file']['size'] = $_FILES['productImg']['size'][$i];
            
    //                     $config['upload_path'] = $folderName;
    //                     $config['file_name'] = $_FILES['productImg']['name'][$i];
    //                     $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
    //                     $config['file_ext_tolower'] = TRUE; 
    //                     $config['overwrite']        = TRUE; 
    //                     $config['max_size']         = '0'; 
    //                     $config['max_width']        = '0'; 
    //                     $config['max_height']       = '0'; 
    //                     $config['max_filename']       = '0';
    //                     $config['remove_spaces']    = TRUE; 
    //                     $config['detect_mime']    = TRUE;
    //                     $config['encrypt_name'] = TRUE; 
                
    //                     $this->upload->initialize($config);

    //                     // File upload
    //                     if($this->upload->do_upload('file')){
    //                         $uploadData = $this->upload->data();
    //                         @$filename1 = $uploadData['file_name'];

    //                         @$dataArr2[] = array(
    //                             'image_cover'   => $filename1,
    //                         );
    //                     }
    //                 }
    //             }
    //             $res3 = $this->Gallery_model->insertProductImg(@$dataArr2,$g_id);
                
    //         }
    //         if($res1 > 0 || $res2 > 0){
    //             echo "<script>
    //                 alert('Success!');
    //                     window.location.href='".base_url("Admin/gallery")."';
    //             </script>";
    //         } else {
    //             echo "<script>
    //                 alert('failed!');
    //                 window.location.href='".base_url("Admin/gallery")."';
    //             </script>";
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }   
    // }

    // public function change_GalleryIsRecommend()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    //         $g_id = $this->security->xss_clean($this->input->post('id', TRUE));
    //         $g_st = $this->security->xss_clean($this->input->post('st', TRUE));
    //         $p_action = $this->security->xss_clean($this->input->post('action', TRUE));
            
    //         if(!empty($g_id) && $p_action =='change'){
    //             $response = $this->Gallery_model->update_isrecommend($g_id,$g_st);
                
    //             if($response == 1){
    //                 echo 'true';
    //             } else {
    //                 echo 'false';
    //             }

    //         } else{
    //             echo 'false';
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    

    // public function userManual()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->load->helper('download');
    //         $file = './assets/file/usermanual_v1.pdf';
    //         force_download($file, NULL);
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
}

