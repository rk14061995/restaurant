
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Menu Item</h1>
          <?php 
            // print_r($jobApplications);
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add Item</h6>
                </div>
                <div class="card-body">
                  <form id="updateCate">
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                      	<select class="form-control">
                          <option value="0">Select Restaurant</option>
                          <?php foreach($addRest as $rest): ?>
                            <option value="<?=$rest->rest_id?>"><?=$rest->rest_name?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control" id="category_id">
                          <option value="0">Select Category</option>
                          <?php foreach($Categories as $cat): ?>
                            <option value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <span id="sub_itme">
                      <!-- <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label>Full Plate</label>
                        </div>
                        <div class="col-sm-8 mb-3 mb-sm-0">
                          <input type="text" name="" class="form-control" placeholder="459 Rs.">
                        </div>
                      </div> -->
                    </span>
                     
                    <div class="form-group row">
                      <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="submit" name="" value="Update Category" class="btn btn-primary btn-user btn-block">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sub Categories</h6>
            </div>


            <?php 
           // print_r($Categories)
            ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">S.No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                 <!--  <tfoot>
                    <tr>
                      <th class="text-center">S.No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                    <?php $i=1;?>
                   
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
  $(document).on('change','#category_id',function(){
    var category_id=$(this).val();
    $.ajax({
      url:"<?=base_url('API/getAllSubCategory')?>",
      type:"post",
      data:{category_id:category_id},
      success:function(response){
        // console.log(response);
        response=JSON.parse(response);
        if(response.data.length>0){
           $('#sub_itme').empty();
          for(let i=0; i<response.data.length; i++){
            // console.log(response.data[i]);
            var subCat='';
            subCat+='<div class="form-group row">'+
                        '<div class="col-sm-4 mb-3 mb-sm-0">'+
                          '<label>sdfsd</label><input type="text" name="" value="'+response.data[i].sub_cat_id+'" class="form-control" placeholder="459 Rs.">'+
                        '</div>'+
                        '<div class="col-sm-8 mb-3 mb-sm-0">'+
                          '<input type="text" name="" class="form-control" placeholder="459 Rs.">'+
                        '</div>'+
                      '</div>';
                       $('#sub_itme').append(subCat);
          }
        }
        
                     
      }
    });
  });
</script>