<?php

require_once('application/debug/ChromePhp.php');

class VisitorGetPostingController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('visitor_model');
    }


    public function index()
    {
        $data['posting'] = $this->visitor_model->getSinglePosting();
        $this->load->view('shared/adminHeader');
        $this->load->view('visitor/getposting', $data);
        $this->load->view('shared/adminFooter');
    }


    public function addPosting()
    {
        
    }



}

