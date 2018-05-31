<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function check()
	{
	    session_start();
		$id=$this->input->post('id');
		$psword=$this->input->post('psword');
		if (!isset($psword) || !isset($id))
		{
			$msg="用户名或密码错误";
			$this->load->view('WA',$msg);
		}
		else
		{
			$ok=$this->user_model->login($id,$psword);
			if ($ok < 0)
			{
				$this->load->view('RE');
			}
			else
			{
				if ($ok < 1)
				{
					$msg="用户名或密码错误";
					$this->load->view('WA',$msg);
				}
				else
				{
					$userdata=$this->user_model->query($id);
					if ($userdata === -1)
					{
						$this->load->view('RE');
					}
					else
					{
						$_SESSION['id']=$id;
						setcookie('user',$userdata['name']);
					}
				}
			}
		}
	}
}
