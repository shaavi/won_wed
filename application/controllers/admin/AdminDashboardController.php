<?php

require_once('application/debug/ChromePhp.php');

class AdminDashboardController extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_Model');
		$this->load->library('session');	
	}


	//load admin dashboard page
    public function index()
    {
        $this->load->view("admin/dashboard");
    }



}

