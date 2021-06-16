<?php  
	foreach ($showtour as $tour)
	{
		$tourid = $tour->tourid;
    $tourname = $tour->name;
    $tourprice = $tour->tourprice;
    $noofpeoplelimit = $tour->noofpeoplelimit;
    $duration = $tour->duration;
    $regionname = $tour->regionname;
    $country = $tour->country;
  }
?>


<div class="innerpage-banner">
	<div class="layer1">
	</div>
</div>

<!-- all tour list -->
<section class="py-5" id="booking">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> Booking Form </h3>

		<nav class="navbar" id="progress-nav">
	    <div class="progress-bar"></div>
	    <div class="progress-bar--increment"></div>
      <ul>
          <li><a href="#top" class="text-dark font-weight-bold">Booking Progress</a></li>
          <li><a href="#time"><span class="progress-bar--circle"></span>Time & Meeting Location</a></li>
          <li><a href="#info"><span class="progress-bar--circle"></span>Traveller Info</a></li>
          <li><a href="#payment"><span class="progress-bar--circle"></span>Payment Detail</a></li>
          <li><a href="#complete"><span class="progress-bar--circle"></span>Complete</a></li>
      </ul>
    </nav>

  <form method="post" action="<?php echo base_url(); ?>index.php/Booking/store" >
    <div id="top">
			<div class="row p-3 p-lg-0">
				<div class="col-lg-3"></div>
				<div class="col-lg-9">
					<h4 class="font-weight-bold"><?= $tourname ?></h4>
					<hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">	
					
					<?php if (set_value('tourid')): ?>
						<input type="hidden" name="tourid" value="<?= set_value('tourid') ?>">
					<?php else: ?>
						<input type="hidden" name="tourid" value="<?= $tourid ?>">
					<?php endif ?>
					

					<div class="row mb-2">
						<div class="col-2 col-md-3"><label class="font-weight-bold">Region: </label></div>
						<div class="col-10 col-md-9">
							<?= $regionname . ' - ' . $country ?>
						</div>
					</div>
				
					
					<div class="row mb-2">
						<div class="col-2 col-md-3"><label class="font-weight-bold">Duration: </label></div>
						<div class="col-10 col-md-9">
							<?= $duration ?> <?php echo ($duration==1) ? ' day' : ' days' ?>
						</div>
					</div>

					<div class="row mb-2">
						<div class="col-2 col-md-3"><label class="font-weight-bold">Date: </label></div>
						<div class="col-10 col-md-9">
							<?php 
								if (set_value('bookdate')) 
								{
									$bookdate = set_value('bookdate');
								}
								else 
								{
									$bookdate = $this->uri->segment(4).'-'.$this->uri->segment(5).'-'.$this->uri->segment(6);
								}
								$todate = date('Y-m-d', strtotime($bookdate))." + ".($duration-1)." day";
								$todate = date('Y-m-d', strtotime($todate));
							?>
							<div class="row">
								<div class="col-2 col-md-1 mb-2"><label for="from" class="col-form-label">From: </label></div>
								<div class="col-10 col-md-4 mb-2">
									<input type="text" name="bookdate" readonly class="form-control rounded bg-white" value="<?= $bookdate ?>">
								</div>

								<div class="col-2 col-md-1 mb-2"><label for="from" class="col-form-label">To: </label></div>
								<div class="col-10 col-md-4 mb-2">
									<input type="text" name="date" readonly class="form-control rounded bg-white" value="<?= $todate ?>">
								</div>

								<div class="col-12 col-md-2">
									<a href="<?= base_url().'index.php/Booking/calendar/'.$tourid.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit mr-2"></i>Change</a>
								</div>
							</div>	
							
						</div>
					</div>					
				
				</div>	
			</div>
    </div>

    <main>
			<article class="article" id="time">
        	
        <div class="row p-3 p-lg-0">
					<div class="col-lg-3"></div>
					<div class="col-lg-9">
						<h4 class="font-weight-bold mt-5">Time & Meeting Location</h4>
						<hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">	

						<div class="row mb-2">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">Start Time: </label></div>
							<div class="col-md-9">
								<select name="starttime" class="form-control rounded">
									<option selected disabled>Select Start Time</option>
									<option value="08:00 AM" <?php if(set_value('starttime')=='08:00 AM') echo "selected" ?>>08:00 AM</option>
									<option value="08:30 AM" <?php if(set_value('starttime')=='08:30 AM') echo "selected" ?>>08:30 AM</option>
									<option value="09:00 AM" <?php if(set_value('starttime')=='09:00 AM') echo "selected" ?>>09:00 AM</option>
									<option value="09:30 AM" <?php if(set_value('starttime')=='09:30 AM') echo "selected" ?>>09:30 AM</option>
									<option value="10:00 AM" <?php if(set_value('starttime')=='10:00 AM') echo "selected" ?>>10:00 AM</option>
								</select>
								<?php if(form_error('starttime')) echo form_error('starttime', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
							</div>
						</div>
						
						<div class="row mb-2">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">Meeting Location: </label></div>
							<div class="col-md-9">
								<textarea name="meetinglocation" required placeholder="Address we will come to pick you up..." class="form-control rounded" rows="4"><?php echo set_value('meetinglocation');?></textarea>
							</div>
						</div>

					</div>
				</div>

      </article>

		  <article class="article" id="info">
		    
		  	<div class="row p-3 p-lg-0">
					<div class="col-lg-3"></div>
					<div class="col-lg-9">
						<h4 class="font-weight-bold mt-5">Traveller Info</h4>
						<hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">	

						<div class="row mb-2">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">Guest Name: </label></div>
							<div class="col-md-9">
								<input type="hidden" name="userid" value="<?= $this->session->userdata('id'); ?>">
								<input type="text" name="name" value="<?= $this->session->userdata('name'); ?>" readonly class="rounded form-control bg-white">
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">Total People: </label></div>
							<div class="col-md-9">
								<select name="nooftotalpeople" class="form-control rounded">
									<option disabled selected>Select No of Total People</option>

									<?php for ($i=1; $i <= $noofpeoplelimit; $i++): ?>
										<option value="<?= $i ?>" <?php if(set_value('nooftotalpeople')==$i) echo "selected" ?>><?= $i ?></option>
									<?php endfor ?>

								</select>
								<?php if(form_error('nooftotalpeople')) echo form_error('nooftotalpeople', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>

								<div class="custom-control custom-checkbox my-3">

								  <input type="checkbox" class="custom-control-input" id="checknoofchild" <?php if(set_value('checknoofchild') ) echo 'checked';?> name="checknoofchild">
								  <label class="custom-control-label" for="checknoofchild">Child under 14 years</label>
								</div>

								<select name="noofchild" class="form-control rounded" id="noofchild">
									<option disabled selected>Select No of Child</option>

									<?php for ($i=1; $i <= $noofpeoplelimit; $i++): ?>
										<option value="<?= $i ?>" <?php if(set_value('noofchild')==$i) echo "selected" ?>><?= $i ?></option>
									<?php endfor ?>

								</select>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">Remark: </label></div>
							<div class="col-md-9">
								<textarea name="comment" placeholder="Anything needed to know about the trip..." class="form-control rounded" rows="4"><?php echo set_value('comment');?></textarea>
							</div>
						</div>

					</div>
				</div>

		  </article>

      <article class="article" id="payment">
		    
		  	<div class="row p-3 p-lg-0">
					<div class="col-lg-3"></div>
					<div class="col-lg-9">
						<h4 class="font-weight-bold mt-5">Payment Detail</h4>
						<hr style="border: 1px solid #f2994a; width: 15%;" class="ml-0 mb-4 rounded">	


						<div class="row mb-2">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">Tour Total Cost (USD): </label></div>
							<div class="col-md-9">
								<input type="text" name="tourprice" value="<?= $tourprice ?>" class="rounded form-control bg-white" readonly>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">Card Holder's Name: </label></div>
							<div class="col-md-9">
								<input type="text" name="name_on_card" value="<?php echo set_value('name_on_card');?>" class="rounded form-control" placeholder="Name on your Card">
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">Card Number: </label></div>
							<div class="col-md-9">
								<input type="text" name="cardnumber" value="<?php echo set_value('cardnumber');?>" class="rounded form-control" placeholder="Card Number" id="cardNumber" maxlength="19">
							</div>
						</div>

						<div class="row mb-2 mt-4">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">Expiry Date: </label></div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-2 col-md-1 mb-2"><label for="month" class="col-form-label">Month: </label></div>
									<div class="col-10 col-md-4 mb-2">
										<select name="month" class="form-control rounded" id="month">
											<option disabled selected>MM</option>

											<?php for ($i=1; $i < 13; $i++): ?>
												<option value="<?= $i ?>" <?php if(set_value('month')==$i) echo "selected" ?>><?= $i ?></option>
											<?php endfor ?>

										</select>
										<?php if(form_error('month')) echo form_error('month', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
									</div>

									<div class="col-2 col-md-1 mb-2"><label for="year" class="col-form-label">Year: </label></div>
									<div class="col-10 col-md-4 mb-2">
										<select name="year" class="form-control rounded" id="year">
											<option disabled selected>YYYY</option>

											<?php for ($i=2020; $i < 2051; $i++): ?>
												<option value="<?= $i ?>" <?php if(set_value('year')==$i) echo "selected" ?>><?= $i ?></option>
											<?php endfor ?>

										</select>
										<?php if(form_error('year')) echo form_error('year', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
									</div>
								</div>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-md-3"><label class="font-weight-bold col-form-label">CV Code: </label></div>
							<div class="col-md-9">
								<input type="text" name="cvc" value="<?php echo set_value('cvc');?>" class="rounded form-control" placeholder="CVC" id="cvc" maxlength="4">
							</div>
						</div>

					</div>
				</div>
      </article>

			<article class="article" id="complete">
		  	<div class="row p-3 p-lg-0">
					<div class="col-lg-3"></div>
					<div class="col-lg-9">
						<div class="mx-auto mt-5 text-center">
							<button type="submit" class="btn btn-viewall w-25 mw">Save</button>
							<a href="<?= base_url().'index.php/Tour/showall' ?>" class="btn-cancel w-25 mw"  onclick="return confirm('Are you Sure to Cancel this Booking?')">Cancel</a>
						</div>

						<div class="card py-5">
				  		<h4 class="text-secondary font-weight-bold">Click Save Button to Complete Booking Process!</h4>
				  		<p class="text-gray-dark font-italic text-center">You can cancel your bookings within 24 hours.</p>
				  		<hr class="w-50 mx-auto my-3">
				  		<h6 class="text-secondary font-weight-bold text-center my-4">You can view your bookings in "My Bookings" from menu.</h6>
				  	</div>
			  	</div>
		  	</div>
			</article>

    </main>
  </form>
  <div id="bottom"></div>

	</div>
</section>