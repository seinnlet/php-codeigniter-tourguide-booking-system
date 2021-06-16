<?php $tourguideid = $this->uri->segment(3) ?>
<div class="innerpage-banner">
	<div class="layer1">
	</div>
</div>

<section class="py-5" id="booking">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> Contact For Private Trip </h3>
		<form method="post" action="<?php echo base_url(); ?>index.php/Request/store">
			
			<input type="hidden" name="tourguideid" value="<?php if(set_value('tourguideid')) {echo set_value('tourguideid');} else { echo $tourguideid; } ?>">

			<div class="row mb-3">
				<div class="col-md-2">
					<label class="col-form-label font-weight-bold">Name: </label>
				</div>
				<div class="col-md-10">
					<input type="text" name="name" class="form-control bg-white rounded" readonly value="<?= $this->session->userdata('name'); ?>">
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-2">
					<label class="col-form-label font-weight-bold">Duration (Days): </label>
				</div>
				<div class="col-md-10">
					<input type="number" name="duration" min="0" max="30" class="form-control rounded" value="<?= set_value('duration') ?>" id="duration" placeholder="Duration">
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-2"><label class="font-weight-bold">Date: </label></div>
				<div class="col-md-10">
					<?php 
						if (set_value('fromdate')) 
						{
							$bookdate = set_value('fromdate');
						}
						else 
						{
							$bookdate = $this->uri->segment(4).'-'.$this->uri->segment(5).'-'.$this->uri->segment(6);
						}
						
					?>
					<div class="row">
						<div class="col-2 col-md-2 col-lg-1 mb-2"><label for="from" class="col-form-label">From: </label></div>
						<div class="col-10 col-md-4 col-lg-4 mb-2">
							<input type="text" name="fromdate" readonly class="form-control rounded bg-white" value="<?= $bookdate ?>" id="fromdate">
						</div>

						<div class="col-2 col-md-2 col-lg-1 mb-2"><label for="from" class="col-form-label">To: </label></div>
						<div class="col-10 col-md-4 col-lg-4 mb-2">
							<input type="text" name="todate" readonly class="form-control rounded bg-white" id="todate" value="<?= set_value('todate') ?>">
						</div>

						<div class="col-12 col-lg-2">
							<a href="<?= base_url().'index.php/Request/calendar/'.$tourguideid.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ?>" class="btn btn-outline-secondary d-block my-3 my-lg-0"><i class="fa fa-edit mr-2"></i>Change</a>
						</div>
					</div>	

					<?php if (isset($dateerror)): ?>
						<p class="text-danger"><small><?= $dateerror ?></small></p>
					<?php endif ?>
					
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-2">
					<label class="col-form-label font-weight-bold">Tour Description: </label>
				</div>
				<div class="col-md-10">
					<textarea class="form-control rounded" name="description" rows="6" placeholder="Brief Explanation of your tour..." required><?= set_value('description') ?></textarea>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-2">
					<label class="col-form-label font-weight-bold">Message: </label>
				</div>
				<div class="col-md-10">
					<textarea class="form-control rounded" name="message" rows="6" placeholder="Message to your tour guide..." required><?= set_value('message') ?></textarea>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-2">
					<label class="col-form-label font-weight-bold">Total People: </label>
				</div>
				<div class="col">
					<select name="nooftotalpeople" class="form-control rounded">
						<option disabled selected>Select No of Total People</option>

						<?php for ($i=1; $i <= 10; $i++): ?>
							<option value="<?= $i ?>" <?php if(set_value('nooftotalpeople')==$i) echo "selected" ?>><?= $i ?></option>
						<?php endfor ?>

					</select>
					<?php if(form_error('nooftotalpeople')) echo form_error('nooftotalpeople', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>

				</div>
			</div>

			<div class="mx-auto mb-3 mt-5 text-center">
				<button type="submit" class="btn btn-viewall w-25 mw">Send</button>
				<a href="<?= base_url().'index.php/Tourguide/showall' ?>" class="btn-cancel w-25 mw"  onclick="return confirm('Are you Sure to Cancel this Form?')">Cancel</a>
			</div>

		</form>
	</div>
</section>