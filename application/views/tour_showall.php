<div class="innerpage-banner">
	<div class="layer1">
	</div>
</div>

<!-- all tour list -->
<section class="tours py-5">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> <?php if (!isset($searchtourlist)) {echo 'All';} else {echo 'Searched';} ?> Tours </h3>
		<div class="row">
			<div class="col-md-3">
				<div class="card mb-4">
					<h5 class="p-3 text-white" style="background-color: #f2994a;">Filters</h5>
					<div class="card-body">
						<form method="post" action="<?= base_url().'index.php/Tour/search' ?>">
							<p class="text-secondary mb-2"><small>Search by Tour Type</small></p>
							<p>
								<div class="form-group">
									<select class="form-control rounded" name="tourtype">
										<option selected disabled>Tour Type</option>
										<?php  
			                $i = 0;
			                foreach ($tourtypelist as $tourtype): 
			                $i++;
			                $tourtypeid = $tourtype->tourtypeid;
			                $tourtypename = $tourtype->name;
			              ?>
			              <option value="<?= $tourtypeid ?>" <?php if(set_value('tourtype')==$tourtypeid) echo 'selected' ?>><?= $tourtypename ?></option>
			              <?php endforeach; ?>
									</select>
								</div>
							</p>
							<p class="text-secondary mb-2"><small>Search by Region</small></p>
							<p>
								<select class="form-control rounded" name="region">
									<option disabled selected>Destination</option>
									
									<?php  
		                $i = 0;
		                foreach ($regionlist as $region): 
		                $i++;
		                $regionid = $region->regionid;
		                $regionname = $region->regionname;
		                $country = $region->country;
		              ?>
		              <option value="<?= $regionid ?>" <?php if(set_value('region')==$regionid) echo 'selected' ?>><?= $regionname ?> - <?= $country ?></option>
		              <?php endforeach; ?>

								</select>
							</p>
							<p>
								<input type="submit" name="btnsearch"	value="Search" class="btn btn-outline-secondary btn-block mt-4">
							</p>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				
			
			<?php if (!isset($searchtourlist)): ?>

				<!-- all tours -->
				<div class="row agile_inner_info">
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
			</div>
			<?php else: ?>
					
				<!-- searched tour -->
				<h4 class="mb-4">Searched Result</h4>
				<div class="row agile_inner_info">
				<?php if (count($searchtourlist) == 0): ?>
					
					<div class="font-italic col-12 mb-4">Sorry, there is no matched tour for your search...</div>

				<?php else: ?>
					
					<?php  
			      $i = 0;
			      foreach ($searchtourlist as $tour): 
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
				<div class="row">
					<a href="<?= base_url().'index.php/Tour/showall' ?>" class="btn-viewall m-auto">Show all Tours</a>
				</div>
				<?php endif ?>
				
		
		</div>
			</div>
		</div>
	</div>
</section>