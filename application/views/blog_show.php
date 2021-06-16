<?php  
	foreach ($showblog as $blog)
	{
		$blogid = $blog->blogid;
    $image = $blog->image;
    $title = $blog->title;
    $description = $blog->description;
    $postdate = date("d M, Y", strtotime($blog->postdate));
    $tourguidename = $blog->tourguidename;
    $tourguideid = $blog->tourguideid;
  }
?>
<div class="innerpage-banner">
  <div class="layer1"></div>
</div>

<section class="blogdetail py-5">
  <div class="container py-3">
  <h3 class="heading text-center mb-md-5 mb-4"> Blog Detail </h3>
    <div class="row">
      <div class="col-md-4 order-2">
      	<div class="blogs bg-white">
      		<div class="card p-4">
      			<h5 class="font-weight-bold">Recent Blogs</h5>

      			<?php  
			        $i = 0;
			        foreach ($recentbloglist as $r_blog): 
			        $i++;
			        $r_blogid = $r_blog->blogid;
			        $r_title = $r_blog->title;
			        $r_postdate = $r_blog->postdate;
			        $r_image = $r_blog->image;
			      ?>
			      <a href="<?= base_url().'index.php/Blog/show/'.$r_blogid ?>" class="font-weight-bold readmore">
			      <div class="row my-4">
								<div class="col-sm-4">
									<img src="<?= base_url().'assets/backend/img/blog/'.$r_image ?>" alt="blog image" style="width: 100%;" class="rounded mb-3">
								</div>
								<div class="col-sm-8">
									<p class="font-weight-bold"><?= $r_title ?></p>
									<hr style="border: 1px solid #f2994a;" class="ml-0 w-25 rounded my-2">
									<p class="text-secondary font-italic">
										<small>Posted at <?= date("d M, Y", strtotime($r_postdate)) ?></small></p>
								</div>
							</div>
							</a>
							<hr class="my-0">
			      <?php endforeach; ?>
			      <a href="<?= base_url().'index.php/Blog/showall' ?>" class="btn btn-outline-secondary btn-block mt-4 mb-2">View All</a>
      		</div>
      	</div>
      </div>
      <div class="col-md-8 order-1">
      	<h4 class="font-weight-bold"><?= $title ?></h4>
      	<hr style="border: 1px solid #f2994a;" class="ml-0 w-25 rounded">
      	<p class="text-secondary font-italic my-3">
					<span class="text-dark">Written by<a href="<?= base_url().'index.php/Tourguide/show/'.$tourguideid ?>" class="text-info btn-link"><strong> <?= $tourguidename ?></strong> <sup><i class="fa fa-external-link"></i></sup></a></span>
					<br><small>Posted at <?= $postdate ?></small>
				</p>

      	<img src="<?= base_url().'assets/backend/img/blog/'.$image ?>" alt="blog image" class="rounded mb-3 w-50">

      	<div class="blog-description mt-4">
      		<?= $description ?>
      	</div>

      	<?php if ($this->session->userdata('id')): ?>
      		<div class="blogs">
	      		<div class="card mb-4">
	      			<div class="row p-3">
	      				<div class="col-6 text-secondary">Total Like: <?= count($countlike) ?></div>
	      				<div class="col-6 text-right">
	      					<?php if (count($checklike) == 0): ?>
	      						<a href="<?= base_url().'index.php/Blog/like/'.$blogid ?>" id="like" class="text-secondary py-3 pl-3"><i class="fa fa-thumbs-up mr-2"></i>Like</a>
	      					<?php else: ?>
	      						<a href="<?= base_url().'index.php/Blog/unlike/'.$blogid ?>" id="unlike" class="py-3 pl-3" title="Click to Unlike"><i class="fa fa-thumbs-up mr-2"></i>Liked</a>
	      					<?php endif ?>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
      	<?php endif ?>
	      	
      </div>
    </div>
  </div>
</section>