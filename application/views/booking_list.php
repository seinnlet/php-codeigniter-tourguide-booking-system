<?php $today = date('Y-m-d') ?>
<div class="innerpage-banner">
	<div class="layer1"></div>
</div>

<section class="py-5" id="bookingdetail">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> My Bookings </h3>

		<h4 class="mt-5 font-weight-bold">Tour Bookings</h4>
    <hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">
		<div class="table-responsive mb-4">
	    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	      <thead>
	        <tr>
	          <th>No.</th>
	          <th>Booking ID</th>
	          <th>Tour Name</th>
	          <th>Region</th>
	          <th>Tour Date</th>
	          <th>Booked Date</th>
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
	          $tourguideid = $booking->tourguideid;
	          $region = $booking->regionname;
	          $country = $booking->country;
	          $bookdate = $booking->bookdate;
	          $duration = $booking->duration;
						$todate = date('Y-m-d', strtotime($bookdate))." + ".($duration-1)." day";
						$todate = date('Y-m-d', strtotime($todate));
	          $created_at = $booking->created_at;
	          $status = $booking->status;
	          $reviewstatus = $booking->reviewstatus;
	        ?>
	        <tr>
	          <td><?= $i ?>.</td>
	          <td>B_<?= $id ?></td>
	          <td><?= $tourname ?></td>
	          <td><?= $region ?> - <?= $country ?></td>
	          <td>
	          	From: <?= date("d M, Y", strtotime($bookdate)) ?> <br>
	          	To: <?= date("d M, Y", strtotime($todate)) ?>
	          </td>
	          <td><?= date("d M, Y", strtotime($created_at)) ?></td>
	          <td>
	          	<?php if ($status == 'booked'): ?>
	          		<span class="badge badge-info" style="letter-spacing: 1px"><?= $status ?></span>
	          		<?php if ($today<=$bookdate && $today>=$todate): ?>
	          			<br><small class="text-success">(current)</small>
	          		<?php endif ?>
	          	<?php elseif($status == 'completed'): ?>
	          		<span class="badge badge-success" style="letter-spacing: 1px"><?= $status ?></span>
	          		<?php if ($reviewstatus != 'rated'): ?>
	          			<br><a href="<?= base_url().'index.php/Review/add/'.$tourguideid.'/booking/'.$id ?>" class="btn btn-outline-success btn-sm mt-3">Give Feedback</a>
	          		<?php endif ?>
	          	<?php else: ?>
	          		<span class="badge badge-danger" style="letter-spacing: 1px"><?= $status ?></span>
	          	<?php endif ?>	          		
	          </td>
	          <td>
	            <a href="<?php echo base_url(); ?>index.php/Booking/detail/<?= $id ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i> View</a>
	          </td>
	        </tr>
	        <?php endforeach; ?>
	      </tbody>
	    </table>
	  </div>

  	<h4 class="mt-5 font-weight-bold">Tour Guide Bookings</h4>
  	<hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">

	  <?php if (count($requestlist) != 0): ?>

	  	<div class="table-responsive mb-4">
		    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th>No.</th>
		          <th>Request ID</th>
		          <th>Tour Guide Name</th>
		          <th>Region</th>
		          <th>Tour Date</th>
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
		          $tourguidename = $request->tourguidename;
		          $tourguideid = $request->tourguideid;
		          $region = $request->regionname;
		          $country = $request->country;
		          $startdate = $request->startdate;
		          $enddate = $request->enddate;
							$created_at = $request->created_at;
		          $status = $request->status;
		          $reviewstatus = $request->reviewstatus;
		        ?>
		        <tr>
		          <td><?= $i ?>.</td>
		          <td>R_<?= $id ?></td>
		          <td><?= $tourguidename ?></td>
		          <td><?= $region ?> - <?= $country ?></td>
		          <td>
		          	From: <?= date("d M, Y", strtotime($startdate)) ?> <br>
		          	To: <?= date("d M, Y", strtotime($enddate)) ?>
		          </td>
		          <td><?= date("d M, Y", strtotime($created_at)) ?></td>
		          <td>
		          	<?php if ($status == 'appending'): ?>
		          		<span class="badge badge-info" style="letter-spacing: 1px"><?= $status ?></span>
		          		<?php if ($today<=$startdate && $today>=$enddate): ?>
                    <br><small class="text-success">(current)</small>
                  <?php endif ?>
		          	<?php elseif($status == 'accepted' || $status == 'completed'): ?>
		          		<span class="badge badge-success" style="letter-spacing: 1px"><?= $status ?></span>
		          		<?php if ($status == 'completed' && $reviewstatus != 'rated'): ?>
		          			<br><a href="<?= base_url().'index.php/Review/add/'.$tourguideid.'/request/'.$id ?>" class="btn btn-outline-success btn-sm mt-3">Give Feedback</a>
		          		<?php endif ?>
		          	<?php else: ?>
		          		<span class="badge badge-danger" style="letter-spacing: 1px"><?= $status ?></span>
		          	<?php endif ?>	          		
		          </td>
		          <td>
		            <a href="<?php echo base_url(); ?>index.php/Request/detail/<?= $id ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i> View</a>
		          </td>
		        </tr>
		        <?php endforeach; ?>
		      </tbody>
		    </table>
		  </div>
	  
	  <?php else: ?>

	  	<p class="font-italic my-3">There is no tour guide contact request...</p>

	  <?php endif ?>

	</div>
</section>