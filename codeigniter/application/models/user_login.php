<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_login extends CI_Model {


const NAME = 'ta007';
const PASSWORD = 'Cy1it8sCo';

	function __construct()
    {
    	$hostname = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "hack";
		$connect = mysql_connect($hostname, $username, $password) or die ("サーバーに接続できません");
		mysql_select_db($dbname,$connect) or die("データベースに接続できません");
		mysql_query("SET NAMES 'utf8'") or die("文字コード失敗");
        parent::__construct();
    }

	public function is_login($request_name, $request_password)
	{

		$tablename = "user";
		//TODO サイニタイズ activeRecord使え	
		$query = "SELECT * FROM $tablename where uid = '$request_name' and password = '$request_password'";
		$mysql_query = mysql_query($query);
		$row = mysql_fetch_row($mysql_query);
		if($row){
			if($request_name == $row[0] && $request_password == $row[4])
			{

				$new_session = array(
				'name' => $request_name,
				'firstname' => $row[1],
				'lastname' => $row[2],
				'password' => $request_password,
				);
				//セッションを設定
				$this->session->set_userdata($new_session);
				return true;
			}
		} else {
			//セッション情報を個別に削除
			$this->session->unset_userdata('name');
			//セッションの破棄
			$this->session->sess_destroy();
			var_dump('ユーザ名とパスワードが一致しません');
			var_dump($request_name);
			var_dump($request_password);
			return false;
		}
	}
}