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
                <img src="<?php echo base_url(); ?>assets/backend/img/login.jpg" class="img-fluid">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Welcome from Locals One!</h1>
                    <h5 class="my-4 text-secondary">Login Form</h5>
                  </div>
                  <form class="user" method="post" action="<?php echo base_url(); ?>index.php/Login/login">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block font-weight-bold" type="submit">
                      <big>Login</big>
                    </button>
                    <a href="<?= base_url().'index.php/User/register' ?>" class="btn btn-outline-warning btn-user btn-block">
                      <big>Create Account</big>
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a href="<?= base_url().'index.php/User/forgetpassword' ?>" class="pr-md-2"><i class="fas fa-key"></i> Forgot Password?</a> |
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
