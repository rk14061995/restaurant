<?php

class Admin_Company_Model extends CI_Model
{
	public function addCompany($data,$company)
	{
		$dat=array("company_name"=>$company);
        $this->db->where($dat);
	   if(count($this->db->get('company_')->result())==0)
	   {   		
			$results=$this->db->insert('company_',$data);
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
	public function getCompanyDetails()
	{
		$this->db->order_by('company_id','DESC');
		return $this->db->get('company_')->result();
	}
	public function getCompanyDetailById($company_id)
	{
		$this->db->where('company_id',$company_id);
		 return $this->db->get('company_')->result();

	}
	public function getCompanytdetailsById($company_id)
	{
		$this->db->where('company_id',$company_id);
		 return $this->db->get('company_')->result();

	}
	public function getCompanytype()
	{
		return $this->db->get('plan_type')->result();
	}
	// public function getCompanyTypeDetails()
	// {
	// 	return $this->db->get('company_type')->result();
	// }
	public function updateCompany($data,$company_id)
	{
		
       		 $this->db->where('company_id',$company_id);
			$results=$this->db->update('company_',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}
	 
		
	}
	public function addCompanyType($data)
	{
		 $dat=array("c_type_name"=>$data);
        $this->db->where($data);
	   if(count($this->db->get('plan_type')->result())==0)
	   {   		
			$results=$this->db->insert('plan_type',$data);
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

} ?>