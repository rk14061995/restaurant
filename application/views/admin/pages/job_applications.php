
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Job Applications</h1>
          <?php 
            // print_r($jobApplications);
          ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Applications</h6>
            </div>


            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Seeker Name</th>
                      <th>Job Title</th>
                      <th>Location</th>
                      <th>Action</th>
                      <!-- <th>Salary/</th> -->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Seeker Name</th>
                      <th>Job Title</th>
                      <th>Location</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($jobApplications as $application) :?>
                     
                    <tr>
                      <td><?=$i?></td>
                      <td><a href="<?=base_url('Company/jobSeekerDetail/').$application->user_id?>"><?=$application->fullname?></a></td>
                      <td><a href="<?=base_url('Company/jobDetails/').$application->job_post_id?>"><?=$application->job_title?></a></td>
                      <td><?=$application->job_location_?></td>
                      <td><a href="<?=base_url('Company/jobApplicationDetails/').$application->job_application_id?>" class="btn btn-success ">View</a></td>
                      <!-- <td>$320,800</td> -->
                    </tr>
                    <?php $i++;?>
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
