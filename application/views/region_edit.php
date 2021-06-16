<?php  
	foreach ($editregion as $e_region)
	{
		$editregionid = $e_region->regionid;
		$editregionname = $e_region->regionname;
		$editcountry = $e_region->country;
	} 
?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-map-marked-alt"></i> Region</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Region" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Edit Region</h6>
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url(); ?>index.php/Region/update" >

        	<input type="hidden" name="regionid" value="<?= $editregionid ?>">

          <div class="form-group row">
            <label for="regionname" class="col-sm-2 col-form-label">Region Name: </label>
            <div class="col-sm-10">
              <input type="text" name="editregionname" class="form-control" id="regionname" placeholder="Enter Region Name" required autofocus value="<?= $editregionname ?>" >
  
            </div>
          </div>

          <div class="form-group row">
            <label for="country" class="col-sm-2 col-form-label">Country: </label>
            <div class="col-sm-10">
              <select class="form-control" id="country" name="editcountry" required>
                <option disabled selected>Select Country</option>
                <?php  
                  $i = 0;
                  foreach ($countrylist as $country): 
                  $i++;
                  $countryname = $country->countryname;
                ?>
                <option value="<?= $countryname ?>" <?php if($editcountry==$countryname) echo "selected" ?>><?= $countryname ?></option>
                <?php endforeach; ?>
              </select>
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
