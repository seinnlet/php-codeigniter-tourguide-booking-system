<?php 
  $count = count($todaytourlist);
?>
<li class="nav-item dropdown no-arrow mx-1">
  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>
    <!-- Counter - Messages -->
    <?php if ($count != 0): ?>
      <span class="badge badge-danger badge-counter">
      <?= $count ?>+</span>
    <?php endif ?>
  </a>
  <!-- Dropdown - Messages -->
  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header bg-info border-info">
      Today's New Tours
    </h6>

    <?php if (count($todaytourlist) == 0): ?>
                  
    <a class="dropdown-item d-flex align-items-center py-3" href="javascript:void(0)">
      <div class="mr-3">
        <div class="icon-circle bg-info">
          <i class="fas fa-file-alt text-white"></i>
        </div>
      </div>
      <div>
        <span class="text-secondary">There is no new tour for today.</span>
      </div>
    </a>

  <?php else: ?>
    <?php foreach ($todaytourlist as $tour): ?>
      <?php 
        $tourid = $tour->tourid;
        $tourname = $tour->name;
        $tourguidename = $tour->tourguidename;
        $image = $tour->image;
        $created_at = date('H:i', strtotime($tour->created_at));
        $status = $tour->status;
        $transportationid = $tour->transportationid;
        if ($transportationid != NULL) {
          $tid = 't_s';
        } else {
          $tid = 't_c';
        }
      ?>

      <a class="dropdown-item d-flex align-items-center" href="<?= base_url().'index.php/Tour/detail/'.$tourid.'/'.$status.'/'.$tid ?>">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="<?= base_url().'assets/backend/img/tour/'.$image ?>" alt="tour image">
        </div>
        <div class="font-weight-bold">
          <div class="text-truncate"><?= $tourname ?></div>
          <div class="small text-gray-500"><?= $tourguidename ?> · at <?= $created_at ?></div>
        </div>
      </a>

    <?php endforeach ?>

  <?php endif ?>
    <a class="dropdown-item text-center small text-gray-500" href="<?= base_url().'index.php/Tour/alltourlist' ?>">View All Tours</a>
  </div>
</li>