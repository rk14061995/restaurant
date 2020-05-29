
  <div class="container">
    <?php
      $compData=unserialize($this->session->userdata('logged_company'));
      // print_r($jobDetail);
    ?>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Post New Job</h1>
                <hr>
              </div>
              <form class="user" id="postNewJob">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Job Title" name="job_title" value="<?=$jobDetail[0]->job_title?>">
                    <input type="hidden" name="job_id" value="<?=$jobDetail[0]->job_id?>">
                  </div>
                 <!--  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select class="form-control " name="exp">
                      <option>Experience</option> -->
                     <!--  <?php for($i=1; $i<=20;$i++): ?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php
                          if($i==$jobDetail[0]->exp){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                          }else{
                            echo '<option value="'.$i.'" >'.$i.'</option>';
                          }

                        ?>
                      <?php endfor;?>
                    </select>
                  </div>  -->
                  
                </div>
                <div class="form-group row">
                  <label>Job Description</label>
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <textarea class="form-control form-control-user" rows="5"placeholder="Job Description" name="job_desc" >
                      <?=$jobDetail[0]->job_desc?>
                    </textarea>
                   
                  </div>
                  
                  
                </div>
                
                <div class="form-group row">
                  <div class="col-md-3">
                    <label>Vaccancies</label>
                    <select class="form-control " name="vacancy">
                      <!-- <option>Vacancy</option> -->
                      <?php for($i=1; $i<=20;$i++): ?>
                        <?php
                          if($i==$jobDetail[0]->vacancies_){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                          }else{
                            echo '<option value="'.$i.'" >'.$i.'</option>';
                          }

                        ?>
                        
                      <?php endfor;?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Job Category</label>
                    <select class="form-control " name="job_cat">
                      <!-- <option>Category</option> -->
                       <?php foreach($Categories as $cat): ?>
                        
                        <?php
                          if($cat->category_id==$jobDetail[0]->category_id){
                            echo '<option value="'.$cat->category_id.'" selected>'.$cat->category_name.'</option>';
                          }else{
                            echo '<option value="'.$cat->category_id.'" >'.$cat->category_name.'</option>';
                          }

                        ?>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Job Type</label>
                    <select class="form-control " name="job_type">
                      <!-- <option>Job Type</option> -->
                      <?php foreach($Type as $ty): ?>
                        <!-- <option value="<?=$ty->type_id?>"><?=$ty->type_name?></option> -->
                        <?php
                          if($ty->type_id==$jobDetail[0]->job_type){
                            echo '<option value="'.$ty->type_id.'" selected>'.$ty->type_name.'</option>';
                          }else{
                            echo '<option value="'.$ty->type_id.'" >'.$ty->type_name.'</option>';
                          }

                        ?>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Last Date</label>
                    <input type="text" name="last_Date" class="form-control " value="<?=date('d-m-Y',strtotime($jobDetail[0]->last_date))?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label>Skills Need</label>
                </div>
                <div class="form-group row">
                  <?php
                    $skillNeeded = explode(',',$jobDetail[0]->skills);
                  ?>
                  <?php foreach($Skills as $skill): ?>
                    <div class="col">
                      <?php
                        if (in_array($skill->skill_id, $skillNeeded))
                        {
                          ?>
                            <input type="checkbox" name="skills[]" checked value="<?=$skill->skill_id?>"> <?=$skill->skill_name?>
                          <?php
                        }
                        else
                        {
                          ?>
                            <input type="checkbox" name="skills[]" value="<?=$skill->skill_id?>"> <?=$skill->skill_name?>
                          <?php
                        }
                      ?>
                      
                    </div>
                      
                  <?php endforeach;?>
                  
                </div>
                 <div class="form-group row">
                   <div class="col-md-12"> 
                   <label>Work Experience</label>
                     <div class="row">
                            <div class="col-md-3">
                            <select class="form-control"  required name="minimumwork">
                              <option selected>Minimum</option>
                              <?php for($min=0; $min<=30; $min++) :?>
                                <?php if($jobDetail[0]->min_work_exp==$min){?>
                                  <option  value="<?=$min?>" selected><?=$min?></option>
                                <?php } else {?>
                                  <option  value="<?=$min?>" ><?=$min?></option>
                                <?php }?>
                              <?php  endfor;?>
                            </select>
                          </div>
                             <h6 class="mt-2">to</h6>
                              <div class="col-md-3">
                                <select class="form-control" required name="maximumwork">                                                    
                                <option selected>Maximum</option>
                                <?php for($max=1; $max<=30; $max++) :?>
                                <?php if($jobDetail[0]->max_work_exp==$max){?>
                                <option  value="<?=$max?>" selected><?=$max?></option>
                                <?php } else {?>
                                <option  value="<?=$max?>" ><?=$max?></option>
                                <?php }?>
                                <?php  endfor;?>
                               </select> 
                            </div>   
                      </div>    
                  </div>
                </div>
                   <div class="form-group row">
                    <label>Annual CTC</label>
                     <div class="col-sm-12 mb-3 mb-sm-0">
                        <div class="row">
                           <div class="col-md-4" >
                              <fieldset class="form-group" id="currencyrefresh">
                                   <select class="form-control"   required name="currencytype">
                                   <option selected>Currency</option> 
                                    <?php
                                      foreach($currency as $currencytype)
                                      { 
                                         if($jobDetail[0]->currency_type==$currencytype->curr_id)
                                         {
                                          echo' <option selected value="'.$currencytype->curr_id.'">'.$currencytype->currency_name.'</option>';
                                         }
                                         else
                                         {
                                         echo' <option  value="'.$currencytype->curr_id.'">'.$currencytype->currency_name.'</option>';
                                         }
                                     
                                     }
                                     ?>
                                     </select>
                                          
                               </fieldset>
                            </div>
                               <div class="col-md-4" >
                                  <fieldset class="form-group" id="minsalaryrefresh">         
                                    <select class="form-control"   required name="minisalary">
                                     <option selected>Min Annual Salary</option> 
                                      <?php
                                        foreach($min_salary as $min_sal)
                                        { 
                                          if($jobDetail[0]->min_annual_sal==$min_sal->min_sal_id)
                                          {
                                            echo' <option selected value="'.$min_sal->min_sal_id.'">'.$min_sal->min_salary.'</option>';
                                          }
                                          else
                                          {
                                             echo' <option  value="'.$min_sal->min_sal_id.'">'.$min_sal->min_salary.'</option>';
                                          }
                                       }?>
                                       </select>
                                      </fieldset>
                                </div>
                                <div class="col-md-4 ">
                                   <fieldset class="form-group"  id="maxsalaryrefresh"> 
                                   <select class="form-control"   required name="maxxsalary">
                                     <option selected>Max Annual Salary</option> 
                                      <?php
                                        foreach($max_salary as $max_sal)
                                        { 
                                          if($jobDetail[0]->max_annaul_sal== $max_sal->max_sal_id)
                                          {
                                            echo' <option selected value="'.$max_sal->max_sal_id.'">'.$max_sal->max_sal.'</option>';
                                          }
                                          else
                                          {
                                             echo' <option  value="'.$max_sal->max_sal_id.'">'.$max_sal->max_sal.'</option>';
                                          }
                                       
                                       }?>
                                       </select>
                                     </fieldset>
                                   </div>
                             
                         </div>
                    </div> 
                </div>
                   <div class="form-group col-md-12 ">
                         <label>Job Location</label>
                          <fieldset class="form-group row">
                          <input type="text" class="form-control" required value="<?=$jobDetail[0]->job_location_?>" name="joblocation">  
                           </fieldset>
                      </div>  
                      <div class="form-group ">
                            <label>Specify UG Qualifications</label>
                           <fieldset class="form-group">
                              <p class="text-danger">(Mandatory)**</p> 
                                <input type="text" class="form-control" required value="<?=$jobDetail[0]->ug_qualification?>" name="ugqualification">                       
                          </fieldset>
                      </div>
                      <div class="form-group ">
                        <label>Specify PG Qualifications</label>
                         <fieldset class="form-group">
                           <p class="text-danger">(If Not Type None)**</p> 
                           <input type="text" class="form-control" value="<?=$jobDetail[0]->pg_qualification?>"required  name="pgqualification">                        
                      </fieldset>
                      </div>
                      <div class="form-group ">
                        <label>Specify Doctorate/Ph.D</label>
                        <fieldset class="form-group">
                          <p class="text-danger">(If Not Type None)**</p> 
                        <input type="text" class="form-control" value="<?=$jobDetail[0]->phd_qualification?>"required  name="doctorate_phd"> 
                      </fieldset>
                      </div>
                <input type="submit" name="" value="Update Job" class="btn btn-primary btn-user btn-block">
       
              
              </form>
              <hr>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script type="text/javascript">
  $(document).ready(function(){
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
  });
</script>
  