<?php $today = date('Y-m-d') ?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-suitcase-rolling"></i> Booking</h1>
    <p class="mb-4 mt-3">
      <button class="btn btn-info"  data-toggle="modal" data-target="#model"><i class="fas fa-paste"></i> Generate Report</button>
    </p>

   	<div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">All Booking List</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>BID.</th>
                <th>Traveller</th>
                <th>Booked Date</th>
                <th>Tour</th>
                <th>Guide</th>
                <th>Region</th>
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
                $traveller = $booking->username;
                $bookdate = $booking->bookdate;
                $duration = $booking->duration;
                $todate = date('Y-m-d', strtotime($bookdate))." + ".($duration-1)." day";
                $todate = date('Y-m-d', strtotime($todate));
                $status = $booking->status;
                $tourguide = $booking->tourguidename;
                $region = $booking->regionname;
                $country = $booking->country;
              ?>
              	<tr>
              		<td><?= $i ?></td>
              		<td>B_<?= $id ?></td>
              		<td><?= $traveller ?></td>
              		<td><?= $bookdate ?> <small>(<?= $duration ?> <?php echo ($duration==1) ? ' day' : ' days' ?>)</small></td>
              		<td><?= $tourname ?></td>
              		<td><?= $tourguide ?></td>
              		<td><?= $region ?>, <?= $country ?></td>
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

  <!-- Modal -->
<div class="modal fade" id="model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form method="post" action="<?= base_url().'index.php/Report/booking' ?>" target="_blank">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name" class="font-weight-bold text-gray-dark">Report Name:</label>
          <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Report Name" autocomplete="off" autofocus>
        </div>

        <div class="form-group">
          <label class="font-weight-bold text-gray-dark">Date Range:</label>
          <div class="form-row">
            <div class="form-group col-md-6">
              <small><label for="fromdate">From:</label></small>
              <input type="date" class="form-control" id="fromdate" name="fromdate" required>
            </div>
            <div class="form-group col-md-6">
              <small><label for="todate">To:</label></small>
              <input type="date" class="form-control" id="todate" name="todate" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="font-weight-bold text-gray-dark">Sort by:</label>
          <div class="form-row">
            <div class="form-group col-md-3">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="bookingid" name="sort" class="custom-control-input" value="bookingid" checked>
                <label class="custom-control-label" for="bookingid">Booking ID</label>
              </div>
            </div>
            <div class="form-group col-md-3">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="date" name="sort" class="custom-control-input" value="date">
                <label class="custom-control-label" for="date">Booking Date</label>
              </div>
            </div>
            <div class="form-group col-md-3">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="tourtype" name="sort" class="custom-control-input" value="tourtype">
                <label class="custom-control-label" for="tourtype">Tour Type</label>
              </div>
            </div>
            <div class="form-group col-md-3">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="region" name="sort" class="custom-control-input" value="region">
                <label class="custom-control-label" for="region">Region</label>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="tourtypefilter" class="font-weight-bold text-gray-dark">Tour Type Filter (optional):</label>
          <select class="form-control" id="tourtypefilter" name="tourtype" required>
            <option selected value="null">Select Tour Type</option>
            <?php  
              $i = 0;
              foreach ($tourtypelist as $tourtype): 
              $i++;
              $tourtypeid = $tourtype->tourtypeid;
              $tourtypename = $tourtype->name;
            ?>
            <option value="<?= $tourtypename ?>"><?= $tourtypename ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="regionfilter" class="font-weight-bold text-gray-dark">Region Filter (optional):</label>
          <select class="form-control" id="regionfilter" name="region" required>
            <option selected value="null">Select Region</option>
            <?php  
              $i = 0;
              foreach ($regionlist as $region): 
              $i++;
              $regionid = $region->regionid;
              $regionname = $region->regionname;
              $country = $region->country;
            ?>
            <option value="<?= $regionname ?>"><?= $regionname ?> - <?= $country ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="status" class="font-weight-bold text-gray-dark">Status Filter (optional):</label>
          <select class="form-control" id="status" name="status" required>
            <option selected value="null">Select Tour Status</option>
            <option value="completed">Completed</option>
            <option value="booked">Booked</option>
            <option value="cancelled">Cancelled</option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-info">Generate</button>
      </div>
      </form>
    </div>
  </div>
</div>