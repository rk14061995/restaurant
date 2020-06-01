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
		public function remove_Category($cat_id){
			$res=$this->db->where('category_id',$cat_id)->delete('tbl_category');
			if($res){
				if($this->db->where('category_id',$cat_id)->delete('tbl_menu_card')){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		public function getCategoryDetails($cate_id){
			return $this->db->where('category_id',$cate_id)->get('tbl_category')->result();
		}
		public function getCategorySubDetails($cate_id){
			return $this->db->join('tbl_sub_category','tbl_sub_category.category_id=tbl_category.category_id')->where('tbl_category.category_id',$cate_id)->get('tbl_category')->result();
		}
		public function update_Category($condition,$toUpdate){
			if($this->db->where($condition)->update('tbl_category',$toUpdate)){
				return 1;
			}else{
				return 0;
			}
		}
		public function update_subCategory($condition,$toUpdate){
			if($this->db->where($condition)->update('tbl_sub_category',$toUpdate)){
				return 1;
			}else{
				return 0;
			}
		}
		public function remove_subCategory($subcat_id){
			$res=$this->db->where('sub_cat_id',$subcat_id)->delete('tbl_sub_category');
			if($res){
				return 1;
			}else{
				return 0;
			}
		}
		public function remove_Restaurant($rest_id){
			$res=$this->db->where('rest_id',$rest_id)->delete('tbl_restaurant');
			if($res){
				if($this->db->where('restaurant_id',$rest_id)->delete('tbl_restaurant_details')){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 0;
			}
		}
		public function getAllSubcate($cate_id){
			return $this->db->where('category_id',$cate_id)->get('tbl_sub_category')->result();
		}
		public function addNewItem($data){
			$check=$this->db->where($data)->get('tbl_menu_card')->result();
			if(count($check)==0){
			 	// echo 'Can be added';
			 	if($this->db->insert('tbl_menu_card',$data)){
			 		return 1;
			 	}else{
			 		return 0;
			 	}
			}else{
			 	// echo 'Already Added';
			 	return 2;
			}
		}
		public function getAllMenuItem_($rest_id){
			// return
			$mainArray=array();
			$category_array=array();
			$subCategories=array();
			$category_ids=$this->db->select('category_id')->group_by('category_id')->where('rest_id',$rest_id)->get('tbl_menu_card')->result(); 
			foreach ($category_ids as $key => $value) {
				$category_array=$this->getItemOfCategory($value->category_id,$rest_id);
				$category_name=$this->getCategoryDetails($value->category_id)[0]->category_name;
				$subCategories=(array)$this->getAllSubcate($value->category_id);
				// $da[]=$this->getItemOfCategory($value->category_id,$rest_id);
				$mainArray[]=array("cate_name"=>$category_name,"sub_categories"=>$subCategories,"items"=>$category_array);
			}
			// $mainArray=array(
			// 					"categories"=>$category_array,
			// 					// "sub_categories"=>$subCategories,
			// 					"items"=>$da
			// 				);
			
			// $subcat=array();
			// $menuDetail=array();
			// $result= $this->db->where('rest_id',$rest_id)->get('tbl_menu_card')->result();
			// foreach ($result as $key => $value) {
			// 	$subCatArray=explode(',', $value->sub_cat_ids);
			// 	$itemPrice=explode(',', $value->item_prices);
			// 	foreach ($subCatArray as $subcat_) {
			// 		$resSub=$this->getSubCateDetails($subcat_);
			// 		$subcat[]=$resSub->sub_category_name;
			// 	}

			// $menuDetail[]=array("item_detail"=>$value,"sub_Cat"=>$subcat,"item_price"=>$itemPrice);
			// }
			return $mainArray; 
		}
		public function getItemOfCategory($cate_id,$rest_id){
			$subcat=array();
			$menuDetail=array();
			$condition=array(
								"rest_id"=>$rest_id,
								"category_id"=>$cate_id
							);
			$result= $this->db->where($condition)->get('tbl_menu_card')->result();
			foreach ($result as $key => $value) {
				$subCatArray=explode(',', $value->sub_cat_ids);
				$itemPrice=explode(',', $value->item_prices);
				foreach ($subCatArray as $subcat_) {
					$resSub=$this->getSubCateDetails($subcat_);
					$subcat[]=$resSub->sub_category_name;
				}

			$menuDetail[]=array("item_detail"=>$value,"sub_Cat"=>$subcat,"item_price"=>$itemPrice);
			}
			return $menuDetail;
		}
		public function getSubCateDetails($subcat_id){
			return $this->db->where('sub_cat_id',$subcat_id)->get('tbl_sub_category')->row();
		}
		public function getRestLoginValidate($data){
			$result=$this->db->where($data)->get('tbl_restaurant')->result();
			if(count($result)>0){
				return $result;
			}else{
				return false;
			}
		}
	}

?>