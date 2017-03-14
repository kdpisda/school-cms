<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
    }
    
    public function index()
	{
		$data['title'] = 'Gallery';
        if(isset($this->session->username) && $this->session->username != null){
            $data['user'] = true;
            $this->load->view('Gallery/main', $data);
        }
        else {
            $data['user'] = false;
            $this->load->view('Gallery/main', $data);
        }
	}
    
    // Function to create album and upload clips
    public function upload(){
        $this->form_validation->set_rules('name', 'Title', 'required');
        $this->form_validation->set_rules('detail', 'Detail', 'required');

        if ($this->form_validation->run() === FALSE){
            $data['title'] = 'Create an Album';
            $this->load->view('gallery/upload', $data);
        }
        else{
            $this->gallery->do_upload();
            $this->upload_model->set_album();
            $this->upload_model->set_banner();
        }
    }
    
    public function do_upload(){
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('banner')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('gallery/upload', $error);
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('dashboard/success', $data);
        }
    }
}
