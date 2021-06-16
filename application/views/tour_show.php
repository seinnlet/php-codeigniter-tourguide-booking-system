<?php  
	foreach ($showtour as $tour)
	{
		$tourid = $tour->tourid;
    $tourname = $tour->name;
    $tourguideid = $tour->tourguideid;
    $tourguidename = $tour->tourguidename;
    $tourguidedescription = $tour->tourguidedescription;
    $profilepicture = $tour->profilepicture;
    $tourtypename = $tour->tourtypename;
    $transportationid = $tour->transportationid;
    if ($transportationid != NULL) {
      $transportationname = $tour->transportationname;
      $transportationtype = $tour->transportationtype;
      $facility = $tour->facility;
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
  }
?>

<div class="innerpage-banner">
  <div class="layer1">
  </div>
</div>

<section class="tours py-5">
  <div class="container py-3">
  <h3 class="heading text-center mb-md-5 mb-4"> <?= $tourname ?> </h3>
    <div class="row">
      <div class="col-md-4 order-2">
        <!-- tour guide information -->
        <div class="card">
          <h5 class="p-3 font-weight-bold" style="background-color: #f9f9f9; color: #f2994a; font-size: 19px; letter-spacing: 1px;">Guided by</h5>

          <div class="text-center p-3">
            <img src="<?= base_url().'assets/backend/img/'.$profilepicture ?>" style="width: 100px; height: 100px;" class="rounded-circle">
            <h6 class="my-3" style="letter-spacing: 2px"><a href="<?= base_url().'index.php/Tourguide/show/'.$tourguideid.'/'.date('Y').'/'.date('m') ?>" class="text-dark font-weight-bold text-uppercase"><?= $tourguidename ?></a></h6>
            <div class="module line-clamp" style="line-height: 25px; font-size: 14px !important;">
              <p class="description"><?= $tourguidedescription ?></p>
            </div>
          </div>

          <div class="px-3 pt-0 pb-4">
            <a href="<?= base_url().'index.php/Tourguide/show/'.$tourguideid.'/'.date('Y').'/'.date('m') ?>" class="btn btn-outline-secondary btn-block">View Detail</a>
          </div>
        </div>

        <!-- booking information -->
        <div class="card my-4">
          <h5 class="p-3 font-weight-bold" style="background-color: #f9f9f9; color: #f2994a; font-size: 19px; letter-spacing: 1px;">Booking</h5>

          <div class="p-3 text-center mx-auto calendar">
            <?php echo $calendar ?>
          </div>

          <div class="py-4 text-center">
            <a href="<?= base_url().'index.php/Booking/calendar/'.$tourid.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ?>" class="btn-viewall w-75">Book Now</a>
          </div>
        </div>

        <!-- tour summary -->
        <div class="card my-4">
          <h5 class="p-3 font-weight-bold" style="background-color: #f9f9f9; color: #f2994a; font-size: 19px; letter-spacing: 1px;">Tour Summary</h5>
          <div class="card-body p-3 text-center">
            <h5 class="mb-3"><span class="font-weight-bold">Tour Price :</span> <?= $tourprice ?> USD</h5>
            <p class="mb-3"><span class="font-weight-bold">Duration :</span> <?= $duration ?> <?php echo ($duration==1) ? ' day' : ' days' ?></p>
            <p class="mb-3">(up to <?= $noofpeoplelimit ?> people)</p>
          </div>
        </div>

      </div>
      <div class="col-md-8 order-1"> 
        <h4 class="font-weight-bold">Detail Info</h4>
        <hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">

        <img src="<?= base_url().'assets/backend/img/tour/'.$image ?>" class="rounded tourimage">
        <p class="mb-3"><?= $description ?></p>

        <div class="row my-2">
          <div class="col-3 font-weight-bold">Region: </div>
          <div class="col-9"><?= $regionname.', '.$country ?></div>
        </div>
        <div class="row my-2">
          <div class="col-3 font-weight-bold">Tour Type: </div>
          <div class="col-9"><?= $tourtypename ?></div>
        </div>
        <div class="row my-2">
          <div class="col-3 font-weight-bold">Cost (USD) : </div>
          <div class="col-9"><?= $tourprice ?></div>
        </div>
        <div class="row my-2">
          <div class="col-3 font-weight-bold">Duration : </div>
          <div class="col-9"><?= $duration ?> <?php echo ($duration==1) ? ' day' : ' days' ?></div>
        </div>
        <div class="row my-2">
          <div class="col-3 font-weight-bold">Up to : </div>
          <div class="col-9"><?= $noofpeoplelimit ?> people</div>
        </div>

        <h4 class="mt-5 font-weight-bold">Tour Route</h4>
        <hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">
        <p><?= $tourroute ?></p>

        <h4 class="mt-5 font-weight-bold">Meeting Point + Ending Point</h4>
        <hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">
        <p>Meeting Point : <?= $meetingpoint ?><br>Ending Point: <?= $endingpoint ?></p>

        <h4 class="mt-5 font-weight-bold">Transportation</h4>
        <hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">
        <p>
          <?php if ($transportationid): ?>
            <?= $transportationtype.' - '.$transportationname.' ('.$facility.')' ?>
          <?php else: ?>
            <?= $transportation ?>
          <?php endif ?>
          
          
        </p>

        <h4 class="mt-5 font-weight-bold">Restriction</h4>
        <hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">
        <p><?= $restriction ?></p>
      </div>
    </div>
  </div>
</section>