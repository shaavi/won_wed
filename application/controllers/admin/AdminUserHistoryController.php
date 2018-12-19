<?php

class AdminUserHistoryController extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_Model');
        $this->load->library('session');	
        $this->load->helper('date');
		$this->load->helper('form');
	}


	//load admin login page
    public function index($id)
    {
        //get all leave table records
        $data["leave"] = $this->Admin_Model->showData();
        //get all users table records
        $data['users'] = $this->Admin_Model->getUsers();
        //get leave records of specific user
        $data['leave1'] = $this->Admin_Model->getLeave1($id);
        //get specific user record
        $data['users1'] = $this->Admin_Model->getUser1($id);
        $data["annualTaken"] = $this->Admin_Model->getAnnualLeft($id);
		$data["casualTaken"] = $this->Admin_Model->getCasualLeft($id);
        $this->load->view('admin/adminUserHistory', $data);
    }


    //show details of employees
	public function viewEmployeeHistory($id)
	{
        $this->Admin_Model->viewEmployeeHistory($id);
        $this->load->view('employee/employeeDashboard');
    }
    
}