<?php  
  foreach ($edittour as $tour)
  {
    $tourid = $tour->tourid;
    $tourname = $tour->name;
    $tourimage = $tour->image;
    $e_tourtypeid = $tour->tourtypeid;
    $e_transportationid = $tour->transportationid;
    $e_transportation = $tour->transportation;
    $tourprice = $tour->tourprice;
    $noofpeoplelimit = $tour->noofpeoplelimit;
    $duration = $tour->duration;
    $image = $tour->image;
    $description = $tour->description;
    $tourroute = $tour->tourroute;
    $restriction = $tour->restriction;
    $meetingpoint = $tour->meetingpoint;
    $endingpoint = $tour->endingpoint;
    $e_regionid = $tour->regionid;
  } 
?>
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
        <h6 class="m-0 font-weight-bold text-info">Edit Tour #<?= $tourid ?></h6>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart(base_url().'index.php/Tour/update');?>
          <input type="hidden" name="tourid" value="<?= $tourid ?>">

          <div class="form-group row">
            <label for="tourname" class="col-sm-2 col-form-label">Tour Name: </label>
            <div class="col-sm-10">
              <input type="text" name="tourname" class="form-control" id="tourname" placeholder="Enter Tour Name" required autofocus value="<?= $tourname ;?>" >
              <?php if(form_error('tourname')) echo form_error('tourname', '<div style="color: #dc3545; font-size: 80%; margin-top: 5px;">', '</div>'); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="profile" class="col-sm-2 col-form-label">Tour Image : </label>
            <div class="col-sm-10">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Current Image</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Image</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <input type="hidden" name="oldimage" value="<?= $tourimage ?>">
                  <img src="<?php echo base_url().'assets/backend/img/tour/'.$tourimage ?>" width="100" class="mt-2">
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <input type="file" name="image" accept="image/png,image/jpeg,image/gif,image/jpg" class="my-5">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="tourtype" class="col-sm-2 col-form-label">Tour Type: </label>
            <div class="col-sm-10">
              <select class="form-control" id="tourtype" name="tourtype" required>
                <?php  
                  $i = 0;
                  foreach ($tourtypelist as $tourtype): 
                  $i++;
                  $tourtypeid = $tourtype->tourtypeid;
                  $tourtypename = $tourtype->name;
                ?>
                <option value="<?= $tourtypeid ?>" <?php if($e_tourtypeid==$tourtypeid) echo "selected" ?>><?= $tourtypename ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="region" class="col-sm-2 col-form-label">Region: </label>
            <div class="col-sm-10">
              <select class="form-control" id="region" name="region" required>
                <?php  
                  $i = 0;
                  foreach ($regionlist as $region): 
                  $i++;
                  $regionid = $region->regionid;
                  $regionname = $region->regionname;
                  $country = $region->country;
                ?>
                <option value="<?= $regionid ?>" <?php if($e_regionid==$regionid) echo "selected" ?>><?= $regionname ?> - <?= $country ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="transportation" class="col-sm-2 col-form-label">Transportation: </label>
            <div class="col-sm-10">
              <?php if ($e_transportationid == NULL): ?>
                <textarea id="transportation" name="transportation" class="form-control" placeholder="Description of tour..." required rows="2"><?= $e_transportation ?></textarea>
              <?php else: ?>
                <select class="form-control" id="transportationid" name="transportation" required>
                  <?php  
                    $i = 0;
                    foreach ($transportationlist as $transportation): 
                    $i++;
                    $transportationid = $transportation->id;
                    $transportationname = $transportation->name;
                    $transportationtype = $transportation->transportationtype;
                  ?>
                  <option value="<?= $transportationid ?>" <?php if($e_transportationid==$transportationid) echo "selected" ?>><?= $transportationtype ?> - <?= $transportationname ?></option>
                  <?php endforeach; ?>
                </select>
              <?php endif ?>
                
            </div>
          </div>

          <div class="form-group row">
            <label for="tourprice" class="col-sm-2 col-form-label">Tour Price (USD): </label>
            <div class="col-sm-10">
              <input type="number" name="tourprice" class="form-control" id="tourprice" placeholder="Enter Tour Price" required value="<?= $tourprice ?>" min="0" max="5000">
            </div>
          </div>

          <div class="form-group row">
            <label for="noofpeoplelimit" class="col-sm-2 col-form-label">Maximum People: </label>
            <div class="col-sm-10">
              <input type="number" name="noofpeoplelimit" class="form-control " id="noofpeoplelimit" placeholder="Enter No of Maximum People" required value="<?= $noofpeoplelimit ?>" min="1" max="30">
            </div>
          </div>

          <div class="form-group row">
            <label for="duration" class="col-sm-2 col-form-label">Duration (Day): </label>
            <div class="col-sm-10">
              <input type="number" name="duration" class="form-control" id="duration" placeholder="Enter Duration Days" required value="<?= $duration ?>" min="1" max="1000">
            </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description: </label>
            <div class="col-sm-10">
              <textarea id="description" name="description" class="form-control" placeholder="Description of tour..." required rows="4"><?= $description ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="meetingpoint" class="col-sm-2 col-form-label">Meeting Point: </label>
            <div class="col-sm-10">
              <textarea id="meetingpoint" name="meetingpoint" class="form-control" placeholder="The place to meet with travellers..." required rows="2"><?= $meetingpoint ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="endpoint" class="col-sm-2 col-form-label">End Point: </label>
            <div class="col-sm-10">
              <textarea id="endpoint" name="endpoint" class="form-control" placeholder="The place to the tour ends..." required rows="2"><?= $endingpoint ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="tourroute" class="col-sm-2 col-form-label">Tour Route: </label>
            <div class="col-sm-10">
              <textarea id="tourroute" name="tourroute" class="form-control summernote" style="border: 1px solid #d1d3e2 !important;" required><?= $tourroute ;?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="restriction" class="col-sm-2 col-form-label">Restrictions: </label>
            <div class="col-sm-10">
              <textarea id="restriction" name="restriction" class="form-control" placeholder="Restrictions of tour..." required rows="4"><?= $restriction ?></textarea>
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
