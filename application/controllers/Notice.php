<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/notice
	 *	- or -
	 * 		http://example.com/notice/index
	 *	- or -
     *      http://example.com/index.php/notice
     *	- or -
     *      http://example.com/index.php/motice/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Notice_model');
        $this->load->helper('url_helper');
    }
    
	public function index(){
        $data['notice'] = $this->news_model->get_news();
        $data['title'] = 'Notice archive';

        $this->load->view('templates/header', $data);
        $this->load->view('Notice/board', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($slug = NULL){
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
}
