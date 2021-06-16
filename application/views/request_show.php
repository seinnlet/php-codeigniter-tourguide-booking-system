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
		$email = $detail->email;

		$tourguideid = $detail->tourguideid;
		$tourguidename = $detail->tourguidename;
		$regionname = $detail->regionname;
		$country = $detail->country;
	}
?>

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-phone-volume"></i> Request ID #R_<?= $requestid ?>	</h1>
    <p class="mb-4 mt-3">
    	<?php if ($this->session->userdata('role') == 'staff'): ?>
    		<a href="<?php echo base_url(); ?>index.php/Request/showall" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    	<?php else: ?>
    		<a href="<?php echo base_url(); ?>index.php/Request" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
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
								<a href="tel: <?= $phone ?>" class="text-dark"><?= $phone ?></a> | 
								<a href="mailto: <?= $email ?>" class="text-dark"><?= $email ?></a>
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
						<h5 class="font-weight-bold">Tour Guide Info</h5>
						<hr style="border: 1px solid #36b9cc;" class="ml-0 w-25 rounded">

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
								<?= $tourguidename ?>
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
				    		<th colspan="3"><h5 class="font-weight-bold">
				    			<?php if ($this->session->userdata('role') == 'staff'): ?>
				    				Tour Guide's Reply
				    			<?php else: ?>
				    				My Reply 
				    			<?php endif ?>
				    			
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
				    	<?php if ($status != "appending" || $status == "cancelled by user"): ?>
				    		<tr>
				    			<th width="200">Reply:</th>
				    			<td>
				    				<?= $tourguidereply ?>
				    			</td>
				    		</tr>
				    	<?php else: ?>
				    		<?php if ($this->session->userdata('role') == 'staff'): ?>
				    			<tr>
				    				<th>Reply:</th>
				    				<td><span class="font-italic">Tour guide haven't replied.</span></td>
				    			</tr>
				    		<?php else: ?>
				    			<tr>
					    			<th>Reply:</th>
					    			<td>
					    				<form action="<?= base_url().'index.php/Request/cancel/'.$requestid ?>" method="post">
					    					<textarea class="form-control" placeholder="To reply traveller..." rows="7" name="reply"></textarea>
					    					<div class="mt-3">
						    					<input type="submit" name="btnsubmit" value="Confirm Request" class="btn btn-info">
						    					<input type="submit" name="btncancel" value="Cancel this Request" class="btn btn-outline-danger" onclick="return confirm('Are you Sure to Cancel?')">
					    					</div>
					    				</form>
					    			</td>
					    		</tr>
				    		<?php endif ?>
					    		
				    	<?php endif ?>
				    </tbody>
				  </table>
				</div>
			</div>
	  </div>
	</div>
			