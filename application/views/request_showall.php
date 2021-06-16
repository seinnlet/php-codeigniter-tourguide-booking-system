<?php $today = date('Y-m-d') ?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-phone-volume"></i>Tour Guide Booking</h1>
    <p class="mb-4 mt-3">
      <button class="btn btn-info"  data-toggle="modal" data-target="#model"><i class="fas fa-paste"></i> Generate Report</button>
    </p>

   	<div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">All Tour Guide Booking List</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>RID.</th>
                <th>Traveller</th>
                <th>Date</th>
                <th>Duration</th>
                <th>Tour Guide</th>
                <th>Region</th>
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
                $traveller = $request->username;
                $tourguide = $request->tourguidename;
                $duration = $request->duration;
                $region = $request->regionname;
                $country = $request->country;
                $startdate = $request->startdate;
                $enddate = $request->enddate;
                $status = $request->status;
              ?>
              <tr>
                <td><?= $i ?></td>
                <td>B_<?= $id ?></td>
                <td><?= $traveller ?></td>
                <td>
                  From: <?= date("d M, Y", strtotime($startdate)) ?> <br>
                  To: <?= date("d M, Y", strtotime($enddate)) ?>
                </td>
                <td><?= $duration ?> <?php echo ($duration==1) ? ' day' : ' days' ?></td>
                <td><?= $tourguide ?></td>
                <td><?= $region ?>, <?= $country ?></td>
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

   <!-- Modal -->
<div class="modal fade" id="model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form method="post" action="<?= base_url().'index.php/Report/request' ?>" target="_blank">
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
            <option value="cancelled by tour guide">Cancelled by Tour Guide</option>
            <option value="cancelled by user">Cancelled by User</option>
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