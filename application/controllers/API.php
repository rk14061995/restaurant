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
	}

?>