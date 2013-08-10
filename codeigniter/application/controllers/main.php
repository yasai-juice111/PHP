<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('index');
	}

	public function top()
	{
		if($this->session->userdata('name') != NULL){
			//ログイン中
			$this->load->view('main/user');			
		}else{
			//ログインしてない
			$this->load->view('main/top');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */