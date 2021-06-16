<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-bus"></i> Transportation</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Transportation/add" class="btn btn-info"><i class="fas fa-plus"></i> Add New Transportation</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Transportation List</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Transportation Type</th>
                <th>Facility</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($transportationlist as $transportation): 
                $i++;
                $id = $transportation->id;
                $name = $transportation->name;
                $transportationtype = $transportation->transportationtype;
                $facility = $transportation->facility;
              ?>
              <tr>
                <td><?= $i ?>.</td>
                <td><?= $name ?></td>
                <td><?= $transportationtype ?></td>
                <td><?= $facility ?></td>
                <td>
                  <a href="<?php echo base_url(); ?>index.php/Transportation/edit/<?= $id ?>" class="btn btn-outline-success btn-sm">
                    <i class="far fa-edit"></i> Edit
                  </a>
                  <a href="<?php echo base_url(); ?>index.php/Transportation/delete/<?= $id ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you Sure to Delete?')"><i class="far fa-trash-alt"></i> Remove</a>
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
