<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-table"></i> Tour</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Tourguide" class="btn btn-info"><i class="fas fa-user-friends"></i> See All Tour Guides</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">All Tours</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tour_ID.</th>
                <th>Tour_Name</th>
                <th>Tour Type</th>
                <th>Created_by</th>
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
                $transportationid = $tour->transportationid;
                $tourguidename = $tour->tourguidename;
                $date = $tour->created_at;
                $status = $tour->status;

                if ($transportationid != NULL) {
                  $tid = 't_s';
                } else {
                  $tid = 't_c';
                }
              ?>
              <tr>
                <td><?= $i ?>.</td>
                <td>#<?= $id ?></td>
                <td>"<?= $name ?>"</td>
                <td><?= $tourtype ?></td>
                <td>
                  <?= $tourguidename ?>
                </td>
                <td><?= date("d M, Y", strtotime($date)) ?></td>
                <td>
                  <?php if ($status == "appending"): ?>
                    <span class="badge badge-info"><?= $status ?></span>
                  <?php else: ?>
                    <span class="badge badge-success"><?= $status ?></span>
                  <?php endif ?>
                </td>
                <td style="width: 20%;">
                  <?php if ($status == 'appending'): ?>
                    <a href="<?php echo base_url(); ?>index.php/Tour/approve/<?= $id ?>/<?= $this->session->userdata('staffid'); ?>" class="btn btn-outline-success btn-sm">
                      <i class="fas fa-check"></i> Approve
                    </a>
                  <?php endif ?>
                   
                  <a href="<?php echo base_url(); ?>index.php/Tour/detail/<?= $id ?>/<?= $status ?>/<?= $tid ?>" class="btn btn-outline-info btn-sm">
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
