<!-- banner-text -->
	<div class="slider">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="banner-top">
					<div class="layer">
						<div class="container">
							<div class="banner-info_agile_w3ls">
								<h3>Let's Find Some <span>Beautiful</span> Place.</h3>
								<p>Connecting Travellers to Local Guides Around the World.</p>
								<a href="<?php echo base_url().'index.php/Tourguide/showall' ?>" class="mr-2">Book Tour Guides <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								<a href="<?php echo base_url().'index.php/Contact' ?>">Contact Us <i class="fa fa-caret-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					</div>
				</li>
				<li>
					<div class="banner-top1">
					<div class="layer">
						<div class="container">
							<div class="banner-info_agile_w3ls">
								<h3>Best travel agency <span> Inspire</span> You.</h3>
								<p>Connecting Travellers to Local Guides Around the World.</p>
								<a href="<?php echo base_url().'index.php/Tourguide/showall' ?>" class="mr-2">Book Tour Guides <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								<a href="<?php echo base_url().'index.php/Contact' ?>">Contact Us <i class="fa fa-caret-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					</div>
				</li>
				<li>
					<div class="banner-top2">
					<div class="layer">
						<div class="container">
							<div class="banner-info_agile_w3ls">
								<h3>Book Directly with <span>Locals</span> to Explore.</h3>
								<p>Connecting Travellers to Local Guides Around the World.</p>
								<a href="<?php echo base_url().'index.php/Tourguide/showall' ?>" class="mr-2">Book Tour Guides <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								<a href="<?php echo base_url().'index.php/Contact' ?>">Contact Us <i class="fa fa-caret-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					</div>
				</li>
				<li>
					<div class="banner-top3">
					<div class="layer">
						<div class="container">
							<div class="banner-info_agile_w3ls">
								<h3>Travelling Is like <span>Breathing</span>.</h3>
								<p>Connecting Travellers to Local Guides Around the World.</p>
								<a href="<?php echo base_url().'index.php/Tourguide/showall' ?>" class="mr-2">Book Tour Guides <i class="fa fa-caret-right" aria-hidden="true"></i></a>
								<a href="<?php echo base_url().'index.php/Contact' ?>">Contact Us <i class="fa fa-caret-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
		
		<!-- Social Icons -->
		<div class="w3_agileits_social_media">
			<ul>
				<li><a href="https://facebook.com/" class="wthree_facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="https://twitter.com/" class="wthree_twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				<li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<!-- //Social Icons -->
	
		<p class="ab">connect with us</p>
	</div>
<!--//Slider-->
		

<!-- booking form -->
<section class="booking py-5" id="booking">
	<h3 class="text-center mb-4">Search Your Tour</h3>
	<div class="container">
		<div class="book-form">
		  <form action="<?= base_url().'index.php/Tour/search' ?>" method="post">
			<div class="row">
				
				<div class="col-md-4 col-12 px-2 form-left-agileits-w3layouts editContent">
						<label class="editContent"><span class="fa fa-search" aria-hidden="true"></span> Keyword</label>
					<div class="agileits_w3layouts_main_gridl">
						<input name="keyword" type="text" placeholder="What are you looking for?">
					</div>
				</div>

				<div class="col-lg-3 col-md-4 col-sm-6 col-6 px-2 form-time-w3layouts editContent">
						<label class="editContent"><span class="fa fa-suitcase" aria-hidden="true"></span> Tour Type</label>
						<select class="form-control" name="tourtype">
							<option selected disabled>Tour Type</option>

							<?php  
                $i = 0;
                foreach ($tourtypelist as $tourtype): 
                $i++;
                $tourtypeid = $tourtype->tourtypeid;
                $tourtypename = $tourtype->name;
              ?>
              <option value="<?= $tourtypeid ?>"><?= $tourtypename ?></option>
              <?php endforeach; ?>

						</select>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 col-6 px-2 form-date-w3-agileits editContent">
						<label class="editContent"><span class="fa fa-map-marker" aria-hidden="true"></span> Tour Place</label>
						<select class="form-control" name="region">
							<option disabled selected>Destination</option>
							
							<?php  
                $i = 0;
                foreach ($regionlist as $region): 
                $i++;
                $regionid = $region->regionid;
                $regionname = $region->regionname;
                $country = $region->country;
              ?>
              <option value="<?= $regionid ?>"><?= $regionname ?> - <?= $country ?></option>
              <?php endforeach; ?>

						</select>
				</div>

				<div class="col-lg-2 px-2 col-12 form-left-agileits-submit editContent">
					  <input type="submit" value="Search">
				</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- //booking form -->

