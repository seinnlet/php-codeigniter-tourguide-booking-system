<?php  
	foreach ($detailrequest as $detail)
	{
		// request
		$requestid = $detail->requestid;
		$startdate = $detail->startdate;
		$enddate = $detail->enddate;
		$duration = $detail->duration;
		$created_at = $detail->created_at;
		$today = date('Y-m-d');
		$cancelabledate = date('Y-m-d', strtotime($created_at))." + 1 day";
		$cancelabledate = date('Y-m-d', strtotime($cancelabledate));
		$tourdescription = $detail->tourdescription;
		$totalpeople = $detail->totalpeople;
		$message = $detail->message;
		$status = $detail->status;
		$tourguidereply = $detail->tourguidereply;

		$username = $detail->username;
		$usercountry = $detail->usercountry;
		$phone = $detail->phone;

		$tourguideid = $detail->tourguideid;
		$tourguidename = $detail->tourguidename;
		$regionname = $detail->regionname;
		$country = $detail->country;
	}
?>

<div class="innerpage-banner">
	<div class="layer1">
	</div>
</div>

<section class="py-5" id="bookingdetail">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> Contact Detail </h3>

		<div class="card p-4">
			<div class="row">
				<div class="col-md-6">
					<h5 class="font-weight-bold">Traveller Info</h5>
					<hr style="border: 1px solid #f2994a;" class="ml-0 w-25 rounded">

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
							<strong>Phone: </strong>
						</div>
						<div class="col-8">
							<?= $phone ?>
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

				<!-- tourguide info -->
				<div class="col-md-6">
					<h5 class="font-weight-bold">Tour Guide Info</h5>
					<hr style="border: 1px solid #f2994a;" class="ml-0 w-25 rounded">

					<div class="row my-2">
						<div class="col-4">
							<strong>Request ID: </strong>
						</div>
						<div class="col-8">
							R_<?= $requestid ?>
						</div>
					</div>

					<div class="row my-2">
						<div class="col-4">
							<strong>Contacted Date: </strong>
						</div>
						<div class="col-8">
							<?= date("d M, Y", strtotime($created_at)) ?>
						</div>
					</div>
					
					<div class="row my-2">
						<div class="col-4">
							<strong>From: </strong>
						</div>
						<div class="col-8">
							<?= $regionname ?> - <?= $country ?>
						</div>
					</div>

					<div class="row my-2">
						<div class="col-4">
							<strong>Guided by: </strong>
						</div>
						<div class="col-8">
							<a href="<?= base_url().'index.php/Tourguide/show/'.$tourguideid.'/'.date('Y').'/'.date('m') ?>"><?= $tourguidename ?> <sup><i class="fa fa-external-link"></i></sup></a>
						</div>
					</div>				
				</div>
			</div>

			<div class="table-responsive my-4">
			  <table class="table table-hover table-striped table-bordered">
			    <thead>
			    	<tr>
			    		<th colspan="3"><h5 class="font-weight-bold">Tour Information 
			    			<?php if ($status == 'cancelled by user'): ?>
			    				<span class="badge badge-danger ml-3"><small>This tour has been cancelled by user.</small></span>
			    			<?php endif ?>
			    			</h5>
			    		</th>
			    	</tr>
			    </thead>
			    <tbody>
			    	<tr>
			    		<th>Duration: </th>
			    		<td><?= $duration ?> <?php echo ($duration==1) ? ' day' : ' days' ?></td>
			    		<td>
			    			<strong>From: </strong><?= date("d M, Y", strtotime($startdate)) ?>
			    			<strong class="ml-4">To: </strong><?= date("d M, Y", strtotime($enddate)) ?>
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>Total People: </th>
			    		<td colspan="2"><?= $totalpeople ?></td>
			    	</tr>
			    	<tr>
			    		<th>Tour Description: </th>
			    		<td colspan="2"><?= $tourdescription ?></td>
			    	</tr>
			    	<tr>
			    		<th>Message: </th>
			    		<td colspan="2"><?= $message ?></td>
			    	</tr>
			    </tbody>
			  </table>
			</div>

			<div class="table-responsive my-4">
			  <table class="table table-hover table-striped table-bordered">
			    <thead>
			    	<tr>
			    		<th colspan="3"><h5 class="font-weight-bold">Tour Guide Reply 
			    			<?php if ($status == 'cancelled by tour guide'): ?>
			    				<span class="badge badge-danger ml-3"><small>This tour has been cancelled by tour guide.</small></span>
			    			<?php endif ?>
			    			</h5>
			    		</th>
			    	</tr>
			    </thead>
			    <tbody>
			    	<tr>
			    		<th width="200">Tour Status: </th>
			    		<td>
			    			<?php if ($status == 'appending'): ?>
		          		<span class="badge badge-info" style="letter-spacing: 1px"><?= $status ?></span>
		          	<?php elseif($status == 'accepted'): ?>
		          		<span class="badge badge-success" style="letter-spacing: 1px"><?= $status ?></span>
		          	<?php else: ?>
		          		<span class="badge badge-danger" style="letter-spacing: 1px">Cancelled</span>
		          	<?php endif ?>	
			    		</td>
			    	</tr>
			    	<?php if ($status != "appending"): ?>
			    		<tr>
			    			<th width="200">Reply:</th>
			    			<td>
			    				<?= $tourguidereply ?>
			    			</td>
			    		</tr>
			    	<?php endif ?>
			    </tbody>
			  </table>
			</div>

			<div class="row text-center my-3">
				<div class="col-12">
					<?php if ($today <= $cancelabledate && $status != 'cancelled by user' && $status != 'cancelled by tour guide'): ?>
						<a href="<?= base_url().'index.php/Request/cancel/'.$requestid ?>" class="btn btn-outline-info w-25 py-2 mb-3" onclick="return confirm('Are you Sure to Cancel?')">Cancel This Request</a>
					<?php endif ?>
					<a href="<?= base_url().'index.php/Booking/bookinglist' ?>" class="btn btn-outline-secondary w-25 py-2 mb-3">Back</a>
				</div>
			</div>
		</div>
	</div>
</section>