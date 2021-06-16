<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Locals One Tour Guide Booking System</title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/logo.png">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

  <style type="text/css">
    .form-control-user {    
      font-size: .8rem;
      border-radius: 10rem;
      padding: 1.4rem 1rem;
      margin-top: 25px;
    }
    .rounded-pill {
      font-size: .8rem;
      height: 45px;
    }
    .btn-user {
      font-size: .8rem;
      border-radius: 10rem;
      padding: .75rem 1rem;
    }
  </style>

</head>

<body class="bg-gradient-light">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="<?php echo base_url(); ?>assets/backend/img/register.jpg" class="img-fluid">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Welcome from Locals One!</h1>
                    <h5 class="my-4 text-secondary">Registration Form</h5>
                  </div>
                  <?php echo form_open_multipart(base_url().'index.php/User/store');?>
                    <form class="user">                  
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Your Name" required autofocus value="<?php echo set_value('username');?>">
                    </div>

                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address" required value="<?php echo set_value('email');?>">
                      <?php if(form_error('email')) echo form_error('email', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px; padding-left: 10px;">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password" required value="<?php echo set_value('password');?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </div>

                    <div class="form-group">
                      <input type="phone" class="form-control form-control-user" id="phone" name="phone" placeholder="Enter Phone" required value="<?php echo set_value('phone');?>">
                    </div>

                    <div class="form-group">
                      <select class="form-control rounded-pill" id="country" name="country" required>
                        <option disabled <?php if(set_value('country')) {echo "";} else {echo "selected";} ?>>Select Country</option>
                        <?php  
                          $i = 0;
                          foreach ($countrylist as $country): 
                          $i++;
                          $countryname = $country->countryname;
                        ?>
                        <option value="<?= $countryname ?>" <?php if(set_value('country')==$countryname) echo "selected" ?>><?= $countryname ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?php if(form_error('country')) echo form_error('country', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px; padding-left: 10px;">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                      <label class="col-4">Gender: </label>
                      <div class="custom-control custom-radio custom-control-inline col-3">
                        <input type="radio" id="male" value="Male" name="gender" class="custom-control-input" <?php if (form_error('gender') && (set_value('gender') == 'Male')) {echo 'checked';} else {echo "checked";}?>>
                        <label class="custom-control-label" for="male">Male</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline col-3">
                        <input type="radio" id="female" value="Female" name="gender" class="custom-control-input" <?php if(set_value('gender') == 'Female') echo 'checked';?>>
                        <label class="custom-control-label" for="female">Female</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image" required id="image" accept="image/png,image/jpeg,image/gif,image/jpg" value="<?= set_value('image') ?>">
                        <label class="custom-file-label" for="customFile" >Profile Picture</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="checkterm" class="custom-control-input" id="customCheck" required <?php if(set_value('checkterm')) echo 'checked';?>>
                        <label class="custom-control-label" for="customCheck">I agree to Locals One <a href="<?= base_url().'index.php/Report/termsandconditions' ?>">Terms and Conditions.</a></label>
                      </div>
                    </div>

                    <button class="btn btn-warning btn-user btn-block font-weight-bold" type="submit">
                      <big>Register</big>
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a href="<?= base_url().'index.php/Login' ?>" class="pr-md-2"><i class="fas fa-key"></i> Already Member?</a> |
                    <a href="<?= base_url() ?>" class="pl-md-2"><i class="fas fa-home"></i> Back to Home</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/backend/js/sb-admin-2.min.js"></script>

</body>

</html>
