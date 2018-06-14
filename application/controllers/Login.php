<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index()
	{
	    session_start();
		$id=$this->input->post('id');
		$psword=$this->input->post('psword');
		
		$ok=$this->User_model->login($id,$psword);
		if ($ok === -1)
		{
			$this->load->view('RE');
		}
		else
		{
			if ($ok === 0)
			{
				$msg="用户名或密码错误";
				$this->load->view('WA',array('msg'=>$msg));
			}
			else
			{
				$userdata=$this->User_model->query($id);
				if ($userdata === -1)
				{
					$this->load->view('RE');
				}
				else
				{
					$_SESSION['id']=$id;
					$this->input->set_cookie("user",$userdata['name'],1800);
					echo $this->input->cookie("user");
				}
			}
		}
	}
}
