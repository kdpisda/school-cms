<?php

class Upload extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index(){
        $this->load->view('dashboard/upload', array('error' => ' ' ));
    }

    public function do_upload(){
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('dashboard/upload', $error);
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('dashboard/success', $data);
        }
    }
}