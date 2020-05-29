<?php

class Admin_Job_Model extends CI_Model
{
	public function getJobCompany()
	{
		return $this->db->get('company_')->result();
	}
	public function getJobCategory()
	{
		return $this->db->get('job_category')->result();
	}
	public function getJobtype()
	{
		return $this->db->get('job_type')->result();
	}
	public function getjobseekr()
	{
		return $this->db->get('user_')->result();
	}
	public function getSeekrApps()
	{
		$this->db->select('*');
		$this->db->from('job_application');
		$this->db->join('jobs_added','jobs_added.job_id=job_application.job_post_id');
		$this->db->join('user_','user_.user_id=job_application.applied_by');
		$this->db->join('company_','company_.company_id=jobs_added.added_by_company_id');
		return $this->db->get()->result();
	}
	
	public function addJob($data)
	{
		// $dat=array("category_name"=>$category);
        $this->db->where($data);
	   // if(count($this->db->get('job_category')->result())==0)
	   // {   		
			$results=$this->db->insert('jobs_added',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}
	 // 	}
		// else
		// {
		// 	return 2;
	 //    }
		
		
	}
	public function getJobDetails()
	{
		$this->db->select('*');
		$this->db->from('jobs_added');
		$this->db->join('company_','company_.company_id=jobs_added.added_by_company_id');
		$this->db->join('job_category','job_category.category_id=jobs_added.job_category');
		$this->db->join('job_type','job_type.type_id=jobs_added.job_type');
		return $this->db->get()->result();
	}
	public function addJobType($data)
	{
		 $dat=array("type_name"=>$data);
        $this->db->where($data);
	   if(count($this->db->get('job_type')->result())==0)
	   {   		
			$results=$this->db->insert('job_type',$data);
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
	public function addJobPosted($data)
	{
   		 $this->db->where($data);
		$results=$this->db->insert('job_application',$data);
		if($results)
		{
			return 1;
		}
		else
		{
			return 0;
		}	
	}
	public function addResumeOnSelect($data)
	{
   		$this->db->where($data);
		$results=$this->db->insert('resume_upload',$data);
		if($results)
		{
			// print_r($data);
			$userDetail=$this->session->userdata('logged_user_emp');
			$userDetails=unserialize($userDetail);
			$user_id=$userDetails[0]->user_id;
			$res=$this->db->order_by('resume_id','desc')->limit(1)->get('resume_upload')->row();
			// print_r($res->resume_id);
			$this->db->where('user_id',$user_id);
			$results=$this->db->update('user_',array('resume_id'=>$res->resume_id));
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}
			// return 1;
		}
		else
		{
			return 0;
		}	
	}
	public function getSeekerdetailsbyid($user_id)
	{
		$this->db->where('user_id',$user_id);
		 return $this->db->get('user_')->result();

	}
	public function updateJobSeekers($data,$user_id)
	{
		
       		 $this->db->where('user_id',$user_id);
			$results=$this->db->update('user_',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}
	 
		
	}
	public function getJobdetailsbyid($job_id)
	{
		$this->db->where('job_id',$job_id);
		 return $this->db->get('jobs_added')->result();

	}

public function updateJob($data, $job_id)
	{
		
       		 $this->db->where('job_id',$job_id);
			$results=$this->db->update('jobs_added',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}
	 
		
	}
	public function addCurrencyType($data)
	{
		 $dat=array("currency_name"=>$data);
        $this->db->where($data);
	   if(count($this->db->get('currency_type')->result())==0)
	   {   		
			$results=$this->db->insert('currency_type',$data);
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
	public function addMinSalary($data)
	{
		 $dat=array("min_salary"=>$data);
        $this->db->where($data);
	   if(count($this->db->get('min_salary')->result())==0)
	   {   		
			$results=$this->db->insert('min_salary',$data);
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
	public function addMaxSalary($data)
	{
		 $dat=array("max_sal"=>$data);
        $this->db->where($data);
	   if(count($this->db->get('max_salary')->result())==0)
	   {   		
			$results=$this->db->insert('max_salary',$data);
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
}