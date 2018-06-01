<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index()
	{
	    session_start();
	    session_write_close();
        if (!isset(_SESSION['id']))
		{
			$msg="请先登录";
			this->load->view('WA',$msg);
		}
		else
		{
			$userdata=$this->user_model->query($id);
			if ($userdata === -1)
			{
				$this->load->view('RE');
			}	else
			{
				this->load->view('user/profile',$userdata);
			}
		}
	}
}
