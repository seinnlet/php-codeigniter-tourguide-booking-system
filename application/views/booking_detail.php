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
    $usercountry = $detail->usercountry;
  }
?>

<div class="innerpage-banner">
	<div class="layer1">
	</div>
</div>

<section class="py-5" id="bookingdetail">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> Booking Detail </h3>

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
							<?= $userphone ?>
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
					<hr style="border: 1px solid #f2994a;" class="ml-0 w-25 rounded">

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
			    			<?php if ($status == 'cancelled'): ?>
			    				<span class="badge badge-danger ml-3"><small>This tour has been cancelled.</small></span>
			    			<?php endif ?>
			    			</h5>
			    		</th>
			    	</tr>
			    </thead>
			    <tbody>
			    	<tr>
			    		<th>Tour Name: </th>
			    		<td colspan="2"><?= $tourname ?></td>
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

			<div class="row text-center my-3">
				<div class="col-12">
					<?php if ($today <= $cancelabledate && $status != 'cancelled'): ?>
						<button type="button" class="btn btn-outline-info w-25 py-2 mb-3"  data-toggle="modal" data-target="#cancelModal">Cancel This Booking</button>
					<?php endif ?>
					<a href="<?= base_url().'index.php/Booking/bookinglist' ?>" class="btn btn-outline-secondary w-25 py-2 mb-3">Back</a>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">Are you Sure to Cancel this Booking?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  			<form method="post" action="<?= base_url().'index.php/Booking/cancel/'.$bookingid ?>">
        	<p class="font-italic mt-2">Locals One allows to cancel booking within 24 hours.</p>

        	<input type="hidden" name="bookingid" value="<?= $bookingid ?>">
        	<div class="row my-4">
        		<div class="col-md-2"><label class="col-form-label">Reason: </label></div>
        		<div class="col-md-10">
        			<textarea class="form-control rounded" required rows="3" name="reason"></textarea>
        		</div>
        	</div>

        	<div class="row my-3">
        		<div class="col-12 text-right">
        			<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        			<button type="submit" class="btn btn-info">Confirm</button>
        		</div>
        	</div>

    		</form>
      </div>
    </div>
  </div>
</div>
