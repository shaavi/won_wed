
<?php

require_once('application/debug/ChromePhp.php');

class AdminAddPostingsController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('postings_model');
    }


    public function index()
    {
        $data['categories'] = $this->postings_model->getAllCategories();
        $this->load->view('shared/adminHeader');
        $this->load->view('admin/addpostings', $data);
        $this->load->view('shared/adminFooter');
    }


    public function addPosting()
    {
        $post=array(
            'title'=>$this->input->post('title'),
            'category'=>$this->input->post('category'),
            'contact_number'=>$this->input->post('contact_number'),
            'contact_email'=>$this->input->post('contact_email'),
            'location'=>$this->input->post('location'),
            'price_from'=>$this->input->post('price_from'),
            'price_to'=>$this->input->post('price_to'),
            'content'=>$this->input->post('content'), 
            'address'=>$this->input->post('address'), 
            'website_link'=>$this->input->post('website'), 
            'cover_image'=>$this->input->post('cover_image')           
        );

        ChromePhp::log("post : " . json_encode($post));

        if($this->postings_model->addPosting($post))
        {  
            $this->session->set_flashdata('createPosting_success', 'Posting added successfully!');
            redirect('admin/allpostings');
        } 
        else 
        {
            $this->session->set_flashdata('createPosting_error', 'Something went wrong!');
            redirect($_SERVER['HTTP_REFERER']);
        } 
    }



}

