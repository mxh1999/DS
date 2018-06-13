<?php
/**
 * 用户管理模型，用于与用户有关的所有操作
 */
class User_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	/**
	 * 注册用户
	 * -1 = 服务器炸了
	 * 返回用户id
	 */
	public function register($name, $psword, $email, $phone)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$psword_md5 = md5($psword);
		$in = "register " . $name . " " . $psword_md5 . " " . $email . " " . $phone . "#";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		socket_close($socket);
		return intval($out);
	}
	/**
	 * 登录
	 * -1 = 服务器炸了
	 * 0 = 密码错误
	 * 1 = 成功
	 */
	public function login($id, $psword)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$psword_md5 = md5($psword);
		$in = "login ". $id . " " . $psword_md5 . "#";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		socket_close($socket);
		return intval($out);
	}
	/**
	 * 查询用户信息
	 * 返回 -1 = 服务器炸了
	 * 返回 (name,email,phone,privilege)
	 */
	public function query($id)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "query_profile " . $id . "#";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		$tmp = explode(" ",$out);
		$ans = array("name" => tmp[0], "email" => tmp[1], "phone" => intval(tmp[2]), "privilege" => inval(tmp[3]));
		return ans;
	}
	/**
	 * 修改用户信息
	 * -1 = 服务器炸了
	 * 0 = 密码错误
	 * 1 = 成功
	 */
	public function modify_profile($id, $name, $psword, $email, $phone)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$psword_md5 = md5($psword);
		$in = "modify_profile ". $id . " " . $name . " " . $psword_md5 . " " . $email ." " . $phone . "#";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		socket_close($socket);
		return intval($out);
	}
	/**
	 * 修改用户权限
	 * -1 = 服务器炸了
	 * 0 = 失败
	 * 1 = 成功
	 */
	public function modify_privilege($id1, $id2, $privilege)
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "modify_privilege " . $id1 . " " . $id2 . " " . $privilege . "#";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		socket_close($socket);
		return intval($out);
	}
	public function clean()
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "clean" . "#";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		$out = socket_read($socket,8192);
		while (!isset($out))	$out = socket_read($socket,8192);
		socket_close($socket);
		return intval($out);
	}
	public function exit()
	{
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0)	return -1;
		$result = socket_connect($socket, $DATABASE_IP, $DATABASE_PORT);
		if ($result < 0)
		{
			socket_close($socket);
			return -1;
		}
		$in = "exit" . "#";
		if (!socket_write($socket ,$in, strlen($in)))
		{
			socket_close($socket);
			return -1;
		}
		socket_close($socket);
		return 1;
	}
}
