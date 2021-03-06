
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">

            <div class="col-md-12 ">
              <?php
                if($this->session->flashdata('msg')){
                  echo '<div class="alert alert-danger">'.$this->session->flashdata('msg').'</div>';
                }
              ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Add Item</h6>
                </div>
                <div class="card-body">
                  <form action="<?=base_url('Restaurant/addMenuItem')?>" method="post">
                    <div class="form-group row">
                      <div class="col-sm-3 mb-3 mb-sm-0">
                        <select class="form-control" name="rest_id" >
                          <!-- <option value="0">Select Restaurant</option> -->
                          
                            <option value="<?=$myRestId?>" selected><?=$myRestName?></option>
                          
                        </select>
                      </div>
                      <div class="col-sm-3 mb-3 mb-sm-0">
                        <select class="form-control" id="category_id" name="category_id">
                          <option value="0">Select Category</option>
                          <?php foreach($Categories as $cat): ?>
                            <option value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" name="item_name" class="form-control" placeholder="Item Name" >
                      </div>
                      <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="submit" name="" value="Add Item To Menu" class="btn btn-danger btn-user btn-block" id="adNewIte" disabled>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row" id="sub_itme">
                     
                       
                    </div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
          
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-sm-7">
                  <h6 class="m-0 font-weight-bold text-primary">Our Menu</h6>
                </div>
                
              </div>
              
              
            </div>


            <?php 
           // print_r($Categories)
            ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" >
                  <!-- <thead>
                    <tr>
                      <th class="text-center">S.No</th>
                      <th class="text-center">Item Name</th>
                      <th class="text-center">Options</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead> -->
                 <!--  <tfoot>
                    <tr>
                      <th class="text-center">S.No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </tfoot> -->
                  <tbody id="menuList">
                    <!-- <tr>
                      <td colspan="4" class="text-center bg-success text-white">
                        Main Course
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td colspan="1" class="text-center">
                        <table class="text-center" width="100%">
                            <tr class="text-center">
                              <td class="text-center">Half Plate</td>
                              <td class="text-center">Quarter Plate</td>
                            </tr>
                          </table>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">1</td>
                      <td class="text-center">Aalo</td>
                      <td class="text-center">
                          <table width="100%">
                            <tr class="text-center">
                              <td class="text-center">120</td>
                              <td class="text-center">40</td>
                            </tr>
                          </table>
                      </td>
                      <td class="text-center">
                        <a href="" class="btn btn-danger">DLT</a>
                      </td>
                    </tr> -->
                   
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
            subCat+=''+
                        '<div class="col-sm-4 mb-3 mb-sm-0">'+
                          '<label>'+response.data[i].sub_category_name+'</label><input type="hidden" name="subcat[]" value="'+response.data[i].sub_cat_id+'" class="form-control" placeholder="Price">'+
                        '</div>'+
                        '<div class="col-sm-8 mb-3 mb-sm-0">'+
                          '<input type="text" name="rate[]" class="form-control" placeholder="Price">'+
                        '</div>';
                     
                       $('#sub_itme').append(subCat);
          }
          $('#adNewIte').attr('disabled',false);
        }
        
                     
      }
    });
  });
  $(document).on('chaloa=nge','#rest_id_',function(){
    
  });
  $(document).ready(function(){
    var rest_id="<?=$myRestId?>";
     $.ajax({
      url:"<?=base_url('API/getAllMenuItem')?>",
      type:"post",
      data:{rest_id:rest_id},
      success:function(response){
        console.log(response);
        response=JSON.parse(response);
        if(response.data.length>0){
          $('#menuList').empty();
          for(let i=0; i<response.data.length; i++){
            // console.log(response.data[i]);
            var categor='<tr>'+
                      '<td colspan="4" class="text-center bg-danger  text-white" style="border-radius:25px 25px">'+response.data[i].cate_name+
                       
                      '</td>'+
                    '</tr>';
            $('#menuList').append(categor);
            var subCategories=response.data[i].sub_categories;
            var td='';
            for(let j=0; j<subCategories.length; j++){
              
              td+='<td class="text-center"><strong>'+subCategories[j].sub_category_name+'</strong></td>';
            }
            var subCategory='<tr>'+
                      // '<td></td>'+
                      '<td class="text-center"><strong>Item Name</strong></td>'+
                      '<td colspan="1" class="text-center">'+
                        '<table class="text-center" width="100%">'+
                            '<tr class="text-center">'+td
                            
                            '</tr>'+
                          '</table>'+
                      '</td>'+
                    '</tr>';
            $('#menuList').append(subCategory);
            var items=response.data[i].items;
            
            
            var item='';
            for(let k=0; k<items.length; k++){
              var itemPrice=response.data[i].items[k].item_price;
              var pricetd='';
                for(let l=0; l<itemPrice.length; l++){
                    pricetd+='<td class="class="text-center""> &#8364; '+itemPrice[l]+'</td>';
                }
              item+='<tr>'+
                      // '<td class="text-center">'+(i+1)+'</td>'+
                      '<td class="text-center">'+items[k].item_detail.item_name+'</td>'+
                      '<td class="text-center">'+
                          '<table width="100%" >'+
                            '<tr >'+
                              pricetd+
                            '</tr>'+
                          '</table>'+
                      '</td>'+
                      '<td class="text-center">'+
                      '<a href="" class="btn btn-success"><i class="fas fa-eye"></i></a> '+
                        '<a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>'+
                      '</td>'+
                    '</tr>';
            }
            $('#menuList').append(item);
            
          }
        }
        
                     
      }
    });
  });
</script>