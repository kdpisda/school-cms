<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
    }
    
    public function index(){
		if(isset($this->session->username) and $this->session->username != null){
            $data['title'] = 'Dashboard';
            $this->load->view('Dashboard/main', $data);
        }
        else{
            $this->session->set_flashdata('msg', 'Please login to view your dashboard.');
            header('Location: '.base_url().'login');
        }
	}
    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('msg', 'Logged out successfully!!!');
        header('Location: '.base_url().'login');
    }
}
