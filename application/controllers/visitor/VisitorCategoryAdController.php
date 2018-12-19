<?php

require_once('application/debug/ChromePhp.php');

class VisitorCategoryAdController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('visitor_model');
    }


    public function index($id)
    {
        $data['postings'] = $this->visitor_model->getAllCategoryPostings();
        $this->load->view('shared/adminHeader');
        $this->load->view('visitor/categoryads', $data);
        $this->load->view('shared/adminFooter');
    }



}