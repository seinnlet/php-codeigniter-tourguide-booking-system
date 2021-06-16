<div class="innerpage-banner">
	<div class="layer1">
	</div>
</div>


<!-- all tour list -->
<section class="tours py-5">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> <?php if (!isset($searchtourguidelist)) {echo 'All';} else {echo 'Searched';} ?> Tour Guides </h3>

	<div class="row">
			<div class="col-md-3">
				<div class="card mb-4">
					<h5 class="p-3 text-white" style="background-color: #f2994a;">Filters</h5>
					<div class="card-body">
						<form method="post" action="<?= base_url().'index.php/Tourguide/search' ?>">
							<p class="text-secondary mb-2"><small>Search by Keyword</small></p>
							<p>
								<div class="form-group">
									<input type="text" name="keyword" placeholder="Enter Keywords" class="form-control rounded py-2 mb-3" value="<?= set_value('keyword') ?>">
								</div>
							</p>
							<p class="text-secondary mb-2"><small>Search by Region</small></p>
							<p>
								<select class="form-control rounded" name="region">
									<option disabled selected>Region</option>
									
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

				<?php if (!isset($searchtourguidelist)): ?>

				<!-- all tours -->
				<div class="row agile_inner_info">
				<?php  
		      $i = 0;
		      foreach ($tourguidelist as $tourguide): 
		      $i++;
		      $tourguideid = $tourguide->tourguideid;
          $tourguidename = $tourguide->tourguidename;
          $regionname = $tourguide->regionname;
          $country = $tourguide->country;
          $profilepicture = $tourguide->profilepicture;
		    ?>

		    	<div class="col-lg-4 col-md-6 w3_agile_services_grid mb-3">
						<div class="card">
							<div class="card-body">

								<img src="<?= base_url().'assets/backend/img/'.$profilepicture ?>" class="w-50 mx-auto rounded-circle d-block">
			      		<div class="card-body text-center p-0">
			      			<h4 class="mt-4"><?= $tourguidename ?></h4>
			      			<p class="font-weight-bold text-secondary"><?= $regionname ?>, <?= $country ?></p>
			      			<hr>
			      			<p class="text-left p-language"><small>
			      				<strong>Language: </strong>
			      				<?php 
			      					foreach ($languagelist as $language) {
			      						switch ($language->level) {
			      							case 1: $level = 'basic';
		                        break;
		                      case 2: $level = 'intermediate';
		                        break;
		                      case 3: $level = 'fluent';
		                        break;
		                      case 4: $level = 'advanced';
		                        break;
			      						}
			      						if ($language->tourguideid == $tourguideid) {
			      							echo '<span>' . $language->name . ' (' . $level . ')</span>';
			      						}
			      					}
			      				?>
			      			</small></p>
				      		<a href="<?= base_url().'index.php/Tourguide/show/'.$tourguideid.'/'.date('Y').'/'.date('m') ?>" class="btn btn-outline-dark btn-block mt-4">View Detail</a>
			      		</div>

							</div>
						</div>
					</div>
					<?php endforeach; ?>
		  	</div>
		  	<?php else: ?>

		  		<!-- searched tourguide -->
					<h4 class="mb-4">Searched Result</h4>
					<?php if (count($searchtourguidelist) == 0): ?>
						
					<div class="row agile_inner_info">
						<div class="font-italic col-12 mb-4">Sorry, there is no matched tour guide for your search...</div>
					</div>

					<?php else: ?>
						<div class="row agile_inner_info">
						<?php  
				      $i = 0;
				      foreach ($searchtourguidelist as $tourguide): 
				      $i++;
				      $tourguideid = $tourguide->tourguideid;
		          $tourguidename = $tourguide->tourguidename;
		          $regionname = $tourguide->regionname;
		          $country = $tourguide->country;
		          $profilepicture = $tourguide->profilepicture;
				    ?>

				    	<div class="col-lg-4 col-md-6 w3_agile_services_grid mb-3">
								<div class="card">
									<div class="card-body">

										<img src="<?= base_url().'assets/backend/img/'.$profilepicture ?>" class="w-50 mx-auto rounded-circle d-block">
					      		<div class="card-body text-center p-0">
					      			<h4 class="mt-4"><?= $tourguidename ?></h4>
					      			<p class="font-weight-bold text-secondary"><?= $regionname ?>, <?= $country ?></p>
					      			<hr>
					      			<p class="text-left p-language"><small>
					      				<strong>Language: </strong>
					      				<?php 
					      					foreach ($languagelist as $language) {
					      						switch ($language->level) {
					      							case 1: $level = 'basic';
				                        break;
				                      case 2: $level = 'intermediate';
				                        break;
				                      case 3: $level = 'fluent';
				                        break;
				                      case 4: $level = 'advanced';
				                        break;
					      						}
					      						if ($language->tourguideid == $tourguideid) {
					      							echo '<span>' . $language->name . ' (' . $level . ')</span>';
					      						}
					      					}
					      				?>
					      			</small></p>
						      		<a href="<?= base_url().'index.php/Tourguide/show/'.$tourguideid.'/'.date('Y').'/'.date('m') ?>" class="btn btn-outline-dark btn-block mt-4">View Detail</a>
					      		</div>

									</div>
								</div>
							</div>
							<?php endforeach; ?>
				  	</div>
					<?php endif ?>
					
					<div class="row mt-4">
						<a href="<?= base_url().'index.php/Tourguide/showall' ?>" class="btn-viewall m-auto">Show all Tour Guides</a>
					</div>
				</div>

		  	<?php endif ?>
			</div>
		</div>
	</div>
</section>