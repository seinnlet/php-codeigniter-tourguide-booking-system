<div class="innerpage-banner">
	<div class="layer1">
	</div>
</div>

<section class="py-5" id="booking">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> Please Choose Date </h3>
  <p class="text-center text-secondary my-4">
  	Click on the Date to Choose for the start date of your tour...
  </p>

	<div class="p-3 text-center mx-auto calendar2">
    <?php echo $calendar ?>

    <p class="text-center mt-5">
    	<span style="width: 15px; height: 15px; background-color: #ddd; display: inline-block;" class="rounded"></span> Unavailable 
    	<span style="width: 15px; height: 15px; background-color: #f5b06c; display: inline-block;" class="rounded ml-4"></span> Available Date
    </p>

  </div>

  <div class="text-center my-3">
  	<a href="<?= base_url().'index.php/Tourguide/show/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ?>" class="btn btn-outline-secondary w-25 py-2">Cancel</a>
  </div>

	</div>
</section>