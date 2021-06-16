<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-user-friends"></i> Tour Guides</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Tourguide/add" class="btn btn-info"><i class="fas fa-plus"></i> Add New Tour Guide</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Tour Guide List</h6>
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
                <th>Region</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($tourguidelist as $tourguide): 
                $i++;
                $id = $tourguide->tourguideid;
                $name = $tourguide->tourguidename;
                $email = $tourguide->email;
                $phone = $tourguide->phone;
                $regionname = $tourguide->regionname;
                $country = $tourguide->country;
              ?>
              <tr>
                <td><?= $i ?>.</td>
                <td><?= $name ?></td>
                <td><?= $email ?></td>
                <td><?= $phone ?></td>
                <td><?= $regionname." - ".$country ?></td>
                <td>
                  <a href="<?php echo base_url(); ?>index.php/Tourguide/delete/<?= $id ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you Sure to Delete?')"><i class="far fa-trash-alt"></i> Remove</a>
                  <a href="<?php echo base_url(); ?>index.php/Tourguide/detail/<?= $id ?>" class="btn btn-outline-info btn-sm">
                    <i class="far fa-eye"></i> Detail
                  </a>
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
