<?php

require_once('application/debug/ChromePhp.php');

class VisitorLandingController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('visitor_model');
    }


    public function index()
    {
        $this->load->view('shared/adminHeader');
        $this->load->view('visitor/landingpage');
        $this->load->view('shared/adminFooter');
    }


    public function addPosting()
    {
        
    }

}

