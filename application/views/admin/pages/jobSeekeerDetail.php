
  <div class="container">
    <?php
      // print_r($UserDetail);
    ?>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block ">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Profile Picture</h1>
                <hr>
              </div>
              <form class="user" id="compRegister">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                   <img src="<?=base_url('assets/UserImages/profile_picture/').$UserDetail[0]['jobseeker_detail']->profile_pic?>" width="100%" onerror='this.src="<?=base_url('assets/UserImages/profile_picture/default.png')?>"'>
                  </div>

                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name" name="comp_name" value="<?=$UserDetail[0]['jobseeker_detail']->fullname?>" readonly>
                  </div>

                </div>

                
              </form>
              <hr>
              
            </div>
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">JobSeeker Details</h1>
                <hr>
              </div>
              <form class="user" id="compRegister">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name" name="comp_name" value="<?=$UserDetail[0]['jobseeker_detail']->fullname?>" readonly>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Phone Number" name="comp_phone" value="<?=$UserDetail[0]['jobseeker_detail']->phone_?>" readonly>
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                   <input type="email" name="comp_email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Company Email Address" value="<?=$UserDetail[0]['jobseeker_detail']->email?>" readonly>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Company URL" name="comp_phone" value="<?=$UserDetail[0]['jobseeker_detail']->address_?>" readonly>
                  </div>
                  
                </div>
                <div class="form-group row">
                  
                  <div class="col-sm-12">
                    <textarea class="form-control form-control-user text-center" rows="5" readonly><?=$UserDetail[0]['jobseeker_detail']->basic_introduction?></textarea> 
                  </div>
                </div>
                <div class="form-group row">
                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Company Address" name="comp_pass" value="<?=implode(',',$UserDetail[0]['skills'])?>" readonly>
                  </div>
                </div>
                <!-- <a href="" class="btn btn-primary btn-user btn-block">Send Message</a> -->
       
              
              </form>
              <hr>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  
  