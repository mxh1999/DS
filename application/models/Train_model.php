<?php
/**
 * 车次管理模型，用于与车次有关的所有操作
 */
class Train_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	public function add_train($train_id,$name,$catalog,$num_station,$num_price,$Price,$Station)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, DATABASE_IP, DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = 'add_train ' . $train_id . ' ' . $name . ' ' . $catalog . ' ' . $num_station . ' ' .$num_price;
		for ($i = 0; $i < $num_price;$i++)
		{
			$in .= ' ' . $Price['name'][$i];
		}
		$in .= '#';
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		for ($i = 0;$i < $num_station;$i++)
		{
			$in = Station['name'][$i] . ' ' . Station['arr'][$i] . ' ' . Station['sta'][$i] . ' ' . Station['sto'][$i];
			for ($j = 0; $j< $num_price;$j++)
				$in .= ' ' . $Price['num'][$i][$j];
			$in .= '#';
			var_dump($in);
			die(0);
			if (!socket_write($socket ,$in, strlen($in)))
			{
				socket_close($socket);
				return -1;
			}
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		return intval($out);
	}
	public function modify_train($train_id,$name,$catalog,$num_station,$num_price,$Price,$Station)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, DATABASE_IP, DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = 'modify_train ' . $train_id . ' ' . $name . ' ' . $catalog . ' ' . $num_station . ' ' .$num_price;
		for ($i = 0; $i < $num_price;$i++)
		{
			$in .= ' ' . $Price['name'][$i];
		}
		$in .= '#';
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		for ($i = 0;$i < $num_station;$i++)
		{
			$in = Station['name'][$i] . ' ' . Station['arr'][$i] . ' ' . Station['sta'][$i] . ' ' . Station['sto'][$i];
			for ($j = 0; $j< $num_price;$j++)
				$in .= ' ' . $Price['num'][$i][$j];
			$in .= '#';
			if (!socket_write($socket ,$in, strlen($in)))
			{
				socket_close($socket);
				return -1;
			}
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		return intval($out);
	}
	public function query_train($train_id)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, DATABASE_IP, DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = 'query_train ' . $train_id . '#';
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		$tmp=explode(' ',$out);
		$ans = array();
		$ans['train_id']=$tmp[0];
		$ans['name']=$tmp[1];
		$ans['catalog']=$tmp[2];
		$ans['num_station']=intval($tmp[3]);
		$ans['num_price']=intval($tmp[4]);
		$ans['Price']=array('name'=>array(),'num'=>array());
		$ans['Station']=array('name'=>array(),'arr'=>array(),'sta'=>array(),'sto'=>array());
		for ($i = 0;$i < ans['num_price'];$i++)
		{
			$ans['Price']['name'][$i]=$tmp[5+$i];
		}
		for ($i = 0;$i < ans['num_station'];$i++)
		{
			$out = socket_read($socket,8192);
			while (!isset($out))	$out = socket_read($socket,8192);
			$tmp=explode(' ',$out);
			$ans['Station']['name'][$i]=$tmp[0];
			$ans['Station']['arr'][$i]=$tmp[1];
			$ans['Station']['sta'][$i]=$tmp[2];
			$ans['Station']['sto'][$i]=$tmp[3];
			$ans['Price']['num'][$i]=array();
			for ($j = 0;$j<ans['num_price'];$j++)
			{
				$ans['Price']['num'][$i][$j]=$tmp[4+$j];
			}
		}
		return $ans;
	}
	public function sale_train($train_id)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, DATABASE_IP, DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = 'sale_train ' . $train_id . '#';
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		return intval($out);
	}
	public function delete_train($train_id)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, DATABASE_IP, DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = 'delete_train ' . $train_id . '#';
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		return intval($out);
	}
}