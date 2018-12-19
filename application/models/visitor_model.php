<?php
require_once('application/debug/ChromePhp.php');
class visitor_model extends CI_Model
{	

    function getAllCategoryPostings()
	{	
        $query = $this->db->query("SELECT `postings`.*, `categories`.* FROM `postings` JOIN `categories` ON `categories`.`c_id` = `postings`.`category` WHERE `categories`.`c_id` = 1 AND `postings`.`status` = 1 ORDER BY `postings`.`id` DESC");
        return $query->result();
    }
    
    function getSinglePosting()
	{	
        $query = $this->db->query("SELECT `postings`.*, `categories`.* FROM `postings` JOIN `categories` ON `categories`.`c_id` = `postings`.`category` WHERE `postings`.`id` = 3 ORDER BY `postings`.`id` DESC");
        return $query->result();
	}

}