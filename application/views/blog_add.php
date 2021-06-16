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
        <h6 class="m-0 font-weight-bold text-info">Add New Blog</h6>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart(base_url().'index.php/Blog/store');?>

          <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title: </label>
            <div class="col-sm-10">
              <textarea id="title" name="title" class="form-control" rows="3" placeholder="Title of the blog" required autofocus><?php echo set_value('title');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image: </label>
            <div class="col-sm-10">
              <input type="file" name="image" required id="image" accept="image/png,image/jpeg,image/gif,image/jpg" class="my-3">
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description: </label>
            <div class="col-sm-10">
              <textarea id="description" name="description" class="form-control summernote" style="border: 1px solid #d1d3e2 !important;" required><?php echo set_value('description');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="tourguide" class="col-sm-2 col-form-label">Written by: </label>
            <div class="col-sm-10">
              <input type="hidden" name="tourguideid" value="<?php echo $this->session->userdata('id'); ?>">
              <input type="text" name="tourguide" class="form-control bg-white" id="tourguide" value="<?php echo $this->session->userdata('name'); ?>" readonly>
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="submit" name="btnsave" value="Save" class="btn btn-info">
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
