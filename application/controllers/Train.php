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
	public function add_train()
	{
	}
	
}
