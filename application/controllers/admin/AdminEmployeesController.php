
<?php

require_once('application/debug/ChromePhp.php');

class AdminEmployeesController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Admin_Model');
    }


    //load admin employee page
    public function index()
    {
        $data1["users"] = $this->Admin_Model->showEmpDetails();
        $this->load->helper('form');
        $this->load->view('admin/adminEmployees', $data1);
    }


    //send email to employees
    public function sendMail() 
    {  
        $user=array(
            'email'=>$this->input->post('inputEmail'),
            'designation'=>$this->input->post('inputDesignation'),
            'username'=>$this->input->post('inputUsername'),          
            );
        $email = $this->input->post('inputEmail');
        $category=$this->input->post('inputCategory');
            
        $email_check=$this->Admin_Model->checkEmail($user['email']);       
       
        // admin sending email with link to register
        if($email_check)
        {
            ChromePhp::log("cat : " . json_encode($category));  
            if($category=='intern'){
                $this->Admin_Model->addEmployeeIntern($user, $email, $category);
            }
            if($category=='permanent'){
                $this->Admin_Model->addEmployeePermanent($user, $email, $category);
            }
            if($category=='probation'){
                $this->Admin_Model->addEmployeeProbation($user, $email, $category);
            }
            // $this->Admin_Model->addEmployee($user, $email);                 
            $this->load->library('email'); 
            $config = array(
                    'protocol' => 'smtp', 
                    'smtp_host' => 'mail.smtp2go.com', 
                    'smtp_port' => 2525, 
                    'smtp_user' => 'shavindip@gmail.com', 
                    'smtp_pass' => 'IRTutIRuBg46', 
                    'mailtype' => 'html', 
                    'charset' => 'iso-8859-1'
                );
            $this->email->initialize($config);

            $from_email = $this->session->userdata('email');
            $to_email = $this->input->post('inputEmail');
            $id = $this->Admin_Model->getid($email);                
            $nid = $id->id;              

            $this->email->set_mailtype('html');
            $this->email->from($from_email, 'Extrogene Software'); 
            $this->email->to($to_email);
            $this->email->subject('Access to EMS'); 
            $message = '<p> Hello, </p><br>';
            $message = '<p> please click <a href="http://localhost/employee_mngt/index.php/employee/employeeregistercontroller/index/'. $nid .'">Click Here</a></p>';
            $this->email->message($message);   

            ChromePhp::log("message : " . json_encode($message));      

            if ($this->email->send()) {
                $this->session->set_flashdata("email_sent","Email sent successfully.");  
                redirect('admin/adminemployeescontroller/index');
            }
            else {
                $this->session->set_flashdata("email_sent","Error in sending Email.");
            }
                
        redirect('admin/adminemployeescontroller/index');        
        }
        else
        {       
        $this->session->set_flashdata('success_msg', 'Employee is already a member. Try new employee.');
        redirect('admin/adminemployeescontroller/index');
        }
    } 

}

