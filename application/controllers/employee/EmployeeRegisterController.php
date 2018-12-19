<?php
require_once('application/debug/ChromePhp.php');
class EmployeeRegisterController extends CI_Controller
{	

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('Employee_Model');
        $this->load->model('Admin_Model');
        $this->load->library('session');	
        $this->load->library('form_validation');
        $this->load->helper('date');
		$this->load->helper('form');
	}


	//load admin login page
    public function index()
    {
        $id =$this->uri->segment(4);  
		$data["users"] = $this->Employee_Model->showLeave();
        $data['all'] = $this->Employee_Model->showData();        
		$data['employee'] = $this->Employee_Model->showDataid($id);
        $this->load->view('employee/employeeRegister', $data, $id);
    }


    //employee register 
	public function empRegister()
    {   
        $empId = $this->input->post('user_id');
        
		$userDataArray=array(
            'name'=>$this->input->post('inputName'),
            'email'=>$this->input->post('inputEmail'),
            'password'=>$this->input->post('inputPassword'),
            'designation'=>$this->input->post('inputDesignation'),
            'username'=>$this->input->post('inputUsername'),            
            );
               
            $result = $this->Employee_Model->empRegister($userDataArray, $empId); 
            ChromePhp::log("result: " . json_encode($result)); 

        if($result)
        {
            $this->session->set_flashdata('success_msg', 'Registered successfully. Now login to your account.');
            redirect('employee/employeelogincontroller/index');        
        }
        else
        {       
            $this->session->set_flashdata('success_msg', 'db failed.');
            echo "fail";
        }        
    }

}