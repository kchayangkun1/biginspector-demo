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
        $this->load->model('About_model');
        $this->load->model('Upload_product_model'); 

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
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // die();
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

        
    // public function update_service()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    //         $rw_name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $rw_type = $this->security->xss_clean($this->input->post('type', TRUE));
    //         // type
    //         $rw_dsc = $this->input->post('description', FALSE);
    //         $serv_id = $this->security->xss_clean($this->input->post('serv_id', TRUE));
            
    //         if(!empty($_FILES['covImg']['name'])){
    //             $folderName = './assets/images/service/cover/'.$serv_id.'/';
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
                    
    //             @$file_upload=$this->upload->data('file_name');
    //             if($this->upload->display_errors()){ 
    //                 echo $this->upload->display_errors();  
    //             }else{  
    //                 @$image_type=$this->upload->data('image_type');
    //                 @$file_size=$this->upload->data('file_size');
    //                 @$file_path=$this->upload->data('file_path');
    //             }
    //         } 
    //         $dataArr = array(
    //             'name'          => $rw_name,
    //             'type_id'       => $rw_type,
    //             'desc'          => $rw_dsc,
    //             'image_type'    =>  @$image_type,
    //             'file_size'     =>  @$file_size,
    //             'file_path'     =>  @$file_path,
    //             'image_cover'   =>  @$file_upload,
    //             'service_id'         => @$serv_id
    //         );  
    //         $response = $this->Service_model->update($dataArr);
    //         if($response > 0){
    //             echo "<script>
    //                 alert('Success!');
    //                 window.location.href='".base_url("Admin/service")."';
    //             </script>";
    //         } else {
    //             echo "<script>
    //                 alert('failed!');
    //                 window.location.href='".base_url("Admin/edit_service/".$serv_id)."';
    //             </script>";
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }

    // }
    

    
    // public function form_service_upload()
    // {
    //     if(!empty($this->session->userdata('user'))){

    //         $data['service_id'] = $this->uri->segment(3);

    //         $this->load->view('admin/form_service_upload',$data);
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // public function upload_serv_imges()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    
    //         $serv_id = $this->security->xss_clean($this->input->post('service_id', TRUE));
    //         // 
    //         $dataimg = array(); 
    //         $countfiles = count(array_filter($_FILES['productImg']['name']));
    //         if($countfiles > 0){
    //             $folderName = './assets/images/service/'.$serv_id.'/';
    //             if(!is_dir($folderName))
    //             {
    //                 mkdir($folderName,0777);
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
                        
    //                     $config['upload_path']      = $folderName;
    //                     $config['file_name']        = $_FILES['productImg']['name'][$i];
    //                     $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
    //                     $config['file_ext_tolower'] = TRUE; 
    //                     $config['overwrite']        = TRUE; 
    //                     $config['max_size']         = '0'; 
    //                     $config['max_width']        = '0'; 
    //                     $config['max_height']       = '0'; 
    //                     $config['max_filename']     = '0'; 
    //                     $config['remove_spaces']    = TRUE; 
    //                     $config['detect_mime']      = TRUE;
    //                     $config['encrypt_name']     = FALSE; 
                            
    //                     $this->upload->initialize($config); 

    //                     if($this->upload->do_upload('file')){
    //                         $uploadData = $this->upload->data();
    //                         $filename1 = $uploadData['file_name'];
                                            
    //                         $dataArr2[] = array(
    //                             'image_cover'   => $filename1,
    //                         );
    //                     }
    //                 }
    //             }
                            
    //             $response = $this->Service_model->insertImg($dataArr2,$serv_id);

    //             if($response > 0){
    //                 echo "<script>
    //                     alert('Success!');
    //                     window.location.href='".base_url("Admin/service_document/".$serv_id)."';
    //                 </script>";
    //             } else {
    //                 echo "<script>
    //                     alert('failed!');
    //                     window.location.href='".base_url("Admin/form_service_upload/".$serv_id)."';
    //                 </script>";
    //             }
    //         } else {
    //             echo "<script>
    //                 alert('Please Upload Images');
    //                 window.location.href='".base_url("Admin/form_service_upload/".$serv_id)."';
    //             </script>";
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    
    
    // public function aboutus()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $data['aboutusies'] = $this->About_model->fetchAll();
    //         $this->load->view('admin/list_about', $data); //    
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // public function form_about()
    // {
    //     if(!empty($this->session->userdata('user'))){
            
    //         $this->load->view('admin/form_about'); //  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }

    // }
    // public function create_about()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); // initial CSRF name
    //         $this->security->get_csrf_hash(); // get CSRF Token generate
    //         $s_name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $s_dsc = $this->input->post('description', FALSE);

    //         $ab_id = $this->About_model->create($s_name,$s_dsc);
    //         if($ab_id > 0){
    //             if(!empty($_FILES['covImg']['name'])){
    //                 $folderName = './assets/images/about/cover/'.$ab_id.'/';
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
    //                         'image_type'    =>  $image_type,
    //                         'file_size'     =>  $file_size,
    //                         'file_path'     =>  $file_path,
    //                         'image_cover'   =>  $file_upload,
    //                         'about_id'      =>  $ab_id
    //                     );
    //                 }
    //                 $response = $this->About_model->updatefileUpload($dataArr);
    //                 if($response > 0){
    //                     echo "<script>
    //                         alert('Success!');
    //                         window.location.href='".base_url("Admin/aboutus")."';
    //                     </script>";
    //                 } else {
    //                     echo "<script>
    //                         alert('failed!');
    //                         window.location.href='".base_url("Admin/aboutus")."';
    //                     </script>";
    //                 }
    //             }
    //         } else{
    //             echo "<script>
    //                 alert('failed!');
    //                 window.location.href='".base_url("Admin/aboutus")."';
    //             </script>";
    //         }  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // public function edit_about()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $ab_id = $this->uri->segment(3);
    //         $data['about_dscs'] = $this->About_model->getDesc($ab_id); 
    //         $this->load->view('admin/form_about_edit', $data); //  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // public function update_about()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    //         $ab_name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $ab_dsc = $this->input->post('description', FALSE);
    //         $ab_id = $this->security->xss_clean($this->input->post('about_id', TRUE));
            
    //         if(!empty($_FILES['covImg']['name'])){
    //             $folderName = './assets/images/about/cover/'.$ab_id.'/';
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
                    
    //             @$file_upload=$this->upload->data('file_name');
    //             if($this->upload->display_errors()){ 
    //                 echo $this->upload->display_errors();  
    //             }else{  
    //                 @$image_type=$this->upload->data('image_type');
    //                 @$file_size=$this->upload->data('file_size');
    //                 @$file_path=$this->upload->data('file_path');
    //             }
    //         } 
    //         $dataArr = array(
    //             'name'          => $ab_name,
    //             'desc'          => $ab_dsc,
    //             'image_type'    =>  @$image_type,
    //             'file_size'     =>  @$file_size,
    //             'file_path'     =>  @$file_path,
    //             'image_cover'   =>  @$file_upload,
    //             'about_id'      => @$ab_id
    //         );  
    //         $response = $this->About_model->update($dataArr);
    //         if($response > 0){
    //             echo "<script>
    //                 alert('Success!');
    //                 window.location.href='".base_url("Admin/aboutus")."';
    //             </script>";
    //         } else {
    //             echo "<script>
    //                 alert('failed!');
    //                 window.location.href='".base_url("Admin/edit_about/".$ab_id)."';
    //             </script>";
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }

    // }

    // public function personal()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $data['personals'] = $this->Personal_model->fetchAll();
    //         $this->load->view('admin/list_personal', $data); //    
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // public function form_personaldata()
    // {
    //     if(!empty($this->session->userdata('user'))){
            
    //         $this->load->view('admin/form_personal'); //  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function create_personal()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); // initial CSRF name
    //         $this->security->get_csrf_hash(); // get CSRF Token generate
    //         $s_name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $s_dsc = $this->input->post('description', FALSE);

    //         $res = $this->Personal_model->create($s_name,$s_dsc);
    //         if($res > 0){
    //             echo "<script>
    //                 alert('success!');
    //                 window.location.href='".base_url("Admin/personal")."';
    //             </script>";
                
    //         } else{
    //             echo "<script>
    //                 alert('failed!');
    //                 window.location.href='".base_url("Admin/personal")."';
    //             </script>";
    //         }  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }

    // }

    // public function edit_posonaldata()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $ps_id = $this->uri->segment(3);
    //         $data['personal_descs'] = $this->Personal_model->getDesc($ps_id); 

    //         $this->load->view('admin/form_personal_edit', $data); //  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    // public function update_personaldata()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); // initial CSRF name
    //         $this->security->get_csrf_hash(); // get CSRF Token generate
    //         $pl_name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $pl_dsc = $this->input->post('description', FALSE);
    //         $personal_id = $this->security->xss_clean($this->input->post('personal_id', TRUE));
    //         // 

    //         $res = $this->Personal_model->update($pl_name,$pl_dsc,$personal_id);
    //         if($res > 0){
    //             echo "<script>
    //                 alert('Success!');
    //                 window.location.href='".base_url("Admin/personal")."';
    //             </script>";
    //         } else {
    //             echo "<script>
    //                 alert('failed!');
    //                 window.location.href='".base_url("Admin/personal")."';
    //             </script>";
    //         }
              
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }

    
    // public function banner_home()
    // {
    //     $data['banners'] = $this->Banner_model->fecthAll();
    //     $this->load->view('admin/banner', $data);

    // }

    // public function form_homebanner()
    // {
    //     if(!empty($this->session->userdata('user'))){
            
    //         $this->load->view('admin/form_homebanner'); //  
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // public function create_bannerhome()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    //         $ab_name = $this->security->xss_clean($this->input->post('name', TRUE));

    //         $last_id = $this->Banner_model->create($ab_name);

    //         if($last_id > 0){
    //             if(!empty($_FILES['covImg']['name'])){

    //                 $folderName = './assets/images/banner/'.$last_id.'/';
    
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
                        
    //                 @$file_upload=$this->upload->data('file_name');
    
    //                 if($this->upload->display_errors()){ 
    //                     echo $this->upload->display_errors(); 
    //                 }else{  
    
    //                     @$image_type=$this->upload->data('image_type');
    //                     @$file_size=$this->upload->data('file_size');
    //                     @$file_path=$this->upload->data('file_path');
    
    //                     $dataArr = array(
    //                         'image_type'    => @$image_type,
    //                         'file_size'     => @$file_size,
    //                         'file_path'     => @$file_path,
    //                         'image_cover'   => @$file_upload,
    //                         'banner_id'     => @$last_id
    //                     );  

    //                     $response = $this->Banner_model->update($dataArr);
    //                     if($response > 0){
    //                         echo "<script>
    //                             alert('Success!');
    //                             window.location.href='".base_url("Admin/banner_home")."';
    //                         </script>";
    //                     } else {
    //                         echo "<script>
    //                             alert('failed!');
    //                             window.location.href='".base_url("Admin/banner_home")."';
    //                         </script>";
    //                     }
    //                 }
    //             }
    //         } else{
    //             echo "<script>
    //                 alert('failed!');
    //                 window.location.href='".base_url("Admin/form_homebanner")."';
    //             </script>";
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }

    // }
    // public function edit_homebanner()
    // {
    //     if(!empty($this->session->userdata('user'))){   
    //         $banner_id = $this->uri->segment(3);
    //         $data['banner_descs'] = $this->Banner_model->getDesc($banner_id); 
    //         $this->load->view('admin/form_homebanner_edit', $data); //  

    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
    // public function update_bannerhome()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->security->get_csrf_token_name(); 
    //         $this->security->get_csrf_hash();
    //         $bh_name = $this->security->xss_clean($this->input->post('name', TRUE));
    //         $bh_id = $this->security->xss_clean($this->input->post('bannerhome_id', TRUE));
            
    //         if(!empty($_FILES['covImg']['name'])){
    //             $folderName = './assets/images/banner/'.$bh_id.'/';
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
                    
    //             @$file_upload=$this->upload->data('file_name');
    //             if($this->upload->display_errors()){ 
    //                 echo $this->upload->display_errors();  
    //             }else{  
    //                 @$image_type=$this->upload->data('image_type');
    //                 @$file_size=$this->upload->data('file_size');
    //                 @$file_path=$this->upload->data('file_path');
    //             }
    //         } 
    //         $dataArr = array(
    //             'name'          => $bh_name,
    //             'image_type'    =>  @$image_type,
    //             'file_size'     =>  @$file_size,
    //             'file_path'     =>  @$file_path,
    //             'image_cover'   =>  @$file_upload,
    //             'banner_id'      => @$bh_id
    //         );  
    //         $response = $this->Banner_model->update2($dataArr);
    //         if($response > 0){
    //             echo "<script>
    //                 alert('Success!');
    //                 window.location.href='".base_url("Admin/banner_home")."';
    //             </script>";
    //         } else {
    //             echo "<script>
    //                 alert('failed!');
    //                 window.location.href='".base_url("Admin/edit_homebanner/".$bh_id)."';
    //             </script>";
    //         }
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }

    // }

    // public function user_exp()
    // {
    //     $data['banner_userexps'] = $this->UserExp_model->fecthAll();
    //     $this->load->view('admin/list_expuser', $data);

    // }

    // public function form_userexp()
    // {
    //     if(!empty($this->session->userdata('user'))){
            
    //         $this->load->view('admin/form_userexp'); //  
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

