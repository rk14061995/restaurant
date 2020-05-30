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
	}

?>