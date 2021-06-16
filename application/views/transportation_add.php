<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-bus"></i> Transportation</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Transportation" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Add New Transportation</h6>
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url(); ?>index.php/Transportation/store" >

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control <?php if(form_error('name')) echo "is-invalid" ?>" id="name" placeholder="Enter Transportation Name" required autofocus value="<?php echo set_value('name');?>" >
              <?php if(form_error('name')) echo form_error('name', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Transportation Type: </label>
            <div class="col-sm-10">
              <select class="form-control <?php if(form_error('type')) echo "is-invalid" ?>" id="type" name="type" required>
                <option disabled selected>Select Transportation Type</option>
                <option value="Private Car" <?php if(set_value('type')=='Private Car') echo "selected" ?>>Privater Car</option>
                <option value="Mini Bus" <?php if(set_value('type')=='Mini Bus') echo "selected" ?>>Mini Bus</option>
                <option value="Subway" <?php if(set_value('type')=='Subway') echo "selected" ?>>Subway</option>
                <option value="Boat" <?php if(set_value('type')=='Boat') echo "selected" ?>>Boat</option>
                <option value="Cruise Ship" <?php if(set_value('type')=='Cruise Ship') echo "selected" ?>>Cruise Ship</option>
              </select>
              <?php if(form_error('type')) echo form_error('type', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="facility" class="col-sm-2 col-form-label">Facility: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="facility" name="facility" rows="4" placeholder="Describe Facility" required><?php echo set_value('facility');?></textarea>
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="submit" name="btnsave" value="Save" class="btn btn-info">
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
