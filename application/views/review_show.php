<?php  
	foreach ($showreview as $review)
	{
    $profilepicture = $review->profilepicture;
    $username = $review->username;
    $rating = $review->rating;
    $feedback = $review->feedback;
    $date = date('d M, Y', strtotime($review->date));
  }
?>

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-comments"></i>
      Review
    </h1>

    <p class="mb-4 mt-3">
      <a href="<?= base_url().'index.php/Review' ?>" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Feedback</h6>
      </div>
      <div class="card-body">
        <div class="row mb-2">
          <div class="col-2 col-md-1">
            <img class="w-100 rounded-circle" src="<?= base_url().'assets/frontend/images/profile/'.$profilepicture ?>" alt="user profile">
          </div>
          <div class="col-10">
            <span class="font-weight-bold"><?= $username ?></span>
            <br>
            <span class="text-secondary"><?= $date ?></span>
            <br>
            <p class="m-0 mt-2"><small>
              <?php 
                  for ($i=0; $i < 5; $i++) { 
                    echo "<i class='fa fa-star pr-1' style='color: #F8D32D;'></i>";
                  }
                ?> <?= $rating ?>
            </small></p>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <p class="my-3">"<?= $feedback ?>"</p>
          </div>
        </div>
      </div>
    </div>


  </div>