<!-- booking bottom -->	
<section class="bottom py-5">
	<div class="container">
		<div class="row bottom-grids">
			<div class="col-md-6 grid1">
				<h4 class="mb-4">History & New Cultures</h4>
				<h3 class="mb-4">Explore the world with us</h3>
				<a href="#">Read More</a>
			</div>
			<div class="col-md-3 video-play">
				<!-- video -->
				<div class="video-grid1 mt-4">
					<div class="demo-bg1">
						<div class="pop-bg position-relative">
							<div class="arrow-container animated fadeInDown">
								<a href="#small-dialog1" class="arrow-2 popup-with-zoom-anim">
									<i class="fa fa-play"></i>
								</a>
								<div class="arrow-1 animated hinge infinite zoomIn"></div>
							</div>
							<h4 class="mt-3">Watch video</h4>
							<!--  video-button-popup -->
							<div id="small-dialog1" class="mfp-hide">
								<div class="agileits_modal_body">
									<iframe width="560" height="315" src="https://www.youtube.com/embed/DX48mJjL7oU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
							<!-- // video-button-popup -->
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-3 mt-md-0 mt-4">
				<img src="<?php echo base_url(); ?>assets/frontend/images/b5.jpg" alt="" class="img-fluid" />
			</div>
		</div>
	</div>
</section>
<!-- //booking bottom -->	

<!-- welcome -->
<section class="welcome py-5">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> About Us </h3>
		<div class="row welcome-grids">
			<div class="col-lg-6">
				<h4 class="mb-3">welcome to our Locals One Agency</h4>
				<h3>Remember that happiness is a way of travel, not a destination.</h3>
				<p class="my-4">Find your tour guide within a few seconds and explore the world. You can request the tour guide for your private tours or book off-the-shelf tours provided by our tour guides. Each tour guide can explain their regions carefully and patiently to learn that region's culture and experience.</p>
				<a href="<?php echo base_url().'index.php/About' ?>">Read More</a>
			</div>
			<div class="col-lg-6 mt-lg-0 mt-5 welcome-grid3">
				<div class="position">
					<img src="<?php echo base_url(); ?>assets/frontend/images/banner4.jpg" alt="" class="img-fluid" />
				</div>
			</div>
		</div>
	</div>
</section>
<hr style="margin: 0 5%;">	
<!-- //welcome -->

<!-- /tours -->
<section class="featured_services py-5">
	<div class="container py-3">
		<h3 class="heading text-center mb-5">Popular Tours</h3>
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
						<h4><?= $tourname ?></h4>
						<div class="module line-clamp">
							<p class="description"><?= $description ?></p>
						</div>
						<p class="mt-3">
							<span class="font-weight-bold text-uppercase"><?= $regionname ?>, <?= $country ?> </span>(<?= $tourtypename ?>)<br>
							<span class="text-success font-italic"><small>(Up to <?= $noofpeoplelimit ?> people)</small></span><br>
						</p>
						<p class="my-3">
							<div class="float-left text-secondary"><small>Duration: <?= $duration ?> <?php echo ($duration==1) ? 'day' : 'days' ?></small></div>
							<div class="float-right text-orange"><span class="text-price"><?= $tourprice ?> USD</span> PER TOUR</div>
							<div class="clearfix"></div>
						</p>
						<a href="<?= base_url().'index.php/Tour/show/'.$tourid.'/'.date('Y').'/'.date('m') ?>" class="btn btn-outline-dark btn-block mt-4"> View Detail</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		
		</div>
			<div class="mx-auto mt-3 text-center">
				<a href="<?= base_url().'index.php/Tour/showall' ?>" class="btn-viewall">Explore all Tours</a>
			</div>
	</div>
</section>
<!-- //services -->

<hr style="margin: 0 5%;">

