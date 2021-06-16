<?php  
  foreach ($edittransportation as $e_transportation)
  {
    $editid = $e_transportation->id;
    $editname = $e_transportation->name;
    $edittype = $e_transportation->transportationtype;
    $editfacility = $e_transportation->facility;
  } 
?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-bus"></i> Transportation</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Transportation" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Edit Transportation</h6>
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url(); ?>index.php/Transportation/update" >

          <input type="hidden" name="editid" value="<?= $editid ?>">

          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name: </label>
            <div class="col-sm-10">
              <input type="text" name="editname" class="form-control" id="name" placeholder="Enter Transportation Name" required autofocus value="<?= $editname ?>" >
            </div>
          </div>

          <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Transportation Type: </label>
            <div class="col-sm-10">
              <select class="form-control" id="type" name="edittype" required>
                <option disabled selected>Select Transportation Type</option>
                <option value="Private Car" <?php if($edittype =='Private Car') echo "selected" ?>>Privater Car</option>
                <option value="Mini Bus" <?php if($edittype =='Mini Bus') echo "selected" ?>>Mini Bus</option>
                <option value="Subway" <?php if($edittype =='Subway') echo "selected" ?>>Subway</option>
                <option value="Boat" <?php if($edittype =='Boat') echo "selected" ?>>Boat</option>
                <option value="Cruise Ship" <?php if($edittype =='Cruise Ship') echo "selected" ?>>Cruise Ship</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="facility" class="col-sm-2 col-form-label">Facility: </label>
            <div class="col-sm-10">
              <textarea class="form-control" id="facility" name="editfacility" rows="4" placeholder="Describe Facility" required><?= $editfacility ?></textarea>
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
