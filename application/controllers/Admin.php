<?php
	/**
	 * 
	 */
	class Admin extends CI_Controller
	{
		function __construct(){
			parent::__construct();
		}
		public function index(){

			$this->load->view('admin/pages/login');
		}
		public function dashboard(){
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/index');
			$this->load->view('admin/layout/footer');
		}
		public function addRestaurant(){
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/new_restaurant');
			$this->load->view('admin/layout/footer');
		}
		public function allRestaurant(){
			
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/all_restaurant');
			$this->load->view('admin/layout/footer');
		}
		public function Category(){
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/category');
			$this->load->view('admin/layout/footer');
		}
		public function pendingRestaurant(){
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/pending_restaurant');
			$this->load->view('admin/layout/footer');
		}
		public function rejectedRestaurant(){
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/rejected_restaurant');
			$this->load->view('admin/layout/footer');
		}
		
	}
?>