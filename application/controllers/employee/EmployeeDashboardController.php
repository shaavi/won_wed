
<?php
require_once('application/debug/ChromePhp.php');
class EmployeeDashboardController extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Employee_Model');
		$this->load->library('session');
		$this->load->helper('date');
		$this->load->helper('form');
	
	}


	//Load employee dashboard view
    public function index()
    {
		if ($this->session->userdata('sid') != 0)
			{
				$id = $this->session->userdata('sid');
				$data["leave"] = $this->Employee_Model->showLeave();
				$data["users"] = $this->Employee_Model->showLeave();
				$data['all'] = $this->Employee_Model->showData();
				$data['employee'] = $this->Employee_Model->showDataid($id);
				$data["annualTaken"] = $this->Employee_Model->getAnnualLeft($id);
				$data["casualTaken"] = $this->Employee_Model->getCasualLeft($id);
				$this->load->view('employee/employeeDashboard', $data);
		}else{
				redirect('employee/EmployeeLoginController/index');
			}
    }


	//employee logout
	public function getLeaveDays() 
	{
		$id = $this->session->userdata('sid');
		$data["annualTaken"] = $this->Employee_Model->getAnnualLeft($id);
		$data["casualTaken"] = $this->Employee_Model->getCasualLeft($id);
		redirect('employee/EmployeeLoginController/index', 'refresh');
	}


    //employee logout
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect('employee/EmployeeLoginController/index', 'refresh');
	}


	//employee apply leave
    public function applyLeave()
    {	
		$leaveType = $this->input->post('leave_type');
		$startDate = date("Y-m-d", strtotime($this->input->post('leave_start')));
		$endDate = date("Y-m-d", strtotime($this->input->post('leave_end')));

		$result = $this->Employee_Model->applyLeave($leaveType, $startDate, $endDate);

		$data = array(
			"error" => false,
			"msg" => "successfully inserted",
			"testdata" => $this->session->userdata('sid'),
			"testdata1" => $leaveType,
			"testdata2" => $startDate,
			"testdata3" => $endDate
		);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
	}


	//view leave details
	public function viewRequest()
	{
		$leave_id = $this->input->post('leave_id');		
		$data = $this->Employee_Model->viewRequest($leave_id);
		echo json_encode($data);
	}


	//edit selected user details
	public function editUser()
    {  
		$id = $this->session->userdata('sid');
		$user=array(
            'name'=>$this->input->post('inputName'),            
            'password'=>$this->input->post('inputPassword'),
			'mobile'=>$this->input->post('inputMobile'),
            'username'=>$this->input->post('inputUsername'),            
			);
		$email = $this->input->post('inputUsername');
        print_r($user);
			
		$this->Employee_Model->editUser($user, $id);
		redirect('employee/employeedashboardcontroller/index');
	}
}