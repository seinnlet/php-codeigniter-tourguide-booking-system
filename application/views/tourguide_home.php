<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Tour Guide Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">My Tours</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($tourlist) ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-table fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Request Bookings</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($requestlist) ?>
                  <span class="text-secondary font-weight-normal text-xs">(completed)</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-phone-volume fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tour Bookings</div>
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($bookinglist) ?>
                    <span class="text-secondary font-weight-normal text-xs">(completed)</span>
                  </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-suitcase-rolling fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Reviews</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($ratelist) ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">My Top Tours</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tour Name</th>
                  <th>Cost(USD)</th>
                  <th>Booked Times</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                  $i = 0;
                  foreach ($toptourlist as $tour): 
                  $i++;
                  $id = $tour->tourid;
                  $name = $tour->name;
                  $tourprice = $tour->tourprice;
                  $count = $tour->count;
                  $transportationid = $tour->transportationid;
                  $tourstatus = $tour->tourstatus;

                  if ($transportationid != NULL) {
                    $tid = 't_s';
                  } else {
                    $tid = 't_c';
                  }
                ?>
                <tr>
                  <th><?= $i ?></th>
                  <td><?= $name ?></td>
                  <td><?= $tourprice ?></td>
                  <td><?= $count ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>index.php/Tour/detail/<?= $id ?>/<?= $tourstatus ?>/<?= $tid ?>" class="btn btn-outline-info btn-sm">
                    <i class="far fa-eye"></i> View
                  </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">My Top Blogs</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <table class="table table-hover" id="clickable-table">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Title</th>
                  <th>Like</th>
                </tr>
              </thead>
              <tbody>
                <?php  
                  $i = 0;
                  foreach ($topbloglist as $blog): 
                  $i++;
                  $title = $blog->title;
                  $c_like = $blog->c_like;
                  ?>
                
                  <tr>
                    <td>
                      <strong><a href="<?= base_url().'index.php/Blog' ?>"><?= $i ?></a></strong>
                    </td>
                    <td>
                      <a href="<?= base_url().'index.php/Blog' ?>"><?= $title ?></a>
                    </td>
                    <td>
                      <a href="<?= base_url().'index.php/Blog' ?>"><?= $c_like ?></a>
                    </td>
                  </tr>
                
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->