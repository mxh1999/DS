<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index()
	{
	    session_start();
		session_write_close();
		if (isset($_SESSION['id']))
		{
			$msg="请先登出当前账号";
			$this->load->view('WA',$msg);
		}
		else
		{
			$this->load->view('register/register_page');
		}
	}
	public function check()
	{
		session_start();
		setcookie('session', $session_id());
		$name = $this->input->post('name');
		$psword = $this->input->post('psword');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$id = $this->user_model->register($name,$psword,intval($email),intval($phone));
		if ($id < 0)
		{
			$msg="服务器繁忙，请稍后再试";
			$this->load->view('WA',$msg);
		}
		else
		{
			$_SESSION['id']=$id;
			setcookie('user',$name);
			this->load->view('register/success',$id);
		}
	}
}
