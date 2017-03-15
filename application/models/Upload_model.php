<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

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
        $this->load->database();
    }
    
    public function get_album($slug = FALSE){
        if(isset($slug) && $slug != null){
            $query = $this->db->get_where('users', array('username' => $slug));
            return $query->row_array();
        }
    }
    
    public function set_album(){

        $name = trim($this->input->post('title'));
        $detail = trim($this->input->post('detail'));
        $data = array(
            'name' => $name,
            'detail' => $detail,
            'banner_img' => $this->session->img
        );
        $session_data = array('img', 'step');
        $this->session->unset_userdata($session_data);
        return $this->db->insert('album', $data);
    }
    
}
