<?php  
	foreach ($detailtourguide as $tourguide)
	{
		$tourguideid = $tourguide->tourguideid;
		$tourguidename = $tourguide->tourguidename;
		$profilepicture = $tourguide->profilepicture;
		$email = $tourguide->email;
		$phone = $tourguide->phone;
		$address = $tourguide->address;
		$e_region = $tourguide->regionid;
		$level = $tourguide->level;
		$gender = $tourguide->gender;
		$profilepicture = $tourguide->profilepicture;
		$description = $tourguide->description;
		$credentials = $tourguide->credentials;
		$experience = $tourguide->experience;
		$feesperday = $tourguide->feesperday;
	} 
?>

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-user-friends"></i> Tour Guide</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Tourguide/profile/<?php echo $tourguideid ?>" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Edit Tour Guide</h6>
      </div>
      <div class="card-body">
				<?php echo form_open_multipart(base_url().'index.php/Tourguide/update');?>

        	<input type="hidden" name="tourguideid" value="<?= $tourguideid ?>">

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Tour Guide Name" required autofocus value="<?= $tourguidename ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="gender" class="col-sm-2 col-form-label">Gender: </label>
            <div class="col-sm-10">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="male" name="gender" class="custom-control-input" value="Male" <?php if ($gender == 'Male') echo 'checked';?>>
                <label class="custom-control-label" for="male">Male</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="female" name="gender" class="custom-control-input" value="Female" <?php if($gender == 'Female') echo 'checked';?>>
                <label class="custom-control-label" for="female">Female</label>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="profile" class="col-sm-2 col-form-label">Profile : </label>
            <div class="col-sm-10">
             	<nav>
							  <div class="nav nav-tabs" id="nav-tab" role="tablist">
							    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Profile</a>
							    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Profile</a>
							  </div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
							  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							  	<input type="hidden" name="oldprofile" value="<?= $profilepicture ?>">
							  	<img src="<?php echo base_url().'assets/backend/img/'.$profilepicture ?>" width="100">
							  </div>
							  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							  	<input type="file" name="profile" accept="image/png,image/jpeg,image/gif,"/ class="my-5">
							  </div>
							</div>
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address" required autocomplete="off" value="<?= $email?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone: </label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required value="<?= $phone?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter Tour Guide Address" required><?= $address ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="region" class="col-sm-2 col-form-label">Region: </label>
            <div class="col-sm-10">
              <select class="form-control" id="region" name="region" required>
                <?php  
                  $i = 0;
                  foreach ($regionlist as $region): 
                  $i++;
                  $regionid = $region->regionid;
                  $regionname = $region->regionname;
                  $country = $region->country;
                ?>
                <option value="<?= $regionid ?>" <?php if($e_region==$regionid) {echo "selected";} ?>><?= $regionname." - ".$country ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="level" class="col-sm-2 col-form-label">Level: </label>
            <div class="col-sm-10">
              <select class="form-control" id="level" name="level" required>
                <option disabled selected>Select Level</option>
                <option value="Expert" <?php if($level =="Expert") echo "selected" ?>>Expert</option>
                <option value="Senior" <?php if($level =="Senior") echo "selected" ?>>Senior</option>
                <option value="Junior" <?php if($level =="Junior") echo "selected" ?>>Junior</option>
              </select>
              <?php if(form_error('level')) echo form_error('level', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="experience" class="col-sm-2 col-form-label">Experience: </label>
            <div class="col-sm-10">
              <input type="text" name="experience" class="form-control" id="experience" placeholder="Enter Total Experience Years" required value="<?= $experience ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="fees" class="col-sm-2 col-form-label">Fees per Day (USD): </label>
            <div class="col-sm-10">
              <input type="number" name="fees" class="form-control" id="fees" placeholder="Enter Fees per day" required autofocus value="<?= $feesperday ?>" min=0 max=1000>
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description: </label>
            <div class="col-sm-10">
              <textarea id="description" name="description" class="form-control summernote" style="border: 1px solid #d1d3e2 !important;" required><?= $description ?></textarea>
            </div>
          </div>	

          <div class="form-group row">
            <label for="credentials" class="col-sm-2 col-form-label">Credentials: </label>
            <div class="col-sm-10">
              <textarea id="credentials" name="credentials" class="form-control" style="border: 1px solid #d1d3e2 !important;" required rows="4"><?= $credentials ?></textarea>
            </div>
          </div>

          <div class="form-group row">
          	<label for="credentials" class="col-sm-2 col-form-label">Languages: </label>
          	<div class="col-sm-10">
          		<?php  
	              $i = 0;
	              foreach ($detaillanguagelist as $d_language): 
	              $i++;
	              $tourguideid = $d_language->tourguideid;
	              $languageid = $d_language->languageid;
	              $languagename = $d_language->name;
	              $level = $d_language->level;
	            ?>
	            <div class="row form-group w-100">
		            <input type="hidden" name="<?= 'l'.$i ?>" value="<?= $languageid ?>">
		            <label for="<?= 'f'.$i ?>" class="col-sm-2 col-form-label"><?= $languagename ?></label>
		            <select name="<?= 'f'.$i ?>" class="col-sm-8 form-control">
		            	<option value="1" <?php if($level == 1) echo "selected" ?>>basic</option>
		              <option value="2" <?php if($level == 2) echo "selected" ?>>intermidate</option>
		              <option value="3" <?php if($level == 3) echo "selected" ?>>fluent</option>
		              <option value="4" <?php if($level == 4) echo "selected" ?>>advanced</option>
		            </select>
		            <a href="<?= base_url().'index.php/Tourguide/deletelanguage/'.$tourguideid.'/'.$languageid ?>" class="btn-link text-danger btn-sm col-sm-2 col-form-label" onclick="return confirm('Are you Sure to Remove?')"><i class="far fa-trash-alt"></i> Remove</a>
	            </div>
	 						<?php endforeach; ?>
	 						<input type="hidden" name="count" value="<?= $i ?>">
          	</div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="submit" name="btnsave" value="Update" class="btn btn-info">
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
