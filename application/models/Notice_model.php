<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice_model extends CI_Controller {

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
    
    public function get_notice($slug = FALSE){
        if ($slug === FALSE)
        {
                $query = $this->db->get('notice');
                return $query->result_array();
        }

        $query = $this->db->get_where('notice', array('slug' => $slug));
        return $query->row_array();
    }
}
