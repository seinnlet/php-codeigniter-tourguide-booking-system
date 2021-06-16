<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-user-friends"></i> Staff</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Staff/add" class="btn btn-info"><i class="fas fa-plus"></i> Add New Staff</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Staff List</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Position</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($stafflist as $staff): 
                $i++;
                $id = $staff->staffid;
                $name = $staff->staffname;
                $email = $staff->email;
                $phone = $staff->phone;
                $address = $staff->address;
                $role = $staff->role;
              ?>
              <tr>
                <td><?= $id ?>.</td>
                <td><?= $name ?></td>
                <td><?= $email ?></td>
                <td><?= $phone ?></td>
                <td><?= $address ?></td>
                <td><?= $role ?></td>
                <td>
                  <?php if ($role!='Admin'): ?>
                    <a href="<?php echo base_url(); ?>index.php/Staff/delete/<?= $id ?>" class="btn btn-outline-danger" onclick="return confirm('Are you Sure to Delete?')"><i class="far fa-trash-alt"></i> Remove</a>
                  <?php endif ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
