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
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        $from_email = "your@example.com"; 
         $to_email = "shavindip@gmail.com"; 
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Your Name'); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message('Testing the email class.'); 
   
         //Send mail 
         if($this->email->send()) {
            echo "successful";
         }
         else{
            echo "error";
         }
         

        // echo "get mail";
        // // $sender_name = $this->input->post('title');
        // // $sender_email = $this->input->post('category');
        // // $sender_msg = $this->input->post('contact_number'); 
        
        // $config['protocol'] = 'sendmail';
        // $config['mailpath'] = '/usr/sbin/sendmail';
        // $config['charset'] = 'iso-8859-1';
        // $config['wordwrap'] = TRUE;

        // $this->email->initialize($config);

        // $this->email->from('hesara@gmail.com', 'Won Wed');
        // $this->email->to('shavindip@gmail.com');

        // $this->email->subject('Email Test');
        // $this->email->message('Testing the email class.');        


        // if($this->email->send()){
        //     echo "successful";
        // }else{
        //     "error in sending";
        // }
    }


}