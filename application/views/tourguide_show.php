<?php  
	foreach ($showtourguide as $tourguide)
	{
		$tourguideid = $tourguide->tourguideid;
		$tourguidename = $tourguide->tourguidename;
		$regionname = $tourguide->regionname;
		$country = $tourguide->country;
		$level = $tourguide->level;
		$profilepicture = $tourguide->profilepicture;
		$description = $tourguide->description;
		$credentials = $tourguide->credentials;
		$experience = $tourguide->experience;
		$feesperday = $tourguide->feesperday;
	} 
	foreach ($avgrate as $avg)
	{
		$averagerate = $avg->avg_r;
	}
?>

<div class="innerpage-banner">
  <div class="layer1">
  </div>
</div>

<section class="tours py-5">
  <div class="container py-3">
  <h3 class="heading text-center mb-md-5 mb-4"> Meet Our Tour Guides </h3>
  	<div class="row">
      <div class="col-md-4 order-2">
		  	<!-- review and language skills -->
		  	<div class="card">
		      <h5 class="p-3 font-weight-bold" style="background-color: #f9f9f9; color: #f2994a; font-size: 19px; letter-spacing: 1px;">Review</h5>

		      <div class="text-center">
		      	<h6 class="font-weight-bold mb-3 mt-4">
		      		<?php 
		      			for ($i=0; $i < 5; $i++) { 
		      				echo "<i class='fa fa-star pr-1' style='color: #F8D32D;'></i>";
		      			}
		      		?>
		      		<span class="pl-2"><?= $averagerate ?></span>
		      	</h6>
		      	<p class="text-secondary">(<?= count($ratelist) ?> <?php echo (count($ratelist)==1) ? ' review' : ' reviews' ?>)</p>
		      	<p><button class="btn btn-link text-dark font-weight-bold mb-3" data-toggle="modal" data-target="#reviewmodal">View Reviews</button></p>
		      </div>

		    </div>

		  	<div class="card my-3">
		      <h5 class="p-3 font-weight-bold" style="background-color: #f9f9f9; color: #f2994a; font-size: 19px; letter-spacing: 1px;">Language Skills</h5>

	      	<div class="p-3 my-3">
	      		<?php if (count($detaillanguagelist) == 0): ?>
	          <div class="row pl-lg-5">
	            <p class="font-italic pl-3">Nothing to show</p>
	          </div>
	          <?php else: ?>
	            <?php  
	              $i = 0;
	              foreach ($detaillanguagelist as $d_language): 
	              $i++;
	              $tourguideid = $d_language->tourguideid;
	              $languageid = $d_language->languageid;
	              $languagename = $d_language->name;
	              $level = $d_language->level;
	            ?>
	            <div class="row mb-3">
	              <span class="col-4 font-weight-bold pl-4" style="font-size: 14px;"><?= $languagename ?></span>
	              <div class="col-8 pl-0">
	                <div class="d-inline-block" style="width: 130px">
	                  <?php for ($i=0; $i < $level; $i++) { ?>
	                    <span style="height: 13px; width: 28px" class="bg-info d-inline-block"></span>
	                  <?php } ?>
	                  
	                  <?php for ($i=0; $i < (4-$level); $i++) { ?>
	                    <span style="height: 13px; width: 28px; background-color: #ddd;" class="d-inline-block"></span>
	                  <?php } ?>
	                </div>
	                	<small>
	                  <?php 
	                    switch ($level) {
	                      case 1:
	                        echo 'basic';
	                        break;
	                      case 2:
	                        echo 'intermediate';
	                        break;
	                      case 3:
	                        echo 'fluent';
	                        break;
	                      case 4:
	                        echo 'advanced';
	                        break;
	                    }
	                  ?>
	                  </small>
	              </div>
	            </div>
	            <?php endforeach; ?>
	          <?php endif ?>
	        
	      	</div>
				</div>

				<!-- contact -->
				<div class="card my-3">
		      <h5 class="p-3 font-weight-bold" style="background-color: #f9f9f9; color: #f2994a; font-size: 19px; letter-spacing: 1px;">Contact Me</h5>

		      <div class="p-3 text-center mx-auto calendar">
            <?php echo $calendar ?>
          </div>
		    	
		    	<div class="py-4 text-center">
            <a href="<?= base_url().'index.php/Request/calendar/'.$tourguideid.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ?>" class="btn-viewall w-75 mb-3">Contact Now</a>
          </div>
		    </div>

		 	</div>

  	<!-- about tour guide -->
	  	<div class="col-md-8 order-1"> 
	      <h4 class="font-weight-bold">Detail Info</h4>
	      <hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">

	      <div class="row mb-3">
	      	<div class="col-4">
	      		<img src="<?= base_url().'assets/backend/img/'.$profilepicture ?>" class="w-100 rounded">
	      	</div>
	      	<div class="col-8 pl-lg-5">
	      		<h5 class="font-weight-bold mb-2"><?= $tourguidename ?></h5>
	      		<p class="text-dark"><?= $regionname ?>, <?= $country ?></p>

	      		<hr class="w-50 ml-0">

	      		<div class="row my-2">
		          <div class="col-5 col-lg-4 font-weight-bold">Experience: </div>
		          <div class="col-7 col-lg-8"><?= $experience ?></div>
		        </div>

		        <div class="row my-2">
		          <div class="col-5 col-lg-4 font-weight-bold">Level: </div>
		          <div class="col-7 col-lg-8"><?= $level ?></div>
		        </div>

		        <div class="row my-2">
		          <div class="col-5 col-lg-4 font-weight-bold">Fees per Day: </div>
		          <div class="col-7 col-lg-8 text-orange font-weight-bold">USD <?= $feesperday ?></div>
		        </div>
	      	</div>
	      </div>

	      <h4 class="mt-5 font-weight-bold">Description</h4>
	      <hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">
	      <div class="blog-description"><?= $description ?></div>

	      <h4 class="mt-5 font-weight-bold">Credentials</h4>
	      <hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">
	      <div style="line-height: 30px" class="mb-5"><?= $credentials ?></div>

			</div>
		</div>

		<!-- tours -->
		<h3 class="heading text-center mb-md-5 my-4"> Tours by <?= $tourguidename ?> </h3>

		<div class="row">
			<?php if (count($tourlist) == 0): ?>
				<p class="font-italic mx-auto">Nothing to show...</p>
			<?php else: ?>
				<?php  
		      $i = 0;
		      foreach ($tourlist as $tour): 
		      $i++;
		      $tourid = $tour->tourid;
		      $tourname = $tour->name;
		      $tourtypename = $tour->tourtypename;
		      $tourprice = $tour->tourprice;
		      $noofpeoplelimit = $tour->noofpeoplelimit;
		      $image = $tour->image;
		      $description = $tour->description;
		      $regionname = $tour->regionname;
		      $country = $tour->country;
		      $duration = $tour->duration;
		    ?>
				<div class="col-lg-4 col-md-6 w3_agile_services_grid mb-3">
					<div class="card">
						<div class="agile_services_grid">
							<div class="hover06 column">
								<div>
									<figure><img src="<?php echo base_url(); ?>assets/backend/img/tour/<?= $image ?>" alt="tour image" class="img-responsive"></figure>
								</div>
							</div>
							<div class="agile_services_grid_pos">
								<i class="fa fa-globe" aria-hidden="true"></i>
							</div>
						</div>
						<div class="card-body">
							<h4 style="font-size: 1em; letter-spacing: 2px; margin: 1em 0 0.5em;"><?= $tourname ?></h4>
							<p class="mt-3">
								<span class="font-weight-bold text-uppercase"><?= $regionname ?>, <?= $country ?> </span>
								<br>(<?= $tourtypename ?>)
							</p>
							<p class="my-3">
								<small>Duration: <?= $duration ?> <?php echo ($duration==1) ? 'day' : 'days' ?></small>
								<span class="text-success font-italic"><small>(Up to <?= $noofpeoplelimit ?> people)</small></span>
							</p>
							<p class="text-right">
								<span class="text-price  text-orange"><?= $tourprice ?> USD</span> <span class="text-orange">PER TOUR</span>
							</p>
							<a href="<?= base_url().'index.php/Tour/show/'.$tourid.'/'.date('Y').'/'.date('m') ?>" class="btn btn-outline-dark btn-block mt-4"> View Detail</a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			<?php endif ?>
		</div>

		<div class="row mt-4">
			<a href="<?= base_url().'index.php/Tourguide/showall' ?>" class="btn-viewall m-auto">View Other Tour Guides</a>
		</div>

	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="reviewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
      	<?php  
		      $i = 0;
		      foreach ($ratelist as $rate): 
		      $i++;
		      $username = $rate->username;
		      $profilepicture = $rate->profilepicture;
		      $rating = $rate->rating;
		      $feedback = $rate->feedback;
		      $date = date('d M, Y', strtotime($rate->date));
		    ?>
       	<div class="row">
					<div class="col-2">
					  <img src="<?= base_url().'assets/frontend/images/profile/'.$profilepicture ?>" class="rounded-circle" alt="profile">
					</div>
					<div class="col-10">
						<h6 class="font-weight-bold"><?= $username ?></h6>
						<small class="mt-2 font-italic text-gray-dark"><?= $date ?></small>
					</div>
       	</div>
       	<div class="row">
       		<div class="col-12">
		    		<p class="py-3">"<?= $feedback ?>"</p>
		    		<p class="text-right"><small><?php 
		    			for ($i=0; $i < 5; $i++) { 
		    				echo "<i class='fa fa-star pr-1' style='color: #F8D32D;'></i>";
		    			}
		    		?>
		    		<span class="pl-2 font-weight-bold"><?= $rating ?></span></small></p>
		    		<hr>
		    	</div>
       	</div>
       	<?php endforeach; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>