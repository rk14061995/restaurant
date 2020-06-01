<?php
	/**
	 * 
	 */
	class Home extends CI_Controller
	{
		function __construct(){
			parent::__construct();
		}
		public function index(){
			$this->load->view('website/pages/index');
		}
		public function viewMenu($rest_id){
			$data['myRestId']=$rest_id;
			// $data['myRestName']=$this->myRestName;
			$this->load->view('website/pages/rest_menu',$data);
		}
	}
?>