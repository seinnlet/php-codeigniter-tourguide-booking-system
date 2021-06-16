<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-user-friends"></i> User</h1>
    <p class="mb-4 mt-3">
      <a href="<?= base_url().'index.php/Booking/showall' ?>" class="btn btn-info"><i class="fas fa-suitcase-rolling"></i> See Bookings</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">All User List</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($userlist as $user): 
                $i++;
                $name = $user->username;
                $gender = $user->gender;
                $email = $user->email;
                $phone = $user->phone;
                $country = $user->country;
              ?>
              <tr>
                <td><?= $i ?>.</td>
                <td><?= $name ?></td>
                <td><?= $gender ?></td>
                <td><?= $email ?></td>
                <td><?= $phone ?></td>
                <td><?= $country ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
