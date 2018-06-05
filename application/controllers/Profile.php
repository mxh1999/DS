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
			this->load->view('WA',array('msg'=>$msg));
		}
		else
		{
			$userdata=$this->User_model->query($id);
			if ($userdata === -1)
			{
				$this->load->view('RE');
			}	else
			{
				this->load->view('user/profile',$userdata);
			}
		}
	}
	public function change()
	{
		session_start();
	    session_write_close();
        if (!isset(_SESSION['id']))
		{
			$msg="请先登录";
			this->load->view('WA',array('msg'=>$msg));
		}
		else
		{
			$id=_SESSION['id'];
			$name=$this->input->post('name');
			$psword=$this->input->post('psword');
			$email=$this->input->post('email');
			$phone=$this->input->post('phone');
			$ok=$this->User_model->modify_profile($id, $name, $psword, $email, $phone);
			if ($ok === -1)
			{
				$this->load->view('RE');
			}
			else if ($ok === 0)
			{
				$msg="密码错误";
				%this->load->view('WA',array('msg'=>$msg));
			}
		}
	}
}
