<?php  
	foreach ($detailtourguide as $tourguide)
	{
		$tourguideid = $tourguide->tourguideid;
		$tourguidename = $tourguide->tourguidename;
		$email = $tourguide->email;
		$phone = $tourguide->phone;
		$address = $tourguide->address;
		$regionname = $tourguide->regionname;
		$country = $tourguide->country;
		$level = $tourguide->level;
		$gender = $tourguide->gender;
		$profilepicture = $tourguide->profilepicture;
		$description = $tourguide->description;
		$credentials = $tourguide->credentials;
		$experience = $tourguide->experience;
		$feesperday = $tourguide->feesperday;
		$staffname = $tourguide->staffname;
		$registered_at = $tourguide->registered_at;
	} 
  foreach ($avgrate as $avg)
  {
    $averagerate = $avg->avg_r;
  }
?>
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="far fa-clipboard"></i>
      <?php if ($this->session->userdata('role') == 'tourguide'): ?>
        My Profile
      <?php else: ?>
        Detail of <?= $tourguidename ?>
      <?php endif ?>
    </h1>
    <p class="mb-4 mt-3">
      <?php if ($this->session->userdata('role') == 'tourguide'): ?>
        <a href="<?php echo base_url().'index.php/Tourguide/edit/'. $this->session->userdata('id');?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
      <?php else: ?>
        <a href="<?php echo base_url(); ?>index.php/Tourguide" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
      <?php endif ?>
      
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Detail Info</h6>
      </div>
      <div class="card-body">
        <div class="row">
        	<div class="col-lg-6 text-center my-3">
        		<img src="<?php echo base_url(); ?>assets/backend/img/<?= $profilepicture ?>" class="w-50 shadow rounded" alt="user profile image" >
        	</div>

        	<div class="col-lg-6 my-3">
        		<h5 class="text-info font-weight-bold mb-4">Personal Info</h5>
            <div class="row">
              <label class="col-4 col-lg-3 font-weight-bold">Tour Guide ID: </label>
              <div class="col-8 col-lg-9">
                #<?= $tourguideid ?>
              </div>
            </div>

        		<div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Name: </label>
		          <div class="col-8 col-lg-9">
		            <?= $tourguidename ?>
                <small>(
                Avg Rate: 
                <span class="pl-2"><i class='fa fa-star pr-1' style='color: #F8D32D;'></i><?= $averagerate ?></span>
                )</small>
		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Gender: </label>
		          <div class="col-8 col-lg-9">
		            <?= $gender ?>
		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Email: </label>
		          <div class="col-8 col-lg-9">
		            <?= $email ?>
		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Phone: </label>
		          <div class="col-8 col-lg-9">
		            <?= $phone ?>
		          </div>
		        </div>

		        <div class="row">
		          <label class="col-4 col-lg-3 font-weight-bold">Address: </label>
		          <div class="col-8 col-lg-9">
		            <?= $address ?>
		          </div>
		        </div>

        	</div>
        </div>

        <hr class="divider">

      	<h5 class="text-info font-weight-bold mb-4 pl-lg-5">Tour Guide Info</h5>
      	<div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Region: </label>
          <div class="col-8 col-lg-9">
            <?= $regionname." - ".$country ?>
          </div>
        </div>

	      <div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Level: </label>
          <div class="col-8 col-lg-9">
            <?= $level ?>
          </div>
        </div>

	      <div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Experience: </label>
          <div class="col-8 col-lg-9">
          	<?= $experience ?>
          </div>
        </div>

	      <div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Fees per Day (USD): </label>
          <div class="col-8 col-lg-9">
          	<?= $feesperday ?>
          </div>
        </div>

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">Language
          <?php if ($this->session->userdata('role') == 'tourguide'): ?>
            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-plus"></i> Add New
            </button>
          <?php endif ?>
          
        </h5>
          <?php if (count($detaillanguagelist) == 0): ?>
          <div class="row pl-lg-5">
            <p class="font-italic pl-3">Nothing to show</p>
          </div>
          <?php else: ?>
            <?php  
              $i = 0;
              foreach ($detaillanguagelist as $d_language): 
              $i++;
              $tourguideid = $d_language->tourguideid;
              $languageid = $d_language->languageid;
              $languagename = $d_language->name;
              $level = $d_language->level;
            ?>
            <div class="row pl-lg-5">
              <label class="col-4 col-lg-3 font-weight-bold"><?= $languagename ?> </label>
              <div class="col-8 col-lg-9">
                <div class="w-25 d-inline-block">
                  <?php for ($i=0; $i < $level; $i++) { ?>
                    <span style="height: 18px; width: 20%" class="bg-info d-inline-block"></span>
                  <?php } ?>
                  
                  <?php for ($i=0; $i < (4-$level); $i++) { ?>
                    <span style="height: 18px; width: 20%" class="bg-light d-inline-block"></span>
                  <?php } ?>
                </div>

                  <?php 
                    switch ($level) {
                      case 1:
                        echo 'basic';
                        break;
                      case 2:
                        echo 'intermediate';
                        break;
                      case 3:
                        echo 'fluent';
                        break;
                      case 4:
                        echo 'advanced';
                        break;
                    }
                  ?>
              </div>
            </div>
            <?php endforeach; ?>
          <?php endif ?>
        

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">Description</h5>
      	<div class="row px-lg-5">
          <div class="col-12">
        		<?php if ($description == ""): ?>
        			<p class="font-italic pl-3">Nothing to show</p>
        		<?php else: ?>
        			<p class="font-italic pl-3"><?= $description ?></p>
        		<?php endif ?>
          </div>
        </div>

        <hr class="divider">

        <h5 class="text-info font-weight-bold mb-4 pl-lg-5">Credentials</h5>
      	<div class="row px-lg-5">
      		<?php if ($credentials == ""): ?>
      			<p class="font-italic pl-3">Nothing to show</p>
      		<?php else: ?>
      			<p class="font-italic pl-3"><?= $credentials ?></p>
      		<?php endif ?>
        </div>

        <hr class="divider">

      	<h5 class="text-info font-weight-bold mb-4 pl-lg-5">Registration Info</h5>
      	<div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Registered by: </label>
          <div class="col-8 col-lg-9">
            <?= $staffname ?>
          </div>
        </div>

	      <div class="row pl-lg-5">
          <label class="col-4 col-lg-3 font-weight-bold">Registered Date: </label>
          <div class="col-8 col-lg-9">
            <?= date("d M, Y", strtotime($registered_at)) ?>
          </div>
        </div>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Language</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>index.php/Tourguide/addlanguage/<?= $this->session->userdata('id'); ?>">
      <div class="modal-body">
        <input type="hidden" name="tourguideid" value="<?= $this->session->userdata('id'); ?>">
        <div class="form-group row">
          <label for="language" class="col-sm-2 col-form-label">Language: </label>
          <div class="col-sm-10">
            <select class="form-control" id="language" name="language" required>
              <option disabled>Select Language</option>
              <?php  
                $i = 0;
                foreach ($languagelist as $language): 
                $i++;
                $languageid = $language->languageid;
                $languagename = $language->name;
              ?>
              <option value="<?= $languageid ?>"><?= $languagename ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="fluency" class="col-sm-2 col-form-label">Fluency: </label>
          <div class="col-sm-10">
            <select class="form-control" id="fluency" name="fluency" required>
              <option disabled>Select Fluency</option>
              
              <option value="1">basic</option>
              <option value="2">intermidate</option>
              <option value="3">fluent</option>
              <option value="4">advanced</option>

            </select>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>