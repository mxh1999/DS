<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Ticket_model');
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
			$userdata=$this->User_model->query($id);
			if ($userdata === -1)
			{
				$this->load->view('RE');
			}	else
			{
				$this->load->view('user/profile',array('userdata' => $userdata));
			}
		}
	}
	public function change()
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
			$id=$_SESSION['id'];
			$name=$this->input->post('name');
			$psword=$this->input->post('psword');
			$psword1=$this->input->post('new_psword');
			if (!isset($psword1))	$psword1=$psword;
			$email=$this->input->post('email');
			$phone=$this->input->post('phone');
			$ok=$this->User_model->login($id,$psword);
			if ($ok === -1)
			{
				$this->load->view('RE');
			}
			else if ($ok === 0)
			{
				$msg="密码错误";
				$this->load->view('WA',array('msg'=>$msg));
			}
			$ok=$this->User_model->modify_profile($id, $name, $psword1, $email, $phone);
			if ($ok === -1)
			{
				$this->load->view('RE');
			}
		}
	}
	public function query_order()
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
			$id=$_SESSION['id'];
			$date=$this->input->get('date');
			$catalog=$this->input->get('catalog');
			$ans = $this->Ticket_model->query_order($id,$date,$catalog);
			if ($ans === -1)
			{
				$this->load->view('RE');
			}	else
			{
				$this->load->view('query/order',$ans);
			}
		}
	}
}
