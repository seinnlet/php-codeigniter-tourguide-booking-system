<?php  
	foreach ($detailstaff as $staff)
	{
		$staffid = $staff->staffid;
		$staffname = $staff->staffname;
		$email = $staff->email;
		$phone = $staff->phone;
		$address = $staff->address;
		$role = $staff->role;
		$profilepicture = $staff->profilepicture;
	} 
?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="far fa-clipboard"></i>
        My Profile
    </h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url().'index.php/Staff/edit/'. $this->session->userdata('staffid');?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>      
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Detail Info</h6>
      </div>
      <div class="card-body">
        <div class="row">
        	<div class="col-lg-6 text-center my-3">
        		<img src="<?php echo base_url(); ?>assets/backend/img/<?= $profilepicture ?>" class="w-50 shadow rounded" alt="user profile image" >
        	</div>

        	<div class="col-lg-6 my-3">
        		<h5 class="text-info font-weight-bold mb-4">Personal Info</h5>
            <div class="row">
              <label class="col-4 col-lg-3 font-weight-bold">Staff ID: </label>
              <div class="col-8 col-lg-9">
                #<?= $staffid ?>
              </div>
            </div>

        		<div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Name: </label>
		          <div class="col-8 col-lg-9">
		            <?= $staffname ?>
		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Email: </label>
		          <div class="col-8 col-lg-9">
		            <?= $email ?>
		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Phone: </label>
		          <div class="col-8 col-lg-9">
		            <?= $phone ?>
		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Address: </label>
		          <div class="col-8 col-lg-9">
		            <?= $address ?>
		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Role: </label>
		          <div class="col-8 col-lg-9">
		            <span class="text-info font-weight-bold"><?= $role ?></span>
		          </div>
		        </div>

        	</div>
        </div>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
