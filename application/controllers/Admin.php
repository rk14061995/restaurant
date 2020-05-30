<?php
	/**
	 * 
	 */
	class Admin extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('AdminModel','MODEL');
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
			$data['addRest']=$this->MODEL->getAllActiveRest();
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/all_restaurant',$data);
			$this->load->view('admin/layout/footer');
		}
		public function Category(){
			$data['Categories']=$this->MODEL->getAll("tbl_category");
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/category',$data);
			$this->load->view('admin/layout/footer');
		}
		public function pendingRestaurant(){
			$data['penRest']=$this->MODEL->getAllPendingRest();
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/pending_restaurant',$data);
			$this->load->view('admin/layout/footer');
		}
		public function rejectedRestaurant(){
			$data['rejRest']=$this->MODEL->getAllRejectedRest();
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/rejected_restaurant',$data);
			$this->load->view('admin/layout/footer');
		}
		public function categoryDetails($cate_id){
			$data['CategoryDetails']=$this->MODEL->getCategoryDetails($cate_id);
			$data['subCategoryDetails']=$this->MODEL->getCategorySubDetails($cate_id);
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/categoryDetails',$data);
			$this->load->view('admin/layout/footer');
		}
		public function Menu(){
			$data['Categories']=$this->MODEL->getAll("tbl_category");
			$data['addRest']=$this->MODEL->getAllActiveRest();
			$this->load->view('admin/layout/header');
			$this->load->view('admin/pages/createMenu',$data);
			$this->load->view('admin/layout/footer');
		}

		
	}
?>