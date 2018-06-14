<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index()
	{
	    session_start();
		if (!isset($_SESSION['id']))
		{
			$msg="请先登录";
			$this->load->view('WA',$msg);
		}
		else
		{
			$_SESSION = array();
			if (isset($_COOKIE['user']))
				setcookie('user',"", time()-3600);
			if (isset($_COOKIE[session_name()]))
				setcookie(session_name(),"", time()-3600);
			session_destroy();
		}
	}
}
