
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Job Seekers</h1>
          <?php
            // print_r($jobSeekers);
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact No.</th>
                      <th>Skills</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact No.</th>
                      <th>Skills</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i=0?>
                    <?php foreach($jobSeekers as $user): ?>
                      <tr>
                        <td><?=$i+1?></td>
                        <td><a href="<?=base_url('Company/jobSeekerDetail/').$user['jobseeker_detail']->user_id?>"><?=$user['jobseeker_detail']->fullname?></a></td>
                        <td><?=$user['jobseeker_detail']->email?></td>
                        <td><?=$user['jobseeker_detail']->phone_?></td>
                        <td><?=implode(',',$user['skills'])?></td>
                        <!-- <td>$320,800</td> -->
                      </tr>
                      <?php $i++?>
                    <?php endforeach;?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
