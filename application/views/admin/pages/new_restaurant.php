
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
       
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add New Restaurant</h1>
                <hr>
              </div>
              <form class="user" id="compDetail">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Restaurant Name" name="rest_name" value="">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Restaurant Email" name="rest_email" value="">
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                   <input type="email" name="rest_pass" class="form-control form-control-user" id="exampleInputEmail" placeholder="Restaurant Password" value="" readonly>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Confirm Password" name="confr_pass" value="">
                  </div>
                  
                </div>
                <!-- <div class="form-group row">
                  
                  <div class="col-sm-12">
                    <label>Company Description</label>
                    <textarea class="form-control form-control-user"  rows="5" name="comp_desc"></textarea>
                    
                  </div>
                </div>

                <div class="form-group row">
                  
                  <div class="col-sm-12">
                    <label>Company Address</label>
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Company Address" name="comp_address" value="">
                  </div>
                </div>
                <div class="form-group row">
                  
                  <div class="col-sm-12">
                    <label>Company Registratio Number</label>
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Company Address" name="comp_reg" value="">
                  </div>
                </div> -->
                <input type="submit" name="" value="Add New Restaurant" class="btn btn-primary btn-user btn-block">
       
              
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
    $('#compDetail').on('submit',function(e){
      e.preventDefault();
      var formData=new FormData($(this)[0]);
      console.log("Working Fine");
      $.ajax({
        url:"<?=base_url('CompanyLogic/updateCompDetails')?>",
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
    $('#compLogo').on('submit',function(e){
      e.preventDefault();
      var formData=new FormData($(this)[0]);
      console.log("Working Fine");
      $.ajax({
        url:"<?=base_url('CompanyLogic/uploadLogo')?>",
        type:"post",
        cache:false,
        enctype:'multipart/form-data',
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
  