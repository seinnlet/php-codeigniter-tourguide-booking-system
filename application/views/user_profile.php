<?php  
	foreach ($detailuser as $user)
	{
		$userid = $user->userid;
    $username = $user->username;
    $email = $user->email;
    $phone = $user->phone;
    $gender = $user->gender;
    $country = $user->country;
    $profilepicture = $user->profilepicture;
  }
?>
<div class="innerpage-banner">
  <div class="layer1"></div>
</div>

<section class="blogdetail py-5">
  <div class="container py-3">
  <h3 class="heading text-center mb-md-5 mb-4"> My Profile </h3>

  	<div class="blogs bg-white">
			<div class="card p-4">
				<div class="row">
					<div class="col-md-2 text-center">
						<img id="img-userprofile" src="<?= base_url().'assets/frontend/images/profile/'.$profilepicture; ?>" class="rounded">
					</div>
					<div class="col-md-10">
						<h5 class="font-weight-bold">Personal Info</h5>
						<hr style="border: 1px solid #f2994a; width: 10%" class="ml-0 rounded my-2">

						<div class="row my-3">
							<div class="col-4 col-md-2 font-weight-bold">Name: </div>
							<div class="col-8 col-md-10"><?= $username ?></div>
						</div>

						<div class="row my-3">
							<div class="col-4 col-md-2 font-weight-bold">Gender: </div>
							<div class="col-8 col-md-10"><?= $gender ?></div>
						</div>

						<div class="row my-3">
							<div class="col-4 col-md-2 font-weight-bold">Email: </div>
							<div class="col-8 col-md-10"><?= $email ?></div>
						</div>

						<div class="row my-3">
							<div class="col-4 col-md-2 font-weight-bold">Phone: </div>
							<div class="col-8 col-md-10"><?= $phone ?></div>
						</div>

						<div class="row my-3">
							<div class="col-4 col-md-2 font-weight-bold">Country: </div>
							<div class="col-8 col-md-10"><?= $country ?></div>
						</div>

						<div class="row mb-3">
							<div class="col-12">
								<a href="<?= base_url().'index.php/User/edit/'.$userid ?>" class="btn btn-outline-info btn-sm-block mt-2"><i class="fa fa-edit"></i> Edit</a>

								<a href="<?= base_url().'index.php/User/changepassword/'.$userid ?>" class="btn btn-outline-secondary btn-sm-block mt-2"><i class="fa fa-key"></i> Change Password</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</section>