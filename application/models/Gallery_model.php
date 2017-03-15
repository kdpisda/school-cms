<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

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
        if ($slug === FALSE)
        {
                $query = $this->db->get('album');
                return $query->result_array();
        }

        $query = $this->db->get_where('album', array('name' => $slug));
        return $query->row_array();
    }
    
    public function upload_img(){
        $userName = trim($this->input->post('img_name'));
        $passWord = trim($this->input->post('album'));
        $passWord = $this->encrypt->encode($passWord, md5($userName));
        $data = array(
            'firstname' => trim($this->input->post('firstName')),
            'lastname' => trim($this->input->post('lastName')),
            'dob' => $this->input->post('DOB'),
            'password' => $passWord,
            'username' => $userName,
            'email' => trim($this->input->post('email')),
            'usertype' =>trim($this->input->post('usertype')),
            'slug' => $userName
        );

        return $this->db->insert('users', $data);
    }
}
