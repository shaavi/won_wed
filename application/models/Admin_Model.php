<?php

/**
* 
*/
require_once('application/debug/ChromePhp.php');
class Admin_Model extends CI_Model
{

	public function index($user)
	{
		$this->db->insert('users',$user); 
	}


	//get all employee leave records
	function showData()
	{
		$query = $this->db->get('leave');
		$query_result = $query->result();
		return $query_result;
	}


	//get all employee profile records
	function getUsers()
	{
		$query = $this->db->get('users');
		$query_result = $query->result();
		return $query_result;
	}


	//get specific user record
	function getUser1($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		$query1 = $this->db->get();
		$result = $query1->result();
		return $result;
	}


	//get specific employee record
	function showUserLeaveHistory($id)
	{
		$this->db->select('*');
		$this->db->from('leave');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}


	//get leave records of a specific user
	function getLeave1($id)
	{
		$this->db->select('*');
		$this->db->from('leave');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}	


	//employee login
	public function login($email, $pass)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',$pass);

		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	}


	//show leave requests from the employees
	public function showRequests()
	{
		$query = $this->db->get("leave");
		return $query->result();
	}


	//show details of employees
	public function showEmpDetails()
	{
		$query = $this->db->get("users");
		return $query->result();
	}


	//approve leave 
	public function approve($id) 
	{	
		$this->db->set('status', 'Approved');
		$this->db->where('id', $id);
		$this->db->update('leave');

		$test = $this->db->affected_rows() > 0; 		
		return $test;
    }


   	//disapprove leave 
	public function disapprove($id) 
	{
		$this->db->set('status', 'Disapproved');
		$this->db->where('id', $id);
		$this->db->update('leave');
		return $this->db->affected_rows() > 0; 		   
    }


   	//check if the email address already exists
	public function checkEmail($email)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$query=$this->db->get();
	   
		if($query->num_rows()>0){
		  return false;
		}else{
		  return true;
		}
	}


	//get number of casual leave taken by specific user
	function getCasualLeft($id)
	{		
		$this->db->select_sum('leave_days');
		$this->db->from('leave');
		$this->db->where('user_id', $id);
		$this->db->where('leave_type', 'Casual');
		$query = $this->db->get();
		$result = $query->result();
		return $result[0];
	}


	//view details of leave
	public function viewRequest($leave_id) 
	{
		$this->db->where("id", $leave_id);
		$query=$this->db->get('leave');
		return $query->result();		
	}


	//get number of annual leave taken by specific user
	function getAnnualLeft($id)
	{		
		$this->db->select_sum('leave_days');
		$this->db->from('leave');
		$this->db->where('user_id', $id);
		$this->db->where('leave_type', 'Annual');
		$query = $this->db->get();
		$result = $query->result();
		return $result[0];
	}


   //admin invite an intern employee
	public function addEmployeeIntern($user, $email, $category)
	{  
		$this->db->insert('users', $user);
		$this->db->set('emp_category', $category);	
		$this->db->set('role_id', 2);	
		$this->db->set('annual_left', 0);						
		$this->db->set('casual_left', 1);		
		$this->db->where('email', $email);
		$this->db->update('users');
	}


	//admin invite a permanent employee
	public function addEmployeePermanent($user, $email, $category)
	{  
		$this->db->insert('users', $user);
		$this->db->set('emp_category', $category);	
		$this->db->set('role_id', 2);	
		$this->db->set('annual_left', 14);			
		$this->db->set('casual_left', 7);	
		$this->db->where('email', $email);
		$this->db->update('users');
	}


	//admin invite a probation employee
	public function addEmployeeProbation($user, $email, $category)
	{  
		$this->db->insert('users', $user);
		$this->db->set('emp_category', $category);	
		$this->db->set('role_id', 2);	
		$this->db->set('annual_left', 0);				
		$this->db->set('casual_left', 1);		
		$this->db->where('email', $email);
		$this->db->update('users');
	}

	//get id of new user
	public function getid($email)
	{  
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get();
		$result = $query->result();
		ChromePhp::log("id 2 : " . json_encode($result[0]));
		return $result[0];
	}
	   

	//admin apply leave
	public function adminApplyLeave($leaveType, $startDate, $endDate)
	{
		$data1 = array(
			'user_id' => $this->session->userdata('sid'),
			'user_name' => $this->session->userdata('name'),
			'leave_type' => $leaveType,
			'leave_start' => $startDate,
			'leave_end' => $endDate
		);
		$this->db->insert('leave', $data1);	
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}