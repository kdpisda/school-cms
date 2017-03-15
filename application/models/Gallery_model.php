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
    
    // Function to get album names
    public function get_album($slug = FALSE){
        if ($slug === FALSE)
        {
                $query = $this->db->get('album');
                return $query->result_array();
        }

        $query = $this->db->get_where('album', array('name' => $slug));
        return $query->row_array();
    }
    
    // Function to add image data in database
    public function upload_img(){
        $name = trim($this->input->post('album_name'));
        $data = array(
            'album' => $name,
            'img' => $this->session->img
        );
        $session_data = array('img', 'step');
        $this->session->unset_userdata($session_data);
        
        return $this->db->insert('images', $data);
    }
    
    // Function to return image names on calling a particular album
    public function get_images($album_name){
        if(isset($album_name) && $album_name != null){
            $query = $this->db->get_where('images', array('album' => $album_name));
            return $query->result_array();
        }
    }
}
