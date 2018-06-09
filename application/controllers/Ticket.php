<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Ticket_model');
	}
	public function index()
	{
	    $this->load->view('ticket/query');
	}
	public function query()
	{
		$loc1 = $this->input->get('loc1');
		$loc2 = $this->input->get('loc2');
		$date = $this->input->get('date');
		$catalog = $this->input->get('catalog');
		$transnum = $this->input->get('transnum');
		$ans = $this->ticket_model->query_ticket($loc1,$loc2,$date,$catalog);
		$ans1 = array();
		if ($transnum)
		{
			$ans1= $this->ticket_model->query_transfer($loc1,$loc2,$date,$catalog);
		}
		$this->load->view('query/result',array('transnum' => $transnum,'ans' => $ans,'ans1' => $ans1));
	}
	public function book()
	{
		session_start();
		session_write_close();
		if (!isset($_SESSION['id']))
		{
			$msg = "请先登录";
			$this->load->view('WA',array('msg' =>$msg));
		}
		else
		{
			$id=$_SESSION['id'];
			$num=$this->input->post('num');
			$train_id=$this->input->post('train_id');
			$loc1=$this->input->post('loc1');
			$loc2=$this->input->post('loc2');
			$date=$this->input->post('date');
			$ticket_kind=$this->input->post('ticket_kind');
			
			$ok=$this->ticket_model->buy($id,$num,$train_id,$loc1,$loc2,$date,$ticket_kind);
			if ($ok === -1)
			{
				$msg= "服务器繁忙，请稍后再试";
				$this->load->view('WA',array('msg'=>$msg));
			}
			else if ($ok === 0)
			{
				$msg= "票数不足";
				$this->load->view('WA',array('msg'=>$msg));
			}
			else
			{
				$msg="订购完成";
				$this->load->view('book/success',array('msg'=>$msg));
			}
		}
	}
	public function refund()
	{
		session_start();
		session_write_close();
		if (!isset($_SESSION['id']))
		{
			$msg = "请先登录";
			$this->load->view('WA',array('msg' => $msg));
		}
		else
		{
			$id=$_SESSION['id'];
			$num = $this->input->post('num');
			$train_id = $this->input->post('train_id');
			$loc1=$this->input->post('loc1');
			$loc2=$this->input->post('loc2');
			$date=$this->input->post('date');
			$ticket_kind=$this->input->post('ticket_kind');
			
			$ok=$this->ticket_model->refund($id,$num,$train_id,$loc1,$loc2,$date,$ticket_kind);
			if ($ok === -1)
			{
				$msg= "服务器繁忙，请稍后再试";
				$this->load->view('WA',array('msg' => $msg));
			}
			else if ($ok === 0)
			{
				$msg= "票数不足";
				$this->load->view('WA',array('msg' => $msg));
			}
			else
			{
				$msg="退订完成";
				$this->load->view('book/success',array('msg' => $msg));
			}
		}
	}
}
