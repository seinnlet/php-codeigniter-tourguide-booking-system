<?php  
  foreach ($editblog as $e_blog)
  {
    $editblogid = $e_blog->blogid;
    $edittitle = $e_blog->title;
    $editdescription = $e_blog->description;
    $editimage = $e_blog->image;
  } 
?>

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-clipboard-list"></i> Blog</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Blog" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Edit Blog</h6>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart(base_url().'index.php/Blog/update');?>

          <input type="hidden" name="blogid" value="<?= $editblogid ?>">

          <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title: </label>
            <div class="col-sm-10">
              <textarea id="title" name="title" class="form-control" rows="3" placeholder="Title of the blog" required autofocus><?= $edittitle ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image: </label>
            <div class="col-sm-10">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Current Image</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Image</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <input type="hidden" name="oldimage" value="<?= $editimage ?>">
                  <img src="<?php echo base_url().'assets/backend/img/blog/'.$editimage ?>" width="100" class="mt-2">
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <input type="file" name="image" accept="image/png,image/jpeg,image/gif,image/jpg" class="my-5">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description: </label>
            <div class="col-sm-10">
              <textarea id="description" name="description" class="form-control summernote" style="border: 1px solid #d1d3e2 !important;" required><?= $editdescription ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="tourguide" class="col-sm-2 col-form-label">Written by: </label>
            <div class="col-sm-10">
              <input type="text" name="tourguide" class="form-control bg-white" id="tourguide" value="<?php echo $this->session->userdata('name'); ?>" readonly>
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="submit" name="btnsave" value="Update" class="btn btn-info">
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
