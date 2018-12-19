
<?php

require_once('application/debug/ChromePhp.php');

class AdminEditPostingsController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Admin_Model');
    }


    public function index()
    {
        $this->load->view('admin/editpostings');
    }


    public function editPosting($id)
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
            'cover_image'=>$this->input->post('cover_image')           
        );

        if($this->postings_model->editPosting($post, $id))
        {  
            $this->session->set_flashdata('updatePosting_success', 'Posting updated successfully!');
            redirect('admin/allpostings');
        } 
        else 
        {
            $this->session->set_flashdata('updatePosting_error', 'Something went wrong!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }



}

