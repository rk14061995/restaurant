<?php

class Admin_Category_model extends CI_Model
{
	public function addcategory($category,$data)
	{
		$dat=array("category_name"=>$category);
        $this->db->where($dat);
	   if(count($this->db->get('job_category')->result())==0)
	   {   		
			$results=$this->db->insert('job_category',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}
	 	}
		else
		{
			return 2;
	    }
		
		
	}
	public function getCategory()
	{
		return $this->db->get('job_category')->result();
	}
		public function addSkills($skill,$data)
	{
		$dat=array("skill_name"=>$skill);
        $this->db->where($dat);
	   if(count($this->db->get('skills_')->result())==0)
	   {   		
			$results=$this->db->insert('skills_',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}
	 	}
		else
		{
			return 2;
	    }
		
		
	}
	public function getSkills()
	{
		return $this->db->get('skills_')->result();
	}
	
} ?>