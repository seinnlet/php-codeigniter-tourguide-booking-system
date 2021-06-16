<?php $today = date('Y-m-d') ?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-phone-volume"></i> Request</h1>

    <!-- DataTales Example -->
    <div class="card shadow my-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Request List</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Request ID</th>
                <th>Traveller Name</th>
                <th>Phone</th>
                <th>Tour Date</th>
                <th>Total People</th>
                <th>Contacted Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($requestlist as $request): 
                $i++;
                $id = $request->requestid;
                $username = $request->username;
                $country = $request->usercountry;
                $userphone = $request->phone;
                $startdate = $request->startdate;
                $enddate = $request->enddate;
                $totalpeople = $request->totalpeople;
                $created_at = $request->created_at;
                $status = $request->status;
              ?>
              <tr>
                <td><?= $i ?>.</td>
                <td>R_<?= $id ?></td>
                <td><?= $username ?><br><small>(from <?= $country ?>)</small></td>
                <td><?= $userphone ?></td>
                <td>
                  From: <?= date("d M, Y", strtotime($startdate)) ?> <br>
                  To: <?= date("d M, Y", strtotime($enddate)) ?>
                </td>
                <td><?= $totalpeople ?></td>
                <td><?= date("d M, Y", strtotime($created_at)) ?></td>
                <td>
                  <?php if ($status == 'appending'): ?>
                    <span class="badge badge-info"><?= $status ?></span>
                    <?php if ($today<=$startdate && $today>=$enddate): ?>
                      <br><small class="text-success">(current)</small>
                    <?php endif ?>
                  <?php elseif($status == 'accepted' || $status == 'completed'): ?>
                    <span class="badge badge-success"><?= $status ?></span>
                  <?php else: ?>
                    <span class="badge badge-danger"><?= $status ?></span>
                  <?php endif ?>  
                </td>
                <td width="80">
                  <a href="<?php echo base_url(); ?>index.php/Request/show/<?= $id ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i> View</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
