<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-map-marked-alt"></i> Region</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Region/add" class="btn btn-info"><i class="fas fa-plus"></i> Add New Region</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Region List</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Region Name</th>
                <th>Country</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($regionlist as $region): 
                $i++;
                $id = $region->regionid;
                $name = $region->regionname;
                $country = $region->country;
              ?>
              <tr>
                <td><?= $i ?>.</td>
                <td><?= $name ?></td>
                <td><?= $country ?></td>
                <td>
                  <a href="<?php echo base_url(); ?>index.php/Region/edit/<?= $id ?>" class="btn btn-outline-success btn-sm">
                    <i class="far fa-edit"></i> Edit
                  </a>
                  <a href="<?php echo base_url(); ?>index.php/Region/delete/<?= $id ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you Sure to Delete?')"><i class="far fa-trash-alt"></i> Remove</a>
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
