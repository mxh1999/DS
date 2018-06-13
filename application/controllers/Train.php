<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Train extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Train_model');
	}
	public function index()
	{
	}
	public function add()
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
					$train_id = $this->input->post('train_id');
					$name = $this->input->post('name');
					$catalog = $this->input->post('catalog');
					$num_station = intval($this->input->post('num_station'));
					$num_price = intval($this->input->post('num_price'));
					$name_s = array();
					$name_price = array();
					$time_arr = array();
					$time_sta = array();
					$time_sto = array();
					$price_num = array();
					for ($i = 0;$i < $num_price;$i++)
					{
						$name_price[$i]=$this->input->post("name_price[$i]");
					}
					for ($i = 0;$i < $num_station; $i++)
					{
						$name_s[$i]=$this->input->post("name_s[$i]");
						$time_arr[$i]=$this->input->post("time_arrive[$i]");
						$time_sta[$i]=$this->input->post("time_start[$i]");
						$time_sto[$i]=$this->input->post("time_stopover[$i]");
						for ($j = 0; $j<$num_price;$j++)
						{
							$price_num[$i][$j]=$this->input->post("price[$i][$j]");
						}
					}
					$Price = array('name'=>$name_price , 'num' => $price_num);
					$Station = array('name'=>$name_s,'arr'=>$time_arr,'sta'=>$time_sta,'sto'=>$time_sto);
					var_dump($train_id,$name,$catalog,$num_station,$num_price,$Price,$Station);
					die();
					$ok = $this->Train_model->add_train($train_id,$name,$catalog,$num_station,$num_price,$Price,$Station);
					if ($ok === -1)
					{
						$this->load->view('RE');
					}
				}
			}
		}
	}
	public function modify()
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
					$train_id = $this->input->post('train_id');
					$name = $this->input->post('name');
					$catalog = $this->input->post('catalog');
					$num_station = intval($this->input->post('num_station'));
					$num_price = intval($this->input->post('num_price'));
					$name = array();
					$name_price = array();
					$time_arr = array();
					$time_sta = array();
					$time_sto = array();
					$price_num = array();
					for ($i = 0;$i < $num_price;$i++)
					{
						$name_price[$i]=$this->input->post("name_price[$i]");
					}
					for ($i = 0;$i < $num_station; $i++)
					{
						$name[$i]=$this->input->post("name[$i]");
						$time_arr[$i]=$this->input->post("time_arrive[$i]");
						$time_sta[$i]=$this->input->post("time_start[$i]");
						$time_sto[$i]=$this->input->post("time_stopover[$i]");
						for ($j = 0; $j<$num_price;$j++)
						{
							$price_num[$i][$j]=$this->input->post("price[$i][$j]");
						}
					}
					$Price = array('name'=>$name_price , 'num' => $price_num);
					$Station = array('name'=>$name,'arr'=>$time_arr,'sta'=>$time_sta,'sto'=>$time_sto);
					$ok = $this->Train_model->modify_train($train_id,$name,$catalog,$num_station,$num_price,$Price,$Station);
					if ($ok === -1)
					{
						$this->load->view('RE');
					}
				}
			}
		}
	}
	public function sale()
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
					$msg = '您不是管理员';
					$this->load->view('WA',array('msg'=>$msg));
				}
				else
				{
					$train_id = $this->input->post('train_id');
					$ok = $this->Train_model->sale_train($train_id);
					if ($ok === -1)
					{
						$this->load->view('RE');
					}
					else if ($ok === 0)
					{
						$msg = '该车已发售';
						$this->load->view('WA',array('msg'=>$msg));
					}
				}
			}
		}
	}
	public function erase()
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
					$msg = '您不是管理员';
					$this->load->view('WA',array('msg'=>$msg));
				}
				else
				{
					$train_id = $this->input->post('train_id');
					$ok = $this->Train_model->delete_train($train_id);
					if ($ok === -1)
					{
						$this->load->view('RE');
					}
					else if ($ok === 0)
					{
						$msg = '该车已发售';
						$this->load->view('WA',array('msg'=>$msg));
					}
				}
			}
		}
	}
	public function query()
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
					$msg = '您不是管理员';
					$this->load->view('WA',array('msg'=>$msg));
				}
				else
				{
					$train_id = $this->input->post('train_id');
					$ans = $this->Train_model->query_train($train_id);
					if ($ok === -1)
					{
						$this->load->view('RE');
					}
					else
					{
						$this->load->view('query_train',$ans);
					}
				}
			}
		}
	}
}
