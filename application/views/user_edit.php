<?php  
	foreach ($edituser as $user)
	{
		$userid = $user->userid;
    $username = $user->username;
    $email = $user->email;
    $phone = $user->phone;
    $gender = $user->gender;
    $e_country = $user->country;
    $profilepicture = $user->profilepicture;
  }
?>
<div class="innerpage-banner">
  <div class="layer1"></div>
</div>

<section class="editprofile py-5">
  <div class="container py-3">
  <h3 class="heading text-center mb-md-5 mb-4"> Edit Profile </h3>

    <?php echo form_open_multipart(base_url().'index.php/User/update');?>

      <input type="hidden" name="userid" value="<?= $userid ?>">

      <div class="row mb-3">
        <div class="col-md-2">
          <label class="col-form-label font-weight-bold" for="username">Name: </label>
        </div>
        <div class="col-md-10">
          <input type="text" name="username" class="form-control bg-white rounded" id="username" value="<?= $username ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2">
          <label class="col-form-label font-weight-bold">Gender: </label>
        </div>
        <div class="col-md-10">
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

      <div class="row mb-3">
        <div class="col-md-2">
          <label class="col-form-label font-weight-bold">Profile: </label>
        </div>
        <div class="col-md-10">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Profile</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Profile</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <input type="hidden" name="oldprofile" value="<?= $profilepicture ?>">
              <img src="<?= base_url().'assets/frontend/images/profile/'.$profilepicture; ?>" style="width: 100px !important;">
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <input type="file" name="image" accept="image/png,image/jpeg,image/gif" class="my-5">
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2">
          <label class="col-form-label font-weight-bold" for="email">Email: </label>
        </div>
        <div class="col-md-10">
          <input type="email" name="email" class="form-control bg-white rounded" id="email" value="<?= $email ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2">
          <label class="col-form-label font-weight-bold" for="phone">Phone: </label>
        </div>
        <div class="col-md-10">
          <input type="text" name="phone" class="form-control bg-white rounded" id="phone" value="<?= $phone ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2">
          <label class="col-form-label font-weight-bold" for="country">Country: </label>
        </div>
        <div class="col-md-10">
          <select class="form-control rounded" id="country" name="country" required>
            <?php  
              $i = 0;
              foreach ($countrylist as $country): 
              $i++;
              $countryname = $country->countryname;
            ?>
            <option value="<?= $countryname ?>" <?php if($countryname==$e_country) {echo "selected";} ?>><?= $countryname ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="mx-auto mb-3 mt-5 text-center">
        <button type="submit" class="btn btn-viewall w-25 mw">Update</button>
        <a href="<?= base_url().'index.php/User/profile/'.$userid ?>" class="btn-cancel w-25 mw">Cancel</a>
      </div>

    </form>

  </div>
</section>