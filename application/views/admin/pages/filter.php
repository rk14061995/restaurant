<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>

 <div class="container-fluid">
 	<div class="card shadow mb-4">
	    <div class="card-body">
	      	<form class="" action="<?=base_url('Company/filterResumes')?>" method="post">
		 		
	      		<div class="form-group row text-center">
		 			<!-- <div class="col-md-3">
		 				 <strong>Candidate's Current Location:</strong>
		 			</div> -->
		 			<div class="col-md-6 offset-md-3">
		 				<div class="row">
		 					<div class="col">
		 						<label class="text-dark font-weight-bold" style="font-size: 2em">Job Title</label>
		 					</div>
		 				</div>
		 				
		 				<div class="row">
		 					<div class="col">
		 						<input type="text" class="form-control" name="resume_keyword">
		 					</div>	
		 				</div>
		 				<div class="row">
		 					<div class="col">
				 				<strong>Search In:</strong>
				 			</div>
		 					<div class="col">
				 				<input type="radio" name="resumCre" checked> Resume Title
				 			</div>
				 			<div class="col">
				 				<input type="radio" name="resumCre"> Resume Skills
				 			</div>
				 			<div class="col">
				 				<input type="radio" name="resumCre" > Entire Resume
				 			</div>
		 						
		 				</div>
		 				<!-- <select class="form-control">
		 					<option>- Select Locations -</option>
		 				</select>  -->
		 			</div>
		 			
		 		</div>
		 		<!-- <div class="form-group">
		 			<label><strong>Basic Details</strong></label>
		 			<hr>
		 		</div> -->
		 		<!-- <div class="form-group row">

		 			<div class="col-md-2 offset-md-2">
		 				<strong><label>Job Title</label></strong>	
		 			</div>
		 			<div class="col-md-6">
		 				<div class="row">
		 					<div class="col">
		 						<input type="text" class="form-control" name="resume_keyword">
		 					</div>	
		 				</div>
		 				<div class="row">
		 					<div class="col">
				 				<strong>Search In:</strong>
				 			</div>
		 					<div class="col">
				 				<input type="radio" name="resumCre" checked> Resume Title
				 			</div>
				 			<div class="col">
				 				<input type="radio" name="resumCre"> Resume Skills
				 			</div>
				 			<div class="col">
				 				<input type="radio" name="resumCre" > Entire Resume
				 			</div>
		 						
		 				</div>
		 				
		 			</div>
		 		</div> -->
		 		<hr>
		 		<!-- <div class="form-group row">
		 			<div class="col-md-3">
		 				 <strong>Search In:</strong>
		 			</div>
		 			<div class="col">
		 				<input type="radio" name="resumCre"> Resume Title
		 			</div>
		 			<div class="col">
		 				<input type="radio" name="resumCre"> Resume Skills
		 			</div>
		 			<div class="col">
		 				<input type="radio" name="resumCre"> Entire Resume
		 			</div>
		 		</div> -->
		 		<div class="form-group row">
		 			<div class="col-md-3">
		 				 <strong>Total Experience:</strong>
		 			</div>
		 			<div class="col">
		 				<input type="number" name="exp_year" value="0" class="form-control text-center"> 
		 			</div>
		 			<div class="col-md-1 text-center">
		 				<i>to</i>
		 			</div>
		 			<div class="col">
		 				<input type="number" name="exp_month" value="0" class="form-control text-center"> 
		 			</div>
		 			<div class="col">
		 				(in years)
		 			</div>
		 		</div>
		 		<!-- <div class="form-group row">
		 			<div class="col-md-3">
		 				 <strong>Annual Salary:</strong>
		 			</div>
		 			<div class="col">
		 				<select class="form-control">
		 					<option>- Lacs -</option>
		 				</select> 
		 			</div>
		 			<div class="col">
		 				<select class="form-control">
		 					<option>- Thousands -</option>
		 				</select> 
		 			</div>
		 			<div class="col-md-1">
		 				to
		 			</div>
		 			<div class="col">
		 				<select class="form-control">
		 					<option>- Lacs -</option>
		 				</select> 
		 			</div>
		 			<div class="col">
		 				<select class="form-control">
		 					<option>- Thousands -</option>
		 				</select> 
		 			</div>
		 		</div> -->
		 		<div class="form-group row text-center">
		 			<!-- <div class="col-md-3">
		 				 <strong>Candidate's Current Location:</strong>
		 			</div> -->
		 			<div class="col">
		 				<div class="row">
		 					<div class="col">
		 						<label class="text-dark font-weight-bold" style="font-size: 2em">Where</label>
		 					</div>
		 				</div>
		 				<div class="row">
		 					<div class="col">
		 						<label>Country, State or City</label>
		 					</div>
		 				</div>
		 				<div class="row">
		 					<div class="col">
		 						<select name="country" class="countries form-control text-center" id="countryId">
								    <option value="">- Select Country -</option>
								</select>
		 					</div>
		 					<div class="col">
		 						<select name="state" class="states form-control text-center" id="stateId">
								    <option value="">- Select State -</option>
								</select>
		 					</div>
		 					<div class="col">
		 						<select name="city" class="cities form-control text-center" id="cityId">
								    <option value="">- Select City -</option>
								</select>
		 					</div>
		 					
							
							
		 				</div>
		 				<!-- <select class="form-control">
		 					<option>- Select Locations -</option>
		 				</select>  -->
		 			</div>
		 			
		 		</div>
		 		<hr>
		 		
		 		<div class="form-group row">
		 			<div class="col-md-4 offset-md-4 text-center">
		 				<input type="submit" name="" class="btn btn-info" value="FIND RESUME">
		 			</div>
		 		</div>
		 		
			</form>
	    </div>
	</div>
