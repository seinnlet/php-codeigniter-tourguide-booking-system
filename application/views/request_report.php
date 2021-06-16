<?php 
  if ($this->session->userdata('role') == '') {
    echo "<script>alert('Please Log in First!')</script>";
    redirect(base_url() . 'index.php/Login', 'refresh');
  }
  else if ($this->session->userdata('role') != 'staff') {
    echo "<script>alert('You do not have permission to access this page!')</script>";
    redirect(base_url() . 'index.php/Login', 'refresh');
  }

  	$reportname = $report['name'];
  	$fromdate = $report['fromdate'];
  	$todate = $report['todate'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Report | Locals One Tour Guide Booking System</title>

  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/logo.png">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

  <style type="text/css">
    body, .form-control, th, td {
      color: #555 !important;
    }
  </style>

</head>

<body>
	<div class="container py-4">
		
		<h3 class="text-center mb-4">Tour Guide Booking: <?= $reportname ?></h3>

		<p class="font-weight-bold">Locals One Tour Guide Agency</p>
			
		<table class="mb-3" border="0">
			<tr>
				<td class="pr-3"><strong>Date: </strong></td>
				<td>From : <?= $fromdate ?> | To : <?= $todate ?></td>
			</tr>
			<?php if (!isset($report['region']) && !isset($report['status'])): ?>
				<tr>
					<td class="pr-3"><strong>Filter: </strong></td>
					<td>No filter is used.</td>
				</tr>
			<?php endif ?>

			<?php if (isset($report['region'])): ?>
				<tr>
					<td class="pr-3"><strong>Region: </strong></td>
					<td><?= $report['region'] ?></td>
				</tr>
			<?php endif ?>

			<?php if (isset($report['status'])): ?>
				<tr>
					<td class="pr-3"><strong>Status: </strong></td>
					<td><?= $report['status'] ?> tour</td>
				</tr>
			<?php endif ?>
			<tr>
				<td class="pr-3"><strong>Reported by:</strong></td>
				<td><?= $this->session->userdata('staffname'); ?></td>
			</tr>
			<tr>
				<td class="pr-3"><strong>Reported Date:</strong></td>
				<td><?= date('d M, Y') ?></td>
			</tr>
		</table>

		<?php if (count($requestlist) == 0): ?>
			<p class="text-center font-italic">No Result.</p>
		<?php else: ?>
			<table class="table table-bordered table-hover">
			  <thead>
			    <tr class="table-info">
			      <th scope="col">RequestID</th>
			      <th scope="col">Traveller</th>
			      <th scope="col">Travel To</th>
			      <th scope="col">Tour Date</th>
			      <th scope="col">Tour Guide</th>
			      <th scope="col">Feesperday</th>
			      <th scope="col">Status</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php  
	          $i = 0;
	          foreach ($requestlist as $request): 
	          $i++;
	          $id = $request->requestid;
	          $traveller = $request->username;
	          $usercountry = $request->usercountry;
	          $startdate = $request->startdate;
	          $duration = $request->duration;
	          $status = $request->status;
	          $tourguide = $request->tourguidename;
	          $region = $request->regionname;
	          $country = $request->country;
	          $cost = $request->feesperday;
	        ?>
	        	<tr>
	        		<td>R_<?= $id ?></td>
	        		<td><?= $traveller ?><br><small>(from <?= $usercountry ?>)</small></td>
	        		<td><?= $region ?>, <?= $country ?></td>
	        		<td><?= date('d M, Y', strtotime($startdate)) ?> <br><small>(<?= $duration ?> <?php echo ($duration==1) ? ' day' : ' days' ?>)</small></td>
	        		<td><?= $tourguide ?></td>
	        		<td>USD.<?= $cost ?></td>
	        		<td><?= $status ?></td>
	        	</tr>
	      <?php endforeach ?>
			  </tbody>
			</table>

			<div class="text-right my-4">
		<script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 1;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='2';(function(){var js,pf;pf=document.createElement('script');pf.type='text/javascript';pf.src='//cdn.printfriendly.com/printfriendly.js';document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="https://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="//cdn.printfriendly.com/buttons/print-button.png" alt="Print Friendly and PDF"/></a>
		</div>
		<?php endif ?>

			

		
	</div>


	<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>