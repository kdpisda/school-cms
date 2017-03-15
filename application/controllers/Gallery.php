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
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->model('upload_model');
        $this->load->model('gallery_model');
    }
    
    public function index()
	{
		$data['title'] = 'Gallery';
        if(isset($this->session->username) && $this->session->username != null){
            $data['user'] = true;
        }
        else {
            $data['user'] = false;
        }
        $data['album'] = $this->gallery_model->get_album();
        $this->load->view('Gallery/main', $data);
	}
    
    // Function to create album and upload clips
    public function upload(){
        // Checking whether any steps have been initiated or not
        if(isset($this->session->step) && $this->session->step != null && isset($this->session->img) && $this->session->img !=null){
            
            if($this->session->step == 1){
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('detail', 'Detail', 'required');

                if ($this->form_validation->run() === FALSE){
                    $data['title'] = 'Create an Album';
                    $data['step'] = $this->session->step;
                    if(isset($this->session->username) && $this->session->username != null){
                        $data['user'] = true;
                    }
                    else {
                        $data['user'] = false;
                    }           
                    $data['album'] = $this->gallery_model->get_album();
                    $this->load->view('gallery/upload', $data);
                }
                else{
                    $this->upload_model->set_album();
                    header('Location: '.base_url().'gallery');
                }
            }
            else{
                $this->session->set_userdata('step', 0);
                $data['step'] = 0;
                $data['title'] = 'Gallery';
                if(isset($this->session->username) && $this->session->username != null){
                    $data['user'] = true;
                }
                else {
                    $data['user'] = false;
                }
                $this->load->view('Gallery/main', $data);
            }
        }
        else{
            // This means it is same as index() and we will initiate a session
            $this->session->set_userdata('step', 0);
            $data['step'] = 0;
            $data['title'] = 'Gallery';
            $data['album'] = $this->gallery_model->get_album();
            if(isset($this->session->username) && $this->session->username != null){
                $data['user'] = true;
            }
            else {
                $data['user'] = false;
            }           
            $this->load->view('Gallery/upload', $data);
        }    
    }
    
    // Function to view a particular album
    public function view($albumname){
        if(isset($this->session->username) && $this->session->username != null){
                $data['user'] = true;
            }
            else {
                $data['user'] = false;
            }
        $data['images'] = $this->gallery_model->get_images($albumname);
        $data['title'] = 'Gallery';
        $this->load->view('Gallery/view', $data);
    }
}
