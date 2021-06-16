<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-table"></i> Tour</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Tour/add" class="btn btn-info"><i class="fas fa-plus"></i> Add New Tour</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">My Tours</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID.</th>
                <th>Tour_Name</th>
                <th>Tour Type</th>
                <th>Region</th>
                <th>Price(USD)</th>
                <th>Created_at</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($tourlist as $tour): 
                $i++;
                $id = $tour->tourid;
                $name = $tour->name;
                $tourtype = $tour->tourtypename;
                $regionname = $tour->regionname;
                $country = $tour->country;
                $tourprice = $tour->tourprice;
                $transportationid = $tour->transportationid;
                $date = $tour->created_at;
                $status = $tour->status;

                if ($transportationid != NULL) {
                  $tid = 't_s';
                } else {
                  $tid = 't_c';
                }
              ?>
              <tr>
                <td><?= $id ?>.</td>
                <td>"<?= $name ?>"</td>
                <td><?= $tourtype ?></td>
                <td><?= $regionname . ' - ' . $country ?></td>
                <td>
                  <?= $tourprice ?>
                </td>
                <td><?= date("d M, Y", strtotime($date)) ?></td>
                <td>
                  <?php if ($status == "appending"): ?>
                    <span class="badge badge-info"><?= $status ?></span>
                  <?php else: ?>
                    <span class="badge badge-success"><?= $status ?></span>
                  <?php endif ?>
                </td>
                <td class="w-25">
                  <a href="<?php echo base_url(); ?>index.php/Tour/edit/<?= $id ?>" class="btn btn-outline-success btn-sm">
                    <i class="far fa-edit"></i> Edit
                  </a>
                  <a href="<?php echo base_url(); ?>index.php/Tour/detail/<?= $id ?>/<?= $status ?>/<?= $tid ?>" class="btn btn-outline-info btn-sm">
                    <i class="far fa-eye"></i> Detail
                  </a>
                  <a href="<?php echo base_url(); ?>index.php/Tour/delete/<?= $id ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you Sure to Delete?')"><i class="far fa-trash-alt"></i> Remove</a>
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
