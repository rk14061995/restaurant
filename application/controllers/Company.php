<?php
	/**
	 * 
	 */
	class Company extends CI_Controller	{
		
		function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('logged_company')){
				redirect('CompLogin');
			}	
		}
		// public function index(){
		// 	$this->load->view('company/pages/login');
		// 	// $this->load->view('company/layout/header');
		// 	// $this->load->view('company/pages/index');
		// 	// $this->load->view('company/layout/footer');
		// }
		public function dashboard(){
						// $this->load->view('company/pages/login');
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			$data['jobsPosted']=$this->db->where('added_by_company_id',$company_id)->get('jobs_added')->result();
			$rej=array("applied_by"=>$company_id,"app_status"=>"Rejected");
			$accp=array("applied_by"=>$company_id,"app_status"=>"Accepted");

			$data['jobsApplication_rej']=$this->db->where($rej)->get('job_application')->result();
			$data['jobsApplication_acp']=$this->db->where($accp)->get('job_application')->result();
			$data['jobsApplication']=$this->db->where('applied_by',$company_id)->get('job_application')->result();
			
			$data['compData']=$this->db->where('company_id',$company_id)->get('company_')->result();
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/index',$data);
			$this->load->view('company/layout/footer');
		}
		
		public function logOut(){
			// $this->session->unset('logged_company');
			$this->session->unset_userdata('logged_company');
			redirect('CompanyLogic');
			// $this->load->view('company/layout/header');
			// $this->load->view('company/pages/company_details');
			// $this->load->view('company/layout/footer');
		}
		public function Details(){
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			$data['compData']=$this->db->where('company_id',$company_id)->get('company_')->result();
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/company_details',$data);
			$this->load->view('company/layout/footer');
		}
		public function jobDetails($id){
			$data['currency']=$this->db->get('currency_type')->result();
			$data['min_salary']=$this->db->get('min_salary')->result();
			$data['max_salary']=$this->db->get('max_salary')->result();
			$data['Categories']=$this->db->get('job_category')->result();
			$data['Type']=$this->db->get('job_type')->result();
			$data['Skills']=$this->db->get('skills_')->result();
			$data['jobDetail']=$this->db->where('jobs_added.job_id',$id)->get('jobs_added')->result();
			// die(json_encode($data['jobDetail']));
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/viewJobDetail',$data);
			$this->load->view('company/layout/footer');
		}
		public function jobApplications(){
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			$data['jobApplications']=$this->db->join('jobs_added','jobs_added.job_id=job_application.job_post_id')->join('user_','user_.user_id=job_application.applied_by')->join('user_education','user_education.user_id=user_.user_id')->where('jobs_added.added_by_company_id',$company_id)->order_by('job_application.job_application_id','desc')->get('job_application')->result();
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/job_applications',$data);
			$this->load->view('company/layout/footer');
		}
		public function postedJobs(){
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			$data['postedJobs']=$this->db->join('job_category','job_category.category_id=jobs_added.job_category')->join('job_type','job_type.type_id=jobs_added.job_type')->where('jobs_added.added_by_company_id',$company_id)->order_by('jobs_added.job_id','desc')->get('jobs_added')->result();
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/posted_jobs',$data);
			$this->load->view('company/layout/footer');
		}
		public function postJob(){
			$data['Categories']=$this->db->get('job_category')->result();
			$data['Type']=$this->db->get('job_type')->result();
			$data['Skills']=$this->db->get('skills_')->result();
			$data['currency']=$this->db->order_by('curr_id','DESC')->get('currency_type')->result();
			$data['min_salary']=$this->db->get('min_salary')->result();
			$data['max_salary']=$this->db->get('max_salary')->result();
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/postJobs',$data);
			$this->load->view('company/layout/footer');
		}
		public function resumeFilter(){

			$this->load->view('company/layout/header');
			$this->load->view('company/pages/filter');
			$this->load->view('company/layout/footer');
		}
		public function filterLogic(){
			// print_r($_POST);
    		$key=$this->input->post('key');
    		$skillName=$this->input->post('skillname');
    		switch ($skillName) {
    			case 1:$dd=$this->getUserGenderWise($key);break;
    			case 2:$dd=$this->getUserNationalityWise($key);break;
    			case 3:$dd=$this->getUserSkillWise();break;
    			case 4:$dd=$this->getUserJobWise();break;
    			case 5:$dd=$this->getUserAgeWise();break;
    			default:$dd=array();break;
    		}
    		die(json_encode(array("code"=>1,"data"=>$dd)));
		}
		public function getUserGenderWise($key){
			$result=$this->db->join('resume_upload','resume_upload.resume_id=user_.resume_id')->like('gender_', $key, 'after')->get('user_')->result();
			return $result;
		}
		public function getUserNationalityWise($key){
			$result=$this->db->join('resume_upload','resume_upload.resume_id=user_.resume_id')->like('nationality_', $key, 'after')->get('user_')->result();
			return $result;
		}
		public function getUserSkillWise(){
			return "Skill";
		}
		public function getUserJobWise(){
			return "job";
		}
		public function getUserAgeWise(){
			
		}
		public function jobSeekeers(){
			// $data['jobSeekers']=$this->db->order_by('rand()')->get('user_')->result();
			$rest=$this->db->order_by('rand()')->get('user_')->result();
			// print_r($rest);
			// die;
			$jobseeker=array();
			foreach ($rest as $key => $value) {
				// print_r($value->skill_ids);
				// echo ' || ';
				$skillArr=explode(',',$value->skill_ids);
				$skills=array();
				foreach ($skillArr as $skiId) {
					$skData=$this->getSkillDetial($skiId);
					if($skData!=""){
						$skills[]=$skData->skill_name;
					}else{
						$skills[]="";
					}
					// $skills[]=$skData->skill_name;
					// print_r($skills);
				}
				$jobseeker[]=array("jobseeker_detail"=>$value,"skills"=>$skills);
				// print_r($skills);
			}
			$data['jobSeekers']=$jobseeker;
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/jobSeekeers',$data);
			$this->load->view('company/layout/footer');
		}
		public function getSkillDetial($id){
			return $this->db->where('skill_id',$id)->get('skills_')->row();
		}
		public function jobSeekerDetail($user_id){
			$rest=$this->db->where('user_id',$user_id)->get('user_')->row();
			// print_r($rest);
			$jobseekerDeial=array();
			// foreach ($rest as $key => $value) {
				// print_r($rest->skill_ids);
				// echo ' || ';
				$skillArr=explode(',',$rest->skill_ids);
				$skills=array();
				foreach ($skillArr as $skiId) {
					$skData=$this->getSkillDetial($skiId);
					if($skData!=""){
						$skills[]=$skData->skill_name;
					}else{
						$skills[]="";
					}
					// $skills[]=$skData->skill_name;
					// print_r($skills);
				}
				$jobseekerDeial[]=array("jobseeker_detail"=>$rest,"skills"=>$skills);
				// print_r($skills);
			// }
			$data['UserDetail']=$jobseekerDeial;
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/jobSeekeerDetail',$data);
			$this->load->view('company/layout/footer');
		}
		public function jobApplicationDetails($application_id){
			$data['d']=array();
			$data['Categories']=$this->db->get('job_category')->result();
			$data['Type']=$this->db->get('job_type')->result();
			$data['Skills']=$this->db->get('skills_')->result();
			$jobApp=$this->db->join('jobs_added','jobs_added.job_id=job_application.job_post_id')->where('job_application.job_application_id',$application_id)->get('job_application')->result();
			// print_r($jobApp[0]->applied_by);
			$da=$this->getUserEducation($jobApp[0]->applied_by);
			$user=$this->db->where('user_id',$jobApp[0]->applied_by)->get('user_')->row();
			$skillArr=explode(',',$user->skill_ids);
			$skills=array();
			foreach ($skillArr as $skiId) {
				$skData=$this->getSkillDetial($skiId);
				if($skData!=""){
					$skills[]=$skData->skill_name;
				}else{
					$skills[]="";
				}
				// $skills[]=$skData->skill_name;
				// print_r($skills);
			}
			// $jobseeker[]=array("jobseeker_detail"=>$value,"skills"=>$skills);
			// print_r($skills);
			
			$data['myResume']=$this->db->join('user_','user_.resume_id=resume_upload.resume_id')->where('user_.user_id',$jobApp[0]->applied_by)->get('resume_upload')->row();
			$data['jobDetail']=array("data"=>$jobApp,'educ'=>$da,"user"=>$user,"skills"=>$skills);
			// die(json_encode($dat/a['jobDetail']));
			// $this->load->view('company/layout/header');
			// $this->load->view('company/pages/viewJobDetail',$data);
			// $this->load->view('company/layout/footer');
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/viewApplication',$data);
			$this->load->view('company/layout/footer');
		}
		public function getUserEducation($user_id){
			$ed=$this->db->where('user_id',$user_id)->order_by('passing_year','desc')->get('user_education')->result();
			$edu=array();
			foreach($ed as $ar){
				// print_r($ar);
				$edu[]=$ar;
			}
			return $edu;
		}
		public function scheduledInterivews(){
			$compData=unserialize($this->session->userdata('logged_company'));
			$company_id=$compData[0]->company_id;
			$data['interviews']=$this->db->join('job_application','job_application.job_application_id=scheduled_interiew.application_id')->join('user_','user_.user_id=job_application.applied_by')->where('scheduled_interiew.company_id',$company_id)->order_by('scheduled_interiew.sche_id','desc')->get('scheduled_interiew')->result();
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/interviews',$data);
			$this->load->view('company/layout/footer');
		}
		public function filterResumes(){
			// print_r($_POST);
			// Array ( [resume_keyword] => Php [resumCre] => on [exp_year] => 2 [exp_month] => 1 [country] => India [state] => Uttarakhand [city] => Dehra Dun )
			$resume_keyword=$this->input->post('resume_keyword');
			$resumCre=$this->input->post('resumCre');
			$exp_year=$this->input->post('exp_year');
			$exp_month=$this->input->post('exp_month');
			$country=$this->input->post('country');
			$state=$this->input->post('state');
			$city=$this->input->post('city');
			if($resume_keyword!=""){
				// echo 'Key Word is Not Null<br>';
				if($country=="" and $state=="" and $city==""){
					// echo 'State county state is Null<br>';
					if($exp_year==0 && $exp_month==0){
						// echo 'month and year is 0<br>';
						$condition="SELECT * FROM user_ join user_work_summary on user_.user_id=user_work_summary.user_id join resume_upload on resume_upload.resume_id= user_.resume_id  WHERE user_work_summary.work_title like '%".$resume_keyword."%' GROUP BY user_.user_id";
					}else{
						// echo 'Non Zero --> Month and Year<br>';
						$condition="SELECT * FROM user_ join user_work_summary on user_.user_id=user_work_summary.user_id join resume_upload on resume_upload.resume_id= user_.resume_id  WHERE user_work_summary.work_title like '%".$resume_keyword."%' and (user_work_summary.exp_year >= '$exp_year' or user_work_summary.exp_month >= '$exp_month') GROUP BY user_.user_id";
					}
					
				}else{
					// echo 'Non null state country city<br>';
					$condition="SELECT * FROM user_ join user_work_summary on user_.user_id=user_work_summary.user_id join resume_upload on resume_upload.resume_id= user_.resume_id  WHERE user_work_summary.work_title like '%".$resume_keyword."%' or (user_work_summary.exp_year >= '$exp_year' or user_work_summary.exp_month >= '$exp_month') and (user_.address_ like '%".$country."%' or user_.address_ like '%".$state."%' or user_.address_ like '%".$city."%') GROUP BY user_.user_id";
				}
				
			}else{
				// echo 'Keyword is Null<br>';
				$condition="SELECT * FROM user_ join user_work_summary on user_.user_id=user_work_summary.user_id join resume_upload on resume_upload.resume_id= user_.resume_id WHERE user_work_summary.work_title like '%".$resume_keyword."%' or user_work_summary.exp_year >= '$exp_year' or user_work_summary.exp_month >= '$exp_month' or user_.address_ like '%".$country."%' or user_.address_ like '%".$state."%' or user_.address_ like '%".$city."%' GROUP BY user_.user_id";

			}
			// echo $condition;
			$resumes=$this->db->query($condition)->result();
			// print_r($resumes);
			$resumeArray=array();
			foreach($resumes as $res){
				// print_r($res);
				$skillArr=explode(',',$res->skill_ids);
				$skills=array();
				foreach ($skillArr as $skiId) {
					$skData=$this->getSkillDetial($skiId);
					if($skData!=""){
						$skills[]=$skData->skill_name;
					}else{
						$skills[]="";
					}
				}
				$resumeArray[]=array("user_detail"=>$res,"user_skills"=>$skills,"user_work_detail"=>$this->getUserWorkExp($res->user_id));
				// $this->getSkillDetial();
			}
			// die(json_encode($resumeArray));
			// $data['resumes']=$resumes;
			$data['resumes']=$resumeArray;
			// $condition="SELECT * FROM user_ join user_work_summary on user_.user_id=user_work_summary.user_id WHERE work_title like '%php%'";

			// SELECT * FROM user_ join user_work_summary on user_.user_id=user_work_summary.user_id WHERE user_work_summary.work_title like '%php%' or user_work_summary.exp_year >= 2 or user_work_summary.exp_month >= 3

			// SELECT * FROM user_ join user_work_summary on user_.user_id=user_work_summary.user_id WHERE user_work_summary.work_title like '%php%' or user_work_summary.exp_year >= 2 or user_work_summary.exp_month >= 3 or user_.address_ like '%Deh'
			//Table to used -> user_, user_work_summary, 
			// echo $condition;
			// die;
			$this->load->view('company/layout/header');
			$this->load->view('company/pages/filteredResult',$data);
			$this->load->view('company/layout/footer');
		}
		public function getUserWorkExp($user_id){
			return $this->db->where('user_id',$user_id)->get('user_work_summary')->result();
			
		}
	}
?>