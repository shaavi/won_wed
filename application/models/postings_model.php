<?php
require_once('application/debug/ChromePhp.php');
class postings_model extends CI_Model
{	
    
	function addPosting($post)
	{		
		$result = $this->db->insert('postings', $post); 
        return $result;
	}


	function getAllCategories()
	{		
		$query = $this->db->get('categories');
        return $query->result();
	}


    function editPosting($post, $id)
	{		
		$this->db->where('id', $id);
		$result = $this->db->update('postings', $post);
		return $result;  
	}

     
    function publishPosting($id)
	{		
		$this->db->set('status', '1');
        $this->db->where('id', $id);
        $result = $this->db->update('postings');
        return $result;  
    }
    

    function unpublishPosting($id)
	{		
		$this->db->set('status', '0');
        $this->db->where('id', $id);
        $result = $this->db->update('postings');
        return $result;  
    }
    

    function getSinglePosting($id)
	{
		$this->db->select('*');
		$this->db->from('postings');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
    }


    function getAllPostings()
	{		
		$query = $this->db->get('postings');
        return $query->result();
	}

}