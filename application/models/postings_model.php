<?php
require_once('application/debug/ChromePhp.php');
class postings_model extends CI_Model
{	
    
	function addPosting($post)
	{		
		$result = $this->db->insert('postings', $post); 
        return $result;
	}


    function editPosting($post, $id)
	{		
		$this->db->where('id', $id);
		$result = $this->db->update('postings', $post);
		return $result;  
	}

     
    function publishPosting($id)
	{		
		$this->db->set('status', '1');
        $this->db->where('id', $id);
        $result = $this->db->update('postings');
        return $result;  
    }
    

    function unpublishPosting($id)
	{		
		$this->db->set('status', '0');
        $this->db->where('id', $id);
        $result = $this->db->update('postings');
        return $result;  
    }
    

    function getSinglePosting($id)
	{
		$this->db->select('*');
		$this->db->from('postings');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
    }

    function getAllPostings()
	{		
		$query = $this->db->get('postings');
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


	//employee apply leave
	public function applyLeave($leaveType, $startDate, $endDate)
	{
		$leave_start = DateTime::createFromFormat('Y-m-d', $startDate);
		$leave_end = DateTime::createFromFormat('Y-m-d', $endDate);
		$diffDays = 1 + $leave_end->diff($leave_start)->format("%a");

		$data1 = array(
			'user_id' => $this->session->userdata('sid'),
			'user_name' => $this->session->userdata('name'),
			'leave_type' => $leaveType,
		    'leave_start' => $startDate,
		    'leave_end' => $endDate
		);

		$this->db->set('leave_days', (int)$diffDays);
		$this->db->set('status', 'Pending');
		$this->db->insert('leave', $data1);	
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	//show upcoming leave
	public function showLeave()
	{
		$query = $this->db->get("leave");
		$query2 = $this->db->get("users");
		return $query->result();
		return $query2->result();
	}


	//employee register
	public function empRegister($userDataArray, $empId)
	{  		
		$this->db->set('login_status', 'active');
		$this->db->where('id', $empId);
		$result = $this->db->update('users', $userDataArray);
		return $result;
	}


	//get all employee records
	function showData()
	{
		$query = $this->db->get('users');
		$query_result = $query->result();
		return $query_result;
	}


	//get specific employee record
	function showDataid($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}


	//employee edits data
	public function editUser($user, $id)
	{  	
		$this->db->where('id', $id);
		$result = $this->db->update('users',$user);
		return $result;    
	}


	//employee edits data
	public function viewEmployeeHistory($id)
	{  	
		$this->db->where('id', $id);
		$this->db->update('users',$user);
		return $this->db->affected_rows();    
	}


	//check if the username already exists when editing
	public function checkUsername($username)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query=$this->db->get();
	   
		if($query->num_rows()>0){
		  return false;
		}else{
		  return true;
		}
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


	//view details of leave
	public function viewRequest($leave_id) 
	{
		$this->db->where("id", $leave_id);
		$query=$this->db->get('leave');
		return $query->result();		
   	}
}