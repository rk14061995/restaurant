
  <div class="container">
    <?php
      $compData=unserialize($this->session->userdata('logged_company'));
      // print_r($jobDetail);
      $educ=array();
      foreach ($jobDetail['educ'] as $edu) {
        $educ[]=$edu->degree.'|'.$edu->course_;
      }
      $educ=implode(', ',$educ);
      // print_r($jobDetail['skills']);
      $skills=implode(', ',$jobDetail['skills']);
      $resumePath=$myResume->resume_path;
    ?>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Application Detail</h1>
                <hr>
              </div>
              <form class="user" id="postNewJob">
                <div class="form-group row">
                  <div class="col-md-3 text-left">
                    <p><strong>Applicant Name </strong> :</p>
                  </div>
                  <div class="col-md-9">
                    <p><?=$jobDetail['user']->fullname?></p>
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-md-3 text-left">
                    <p><strong>Applicant Address </strong> :</p>
                  </div>
                  <div class="col-md-9">
                    <p><?=$jobDetail['user']->address_?></p>
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-md-3 text-left">
                    <p><strong>Education Detail</strong> :</p>
                  </div>
                  <div class="col-md-9">
                    <p><?=$educ?></p>
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-md-3 text-left">
                    <p><strong>Skills</strong> :</p>
                  </div>
                  <div class="col-md-9">
                    <p><?=$skills?></p>
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-md-3 text-left">
                    <p><strong>Applied For</strong> :</p>
                  </div>
                  <div class="col-md-9">
                    <p><?=$jobDetail['data'][0]->job_title?></p>
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-md-3 text-left">
                    <p><strong>Job Location</strong> :</p>
                  </div>
                  <div class="col-md-9">
                    <p><?=$jobDetail['data'][0]->job_location_?></p>
                  </div>
                  
                </div>
                
                
                <div class="form-group row">
              
                  <div class="col">
                    <a href="javascript:void(0)" class="btn btn-primary btn-user btn-block text-white send-msg" d-id="<?=$jobDetail['user']->user_id?>" d-name="<?=$jobDetail['user']->fullname?>">Send Message</a>
                  </div>
                  <div class="col">
                    <a href="javascript:void(0)" class="btn btn-success btn-user btn-block text-white schd-int" d-id="<?=$jobDetail['user']->user_id?>" d-name="<?=$jobDetail['user']->fullname?>">Schdule Interview</a>
                   
                  </div>
                  <div class="col">
                    <a href="<?=base_url('assets/user_resume/').$resumePath?>" class="btn btn-warning btn-user btn-block text-white" >Download Resume</a>
                   
                  </div>
                </div>
                
       
              
              </form>
              <hr>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- The Modal -->
<div class="modal" id="sendMessage">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Send Message</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="send_">
      <!-- Modal body -->
      <div class="modal-body">
        
          <div class="row">
            <div class="col-md-4">
              <label>Job Seeker :</label>
            </div>
            <div class="col-md-8">
              <input type="hidden" name="recvid" id="recvid" value="Rahul Kuamar" class="form-control" readonly>
              <input type="text" name="recvname" id="recvname" value="Rahul Kuamar" class="form-control" readonly>
            </div>
          </div>
          
         
          <br>
          <div class="row">
            <div class="col-md-4">
              <label>Subject :</label>
            </div>
            <div class="col-md-8">
              
              <input type="text" name="sndsubject" id="sndsubject" value="test Subject" class="form-control" >
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <label>Write Some Message :</label>
            </div>
          </div>
          <div class="row">
            
            <div class="col-md-12">
             
              <textarea class="form-control" name="editor1" id="msgEditor"></textarea>
              <script>
                      CKEDITOR.replace( 'editor1' );
              </script>
            </div>
          </div>
       
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" class="btn btn-success btn-user btn-block text-white"  value="SEND">
       
      </div>
       </form>
    </div>
  </div>
</div>
<div class="modal" id="scheduleInterview">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Schedule interview</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="sch_Interview">
      <!-- Modal body -->
      <div class="modal-body">
        
          <div class="row">
            <div class="col-md-4">
              <label>Interview Date :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="job_profile" id="job_profile"  class="form-control" >
              <input type="text" name="appid" id="appid"  class="form-control" >
              <input type="date" name="interviewDate" id="interviewDate"  class="form-control" >
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
              <label>Interview Time :</label>
            </div>
            <div class="col-md-8">
              <input type="time" name="interviewTime" id="interviewTime"  class="form-control" >
            </div>
          </div>

        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" value="Schedule Interview" class="btn btn-success btn-user btn-block text-white">
        
      </div>
      </form>
    </div>
  </div>
</div>
  <script type="text/javascript">

  $(document).ready(function(){
    $('.send-msg').on('click',function(){
      var recId=$(this).attr('d-id');
      var recName=$(this).attr('d-name');
      $('#recvid').val(recId);
      $('#recvname').val(recName);
      $('#sendMessage').modal('show');
    });
    
    $('.schd-int').on('click',function(){
      var recId=$(this).attr('d-id');
      var recName=$(this).attr('d-name');
      var appid="<?=$jobDetail['data'][0]->job_application_id?>";
      var jobprofile="<?=$jobDetail['data'][0]->job_title?>";
      $('#appid').val(appid);
      $('#job_profile').val(jobprofile);
      $('#scheduleInterview').modal('show');
    });
    $('#postNewJob').on('submit',function(e){
      e.preventDefault();
      var formData=new FormData($(this)[0]);
      console.log("Working Fine");
      $.ajax({
        url:"<?=base_url('CompanyLogic/updateJobDetail')?>",
        type:"post",
        cache:false,
        contentType:false,
        processData:false,
        data:formData,
        success:function(response){
          // console.log(response);
          response=JSON.parse(response);
          if(response.code==1){
            swal("Great..","Updated Successfully.","success");
          }else{
            swal("Ooops..","Something went wrong","error");
          }
          location.reload();
        }
      });
    });
    $('#sch_Interview').on('submit',function(e){
      e.preventDefault();
      var formData=new FormData($(this)[0]);
      console.log("Working Fine");
      $.ajax({
        url:"<?=base_url('CompanyLogic/scheduleInterview')?>",
        type:"post",
        cache:false,
        contentType:false,
        processData:false,
        data:formData,
        success:function(response){
          // console.log(response);
          response=JSON.parse(response);
          if(response.status==1){
            swal("Great..",response.data,"success");
          }else{
            swal("Ooops..","Something went wrong","error");
          }
          $('#sch_Interview')[0].reset();
          // location.reload();
        }
      });
    });
    $('#send_').on('submit',function(e){
      e.preventDefault();
      if($('#msgEditor').val()!=""){
        var formData=new FormData($(this)[0]);
        console.log("Working Fine");
        $.ajax({
          url:"<?=base_url('CompanyLogic/sendMessage')?>",
          type:"post",
          cache:false,
          contentType:false,
          processData:false,
          data:formData,
          success:function(response){
            // console.log(response);
            response=JSON.parse(response);
            if(response.code==1){
              swal("Great..","Message Sent Successfully.","success");
            }else{
              swal("Ooops..","Something went wrong","error");
            }
            $('#send_')[0].reset();
            // location.reload();
          }
        });
      }else{
        alert("Message Cannot Be Empty");
      }
      
    });
  });
</script>
  