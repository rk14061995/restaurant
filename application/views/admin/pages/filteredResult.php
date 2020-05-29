
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Job Seekers</h1>
          <?php
            // print_r($resumes);
          ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Job Seekers</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Job Seeker Details</th>      
                      <th>Work Detials.</th>
                      <th>Skills</th>
                      <th>Resume</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Job Seeker Details</th>      
                      <th>Work Detials.</th>
                      <th>Skills</th>
                      <th>Resume</th>
                    </tr>
                  </tfoot>
                  <tbody id="userData">
                  	<?php $i=1; ?>
                  	<?php foreach($resumes as $resume): ?>  
                   		<tr>
                   			<td><?=$i?></td>
                   			<td>
                   				<p><strong>Name:</strong>  <a href="<?=base_url('Company/jobSeekerDetail/').$resume['user_detail']->user_id?>"><?=$resume['user_detail']->fullname?></a></p>
                   				<p><strong>Contact no.:</strong>  <?=$resume['user_detail']->phone_?></p>
                   				<p><strong>Email:</strong>  <?=$resume['user_detail']->email?></p>
                   				<p><strong>Address:</strong>  <?=$resume['user_detail']->address_?></p>
                   			</td>
                   			<td>
                   				<ul>
	                   				<?php foreach($resume['user_work_detail'] as $work_detail): ?>
	                   					<li>
	                   						<p><strong>Job Profile:</strong> <?=$work_detail->work_title?> <span style="font-size: 10px;" class="text-danger"><strong>Exp: </strong><?=$work_detail->exp_year.' Years '.$work_detail->exp_month.' Months'?></span></p>
	                   						<p></p>
	                   						<p><strong>Summary :</strong> <?=$work_detail->profile_summary?></p>
	                   					</li>
	                   				<?php endforeach; ?>
                   				</ul>
                   				
                   			</td>
                   			<td>
                   				<p><strong>Skills</strong> : <?=implode(',',$resume['user_skills'])?></p>
                   			</td>
                   			<td>
                   				<a href="<?=base_url('assets/user_resume/').$resume['user_detail']->resume_path?>" class="btn btn-info"  download sytle="border-radius:25px; !important	">Download</a>
                   				
                   				</td>
                   		</tr>
                   		<?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<script type="text/javascript">
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
</script>