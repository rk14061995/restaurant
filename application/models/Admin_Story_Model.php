<?php

class Admin_Story_Model extends CI_Model
{
	public function addStory($story,$data)
	{
		$dat=array("story"=>$story);
        $this->db->where($dat);
	   if(count($this->db->get('success_story')->result())==0)
	   {   		
			$results=$this->db->insert('success_story',$data);
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
	public function getSuccessStory()
	{
		return $this->db->get('success_story')->result();
	}
		
	
} ?>