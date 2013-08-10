<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_logout extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

	public function logout()
	{

		$user_name = $this->session->userdata('name');
		//セッション情報を個別に削除
		$this->session->unset_userdata('name');
		//セッションの破棄
		$this->session->sess_destroy();
		return $user_name;
	}
}