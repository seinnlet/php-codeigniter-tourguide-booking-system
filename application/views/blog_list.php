<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-clipboard-list"></i> Blog</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Blog/add" class="btn btn-info"><i class="fas fa-plus"></i> Add New Blog</a>
    </p>
    <!-- Cards -->
    <?php if (count($bloglist) == 0): ?>
      <p class="font-italic">You haven't write any blogs. Create new blog to introduce your region beauty!</p>
    <?php else: ?>
      <div class="row">
        <?php  
          $i = 0;
          foreach ($bloglist as $blog): 
          $i++;
          $id = $blog->blogid;
          $title = $blog->title;
          $img = $blog->image;
          $description = $blog->description;
          $likecount = $blog->c_like;
        ?>

        
          <div class="col-lg-6">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold"><span class="font-weight-bold text-info">Blog ID #<?= $id ?></span> : <?= $title ?></h6>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Action</div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/Blog/edit/<?= $id ?>"><i class="far fa-edit"></i> Edit</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/Blog/delete/<?= $id ?>" onclick="return confirm('Are you Sure to Delete?')"><i class="far fa-trash-alt"></i> Remove</a>
                  </div>
                </div>
              </div>
              <!-- Card Body -->
              <div class="card-body" style="height: 350px; overflow-y: scroll;">
                <img src="<?= base_url().'assets/backend/img/blog/'.$img ?>" class="shadow rounded w-50 m-auto">
                <span class="ml-3">Total Like: <?= $likecount ?></span>
                <p><?= $description ?></p>
              </div>
            </div>

          </div>
        <?php endforeach; ?>
    </div>
  <?php endif ?>
  </div>
  <!-- /.container-fluid -->
