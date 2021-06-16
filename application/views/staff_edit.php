<?php  
	foreach ($editstaff as $staff)
	{
		$staffid = $staff->staffid;
		$staffname = $staff->staffname;
		$email = $staff->email;
		$phone = $staff->phone;
		$address = $staff->address;
		$profilepicture = $staff->profilepicture;
	} 
?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-user-friends"></i> Staff</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Staff/profile/<?php echo $this->session->userdata('staffid'); ?>" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Edit Staff</h6>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart(base_url().'index.php/Staff/update');?>

        <input type="hidden" name="staffid" value="<?= $staffid ?>">

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="staffname" class="form-control" id="name" placeholder="Enter Staff Name" required autofocus value="<?= $staffname ?>">
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
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address" required autocomplete="off" value="<?= $email ?>">
              <?php if(form_error('email')) echo "<div class='invalid-feedback'>This email is already Existed!</div>"; ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone: </label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required value="<?= $phone ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter Staff Address" required><?= $address ?></textarea>
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
