<?php $today = date('Y-m-d') ?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-suitcase-rolling"></i> Booking</h1>

    <!-- DataTales Example -->
    <div class="card shadow my-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Booking List</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Booking_ID</th>
                <th>Tour_Name</th>
                <th>Traveller_Name</th>
                <th>Tour_Date</th>
                <th>Total_People</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($bookinglist as $booking): 
                $i++;
                $id = $booking->bookingid;
                $tourname = $booking->tourname;
                $username = $booking->username;
                $userphone = $booking->userphone;
                $bookdate = $booking->bookdate;
                $duration = $booking->duration;
                $todate = date('Y-m-d', strtotime($bookdate))." + ".($duration-1)." day";
                $todate = date('Y-m-d', strtotime($todate));
                $totalpeople = $booking->nooftotalpeople;
                $status = $booking->status;
              ?>
              <tr>
                <td><?= $i ?>.</td>
                <td>B_<?= $id ?></td>
                <td><?= $tourname ?></td>
                <td><?= $username ?><br>(<?= $userphone ?>)</td>
                <td>
                  From: <?= date("d M, Y", strtotime($bookdate)) ?> <br>
                  To: <?= date("d M, Y", strtotime($todate)) ?>
                </td>
                <td><?= $totalpeople ?></td>
                <td>
                  <?php if ($status == 'booked'): ?>
                    <span class="badge badge-info"><?= $status ?></span>
                    <?php if ($today<=$bookdate && $today>=$todate): ?>
                      <br><small class="text-success">(current)</small>
                    <?php endif ?>
                  <?php elseif($status == 'completed'): ?>
                    <span class="badge badge-success"><?= $status ?></span>
                  <?php else: ?>
                    <span class="badge badge-danger"><?= $status ?></span>
                  <?php endif ?>
                </td>
                <td>
                  <a href="<?php echo base_url(); ?>index.php/Booking/show/<?= $id ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i> View</a>
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
