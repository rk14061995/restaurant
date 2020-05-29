<?php
	/**
	 * 
	 */
	class CompLogin extends CI_Controller
	{
		
		public function index(){
			$this->load->view('company/pages/login');
			// $this->load->view('company/layout/header');
			// $this->load->view('company/pages/index');
			// $this->load->view('company/layout/footer');
		}
		public function register(){
			$this->load->view('company/pages/register');
		}
		public function forgotPassword(){
			$this->load->view('company/pages/forgot-password');
		}
		public function registerCompany(){
		    $regData=array(
		    					"company_name"=>$this->input->post('comp_name'),
		    					"company_email"=>$this->input->post('comp_email'),
		    					"comp_phone"=>$this->input->post('comp_phone'),
		    					"company_pwd"=>$this->input->post('comp_pass'),
		    				);
		    die(json_encode(array("code"=>$this->addNewCompany($regData))));
		    
		}
		public function addNewCompany($data){

			if(count($this->db->where('company_email',$data['company_email'])->get('company_')->result())==0){
				if($this->db->insert('company_',$data)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}
		public function loginValidate(){
		
			$dat=array(
						"company_email"=>$this->input->post('comp_email'),
							"company_pwd"=>$this->input->post('comp_pass'),
						);
			if(count($compData=$this->db->where($dat)->get('company_')->result())>0){
				$compData=serialize($compData);
				$this->session->set_userdata('logged_company',$compData);
				redirect('Company/dashboard');
			}else{
				$this->session->set_flashdata('msg','Invalid Email/Password');
				redirect('CompLogin');
			}
		}
		
	}
?>