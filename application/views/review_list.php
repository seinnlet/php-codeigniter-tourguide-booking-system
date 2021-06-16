<?php  
  foreach ($avgrate as $avg)
  {
    $averagerate = $avg->avg_r;
  }
?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-comments"></i> Review</h1>
    <p class="mb-4 mt-3">
      <span class="mr-2">Rate: </span>
      <?php 
        for ($i=0; $i < 5; $i++) { 
          echo "<i class='fa fa-star pr-1' style='color: #F8D32D;'></i>";
        }
      ?>
      <span class="pl-2"><?= $averagerate ?></span>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">All Reviews</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Traveller Name</th>
                <th>Rate</th>
                <th>Date</th>
                <th>Feedback</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                $i = 0;
                foreach ($ratelist as $rate): 
                $i++;
                $id = $rate->rateid;
                $username = $rate->username;
                $rating = $rate->rating;
                $date = date('d M, Y', strtotime($rate->date));
              ?>
                <tr>
                  <td><?= $i ?>.</td>
                  <td><?= $username ?></td>
                  <td><i class='fa fa-star pr-1' style='color: #F8D32D;'></i> <?= $rating ?></td>
                  <td><?= $date ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>index.php/Review/show/<?= $id ?>" class="btn btn-outline-info btn-sm">
                    <i class="far fa-eye"></i> View Feedback
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
