
<?php
require_once('application/debug/ChromePhp.php');

class AdminAllPostingsController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('postings_model');
    }


    public function index()
    {
        $data['postings'] = $this->postings_model->getAllPostings();
        $this->load->view('shared/adminHeader');
        $this->load->view('admin/allpostings', $data);
        $this->load->view('shared/adminFooter');
    }


    public function previewPosting($id)
    {
        $data['posting'] = $this->postings_model->getSinglePosting($id);
        $this->load->view('shared/adminHeader');	
        $this->load->view('admin/previewposting', $data);
        ChromePhp::log("data : " . json_encode($data));
        $this->load->view('shared/adminFooter');
    }


    public function publishPosting($id)
    {
        $result = $this->postings_model->publishPosting($id);		
		if($result){
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			echo "Comment is not published.";
		}
    }


    public function unpublishPosting($id)
    {
        $result = $this->postings_model->unpublishPosting($id);		
		if($result){
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			echo "Comment is not published.";
		}
    }
    

}

