<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-table"></i> Tour</h1>
    <p class="mb-4 mt-3">
      <a href="<?php echo base_url(); ?>index.php/Tour" class="btn btn-info"><i class="fas fa-angle-left"></i> Back</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Add New Tour</h6>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart(base_url().'index.php/Tour/store');?>

          <div class="form-group row">
            <label for="tourname" class="col-sm-2 col-form-label">Tour Name: </label>
            <div class="col-sm-10">
              <input type="text" name="tourname" class="form-control <?php if(form_error('tourname')) echo "is-invalid" ?>" id="tourname" placeholder="Enter Tour Name" required autofocus value="<?php echo set_value('tourname');?>" >
              <?php if(form_error('tourname')) echo form_error('tourname', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Tour Image: </label>
            <div class="col-sm-10">
              <input type="file" name="image" required id="image" value="<?php echo set_value('image');?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="tourtype" class="col-sm-2 col-form-label">Tour Type: </label>
            <div class="col-sm-10">
              <select class="form-control <?php if(form_error('tourtype')) echo "is-invalid" ?>" id="tourtype" name="tourtype" required>
                <option disabled selected>Select Tour Type</option>
                <?php  
                  $i = 0;
                  foreach ($tourtypelist as $tourtype): 
                  $i++;
                  $tourtypeid = $tourtype->tourtypeid;
                  $tourtypename = $tourtype->name;
                ?>
                <option value="<?= $tourtypeid ?>" <?php if(set_value('tourtype')==$tourtypeid) echo "selected" ?>><?= $tourtypename ?></option>
                <?php endforeach; ?>
              </select>
              <?php if(form_error('tourtype')) echo form_error('tourtype', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="region" class="col-sm-2 col-form-label">Region: </label>
            <div class="col-sm-10">
              <select class="form-control <?php if(form_error('region')) echo "is-invalid" ?>" id="region" name="region" required>
                <option disabled selected>Select Region</option>
                <?php  
                  $i = 0;
                  foreach ($regionlist as $region): 
                  $i++;
                  $regionid = $region->regionid;
                  $regionname = $region->regionname;
                  $country = $region->country;
                ?>
                <option value="<?= $regionid ?>" <?php if(set_value('region')==$regionid) echo "selected" ?>><?= $regionname ?> - <?= $country ?></option>
                <?php endforeach; ?>
              </select>
              <?php if(form_error('region')) echo form_error('region', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Transportation: </label>
            <div class="col-sm-10 py-2">

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="support" name="rdotransportation" class="custom-control-input" value="Support" <?php if (form_error('rdotransportation') && (set_value('rdotransportation') == 'Support')) {echo 'checked';} else {echo "checked";}?>>
                <label class="custom-control-label" for="support">I want to request from locals one.</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="manage" name="rdotransportation" class="custom-control-input" value="Manage" <?php if(set_value('rdotransportation') == 'Manage') echo 'checked';?>>
                <label class="custom-control-label" for="manage">I will manage by myself.</label>
              </div>

              <select class="form-control mt-3 <?php if(form_error('transportation')) echo "is-invalid" ?>" id="transportationid" name="transportationid">
                <option disabled selected>Select Transportation</option>
                <?php  
                  $i = 0;
                  foreach ($transportationlist as $transportation): 
                  $i++;
                  $transportationid = $transportation->id;
                  $transportationname = $transportation->name;
                  $transportationtype = $transportation->transportationtype;
                ?>
                <option value="<?= $transportationid ?>" <?php if(set_value('transportation')==$transportationid) echo "selected" ?>><?= $transportationtype ?> - <?= $transportationname ?></option>
                <?php endforeach; ?>
              </select>
              <?php if(form_error('transportation')) echo form_error('transportation', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>

              <textarea id="transportation" name="transportation" class="form-control mt-3" placeholder="Custom Transportation..." rows="4"><?php echo set_value('transportation');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="tourprice" class="col-sm-2 col-form-label">Tour Price (USD): </label>
            <div class="col-sm-10">
              <input type="number" name="tourprice" class="form-control <?php if(form_error('tourprice')) echo "is-invalid" ?>" id="tourprice" placeholder="Enter Tour Price" required value="<?php echo set_value('tourprice');?>" min="0" max="5000">
            </div>
          </div>

          <div class="form-group row">
            <label for="noofpeoplelimit" class="col-sm-2 col-form-label">Maximum People: </label>
            <div class="col-sm-10">
              <input type="number" name="noofpeoplelimit" class="form-control <?php if(form_error('noofpeoplelimit')) echo "is-invalid" ?>" id="noofpeoplelimit" placeholder="Enter No of Maximum People" required value="<?php echo set_value('noofpeoplelimit');?>" min="1" max="30">
            </div>
          </div>

          <div class="form-group row">
            <label for="durationhour" class="col-sm-2 col-form-label">Duration (Day): </label>
            <div class="col-sm-10">
              <input type="number" name="durationhour" class="form-control <?php if(form_error('durationhour')) echo "is-invalid" ?>" id="durationhour" placeholder="Enter Duration Days" required value="<?php echo set_value('durationhour');?>" min="1" max="1000">
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description: </label>
            <div class="col-sm-10">
              <textarea id="description" name="description" class="form-control" placeholder="Description of tour..." required rows="4"><?php echo set_value('description');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="meetingpoint" class="col-sm-2 col-form-label">Meeting Point: </label>
            <div class="col-sm-10">
              <textarea id="meetingpoint" name="meetingpoint" class="form-control" placeholder="The place to meet with travellers..." required rows="2"><?php echo set_value('meetingpoint');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="endpoint" class="col-sm-2 col-form-label">End Point: </label>
            <div class="col-sm-10">
              <textarea id="endpoint" name="endpoint" class="form-control" placeholder="The place to the tour ends..." required rows="2"><?php echo set_value('endpoint');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="tourroute" class="col-sm-2 col-form-label">Tour Route: </label>
            <div class="col-sm-10">
              <textarea id="tourroute" name="tourroute" class="form-control summernote" style="border: 1px solid #d1d3e2 !important;" required><?php echo set_value('tourroute');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="restriction" class="col-sm-2 col-form-label">Restrictions: </label>
            <div class="col-sm-10">
              <textarea id="restriction" name="restriction" class="form-control" placeholder="Restrictions of tour..." required rows="4"><?php echo set_value('restriction');?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="tourguide" class="col-sm-2 col-form-label">Created by: </label>
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
