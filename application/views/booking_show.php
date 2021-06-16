<?php  
	foreach ($detailbooking as $detail)
	{
		// booking
		$bookingid = $detail->bookingid;
		$bookdate = $detail->bookdate;
		$duration = $detail->duration;
		$todate = date('Y-m-d', strtotime($bookdate))." + ".($duration-1)." day";
		$todate = date('Y-m-d', strtotime($todate));
		$today = date('Y-m-d');

		$starttime = $detail->startingtime;
		$meetingpoint = $detail->meetingpoint;
		$nooftotalpeople = $detail->nooftotalpeople;
		$noofchild = $detail->noofchild;
		$totalprice = $detail->totalprice;
		$bookeddate = $detail->bookeddate;
		$cancelabledate = date('Y-m-d', strtotime($bookeddate))." + 1 day";
		$cancelabledate = date('Y-m-d', strtotime($cancelabledate));
		$comment = $detail->comment;
		$status = $detail->bookingstatus;
		$starttime = $detail->startingtime;
    
    // tour
    $tourid = $detail->tourid;
    $tourname = $detail->name;
    $tourguideid = $detail->tourguideid;
    $tourguidename = $detail->tourguidename;
    $tourtypename = $detail->tourtypename;
    $transportation = $detail->transportation;
    $duration = $detail->duration;

    $tourroute = $detail->tourroute;
    $restriction = $detail->restriction;
    $regionname = $detail->regionname;
    $country = $detail->country;

    // traveller 
    $username = $detail->username;
    $userphone = $detail->userphone;
    $useremail = $detail->useremail;
    $usercountry = $detail->usercountry;
    if ($detail->transportationid != NULL) {
      $tid = 't_s';
    } else {
      $tid = 't_c';
    }
  }
?>

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-suitcase-rolling"></i> Booking ID #B_<?= $bookingid ?>	</h1>
    <p class="mb-4 mt-3">
    	<?php if ($this->session->userdata('role') == 'staff'): ?>
    		<a href="<?php echo base_url(); ?>index.php/Booking/showall" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    	<?php else: ?>
    		<a href="<?php echo base_url(); ?>index.php/Booking" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    	<?php endif ?>
      
    </p>

     <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Detail</h6>
      </div>
      <div class="card-body">
      	<div class="row">
					<div class="col-md-6">
						<h5 class="font-weight-bold">Traveller Info</h5>
						<hr style="border: 1px solid #36b9cc;" class="ml-0 w-25 rounded">

						<div class="row my-2">
							<div class="col-4">
								<strong>Traveller Name: </strong>
							</div>
							<div class="col-8">
								<?= $username ?>
							</div>
						</div>

						<div class="row my-2">
							<div class="col-4">
								<strong>Contact Info: </strong>
							</div>
							<div class="col-8">
								<a href="tel: <?= $userphone ?>" class="text-dark"><?= $userphone ?></a> | 
								<a href="mailto: <?= $useremail ?>" class="text-dark"><?= $useremail ?></a>
							</div>
						</div>


						<div class="row my-2">
							<div class="col-4">
								<strong>From: </strong>
							</div>
							<div class="col-8">
								<?= $usercountry ?>
							</div>
						</div>

						<div class="row my-2">
							<div class="col-4">
								<strong>Travel To: </strong>
							</div>
							<div class="col-8">
								<?= $regionname ?> - <?= $country ?>
							</div>
						</div>		
					</div>

					<div class="col-md-6">
						<h5 class="font-weight-bold">Booking Info</h5>
						<hr style="border: 1px solid #36b9cc;" class="ml-0 w-25 rounded">

						<div class="row my-2">
							<div class="col-4">
								<strong>Booking ID: </strong>
							</div>
							<div class="col-8">
								B_<?= $bookingid ?>
							</div>
						</div>

						<div class="row my-2">
							<div class="col-4">
								<strong>Booked Date: </strong>
							</div>
							<div class="col-8">
								<?= date("d M, Y", strtotime($bookeddate)) ?>
							</div>
						</div>
						
						<div class="row my-2">
							<div class="col-4">
								<strong>Total People: </strong>
							</div>
							<div class="col-8">
								<?= $nooftotalpeople ?>
								<?php if ($noofchild == 0): ?>
									
								<?php else: ?>
									(including <?= $noofchild ?> children)
								<?php endif ?>
							</div>
						</div>

						<div class="row my-2">
							<div class="col-4">
								<strong>Guided by: </strong>
							</div>
							<div class="col-8">
								<?= $tourguidename ?>
							</div>
						</div>				
					</div>
				</div>


				<div class="table-responsive my-4">
				  <table class="table table-hover table-striped table-bordered">
				    <thead>
				    	<tr>
				    		<th colspan="3"><big>Tour Information </big>
				    			<?php if ($status == 'cancelled'): ?>
				    				<span class="badge badge-danger ml-3">This tour has been cancelled.</span>
				    			<?php endif ?>
				    		</th>
				    	</tr>
				    </thead>
				    <tbody>
				    	<tr>
				    		<th>Tour Name: </th>
				    		<td colspan="2"><a href="<?= base_url().'index.php/Tour/detail/'.$tourid.'/approved/'.$tid ?>" class="text-info"><?= $tourname ?> <sup><i class="fas fa-external-link-alt"></i></sup></a></td>
				    	</tr>
				    	<tr>
				    		<th>Tour Type: </th>
				    		<td colspan="2"><?= $tourtypename ?></td>
				    	</tr>
				    	<tr>
				    		<th>Duration: </th>
				    		<td><?= $duration ?> <?php echo ($duration==1) ? ' day' : ' days' ?></td>
				    		<td>
				    			<strong>From: </strong><?= date("d M, Y", strtotime($bookdate)) ?>
				    			<strong class="ml-4">To: </strong><?= date("d M, Y", strtotime($todate)) ?>
				    		</td>
				    	</tr>
				    	<tr>
				    		<th>Tour Price (USD): </th>
				    		<td colspan="2"><?= $totalprice ?></td>
				    	</tr>
				    	<tr>
				    		<th>Start Time & Place: </th>
				    		<td colspan="2"><?= $starttime ?> (<?= $meetingpoint ?>)</td>
				    	</tr>
				    	<?php if ($transportation != ""): ?>
				    		<tr>
				    			<th>Transportaton: </th>
				    			<td colspan="2"><?= $transportation ?></td>
				    		</tr>
				    	<?php endif ?>
				    	<tr>
				    		<th>Tour Route: </th>
				    		<td colspan="2" class="tourroute"><?= $tourroute ?></td>
				    	</tr>
				    	<tr>
				    		<th>Restriction: </th>
				    		<td colspan="2"><?= $restriction ?></td>
				    	</tr>
				    	<tr>
				    		<th>Remark by Traveller: </th>
				    		<td colspan="2"><?= $comment ?></td>
				    	</tr>
				    </tbody>
				  </table>
				</div>
      </div>
    </div>
  </div>