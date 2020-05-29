<?php

class Admin_Login_model extends CI_Model{

	public function admin_Login($data)
	{
	   // print_r($data);
		$this->db->where($data);
		$success=$this->db->get('admin')->result();
		
		if(count($success)>0)
	    {
            // print_r($success);
			
			return $success;
		}
		 else
	    {
	        
			return false;
		}
	}
} ?>