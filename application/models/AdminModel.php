<?php
	/**
	 * 
	 */
	class AdminModel extends CI_Model
	{
		
		public function getAllActiveRest(){
			return $this->db->where("tbl_restaurant_details.activation_status='Accepted'")->join('tbl_restaurant_details','tbl_restaurant_details.restaurant_id=tbl_restaurant.rest_id')->order_by('tbl_restaurant.rest_id','desc')->get('tbl_restaurant')->result();
		}
		public function getAllPendingRest(){
			return $this->db->where("tbl_restaurant_details.activation_status='Pending'")->join('tbl_restaurant_details','tbl_restaurant_details.restaurant_id=tbl_restaurant.rest_id')->order_by('tbl_restaurant.rest_id','desc')->get('tbl_restaurant')->result();
		}
		public function getAllRejectedRest(){
			return $this->db->where("tbl_restaurant_details.activation_status='Rejected'")->join('tbl_restaurant_details','tbl_restaurant_details.restaurant_id=tbl_restaurant.rest_id')->order_by('tbl_restaurant.rest_id','desc')->get('tbl_restaurant')->result();
		}
		public function activateThisRest($rest_id){
			if($this->db->where('restaurant_id',$rest_id)->update('tbl_restaurant_details',array('activation_status'=>1))){
				return true;
			}else{
				return false;
			}
		}
	}

?>