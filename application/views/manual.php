<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-question"></i> Help</h1>
    <p class="mb-4 mt-3">
   		<?php if ($this->session->userdata('role') == 'staff'): ?>
   			<a href="<?php echo base_url(); ?>assets/StaffManual.pdf" target="_blank" class="btn btn-info"><i class="fas fa-external-link-alt"></i> Open User Manual</a>
   		<?php else: ?>
   			<a href="<?php echo base_url(); ?>assets/TourguideManual.pdf" target="_blank" class="btn btn-info"><i class="fas fa-external-link-alt"></i> Open User Manual</a>
   		<?php endif ?>
      
    </p>

</div>