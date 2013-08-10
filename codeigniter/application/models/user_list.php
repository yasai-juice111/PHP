<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_list extends CI_Model {

	function __construct()
    {
    	$this->load->database();
        parent::__construct();
    }

	public function get_user_list()
	{
		$query = $this->db->get('user');
		$user_data = $query->result();
		return $user_data;
	}
}