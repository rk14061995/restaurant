<?php
	/**
	 * 
	 */
	class Restaurant extends CI_Controller
	{
		public $myRestId=0;
		public $myRestName="";

		function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel','MODEL');
			if(!$this->session->userdata('rest_user_Data')){
				redirect('Home');
			}
			$sessData=unserialize($this->session->userdata('rest_user_Data'));
			$this->myRestId=$sessData[0]->rest_id;
			$this->myRestName=$sessData[0]->rest_name;
			// print_r($sessData);
		}
		public function index(){
			// echo 'Restaurant Dashboard';
			$data['myRestId']=$this->myRestId;
			$data['myRestName']=$this->myRestName;
			$this->load->view('restaurant_dashboard/layout/header',$data);
			$this->load->view('restaurant_dashboard/pages/index');
			$this->load->view('restaurant_dashboard/layout/footer');
		}
		public function logOut(){
			if($this->session->userdata('rest_user_Data')){
				$this->session->unset_userdata('rest_user_Data');
			}
			redirect('Home');
		}
		public function Menu(){
			$data['Categories']=$this->MODEL->getAll("tbl_category");
			$data['addRest']=$this->MODEL->getAllActiveRest();
			$data['myRestId']=$this->myRestId;
			$data['myRestName']=$this->myRestName;
			$this->load->view('restaurant_dashboard/layout/header',$data);
			$this->load->view('restaurant_dashboard/pages/createMenu');
			$this->load->view('restaurant_dashboard/layout/footer');
			
		}
		public function addMenuItem(){

			$data=array(
							"rest_id"=>$this->input->post('rest_id'),
							"category_id"=>$this->input->post('category_id'),
							"sub_cat_ids"=>implode(',', $this->input->post('subcat')),
							"item_prices"=>implode(',', $this->input->post('rate')),
							"item_name"=>$this->input->post('item_name'),
						);
			$response=$this->MODEL->addNewItem($data);
			switch ($response) {
				case 0:$this->session->set_flashdata('msg',"Falied to add item."); break;
				case 1:$this->session->set_flashdata('msg',"Item added Successfully."); break;
				case 2:$this->session->set_flashdata('msg',"Item already Exists."); break;
				default:$this->session->set_flashdata('msg',"Something went wrong"); break;
					
			}
			redirect('Restaurant/Menu');

		}
		public function Setting(){
			$data['Categories']=$this->MODEL->getAll("tbl_category");
			$data['addRest']=$this->MODEL->getAllActiveRest();
			$data['myRestId']=$this->myRestId;
			$data['myRestName']=$this->myRestName;
			$this->load->view('restaurant_dashboard/layout/header',$data);
			$this->load->view('restaurant_dashboard/pages/createMenu');
			$this->load->view('restaurant_dashboard/layout/footer');
			
		}
	}
?>