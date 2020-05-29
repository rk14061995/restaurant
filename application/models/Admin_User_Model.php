<?php

class Admin_User_Model extends CI_Model
{

	public function AddUserMessage($data)
	{
		  		
			$results=$this->db->insert('user_msg',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}	
	}
	public function AddCompanyMessage($data)
	{
		  		
			$results=$this->db->insert('company_msg',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}	
	}
	public function getUserDetails()
	{
		return $this->db->get('user_')->result();
	}
		
	
} ?>