<?php  
	foreach ($detailtour as $tour)
	{
		$tourid = $tour->tourid;
    $tourname = $tour->name;
    $tourguideid = $tour->tourguideid;
    $tourguidename = $tour->tourguidename;
    $tourtypename = $tour->tourtypename;
    $transportationid = $tour->transportationid;
    if ($transportationid != NULL) {
      $transportationname = $tour->transportationname;
      $transportationtype = $tour->transportationtype;
    }
    $transportation = $tour->transportation;
    $tourprice = $tour->tourprice;
    $noofpeoplelimit = $tour->noofpeoplelimit;
    $duration = $tour->duration;
    $image = $tour->image;
    $description = $tour->description;
    $tourroute = $tour->tourroute;
    $restriction = $tour->restriction;
    $meetingpoint = $tour->meetingpoint;
    $endingpoint = $tour->endingpoint;
    $regionname = $tour->regionname;
    $country = $tour->country;
    $status = $tour->status;
    if ($status == 'approved') {
      $staffname = $tour->staffname;
    }
    $created_at = $tour->created_at;
	} 
?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="far fa-clipboard"></i>
        Detail of <?= $tourname ?>
    </h1>
    <p class="mb-4 mt-3">
      <a href="<?php if($this->session->userdata('role') == 'staff') {echo base_url().'index.php/Tour/alltourlist';} else {echo base_url().'index.php/Tour';}?>" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
      <?php if ($this->session->userdata('role') == 'tourguide'): ?>
        <a href="<?php echo base_url().'index.php/Tour/edit/'. $tourid;?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
      <?php endif ?>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Detail Info</h6>
      </div>
      <div class="card-body">
        <div class="row">
        	<div class="col-lg-6 text-center my-3">
        		<img src="<?php echo base_url(); ?>assets/backend/img/tour/<?= $image ?>" class="w-50 shadow rounded" alt="tour image" >
        	</div>

        	<div class="col-lg-6 my-3">
        		<h5 class="text-info font-weight-bold mb-4">Tour Info</h5>
            <div class="row">
              <label class="col-4 col-lg-3 font-weight-bold">Tour ID: </label>
              <div class="col-8 col-lg-9">
                #<?= $tourid ?>
              </div>
            </div>

        		<div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Tour Name: </label>
		          <div class="col-8 col-lg-9">
		            <?= $tourname ?>
		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Created by: </label>
                <div class="col-8 col-lg-9">
                  <?php if ($this->session->userdata('role') == 'staff'): ?>
                    <a href="<?= base_url().'index.php/Tourguide/detail/'.$tourguideid ?>" class="text-info"><?= $tourguidename ?></a>
                  <?php else: ?>
                    <?= $tourguidename ?>
                  <?php endif ?>
  		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Created at: </label>
		          <div class="col-8 col-lg-9">
		            <?= date("d M, Y", strtotime($created_at)) ?>
		          </div>
		        </div>

        	</div>
        </div>

        <hr class="divider">

      	<h5 class="text-info font-weight-bold mb-4 pl-lg-5">Overview</h5>

        <div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Tour type: </label>
          <div class="col-8 col-lg-9">
            <?= $tourtypename ?>
          </div>
        </div>
      	<div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Region: </label>
          <div class="col-8 col-lg-9">
            <?= $regionname." - ".$country ?>
          </div>
        </div>

	      <div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Cost per Tour (USD): </label>
          <div class="col-8 col-lg-9">
            <?= $tourprice ?>
          </div>
        </div>

        <div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Duration: </label>
          <div class="col-8 col-lg-9">
            <?= $duration ?> <?php if ($duration == 1) {echo 'day';} else {echo 'days';} ?>
          </div>
        </div>

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">Description</h5>
      	<div class="row pl-lg-5">
      		<?php if ($description == ""): ?>
      			<p class="font-italic pl-3">Nothing to show</p>
      		<?php else: ?>
      			<p class="font-italic pl-3"><?= $description ?></p>
      		<?php endif ?>
        </div>

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">Meeting Point</h5>
        <div class="row pl-lg-5">
          <?php if ($meetingpoint == ""): ?>
            <p class="font-italic pl-3">Nothing to show</p>
          <?php else: ?>
            <p class="font-italic pl-3"><?= $meetingpoint ?></p>
          <?php endif ?>
        </div>

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">End Point</h5>
        <div class="row pl-lg-5">
          <?php if ($endingpoint == ""): ?>
            <p class="font-italic pl-3">Nothing to show</p>
          <?php else: ?>
            <p class="font-italic pl-3"><?= $endingpoint ?></p>
          <?php endif ?>
        </div>

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">Detail Tour Route</h5>
      	<div class="row pl-lg-5">
      		<?php if ($tourroute == ""): ?>
      			<p class="font-italic pl-3">Nothing to show</p>
      		<?php else: ?>
      			<p class="font-italic pl-3"><?= $tourroute ?></p>
      		<?php endif ?>
        </div>

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">Transportation</h5>
        <div class="row pl-lg-5">
          <?php if ($transportationid == NULL): ?>
            <p class="font-italic pl-3"><?= $transportation ?></p>
          <?php else: ?>
            <p class="font-italic pl-3"><?= $transportationname.' - '.$transportationtype ?> (supported by locals one)</p>
          <?php endif ?>
        </div>

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">Restriction</h5>
        <div class="row pl-lg-5">
          <?php if ($restriction == ""): ?>
            <p class="font-italic pl-3">Nothing to show</p>
          <?php else: ?>
            <p class="font-italic pl-3"><?= $restriction ?></p>
          <?php endif ?>
        </div>

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">Confirm Info</h5>
        <div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Status: </label>
          <div class="col-8 col-lg-9">
            <?php if ($status == 'appending'): ?>
              <span class="text-warning font-weight-bold"><?= $status ?></span>
            <?php else: ?>
              <span class="text-success font-weight-bold"><?= $status ?></span>
            <?php endif ?>
          </div>
        </div>
        <?php if ($status == 'approved'): ?>
          <div class="row pl-lg-5">
            <label class="col-4 col-lg-3 font-weight-bold">Approved by: </label>
            <div class="col-8 col-lg-9">
              <?= $staffname ?>
            </div>
          </div>
        <?php endif ?>
        
        <?php if (($this->session->userdata('role') == 'staff') && ($status == 'appending')): ?>
          <div class="row pl-lg-5">
            <label class="col-4 col-lg-3 font-weight-bold">Approved by: </label>
            <div class="col-8 col-lg-9">
              <input type="text" name="name" value="<?= $this->session->userdata('staffname') ?>" class="form-control bg-white w-75" readonly>
            </div>
          </div>
          <div class="row pl-lg-5">
            <label class="col-4 col-lg-3 font-weight-bold"></label>
            <div class="col-8 col-lg-9">
              <a href="<?php echo base_url().'index.php/Tour/approve/'.$tourid.'/'.$this->session->userdata('staffid'); ?>" class="btn btn-outline-success my-3">Approve Now</a>
            </div>
          </div>
        <?php endif ?>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->