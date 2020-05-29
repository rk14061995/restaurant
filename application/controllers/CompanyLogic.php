<?php
	/**
	 * 
	 */
	class CompanyLogic extends CI_Controller
	{
		
		public function postNewJob(){
			// print_r($_POST);
			//  `jobs_added`(`job_id`, ``, ``, ``, ``, ``, ``, ``, ``, ``, `job_status`, ``, `adde_on`)
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			// $location="Dehradun";
			if(isset($_POST['skills'])){
				$skills=implode(',', $_POST['skills']);
			}else{
				$skills="";
			}
			$jobDetails=array(
								"added_by_company_id"=>$company_id,
								"job_title"=>$this->input->post('job_title'),
								"job_desc"=>$this->input->post('job_desc'),
								// "job_location_"=>$location,
								"exp"=>$this->input->post('exp'),
								"job_type"=>$this->input->post('job_type'),
								"job_category"=>$this->input->post('job_cat'),
								"skills"=>$skills,
								"min_work_exp"=>$this->input->post('minimumwork'),
								"max_work_exp"=>$this->input->post('maximumwork'),
								"currency_type"=>$this->input->post('currencytype'),
								"min_annual_sal"=>$this->input->post('minisalary'),
								"max_annaul_sal"=>$this->input->post('maxxsalary'),
								"job_location_"=>$this->input->post('joblocation'),
								"ug_qualification"=>$this->input->post('ugqualification'),
								"pg_qualification"=>$this->input->post('pgqualification'),
								"phd_qualification"=>$this->input->post('doctorate_phd'),
								"vacancies_"=>$this->input->post('vacancy'),
								"last_date"=>$this->input->post('last_Date'),
							);
			 // print_r($jobDetails);
			 // die;
			die(json_encode(array("code"=>$this->addNewJob($jobDetails))));
		}
		public function addNewJob($data){
			if(count($this->db->where($data)->get('jobs_added')->result())==0){
				if($this->db->insert('jobs_added',$data)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}
		public function updateCompDetails(){
			// print_r($_POST);
			// `company_`(`company_id`, `company_name`, `comp_phone`, `comp_desc`, `comp_address`, `website_url`, `company_email`, `company_pwd`, `company_logo`, `company_reg_no`, `reg_on`)
			
		    $data=array(
		    				"company_name"=>$this->input->post('comp_name'),
		    				"comp_phone"=>$this->input->post('comp_phone'),
		    				"comp_desc"=>$this->input->post('comp_desc'),
		    				"comp_address"=>$this->input->post('comp_address'),
		    				"website_url"=>$this->input->post('comp_website'),
		    				"company_email"=>$this->input->post('comp_email'),
		    				"company_reg_no"=>$this->input->post('comp_reg'),

		    			);
		    
		    die(json_encode(array("code"=>$this->updateDetail($data))));
		}
		public function updateDetail($data){
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			if($this->db->where('company_id',$company_id)->update('company_',$data)){
				return 1;
			}else{
				return 0;
			}
		}

		public function updateJobDetail(){
			
			$location="Dehradun";
			if(isset($_POST['skills'])){
				$skills=implode(',', $_POST['skills']);
			}else{
				$skills="";
			}
			$job_id=$this->input->post('job_id');
			$jobDetails=array(
								
								"job_title"=>$this->input->post('job_title'),
								"job_desc"=>$this->input->post('job_desc'),
								// "job_location_"=>$location,
								"exp"=>$this->input->post('exp'),
								"job_type"=>$this->input->post('job_type'),
								"job_category"=>$this->input->post('job_cat'),
								"skills"=>$skills,
								"min_work_exp"=>$this->input->post('minimumwork'),
								"max_work_exp"=>$this->input->post('maximumwork'),
								"currency_type"=>$this->input->post('currencytype'),
								"min_annual_sal"=>$this->input->post('minisalary'),
								"max_annaul_sal"=>$this->input->post('maxxsalary'),
								"job_location_"=>$this->input->post('joblocation'),
								"ug_qualification"=>$this->input->post('ugqualification'),
								"pg_qualification"=>$this->input->post('pgqualification'),
								"phd_qualification"=>$this->input->post('doctorate_phd'),
								"vacancies_"=>$this->input->post('vacancy'),
								"last_date"=>$this->input->post('last_Date'),
							);
			// print_r($jobDetails);
			die(json_encode(array("code"=>$this->updateDetail_job($jobDetails,$job_id))));
		}
		public function updateDetail_job($data,$job_id){
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			if($this->db->where('job_id',$job_id)->update('jobs_added',$data)){
				return 1;
			}else{
				return 0;
			}
		}
		public function uploadLogo(){
			// print_r($_FILES);
				// $source_img = 'source.jpg';
			$imgDe=pathinfo($_FILES['comp_logo']['name']);
			$ext=$imgDe['extension'];
			$name=date('dmYhis').'.'.$ext;
			$destination_img = 'assets/companyImages/logo/'.$name;

			$d = $this->compress($_FILES['comp_logo']['tmp_name'], $destination_img, 60);
			if($d){
				die(json_encode(array("code"=>$this->updateLogo($name))));	
			}else{
				die(json_encode(array("code"=>0)));
			}
			
		}
		public function compress($source, $destination, $quality) {

		    $info = getimagesize($source);

		    if ($info['mime'] == 'image/jpeg') 
		        $image = imagecreatefromjpeg($source);

		    elseif ($info['mime'] == 'image/gif') 
		        $image = imagecreatefromgif($source);

		    elseif ($info['mime'] == 'image/png') 
		        $image = imagecreatefrompng($source);

		    imagejpeg($image, $destination, $quality);

		    return $destination;
		}
		public function updateLogo($name){
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			if($this->db->where('company_id',$company_id)->update('company_',array("company_logo"=>$name))){
				return 1;
			}else{
				return 0;
			}
		}
		public function sendMessage(){
			// print_r($_POST);
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			$userData=$this->getUserDetails($this->input->post('recvid'));
			$data=array(
							'c_msg'=>$this->input->post('editor1'),
							'c_subject'=>$this->input->post('sndsubject'),
							'send_company'=>$company_id,
							'send_company_email'=>$compData[0]->company_email,
							'recieve_user'=>$this->input->post('recvid'),
							'receive_user_email'=>$userData->email,
						);
			$status=$this->addMessage($data);
			if($status==1){
				die(json_encode(array("code"=>1,"msg"=>"Message Sent")));
			}else if($status==2){
				die(json_encode(array("code"=>2,"msg"=>"Aready Sent")));
			}else{
				die(json_encode(array("code"=>0,"msg"=>"Failed")));
			}
				
			
		}
		public function scheduleInterview(){
			// print_r($_POST);
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			$interviewDate=date('l, d-m-Y', strtotime($this->input->post('interviewDate')));
			$interviewTime=date('h:i A', strtotime($this->input->post('interviewTime')));
			// INSERT INTO `scheduled_interiew`(`sche_id`, `job_profile`, `application_id`, ``, ``, ``) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
			$interViewDetails=array(
										"job_profile"=>$this->input->post('job_profile'),
										"company_id"=>$company_id,
										"application_id"=>$this->input->post('appid'),
										"interview_date"=>$interviewDate,
										"interview_time"=>$interviewTime
									);
			// print_r($interViewDetails);
			$response=$this->addInterview($interViewDetails);
			switch ($response) {
				case 0:die(json_encode(array('status'=>0,'data'=>'Something Went Wrong.')));break;
				case 1: 
						// $this->load->library('email');
				// 		$config['protocol'] = "smtp";
				// 		$config['smtp_host'] = "ssl://smtp.googlemail.com";
				// 		$config['smtp_port'] = "465";
				// 		$config['smtp_user'] = "pandeygreen5@gmail.com";
				// 		$config['smtp_pass'] = "qweasd@123";
				// 		$config['mailtype'] = "html";
				// 		$from_email = "pandeygreen5@gmail.com";
				// 		$to_email = "rohansingh140619955@gmail.com";
				// 		$subject_ = "Interview Details";
				// 		$message = "Hello,<br>
				// 					Your interview is scheduled on '$interviewDate' at '$interviewTime'<br>
				// 					Thank you,<br>
				// 					Regards Greenusys Technology 
				// 					";
				// 		$mail_id = $to_email;
				// 		$ci = & get_instance();
						
				// 		$ci->load->library('email', $config);
				// 		$ci->email->set_newline("\r\n");
				// 		$ci->email->from( $from_email);
				// 		$ci->email->to($mail_id);
				// 		$ci->email->subject($subject_); 
				// 		$ci->email->message($message);
				// 		$ci->email->send();
				// 		if( $ci->email->send()){ 
							die(json_encode(array('status'=>1,'data'=>'Details Sent on Mail')));
						// }
						// else{
						// 	die(json_encode(array('status'=>0,'data'=>'failed')));
						// }
						break;
				case 2:die(json_encode(array('status'=>0,'data'=>'Interview Details Already sent')));break;
				default:
					# code...
					break;
			}
		
		}
		public function getUserDetails($user_id){
			return $this->db->where('user_id',$user_id)->get('user_')->row();
		}
		public function addMessage($data){
			if(count($this->db->where($data)->get('company_msg')->result())==0)
			{
				if($this->db->insert('company_msg',$data)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}
		public function addInterview($data){
			if(count($this->db->where($data)->get('scheduled_interiew')->result())==0)
			{
				if($this->db->insert('scheduled_interiew',$data)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}

		
	}
?>