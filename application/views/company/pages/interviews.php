
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Job Interviews</h1>
          <?php 
            // print_r($interviews);
          ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Interviews</h6>
            </div>


            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Seeker Name</th>
                      <th>Job Title</th>
                      <th>Date</th>
                      <th>Time</th>
                      <!-- <th>Salary/</th> -->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Seeker Name</th>
                      <th>Job Title</th>
                      <th>Date</th>
                      <th>Time</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i=1; ?>
                    <?php foreach($interviews as $de): ?>

                      <tr>
                        <td><?=$i?></td>
                        <td><?=$de->fullname?></td>
                        <td><?=$de->job_profile?></td>
                        <td><?=$de->interview_date?></td>
                        <td><?=$de->interview_time?></td>
                      </tr>
                      <?php $i++ ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
