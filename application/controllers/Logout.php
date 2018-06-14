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
			$this->load->view('WA',array('msg'=>$msg));
		}
		else
		{
			$_SESSION = array();
			$this->input->set_cookie('user','',0);
			$this->input->set_cookie(session_name(),'',0);
			session_destroy();
			$this->load->view('goto',array('url'=>This_URL));
		}
	}
}
