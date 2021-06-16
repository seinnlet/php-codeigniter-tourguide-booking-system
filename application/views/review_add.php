<?php  
	foreach ($name as $t_name)
	{
		$tourguidename = $t_name->tourguidename;
	}
?>
<div class="innerpage-banner">
	<div class="layer1"></div>
</div>

<section class="py-5" id="rating">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> Review on <?= $tourguidename ?></h3>

		<h5 class="text-center">Did you satisfy your trip?</h5>
		<form action="<?= base_url().'index.php/Review/store' ?>" method="post">
			<input type="hidden" name="tourguideid" value="<?= $this->uri->segment(3) ?>">
			<?php if ($this->uri->segment(4) == 'booking'): ?>
				<input type="hidden" name="bookingid" value="<?= $this->uri->segment(5) ?>">
			<?php else: ?>
				<input type="hidden" name="requestid" value="<?= $this->uri->segment(5) ?>">
			<?php endif ?>
			
			<div class="rating">
				<input name="stars" id="e5" type="radio" value="5"></a><label for="e5">★</label>
				<input name="stars" id="e4" type="radio" value="4"></a><label for="e4">★</label>
				<input name="stars" id="e3" type="radio" value="3"></a><label for="e3">★</label>
				<input name="stars" id="e2" type="radio" value="2"></a><label for="e2">★</label>
				<input name="stars" id="e1" type="radio" value="1"></a><label for="e1">★</label>
			</div>

			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<p class="mb-2 ml-1 font-weight-bold">Feedback: </p>
					<textarea class="form-control rounded" name="feedback" rows="7" placeholder="Write something..."></textarea>	
				</div>
			</div>

			<div class="row my-5">
				<div class="col-lg-8 offset-lg-2">
					<button type="submit" class="btn btn-viewall mx-auto w-100">Send</button>
				</div>
			</div>

		</form>


	</div>
</section>