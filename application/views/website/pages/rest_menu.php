<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>  
        #divqrcode {  
            width: 102px;  
            height: 102px;  
            /*margin-top: 14px;  */
        }  
    </style> 
    <!-- <script src="Scripts/jquery-latest.min.js"></script>   -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/web_assets/')?>css/style.css">
    <title>Restaurant</title>
  </head>
  <body>
    <section class="lgblueBck">
      <div class="backImg ">
          <nav class="navbar navbar-expand-lg container navbar-light">
            <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url('assets/web_assets/')?>images/White-Logo.png" class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav margAuto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Function</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="#">Prizes</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="#">Support</a>
                </li>
                <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li> -->
              
              </ul>

            </div>
          </nav>

      </div>
    </section>
  <!-- Page Wrapper -->
  <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container mt-5 p-3">

          <!-- Page Heading -->
          
          
          
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

<section class="backcolRd py-5">
  <div class="container px-5">
    <div class="text-white text-center mb-5">
      <span>CONTACT US</span>
      <h2 class="fnt700">Request A Quick Quote</h2>
    </div>
    <form class="w-100">    
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <input type="text" class="form-control inpt" placeholder="Enter Name" name="" required="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <input type="email" class="form-control inpt" placeholder="Enter Email" name="" required="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <input type="text" class="form-control inpt" placeholder="Enter Subject" name="" >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <input type="tel" class="form-control inpt" placeholder="Enter Phone" name="" >
          </div>
        </div>
      </div>
      <div class="">
        <textarea placeholder="Enter Message" class="w-100 " rows="5"></textarea>
      </div>
      <div class="text-center my-4">
        <button class="btn whiteBtn">GET A QUOTE</button>
      </div>
    </form>
  </div>  
</section>


<section class="container py-5">
    <div class="row">
      <div class="col-md-3">
        <div class="">
          <div class="">
            <img src="<?=base_url('assets/web_assets/')?>images/Color-Logo.png" class="img-fluid">
          </div>
            <div class="mt-3 ml-4">
              <h5 class="">(+352) 486886</h5>
              <small>info@topresto.lu</small><br>
              <small>16, Grand-Rue</small><br>
              <small>L-6630 Wasserbillig</small>
            </div>
            <div class="ml-3 mt-2">
              <ul class="list-unstyled d-flex m-0">
                <li>
                  <span class="">
                    <a href=""><img src="<?=base_url('assets/web_assets/')?>images/Facebook-Icon.png" class="img-fluid"></a>
                  </span>
                </li>
                <li>
                  <span class="">
                    <a href=""><img src="<?=base_url('assets/web_assets/')?>images/Pintrest.png" class="img-fluid"></a>
                  </span>
                </li>
                <li>
                  <span class="">
                    <a href=""><img src="<?=base_url('assets/web_assets/')?>images/Instagram.png" class="img-fluid"></a>
                  </span>
                </li>
                <li>
                  <span class="">
                    <a href=""><img src="<?=base_url('assets/web_assets/')?>images/Twitter.png" class="img-fluid"></a>
                  </span>
                </li>
              </ul>
            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="_foothed">
          <h5>Navigation</h5>
          <div class="mt-4">
            <ul class="list-unstyled m-0 p-0">
              <li> 
                <a href="">Search Listing</a>
              </li>
              <li> 
                <a href="">FAQ</a>
              </li>
              <li> 
                <a href="">Add listing</a>
              </li>
              <li> 
                <a href="">Own website</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="_foothed">
          <h5>Legal</h5>
          <div class="mt-4">
            <ul class="list-unstyled m-0 p-0">
              <li> 
                <a href="">Imprints</a>
              </li>
              <li> 
                <a href="">Terms and Conditions</a>
              </li>
              <li> 
                <a href="">Privacy & Policy</a>
              </li>
           
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="_foothed">
          <h5>Latest News</h5>
          <div class="mt-4">
            <ul class="list-unstyled m-0  p-0">
              <li class="diBLin"> 
                  <div class="">
                   <span class="">The Best in digital card Services in the world.</span><br>
                   <small>Date</small>
                 </div>
              </li>
              <li class="diBLin"> 
                 <div class="">
                   <span class="">The Best in digital card Services in the world.</span><br>
                   <small>Date</small>
                 </div>
              </li>
             
           
            </ul>
          </div>
        </div>
      </div>
    </div>
</section>
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
                     '<td class="text-center">'+items[k].item_detail.item_status+'</td>'+
                    '</tr>';
            }
            $('#menuList').append(item);
            
          }
        }
        
                     
      }
    });
  });
</script>
</body>
</html>