<?php

class AdminLoginController extends CI_Controller
{	


	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_Model');
		$this->load->library('session');	
	}


	//load admin login page
    public function index()
    {
        $this->load->view('admin/adminLogin');
    }


    //admin login
	public function login()
    {
		$login = array(
			'email'=>$this->input->post('inputEmail'),
			'password'=>$this->input->post('inputPassword')
		);

		$data=$this->Admin_Model->login($login['email'], $login['password']);

		if($data)
		{
			$this->session->set_userdata('sid',$data['id']);
			$this->session->set_userdata('name',$data['name']);
			$this->session->set_userdata('email',$data['email']);
			$this->session->set_userdata('roleid',$data['role_id']);

			//admin = 1; employee = 2; new user = 3
				if ($this->session->userdata('roleid') == 1) {
					redirect('admin/admindashboardcontroller/index');
				} else if ($this->session->userdata('roleid') == 2) {
					redirect('employee/employeedashboardcontroller/index');
				} else {
					redirect('employee/employeelogincontroller/index');
				}
		} else {
			$this->session->set_flashdata('emsg','Please enter correct details');
			redirect('employee/employeelogincontroller/index');
		}
	}

}