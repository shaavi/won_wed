<?php

class EmployeeLoginController extends CI_Controller
{	

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Employee_Model');
		$this->load->library('session');	
	}


	//load admin login page
    public function index()
    {
        $this->load->view('employee/employeeLogin');
    }


    //admin login
	public function login()
    {
		$login = array(
			'email'=>$this->input->post('inputEmail'),
			'password'=>$this->input->post('inputPassword')
		);

		$data=$this->Employee_Model->login($login['email'], $login['password']);

		if($data)
		{
			$this->session->set_userdata('sid',$data['id']);
			$this->session->set_userdata('name',$data['name']);
			$this->session->set_userdata('username',$data['username']);
			$this->session->set_userdata('email',$data['email']);
			$this->session->set_userdata('roleid',$data['role_id']);
			$this->session->set_userdata('annual_left',$data['annual_left']);
			$this->session->set_userdata('casual_left',$data['casual_left']);

			//admin = 1; employee = 2; new user = 3
				if ($this->session->userdata('roleid') == 1) {
					redirect('admin/admindashboardcontroller/index');
				} else if ($this->session->userdata('roleid') == 2) {
					redirect('employee/employeedashboardcontroller/index');
				} else {
					redirect('employee/employeelogincontroller/index');
				}
		} else {
			$this->session->set_flashdata('emsg','Username or password you provided is incorrect. Please try again');
			redirect('employee/employeelogincontroller/index');
		}
	}

}