<?php
/**
 * 车票管理模型，用于与车票有关的所有操作
 */
class Ticket_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	function public add_train($train_id,$name,$catalog,$num_station,$num_price,$Price,$Station)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "add_train " . $train_id . " " . $name . ' ' . $catalog . ' ' . $num_station;
		for ($i = 0; $i < $num_station;$i++)
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
	function public modify_train($train_id,$name,$catalog,$num_station,$num_price,$Price,$Station)
	{
	}
	function public query_train($train_id)
	{
	}
	function public sale_train($train_id)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "sale_train " . $train_id . "#";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		return intval($out);
	}
	function public delete_train($train_id)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "delete_train " . $train_id . "#";
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