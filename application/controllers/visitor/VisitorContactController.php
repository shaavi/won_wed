<?php

require_once('application/debug/ChromePhp.php');

class VisitorContactController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');  
        $this->load->library('email');      
        $this->load->model('visitor_model');
    }


    public function index()
    {
        $this->load->view('shared/adminHeader');
        $this->load->view('visitor/contactus');
        $this->load->view('shared/adminFooter');
    }


    public function getMail()
    {
        $m_email = "i like to put an ad.";
        // $m_email = $this->input->post('m_email'); 
        $m_name = $this->input->post('m_name'); 
        $m_phone = $this->input->post('m_phone'); 
        $m_message = $this->input->post('m_message');

        // $post=array(
        //     'sender_email'=> $m_email,
        //     'sender_name'=> $m_name,
        //     'phone'=> $m_phone,
        //     'message'=> $m_message, 

        // );

        // $this->visitor_model->addMessage($post);

        $config['protocol']     = 'smtp';
        $config['smtp_host']    = 'in-v3.mailjet.com';
        $config['smtp_port']    = '587';
        $config['smtp_user']    = '09bdeb8dc980c5c636cfe6ff0464dad3';
        $config['smtp_pass']    = 'c03a826de50e91c8d59743c036a2632b';
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";

        $this->email->initialize($config);

        $from_email = "your@example.com"; 
        $to_email = "shavindip@gmail.com"; 
   
        //Load email library 
        $this->load->library('email'); 
   
        $this->email->from('shavindipathirana@gmail.com', 'WonWed'); 
        $this->email->to('shavindip@gmail.com');
        $this->email->subject('New Mail From Won Wed'); 
        $this->email->message('You got a new message from Won Wed.' .$m_email); 

        //Send mail 
        if($this->email->send()) {
        echo "successful";
        }
        else{
        echo "error";
        }

    }


}