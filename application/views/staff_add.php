<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-user-friends"></i> Staff</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Staff/" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Add New Staff</h6>
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url(); ?>index.php/Staff/store" >

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Staff Name" required autofocus value="<?php echo set_value('name');?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control <?php if (form_error('email')): ?>
                is-invalid
              <?php endif ?>" id="email" placeholder="Enter Email Address" required autocomplete="off" value="<?php echo set_value('email');?>">
              <?php if(form_error('email')) echo "<div class='invalid-feedback'>This email is already Existed!</div>"; ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone: </label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required value="<?php echo set_value('phone');?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter Staff Address" required><?php echo set_value('address');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role: </label>
            <div class="col-sm-10">
              <select class="form-control" id="role" name="role">
                <option value="Staff" <?php if(set_value('role')=='Staff') echo "selected" ?>>Staff</option>
                <option value="Manager" <?php if(set_value('role')=='Manager') echo "selected" ?>>Manager</option>
              </select>
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
