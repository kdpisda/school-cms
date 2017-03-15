<?php

class Upload extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('dashboard/upload', array('error' => ' ' ));
    }

    public function do_upload(){
        
        // Checking whether an image has already been uploaded or not
        // If it is uploaded we will redirect it again to upload page
        if(isset($this->session->img) && $this->session->img != null){
            $this->session->step = 1;
            echo '1';
            // Redirecting to gallery/upload.
            header('Location: '.base_url().'gallery/upload');
        }
        else{
            // Otherwise uploading image
            $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('userfile')){
                $error = array('error' => $this->upload->display_errors());
                echo '2';
                // An error occured
                $this->load->view('gallery/upload', $error);
            }
            else{
                echo '3';
                // Upload was successful
                $upload_data = $this->upload->data();
                $this->session->set_userdata('img', $upload_data['file_name']);
                
                // Session set to step 1 
                $this->session->step = 1;
                
                // Redirecting again gallery/upload to continue album creating step
                header('Location: '.base_url().'gallery/upload');
            }
        }
    }
}