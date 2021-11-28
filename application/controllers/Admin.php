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
        $this->load->model('Gallery_model');
        $this->load->model('Upload_product_model'); 
        $this->load->model('Upload_gallery_model'); 
        $this->load->model('Banner_model'); 
	}
    
	public function home(){
        if(!empty($this->session->userdata('user'))){
           
            $this->load->view('admin/home'); // 
        }
        else{
            
            redirect('Login','refresh');
        }
    }
    
    public function article()
    {
        if(!empty($this->session->userdata('user'))){

            $data['products'] = $this->Product_model->fetchAll();
            $data['isnew'] = $this->Product_model->countIsNew();
            $data['isrecom'] = $this->Product_model->countIsRecom();
            // 
            $this->load->view('admin/list_article', $data); //    
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function form_article()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->load->view('admin/form_article'); //  
        }
        else{
            redirect('Login','refresh');
        }
    }
    // add new product
    public function create_article(){ 
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name();
            $this->security->get_csrf_hash();
    
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            $short_dsc = $this->security->xss_clean($this->input->post('short_dsc', TRUE));
            $description = $this->input->post('description', FALSE);
    
            $data = array(
                'name'          => $name,
                'short_dsc'     => $short_dsc,
                'description'   => $description
            );
            
            $last_pid = $this->Product_model->create($data); 
            if($last_pid > 0){
                if(!empty($_FILES['covImg']['name'])){
                    $folderName = './assets/images/article/cover/'.$last_pid.'/';
                    if(!is_dir($folderName))
                    {
                        mkdir($folderName,0777);
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
        
                        $dataArr = array(
                            'image_cover'   => $file_upload,
                            'art_id'         => $last_pid
                        );
                        // update image_cover where last id
                        $resimg = $this->Product_model->updatefileUpload($dataArr);

                        // if($resimg > 0){
                        //     $dataimg = array(); // Count total files
                        //     $countfiles = count($_FILES['productImg']['name']);
                        //     if($countfiles > 0){
                        //         $folderName = './assets/images/product/'.$last_pid.'/';
                        //         if(!is_dir($folderName))
                        //         {
                        //             mkdir($folderName,0777);
                        //             $config['upload_path'] = $folderName; 
                        //         } else{
                        //             $config['upload_path'] = $folderName;
                        //         }
                        //         // Looping all files 
                        //         for($i=0;$i<$countfiles;$i++){
                        //             if(!empty($_FILES['productImg']['name'][$i])){
                        //                 $_FILES['file']['name'] = $_FILES['productImg']['name'][$i];
                        //                 $_FILES['file']['type'] = $_FILES['productImg']['type'][$i];
                        //                 $_FILES['file']['tmp_name'] = $_FILES['productImg']['tmp_name'][$i];
                        //                 $_FILES['file']['error'] = $_FILES['productImg']['error'][$i];
                        //                 $_FILES['file']['size'] = $_FILES['productImg']['size'][$i];
                        
                        //                 $config['upload_path'] = $folderName;
                        //                 $config['file_name'] = $_FILES['productImg']['name'][$i];
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
                        //                 if($this->upload->do_upload('file')){
                        //                     $uploadData = $this->upload->data();
                        //                     $filename1 = $uploadData['file_name'];

                        //                     $dataArr2[] = array(
                        //                         'image_cover'   => $filename1,
                        //                     );
                        //                 }
                        //             }
                        //         }
                        //         $response = $this->Product_model->insertProductImg($dataArr2,$last_pid);

                        //         if($response > 0){
                        //             echo "<script>
                        //                 alert('Success!');
                        //                     window.location.href='".base_url("Admin/product")."';
                        //             </script>";
                        //         } else {
                        //             echo "<script>
                        //                 alert('failed!');
                        //                 window.location.href='".base_url("Admin/product")."';
                        //             </script>";
                        //         }
                        //     }
                        // } else {
                        //     echo "<script>
                        //         alert('Product Updated, Warning! The Images Cover.');
                        //         window.location.href='".base_url("Admin/product")."';
                        //     </script>";
                        // }
                    }
                    if($resimg > 0){
                        echo "<script>
                            alert('Success!');
                            window.location.href='".base_url("Admin/article")."';
                        </script>";
                    } else {
                        echo "<script>
                            alert('failed!');
                            window.location.href='".base_url("Admin/article")."';
                        </script>";
                    }
                } else{
                    echo "<script>
                        alert('Please Upload image Cover');
                        window.location.href='".base_url("Admin/article")."';
                    </script>";
                }    
            } else {
                echo "<script>
                    alert('failed! Please try again!');
                    window.location.href='".base_url("Admin/form_article")."';
                </script>";
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
            $data['product_name'] = $this->Product_model->getName($p_id); 
            $data['product_images'] = $this->Product_model->getImages($p_id); 

            $this->load->view('admin/product_album', $data); //  
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function addTitleServImg()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $product_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            $title = $this->security->xss_clean($this->input->post('title', TRUE));
            
            if(!empty($product_id) && $action =='addTitle'){
                $response = $this->Product_model->update_title($product_id,$title);
                
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

    public function change_isactive()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
           
            $simg_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $st = $this->security->xss_clean($this->input->post('st', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($simg_id) && $action =='change'){
                $response = $this->Product_model->update_status($simg_id,$st);
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

    public function distroyServImage()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $simg_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($simg_id) && $action =='distroy'){
                $response = $this->Product_model->distroy_image($simg_id);
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
    public function changeProductStatus()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $p_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $p_st = $this->security->xss_clean($this->input->post('st', TRUE));
            $p_action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($p_id) && $p_action =='changeStatus'){
                $response = $this->Product_model->update_isactive($p_id,$p_st);
                
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
                $response = $this->Product_model->update_isrecommend($p_id,$p_st);
                
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

    public function change_isnewpd()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
           
            $p_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $p_st = $this->security->xss_clean($this->input->post('st', TRUE));
            $p_action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($p_id) && $p_action =='change'){
                $response = $this->Product_model->update_isnew($p_id,$p_st);
                
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

    public function edit_article()
    {   
        if(!empty($this->session->userdata('user'))){
            $pid = $this->uri->segment(3);
            $data['prod_descs'] = $this->Product_model->getDesc($pid); 

            $this->load->view('admin/form_article_edit', $data); //  
        }
        else{
            redirect('Login','refresh');
        }
    }
    
    public function updateArticle(){
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
    
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            $short_dsc = $this->security->xss_clean($this->input->post('short_dsc', TRUE));
            $description = $this->input->post('description', FALSE);
            $art_id = $this->security->xss_clean($this->input->post('art_id', TRUE));
            
            $data = array(
                'name'          => $name,
                'short_dsc'         => $short_dsc,
                'description'   => $description,
                'art_id'    => $art_id
            );
            // update text
            $res1 = $this->Product_model->update_product($data); 
            // print_r($_FILES['covImg']['name']);
            // die();
            
            if(!empty($_FILES['covImg']['name'])){
                $folderName = './assets/images/product/cover/'.$art_id.'/';
                if(!is_dir($folderName))
                {
                    mkdir($folderName,0777);
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
                    @$dataArr = array(
                        'image_cover'   => $file_upload,
                        'art_id'        => $art_id
                    );

                    $res2 = $this->Product_model->updatefileUpload(@$dataArr);
                }
            } 
            // $dataimg = array(); 
            // $countfiles = count($_FILES['productImg']['name']);
            // if($countfiles > 0){
            //     $folderName = './assets/images/product/'.$product_id.'/'; 
            //     if(!is_dir($folderName))
            //     {
            //         mkdir($folderName,0777);
            //         $config['upload_path'] = $folderName; 
            //     } else{
            //         $config['upload_path'] = $folderName;
            //     }
            //     for($i=0;$i<$countfiles;$i++){
            //         if(!empty($_FILES['productImg']['name'][$i])){
            //             $_FILES['file']['name'] = $_FILES['productImg']['name'][$i];
            //             $_FILES['file']['type'] = $_FILES['productImg']['type'][$i];
            //             $_FILES['file']['tmp_name'] = $_FILES['productImg']['tmp_name'][$i];
            //             $_FILES['file']['error'] = $_FILES['productImg']['error'][$i];
            //             $_FILES['file']['size'] = $_FILES['productImg']['size'][$i];
            
            //             $config['upload_path'] = $folderName;
            //             $config['file_name'] = $_FILES['productImg']['name'][$i];
            //             $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
            //             $config['file_ext_tolower'] = TRUE; 
            //             $config['overwrite']        = TRUE; 
            //             $config['max_size']         = '0'; 
            //             $config['max_width']        = '0'; 
            //             $config['max_height']       = '0'; 
            //             $config['max_filename']       = '0';
            //             $config['remove_spaces']    = TRUE; 
            //             $config['detect_mime']    = TRUE;
            //             $config['encrypt_name'] = FALSE; 
                
            //             $this->upload->initialize($config);

            //             // File upload
            //             if($this->upload->do_upload('file')){
            //                 $uploadData = $this->upload->data();
            //                 @$filename1 = $uploadData['file_name'];

            //                 @$dataArr2[] = array(
            //                     'image_cover'   => $filename1,
            //                 );
            //             }
            //         }
            //     }
            //     $res3 = $this->Product_model->insertProductImg(@$dataArr2,$product_id);
                
            // }
            if($res1 > 0 || $res2 > 0){
                echo "<script>
                    alert('Success!');
                        window.location.href='".base_url("Admin/article")."';
                </script>";
            } else {
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/article")."';
                </script>";
            }
        }
        else{
            redirect('Login','refresh');
        }   
    }

    public function gallery()
    {
        if(!empty($this->session->userdata('user'))){

            $data['galleries'] = $this->Gallery_model->fetchAll();

            $data['isnew'] = $this->Gallery_model->countIsNew();
            $data['isrecom'] = $this->Gallery_model->countIsRecom();
            
            $this->load->view('admin/list_gallery', $data);    
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function form_gallery()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->load->view('admin/form_gallery'); //  
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function create_gallery(){ 
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name();
            $this->security->get_csrf_hash();
    
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            $short_dsc = $this->security->xss_clean($this->input->post('short_dsc', TRUE));
    
            $data = array(
                'name'          => $name,
                'short_dsc'     => $short_dsc,
            );
            echo '<pre>';
            print_r($data);
            echo '</pre>';

            $last_gid = $this->Gallery_model->create($data); 
            if($last_gid > 0){
                if(!empty($_FILES['covImg']['name'])){
                    $folderName = './assets/images/gallery/cover/'.$last_gid.'/';
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
        
                        $dataArr = array(
                            'image_cover'   => $file_upload,
                            'g_id'         => $last_gid
                        );
                        // update image_cover where last id
                        $resimg = $this->Gallery_model->updatefileUpload($dataArr);

                        if($resimg > 0){
                            $countfiles = count($_FILES['productImg']['name']);
                            if($countfiles > 0){
                                $folderName = './assets/images/gallery/'.$last_gid.'/';
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
                                        $config['encrypt_name']     = TRUE;
                            
                                        $this->upload->initialize($config);
                                        if($this->upload->do_upload('file')){
                                            $uploadData = $this->upload->data();
                                            $filename1 = $uploadData['file_name'];

                                            $dataArr2[] = array(
                                                'image_cover'   => $filename1,
                                            );
                                        }
                                    }
                                }
                                $response = $this->Gallery_model->insertProductImg($dataArr2,$last_gid);

                                if($response > 0){
                                    echo "<script>
                                        alert('Success!');
                                            window.location.href='".base_url("Admin/gallery")."';
                                    </script>";
                                } else {
                                    echo "<script>
                                        alert('failed!');
                                        window.location.href='".base_url("Admin/gallery")."';
                                    </script>";
                                }
                            }
                        } else {
                            echo "<script>
                                alert('Product Updated, Warning! The Images Cover.');
                                window.location.href='".base_url("Admin/product")."';
                            </script>";
                        }
                    }
                    if($resimg > 0){
                        echo "<script>
                            alert('Success!');
                            window.location.href='".base_url("Admin/gallery")."';
                        </script>";
                    } else {
                        echo "<script>
                            alert('failed!');
                            window.location.href='".base_url("Admin/gallery")."';
                        </script>";
                    }
                } else{
                    echo "<script>
                        alert('Please Upload image Cover');
                        window.location.href='".base_url("Admin/gallery")."';
                    </script>";
                }    
            } else {
                echo "<script>
                    alert('failed! Please try again!');
                    window.location.href='".base_url("Admin/form_gallery")."';
                </script>";
            }   
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function gallery_albums()
    {
        if(!empty($this->session->userdata('user'))){
            $g_id = $this->uri->segment(3);
            $data['gallery_name'] = $this->Gallery_model->getName($g_id); 
            $data['gallery_images'] = $this->Gallery_model->getImages($g_id); 

            $this->load->view('admin/gallery_album', $data); //  
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function addTitleGallery()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            // id:$('#g_id').val(),title:$('#img_title').val(), action:'addTitle',
            $g_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            $title = $this->security->xss_clean($this->input->post('title', TRUE));
            
            if(!empty($g_id) && $action =='addTitle'){
                $response = $this->Gallery_model->update_title($g_id,$title);
                
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

    public function gallery_img_isactive()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
           
            $gimg_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $st = $this->security->xss_clean($this->input->post('st', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($gimg_id) && $action =='change'){
                $response = $this->Gallery_model->update_status($gimg_id,$st);
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

    public function distroyGalleryThumbnail()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $gimg_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($gimg_id) && $action =='distroy'){
                $response = $this->Gallery_model->distroy_image($gimg_id);
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

    public function edit_gallery()
    {   
        if(!empty($this->session->userdata('user'))){
            $gid = $this->uri->segment(3);
            $data['gallery_descs'] = $this->Gallery_model->getDesc($gid); 
            $this->load->view('admin/form_gallery_edit', $data);
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function updateGallery(){
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
    
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            $short_dsc = $this->security->xss_clean($this->input->post('short_dsc', TRUE));
            $g_id = $this->security->xss_clean($this->input->post('g_id', TRUE));
            
            $data = array(
                'name'          => $name,
                'short_dsc'     => $short_dsc,
                'g_id'          => $g_id
            );
            // update text
            $res1 = $this->Gallery_model->update_product($data); 
            
            if(!empty($_FILES['covImg']['name'])){
                $folderName = './assets/images/gallery/cover/'.$g_id.'/';
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
                    @$dataArr = array(
                        'image_cover'   => $file_upload,
                        'g_id'        => $g_id
                    );

                    $res2 = $this->Gallery_model->updatefileUpload(@$dataArr);
                }
            } 
            
            $countfiles = count($_FILES['productImg']['name']);
            if($countfiles > 0){
                $folderName = './assets/images/gallery/'.$g_id.'/'; 
                if(!is_dir($folderName))
                {
                    mkdir($folderName,0755);
                    $config['upload_path'] = $folderName; 
                } else{
                    $config['upload_path'] = $folderName;
                }
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
                        $config['max_filename']       = '0';
                        $config['remove_spaces']    = TRUE; 
                        $config['detect_mime']    = TRUE;
                        $config['encrypt_name'] = TRUE; 
                
                        $this->upload->initialize($config);

                        // File upload
                        if($this->upload->do_upload('file')){
                            $uploadData = $this->upload->data();
                            @$filename1 = $uploadData['file_name'];

                            @$dataArr2[] = array(
                                'image_cover'   => $filename1,
                            );
                        }
                    }
                }
                $res3 = $this->Gallery_model->insertProductImg(@$dataArr2,$g_id);
                
            }
            if($res1 > 0 || $res2 > 0){
                echo "<script>
                    alert('Success!');
                        window.location.href='".base_url("Admin/gallery")."';
                </script>";
            } else {
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/gallery")."';
                </script>";
            }
        }
        else{
            redirect('Login','refresh');
        }   
    }

    public function change_GalleryIsRecommend()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $g_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $g_st = $this->security->xss_clean($this->input->post('st', TRUE));
            $p_action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($g_id) && $p_action =='change'){
                $response = $this->Gallery_model->update_isrecommend($g_id,$g_st);
                
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

    public function banner()
    {
        $data['banner'] = $this->Banner_model->fecthAll();
        $this->load->view('admin/form_banner', $data);
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
                }
                $dataArr = array(
                    'name'          => $bh_name,
                    'image_type'    =>  @$image_type,
                    'file_size'     =>  @$file_size,
                    'file_path'     =>  @$file_path,
                    'image_cover'   =>  @$file_upload,
                    'banner_id'     => @$bh_id
                );
            } else {
                $dataArr = array(
                    'name'          => $bh_name,
                    'image_type'    =>  '',
                    'file_size'     =>  '',
                    'file_path'     =>  '',
                    'image_cover'   =>  '',
                    'banner_id'     => @$bh_id
                );
            }
  
            $response = $this->Banner_model->update($dataArr);
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

    public function userManual()
    {
        if(!empty($this->session->userdata('user'))){
            $this->load->helper('download');
            $file = './assets/file/usermanual_v1.pdf';
            force_download($file, NULL);
        }
        else{
            redirect('Login','refresh');
        }
    }
}

