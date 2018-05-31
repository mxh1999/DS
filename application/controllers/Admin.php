<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
	    session_start();
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
				if ($userdata['privilege'] < 2)
				{
					$msg = "您不是管理员";
					this->load->view('WA',$msg);
				}
				else
				{
					this->load->view('user/admin');
				}
			}
		}
	}
}