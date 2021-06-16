<?php 
  if ($this->session->userdata('role') == '') {
    echo "<script>alert('Please Log in First!')</script>";
    redirect(base_url() . 'index.php/Login', 'refresh');
  }
  else if ($this->session->userdata('role') != 'staff') {
    echo "<script>alert('You do not have permission to access this page!')</script>";
    redirect(base_url() . 'index.php/Login', 'refresh');
  }
?>
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

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- summer note -->
   <?php if($this->uri->segment(1) == "Faq" && ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "edit")) echo '<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">'; ?>

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url(); ?>assets/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <style type="text/css">
    body, .form-control, th, td {
      color: #555 !important;
    }
    #clickable-table td {
      padding: 0 !important;
    }
    #clickable-table a {
      display: block;
      color: #555 !important;
      padding: .75rem;
    }
    #clickable-table a:hover {
      text-decoration: none;
    }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>index.php/StaffHome">
        <div class="sidebar-brand-icon rotate-n-15">
          <em><i class="far fa-flag"></i></em>
        </div>
        <div class="sidebar-brand-text mx-3">Locals One</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($this->uri->segment(1) == "StaffHome") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/StaffHome">
          <i class="fas fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Management :
      </div>

      <!-- Management Nav Item -->
      <li class="nav-item <?php if($this->uri->segment(1) == "Staff" || $this->uri->segment(1) == "Tourguide" || $this->uri->segment(1) == "User") echo "active"; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-user-friends"></i>
          <span>People</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">People:</h6>
            <a class="collapse-item <?php if($this->uri->segment(1) == "Staff") echo "font-weight-bold"; ?>" href="<?php echo base_url();?>index.php/Staff">Staff</a>
            <a class="collapse-item <?php if($this->uri->segment(1) == "Tourguide") echo "font-weight-bold"; ?>" href="<?php echo base_url();?>index.php/Tourguide">Tour Guides</a>
            <a class="collapse-item <?php if($this->uri->segment(1) == "User") echo "font-weight-bold"; ?>" href="<?php echo base_url();?>index.php/User">Users</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php if($this->uri->segment(1) == "Booking") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Booking/showall">
          <i class="fas fa-suitcase-rolling"></i>
          <span>Tour Booking</span></a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1) == "Request") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Request/showall">
          <i class="fas fa-phone-volume"></i>
          <span>Tour Guide Booking</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tour :
      </div>

      <!-- Tour Nav Item -->
      <li class="nav-item <?php if($this->uri->segment(1) == "Tourtype") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Tourtype">
          <i class="fas fa-suitcase"></i>
          <span>Tour Type</span></a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1) == "Tour") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Tour/alltourlist">
          <i class="fas fa-fw fa-table"></i>
          <span>Tours</span></a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1) == "Region") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Region">
          <i class="fas fa-map-marked-alt"></i>
          <span>Region</span></a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1) == "Transportation") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Transportation">
          <i class="fas fa-bus"></i>
          <span>Transportation</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Help :
      </div>

      <!-- Tour Nav Item -->
      <li class="nav-item <?php if($this->uri->segment(1) == "Faq") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Faq">
          <i class="fas fa-comments"></i>
          <span>FAQ</span></a>
      </li>
      <li class="nav-item <?php if($this->uri->segment(1) == "Help") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url();?>index.php/Report/manual">
          <i class="fas fa-question"></i>
          <span>Help</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link text-info d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-info" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-info" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <?php $this->load->view($notidata); ?>
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('staffname'); ?></span>
                <?php $profile = base_url(). 'assets/backend/img/' .$this->session->userdata('profilepicture') ?>
                <img class="img-profile rounded-circle" src="<?php echo $profile ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url().'index.php/Staff/profile/'.$this->session->userdata('staffid'); ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item py-2" href="<?= base_url() . 'index.php/Staff/changepassword/'. $this->session->userdata('staffid'); ?>">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <?php $this->load->view($innerdata); ?>


      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Locals One Tour Guide Agency 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Out?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure to log out?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-info" href="<?php echo base_url().'index.php/Login/logout'; ?>">Logout</a>
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

  <!-- summer note -->
   <?php if($this->uri->segment(1) == "Faq" && ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "edit")) echo '<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>'; ?>
   <?php if($this->uri->segment(1) == "Faq" && ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "edit")) { ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.summernote').summernote({
          height: 200,                 
          minHeight: 100,             
          maxHeight: 300
        });

      });
    </script>
   <?php } ?>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/backend/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/backend/js/demo/datatables-demo.js"></script>
  
</body>

</html>
