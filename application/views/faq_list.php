<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-comments"></i> FAQ</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Faq/add" class="btn btn-info"><i class="fas fa-plus"></i> Add New FAQ</a>
    </p>

    <!-- Cards -->
    <div class="row">
      <?php  
        $i = 0;
        foreach ($faqlist as $faq): 
        $i++;
        $id = $faq->id;
        $question = $faq->question;
        $answer = $faq->answer;
      ?>
      <div class="col-lg-12">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold"><span class="font-weight-bold text-info">Q<?= $id ?></span> : <?= $question ?></h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Action</div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/Faq/edit/<?= $id ?>"><i class="far fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/Faq/delete/<?= $id ?>" onclick="return confirm('Are you Sure to Delete?')"><i class="far fa-trash-alt"></i> Remove</a>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <?= $answer ?>
          </div>
        </div>

      </div>
      <?php endforeach; ?>

    </div>
  </div>
  <!-- /.container-fluid -->
