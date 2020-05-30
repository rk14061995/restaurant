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
		public function deactivateThisRest($rest_id){
			if($this->db->where('restaurant_id',$rest_id)->update('tbl_restaurant_details',array('activation_status'=>2))){
				return true;
			}else{
				return false;
			}
		}
		//Common function to addSomeThing
		public function addNew($data,$table_name){
			$check=$this->db->where($data)->get($table_name)->result();
			 if(count($check)==0){
			 	// echo 'Can be added';
			 	if($this->db->insert($table_name,$data)){
			 		return 1;
			 	}else{
			 		return 0;
			 	}
			 }else{
			 	// echo 'Already Added';
			 	return 2;
			 }
		}

		public function addNewRestaurant($data){
			//First insert in tbl_restaurant
			 // `tbl_restaurant`(`rest_id`, `rest_name`, `rest_email`, `rest_pass`) 
			 $data_tbl_rest=array(
			 						"rest_name"=>$data['rest_name'],
			 						"rest_email"=>$data['rest_email'],
			 						"rest_pass"=>$data['rest_pass']
			 						);
			 // 
			 // print_r($data_tbl_rest);
			 $check=$this->db->where($data_tbl_rest)->get('tbl_restaurant')->result();
			 if(count($check)==0){
			 	// echo 'Can be added';
			 	if($this->db->insert('tbl_restaurant',$data_tbl_rest)){
			 		// return 1;
			 		$data_rest_detal=array(
			 							"restaurant_id"=>$this->db->insert_id(),
			 							"activation_status"=>2
			 						);
			 		// print_r($data_rest_detal);
			 		if($this->db->insert('tbl_restaurant_details',$data_rest_detal)){
			 			 return 1;
			 		}else{
			 			return 0;
			 		}
			 		// die;
			 		// tbl_restaurant_details

			 	}else{
			 		return 0;
			 	}
			 }else{
			 	// echo 'Already Added';
			 	return 2;
			 }
			//Then in tbl_rest_details
		}
		public function getAll($table_name){
			return $this->db->get($table_name)->result();
		}
	}

?>