</div>



<!--  <div class="container-fluid">
 	<div class="card shadow mb-4">
	    
	    <div class="card-body">
	      	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-5 my-2 my-md-0 mw-100 navbar-search">
		 	
			    <div class="input-group">

			      <input type="text" name="key" id="key" class="form-control bg-default border-1 small" placeholder="Search for Resume" aria-label="Search" aria-describedby="basic-addon2">
			      <select class="form-control" name="skillName" id="skillName">
			      	<option value="0">Select</option>
			      	<option value="1">Gender</option>
			      	<option value="2">Nationality</option>
			      	<option value="3">Skill</option>
			      	<option value="4">Job Wise</option>
			      	<option value="5">Age Wise</option>
			      </select>
			      <div class="input-group-append">
			        <button class="btn btn-primary serResume" type="button">
			          <i class="fas fa-search fa-sm"></i>
			        </button>
			      </div>
			    </div>
			</form>
	    </div>
	</div>
 </div>
 -->
 

 <br>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('.serResume').click(function(){
			// console.log("Button Pressed");
			var base_url="<?=base_url('assets/user_resume/')?>";
			var key=$('#key').val();
			var skillname=$('#skillName').val();
			var formData={
							key:key,
							skillname:skillname
						};
			$.ajax({
		        url:"<?=base_url('Company/filterLogic')?>",
		        type:"post",
		        
		        data:formData,
		        success:function(response){
		          // console.log(response);
		          response=JSON.parse(response);
		          if(response.code==1){
		          	$('#userData').empty();
		          	for(let i=0; i<response.data.length; i++){
		          		var data_='';
		          		data_+='<tr>';
		          		data_+='<td>'+(i+1)+'</td>';
		          		data_+='<td>'+response.data[i].fullname+'</td>';
		          		data_+='<td>'+response.data[i].email+'</td>';
		          		data_+='<td>'+response.data[i].phone_+'</td>';
		          		data_+='<td><a href="'+base_url+response.data[i].resume_path+'" download>Download</a></td>';
		          		data_+='</tr>';
		          	}
		          }
		          $('#userData').append(data_);
		          // if(response.code==1){
		          //   swal("Great..","Education Added Successfully.","success");
		          // }else{
		          //   swal("Ooops..","Failed To Add","warning");
		          // }
		          // setInterval(function(){
		          //   location.reload();
		          // },1000)
		        }
		      });
		});
	});
</script> -->