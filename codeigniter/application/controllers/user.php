<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{

		$this->load->view('user/login');
	}

	public function logout()
	{
		$this->load->helper('url');
		$this->load->model('user_logout', 'user_logout');
		$logout_data = $this->user_logout->logout();
		$this->load->view('user/logout', $logout_data);
	}

	public function user_login()
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		$this->load->model('user_login', 'user_login');
		$this->load->helper('url');
		$is_login = $this->user_login->is_login($username, $password);

		if($is_login){
			redirect('main/top', 304);
		} else {
			$this->load->view('user/login' );
		}
	}

	public function user_list()
	{
		$this->load->helper('url');
		$this->load->model('user_list', 'user_list');
		$data = array(
			'user_list' => $this->user_list->get_user_list()
		);
		$this->load->view('user/list', $data);
	}
}