
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/comp_assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/comp_assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/comp_assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/comp_assets/')?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url('assets/comp_assets/')?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('assets/comp_assets/')?>js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url('assets/comp_assets/')?>js/demo/chart-pie-demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.deact_rest').on('click',function(){
        var rest_id=$(this).attr('d-rest');
        // alert("De-Activate "+rest_id);
        $.ajax({
          url:"<?=base_url('API/deactivateRestaurant')?>",
          type:"post",
          data:{restaurant_id:rest_id},
          success:function(response){
            console.log(response);
            response=JSON.parse(response);
            if(response.status==1){
              swal("Great..","Deactivated Successfully.","success");
            }else{
              swal("Ooops..","Something went wrong","error");
            }
            setInterval(function(){
              location.reload();
            },1500);
          }
        })
      });
      $('.activate_rest').on('click',function(){
        var rest_id=$(this).attr('d-rest');
        // alert("Activate "+rest_id);
        $.ajax({
          url:"<?=base_url('API/activateRestaurant')?>",
          type:"post",
          data:{restaurant_id:rest_id},
          success:function(response){
            console.log(response);
            response=JSON.parse(response);
            if(response.status==1){
              swal("Great..","Updated Successfully.","success");
            }else{
              swal("Ooops..","Something went wrong","error");
            }
            setInterval(function(){
              location.reload();
            },1500);
          }
        })
      });
      $('.remove_rest').on('click',function(){
        var rest_id=$(this).attr('d-rest');
        alert("Remove "+rest_id);

      });
      $('#restDetail').on('submit',function(e){
        e.preventDefault();
        console.log("Working...");
        var pass=$('#rtestPass').val();
        var confpass=$('#restconfpass').val();
        if(pass!=confpass){
          swal("Ooops..","Password Not Matched","error");
        }else{
          var formData= new FormData($(this)[0]);
          $.ajax({
            url:"<?=base_url('API/addNewRestaurant')?>",
            type:"post",
            cache:false,
            contentType:false,
            processData:false,
            data:formData,
            success:function(response){
              // console.log(response);
              response=JSON.parse(response);
              if(response.status==1){
                swal("Great..","Restaurant Added Successfully.","success");
              }else if(response.status==2){
                swal("Wait..","Details Already Exists","warning");
              }else{
                swal("Ooops..","Something went wrong","error");
              }
              setInterval(function(){
                location.reload();
              },1500);
            }
          })
        }
        
        
      });
      
    })
  </script>
</body>

</html>
