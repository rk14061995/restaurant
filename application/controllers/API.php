<?php
	/**
	 * 
	 */
	class API extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel','MODEL');
		}
		public function activateRestaurant(){
			if($this->MODEL->activateThisRest($this->input->post('restaurant_id'))){
				die(json_encode(array("status"=>1)));
			}else{
				die(json_encode(array("status"=>0)));
			}	
		}
		public function deactivateRestaurant(){
			if($this->MODEL->deactivateThisRest($this->input->post('restaurant_id'))){
				die(json_encode(array("status"=>1)));
			}else{
				die(json_encode(array("status"=>0)));
			}	
		}
		public function addNewRestaurant(){
			// print_r($_POST);
			$response=$this->MODEL->addNewRestaurant($_POST);
			die(json_encode(array("status"=>$response)));
		} 
		public function addNewCategory(){
			$data=array("category_name"=>$this->input->post('cat_name'));
			die(json_encode(array("status"=>$this->MODEL->addNew($data,"tbl_category"))));
		}
		public function removeCategory(){
			die(json_encode(array("status"=>$this->MODEL->remove_Category($this->input->post('cat_id')))));
		}
		public function addSubCategory(){
			$data=array(
						"category_id"=>$this->input->post('category_id'),
						"sub_category_name"=>$this->input->post('sub_cat_name')
						);
			die(json_encode(array("status"=>$this->MODEL->addNew($data,"tbl_sub_category"))));
		}
		public function updateCategory(){
			$condition=array("category_id"=>$this->input->post('cat_id'));
			$toUpdate=array("category_name"=>$this->input->post('cat_name'));
			die(json_encode(array("status"=>$this->MODEL->update_Category($condition,$toUpdate))));
		}
		public function updateSubCategory(){
			$condition=array("sub_cat_id"=>$this->input->post('subcat_id'));
			$toUpdate=array("sub_category_name"=>$this->input->post('subcat_name'));
			die(json_encode(array("status"=>$this->MODEL->update_subCategory($condition,$toUpdate))));
		}
		public function removeSubCategory(){
			die(json_encode(array("status"=>$this->MODEL->remove_subCategory($this->input->post('subcat_id')))));
		}
		public function removeRestaurant(){
			die(json_encode(array("status"=>$this->MODEL->remove_Restaurant($this->input->post('rest_id')))));
		}
		public function getAllSubCategory(){
			die(json_encode(array("data"=>$this->MODEL->getAllSubcate($this->input->post('category_id')))));
		}
		public function getAllMenuItem(){
			die(json_encode(array("data"=>$this->MODEL->getAllMenuItem_($this->input->post('rest_id')))));
		}
		public function resLoginValidate(){
			$data=array(
							"rest_email"=>$this->input->post('rest_email'),
							"rest_pass"=>$this->input->post('rest_pass')
						);
			$res=$this->MODEL->getRestLoginValidate($data);
			if($res!=false){
				// print_r($res);
				$sessData=serialize($res);
				$this->session->set_userdata('rest_user_Data',$sessData);
			}else{
				// echo 'False';
			}
			// print_r($_SESSION['rest_user_Data']);
			redirect('Restaurant');
		}
	}

?>