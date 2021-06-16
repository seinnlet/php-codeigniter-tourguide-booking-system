<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-user-friends"></i> Tour Guide</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Tourguide" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Add New Tour Guide</h6>
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url(); ?>index.php/Tourguide/store" >

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Tour Guide Name" required autofocus value="<?php echo set_value('name');?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="gender" class="col-sm-2 col-form-label">Gender: </label>
            <div class="col-sm-10">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="male" name="gender" class="custom-control-input" value="Male" <?php if (form_error('gender') && (set_value('gender') == 'Male')) {echo 'checked';} else {echo "checked";}?>>
                <label class="custom-control-label" for="male">Male</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="female" name="gender" class="custom-control-input" value="Female" <?php if(set_value('gender') == 'Female') echo 'checked';?>>
                <label class="custom-control-label" for="female">Female</label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control <?php if (form_error('email')): ?>
                is-invalid
              <?php endif ?>" id="email" placeholder="Enter Email Address" required autocomplete="off" value="<?php echo set_value('email');?>">
              <?php if(form_error('email')) echo "<div class='invalid-feedback'>This email is already Existed!</div>"; ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone: </label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required value="<?php echo set_value('phone');?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter Tour Guide Address" required><?php echo set_value('address');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="region" class="col-sm-2 col-form-label">Region: </label>
            <div class="col-sm-10">
              <select class="form-control <?php if(form_error('region')) echo "is-invalid" ?>" id="region" name="region" required>
                <option disabled selected>Select Region</option>
                <?php  
                  $i = 0;
                  foreach ($regionlist as $region): 
                  $i++;
                  $regionid = $region->regionid;
                  $regionname = $region->regionname;
                  $country = $region->country;
                ?>
                <option value="<?= $regionid ?>" <?php if(set_value('region')==$regionid) echo "selected" ?>><?= $regionname." - ".$country ?></option>
                <?php endforeach; ?>
              </select>
              <?php if(form_error('region')) echo form_error('region', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="level" class="col-sm-2 col-form-label">Level: </label>
            <div class="col-sm-10">
              <select class="form-control" id="level" name="level" required>
                <option disabled selected>Select Level</option>
                <option value="Expert" <?php if(set_value('level')=="Expert") echo "selected" ?>>Expert</option>
                <option value="Senior" <?php if(set_value('level')=="Senior") echo "selected" ?>>Senior</option>
                <option value="Junior" <?php if(set_value('level')=="Junior") echo "selected" ?>>Junior</option>
              </select>
              <?php if(form_error('level')) echo form_error('level', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="experience" class="col-sm-2 col-form-label">Experience: </label>
            <div class="col-sm-10">
              <input type="text" name="experience" class="form-control" id="experience" placeholder="Enter Total Experience Years" required value="<?php echo set_value('experience');?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="fees" class="col-sm-2 col-form-label">Fees per Day (USD): </label>
            <div class="col-sm-10">
              <input type="number" name="fees" class="form-control" id="fees" placeholder="Enter Fees per day" required autofocus value="<?php echo set_value('fees');?>" min=0 max=1000>
            </div>
          </div>

          <div class="form-group row">
            <label for="staffname" class="col-sm-2 col-form-label">Registered by: </label>
            <div class="col-sm-10">
              <input type="text" name="staffname" class="form-control bg-white" id="staffname" placeholder="Enter Fees per day" value="<?php echo $this->session->userdata('staffname'); ?>" readonly>
              <input type="hidden" name="staffid" value="<?php echo $this->session->userdata('staffid'); ?>">
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