<!-- tourguides -->
<section class="tourguides py-5">
	<div class="container py-3">
		<h3 class="heading text-center mb-5">Top Tourguides</h3>
			
			<div class="carousel slide multi-item-carousel" id="theCarousel">
		    <div class="carousel-inner row w-100 mx-auto">

		    	<?php  
            $i = 0;
            foreach ($tourguidelist as $tourguide): 
            $i++;
            $tourguideid = $tourguide->tourguideid;
            $tourguidename = $tourguide->tourguidename;
            $regionname = $tourguide->regionname;
            $country = $tourguide->country;
            $profilepicture = $tourguide->profilepicture;
            $description = $tourguide->description;
            $average = $tourguide->average;
          ?>

		      <div class="carousel-item <?php echo ($i==1) ? 'active' : '' ?> col-md-4">
		      	<div class="card p-3 mb-3">
		      		<img src="<?= base_url().'assets/backend/img/'.$profilepicture ?>" class="w-50 mx-auto rounded-circle d-block">
		      		<div class="card-body text-center">
		      			<h4><?= $tourguidename ?></h4>
		      			<p class="font-weight-bold"><?= $regionname ?>, <?= $country ?></p>
		      			<p><small>Rate : <i class='fa fa-star pr-1' style='color: #F8D32D;'></i> <?= $average ?></small></p>
		      			<hr>
		      			<div class="module line-clamp">
									<p class="description"><?= $description ?></p>
								</div>
			      		<a href="<?= base_url().'index.php/Tourguide/show/'.$tourguideid.'/'.date('Y').'/'.date('m') ?>" class="btn btn-outline-dark btn-block mt-4">Book Now</a>
		      		</div>
		      	</div>
		      </div>
					
					<?php endforeach; ?>
		      
		    </div>
		    <a class="carousel-control-prev" href="#theCarousel" role="button" data-slide="prev">
		      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="carousel-control-next" href="#theCarousel" role="button" data-slide="next">
		      <span class="carousel-control-next-icon" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
			<div class="mx-auto mt-3 text-center">
				<a href="<?= base_url().'index.php/Tourguide/showall' ?>" class="btn-viewall">See all Tour Guides</a>
			</div>
		</div>
	</div>
</section>
<!-- //tourguides -->

<!-- blogs -->
<section class="blogs py-5">
	<div class="container py-3">
		<h3 class="heading text-center mb-5">Recent Blogs</h3>
		<div class="row">

			<?php  
        $i = 0;
        foreach ($bloglist as $blog): 
        $i++;
        $blogid = $blog->blogid;
        $title = $blog->title;
        $postdate = $blog->postdate;
        $image = $blog->image;
      ?>

			<div class="col-md-6">
				<div class="card p-4 mb-3">
					<div class="row">
						<div class="col-sm-4">
							<img src="<?= base_url().'assets/backend/img/blog/'.$image ?>" alt="blog image" style="width: 100%;" class="rounded">
						</div>
						<div class="col-sm-8">
							<h5><?= $title ?></h5>
							<hr style="border: 1px solid #f2994a;" class="ml-0 w-25 rounded">
							<p class="text-secondary font-italic"><small>Posted at <?= date("d M, Y", strtotime($postdate)) ?></small></p>
							<p class="text-right">
								<a href="<?php echo base_url().'index.php/Blog/show/'.$blogid; ?>" class="readmore font-weight-bold">Read More</a>
							</p>
						</div>
					</div>
				</div>
			</div>

			<?php endforeach; ?>
		
		</div>

		<div class="mx-auto mt-3 text-center">
			<a href="<?php echo base_url().'index.php/Blog/showall'; ?>" class="btn-viewall">View all Blogs</a>
		</div>
	</div>
</section>
<!-- //blogs -->

<!-- faq -->
<section class="faq py-5">
	<div class="container py-3">
		<h3 class="heading text-center mb-5">Frequently Asked Questions</h3>
		
		<div class="accordion">

			<?php  
        $i = 0;
        foreach ($faqlist as $faq): 
        $i++;
        $faqid = $faq->id;
        $question = $faq->question;
        $answer = $faq->answer;
      ?>

		  <div class="accordion-item">
		    <a><?= $i ?>. <?= $question ?></a>
		    <div class="content">
		      <?= $answer ?>
		    </div>
		  </div>

		  <?php endforeach; ?>

		</div>
		
	</div>
</section>
<!-- //faq -->