<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }
    
    public function index(){

        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if(isset($this->session->username) && $this->session->username != null){
            header('Location: '.base_url().'dashboard');
        }

        if ($this->form_validation->run() === FALSE){
            $data['msg'] = $this->session->flashdata('msg');
            $this->load->view('templates/header', $data);
            $this->load->view('Login/main', $data);
            $this->load->view('templates/footer');
        }
	}
    
    // Login function
    public function login(){
        $this->load->library('encrypt');
        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('Login/main');
            $this->load->view('templates/footer');
        }
        else{
            $username = trim($this->input->post('username'));
            $password = trim($this->input->post('password'));
            $temp = $this->user_model->get_user($username);
            $temp['password'] = $this->encrypt->decode($temp['password'], md5($username));
            if(!strcmp($temp['username'],$username) && !strcmp($temp['password'], $password)){
				$data['title'] = 'Welcome User';
				$this->session->set_userdata('username', $username);
				header('Location: '.base_url().'dashboard');
            }
            else{
                $this->session->set_flashdata('msg', 'Wrong combination!!!');
                header('Location: '.base_url().'login');
            }
        }
    }
    
    // Creating user with this function
    public function create(){

        $data['title'] = 'Signup';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('Login/main');
            $this->load->view('templates/footer');

        }
        else{
            $this->user_model->set_user();
            $this->session->set_flashdata('msg', 'Wrong combination!!!');
            header('Location: '.base_url().'login');
        }
    }
}
