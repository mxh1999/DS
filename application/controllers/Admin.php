<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index()
	{
	    session_start();
		session_write_close();
        if (!isset($_SESSION['id']))
		{
			$msg="请先登录";
			$this->load->view('WA',array('msg'=>$msg));
		}
		else
		{
			$id = $_SESSION['id'];
			$userdata=$this->User_model->query($id);
			if ($userdata === -1)
			{
				$this->load->view('RE');
			}	else
			{
				if ($userdata['privilege'] < 2)
				{
					$msg = "您不是管理员";
					$this->load->view('WA',array('msg'=>$msg));
				}
				else
				{
					$this->load->view('user/admin');
				}
			}
		}
	}
	public function set_admin()
	{
		session_start();
		session_write_close();
        if (!isset($_SESSION['id']))
		{
			$msg="请先登录";
			$this->load->view('WA',array('msg'=>$msg));
		}
		else
		{
			$id = $_SESSION['id'];
			$userdata=$this->User_model->query($id);
			if ($userdata === -1)
			{
				$this->load->view('RE');
			}	else
			{
				if ($userdata['privilege'] < 2)
				{
					$msg = "您不是管理员";
					$this->load->view('WA',array('msg'=>$msg));
				}
				else
				{
					$id2 = $this->input->post('id');
					$ok = $this->User_model->modify_privilege($id,$id2,2);
					$this->load->view('goto',array('url'=>This_URL.'/Admin'));
				}
			}
		}
	}
}
