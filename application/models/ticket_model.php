<?php
/**
 * 车票管理模型，用于与车票有关的所有操作
 */
class Ticket_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	/**
	 * 查询loc到loc2日期为date车类为catalog的车
	 * -1 = 服务器炸了
	 * 返回{num ,{train_id ,date_from ,time_from, loc2,date_to,time_to, ticket_kind, num XXXXXXXXXXX}}
	 */
	public function query_ticket($loc1, $loc2, $date, $catalog)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "query_ticket " . $loc1 . " " . $loc2 . " " . $date . " " . $catalog . "\n";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out='';
		while ($out = socket_read($socket,8192));
		$ans=array('num'=>intval($out),'val'=>array());
		for ($i = 1;$i <= $ans['num'];i++)
		{
			while ($out = socket_read($socket,8192));
			$tmp=explode(" ",$out);
			$ans['val'][$i]=$tmp;
		}
		socket_close($socket);
		return $ans;
	}
	/**
	 * 带中转的查询
	 * -1 = 服务器炸了
	 * {{XXX},{XXX}}
	 */
	public function query_transfer($loc1,$loc2,$date,$catalog)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "query_transfer " . $loc1 . " " . $loc2 . " " . $date . " " . $catalog . "\n";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out='';
		while ($out = socket_read($socket,8192));
		$tmp=explode(" ",$out);
		while ($out = socket_read($socket,8192));
		$tmp2=explode(" ",$out);
		$ans = array($tmp,$tmp2);
		socket_close($socket);
		return ans;
	}
	/**
	 * 订购车票
	 * -1 = 服务器炸了 0 = 失败 1 = 成功
	 */
	public function buy($id,$num,$train_id,$loc1,$loc2,$date,$ticket_kind)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "buy_ticket " . $id . " " . $num . " " . $train_id . " " . $loc1 . " " . $loc2 . " " .$date. " " . ticket_kind . "\n";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out='';
		while ($out = socket_read($socket,8192));
		return intval($out);
	}
	/**
	 * 退订车票
	 * -1 = 服务器炸了 0 = 失败 1 = 成功
	 */
	public function refund($id, $num, $train_id, $loc1, $loc2, $date, $ticket_kind)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "buy_ticket " . $id . " " . $num . " " . $train_id . " " . $loc1 . " " . $loc2 . " " .$date. " " . ticket_kind . "\n";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out='';
		while ($out = socket_read($socket,8192));
		return intval($out);
	}
}
