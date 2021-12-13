<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_portfolio_model extends CI_Model {

    public function fileUploaded($reqID)
    {
        require_once APPPATH.'third_party/upload/class.fileuploader.php';

        $portfolio_id = $reqID;
        // assets\images\portfolio\9
        $filePath 	= 'assets/images/portfolio/'.$portfolio_id.'/';
        $path 		= realpath($filePath); 
        $updated 	= date('Y-m-d H:i:s');
            
        $appendedFiles = array();
        $uploadsFiles = array_diff(scandir($filePath), array('.', '..'));

        foreach($uploadsFiles as $file) {
            if(is_dir($file))
                continue;

            $url ='assets/images/portfolio/'.$portfolio_id.'/'.$file;
            $appendedFiles[] = array(
                "name" => $file,
                "type" => FileUploader::mime_content_type($filePath . $file),
                "size" => filesize($filePath . $file),
                "file" => $filePath . $file,
                "file" => 'https://'. $_SERVER['HTTP_HOST'] .'/biginspector-demo/'.$filePath . $file,
                "data" => array(
                    "url" => $url
                )
            );
        }

        $FileUploader = new FileUploader('productImg', array(
            // 'limit' => 4,
            // 'maxSize' => 4,
            // 'fileMaxSize' => 4,
            'extensions' => ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'],
            'required' => false,
            'uploadDir' => $filePath,
            'title' => 'name',
            'replace' => false,
            'listInput' => true,
            'files' => $appendedFiles
        ));
        
         $data = $FileUploader->upload();
         $fileList = $FileUploader->getFileList();	
         $genInput = $FileUploader->generateInput();
       
        return $genInput;
       
        if(!empty($fileList) ) {

            $this->db->select('max(order_id) AS max_id');
            $this->db->from('tbl_portfolio_img');
            $this->db->where('portfolio_id', $portfolio_id);
            $this->db->limit(1);
            $query = $this->db->get();
            $result_max = $query->result_array();


            if ($result_max[0]['max_id']) {
                $i = $result_max[0]['max_id'];
            } else {
                $i = 0;
            }
        }

        if($data['hasWarnings']) {
            $warnings = $data['warnings'];
        }

        foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
            $this->db->where('portfolio_id', $portfolio_id);
            $this->db->delete('tbl_portfolio_img');

            unlink($filePath . $value['name']);
        }
    }
}

?>