<div class="innerpage-banner">
	<div class="layer1">
	</div>
</div>

<!-- all tour list -->
<section class="tours py-5">
	<div class="container py-3">
	<h3 class="heading text-center mb-md-5 mb-4"> <?php if (!isset($searchbloglist)) {echo 'All';} else {echo 'Searched';} ?> Blogs </h3>
		<div class="row">
			<div class="col-md-3">
				<div class="card mb-4">
					<h5 class="p-3 text-white" style="background-color: #f2994a;">Filters</h5>
					<div class="card-body">
						<form method="post" action="<?= base_url().'index.php/Blog/search' ?>">
							<p class="text-secondary mb-2"><small>Search by Keywords</small></p>
							<p>
								<input type="text" name="keyword" placeholder="Enter Keywords" class="form-control rounded py-2 mb-3" value="<?= set_value('keyword') ?>">
							</p>

							<p class="text-secondary mb-2"><small>Search by Months</small></p>
							<div class="row">
								<div class="col-6 pr-1">
									<p class="text-secondary mb-2"><small>Month</small></p>
									<div class="form-group">
										<select class="form-control rounded" name="month">
											<option selected disabled>Month</option>
											<?php  
				                for ($i = 1; $i <= 12; $i++): 
				              ?>
				              <option value="<?= $i ?>" <?php if(set_value('month')==$i) echo 'selected' ?>><?= $i ?></option>
				              <?php endfor; ?>
										</select>
									</div>
								</div>
								<div class="col-6">
									<p class="text-secondary mb-2"><small>Year</small></p>
									<div class="form-group">
										<select class="form-control rounded" name="year">
											<?php  
				                for ($i = 2020; $i >= 2018; $i--): 
				              ?>
				              <option value="<?= $i ?>" <?php if(set_value('year')==$i) echo 'selected' ?>><?= $i ?></option>
				              <?php endfor; ?>
										</select>
									</div>
								</div>
									
							</div>
							
							<p>
								<input type="submit" name="btnsearch"	value="Search" class="btn btn-outline-secondary btn-block mt-4">
							</p>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-9">

				<?php if (!isset($searchbloglist)): ?>

				<div class="row blogs bg-white">

					<?php  
		        $i = 0;
		        foreach ($bloglist as $blog): 
		        $i++;
		        $blogid = $blog->blogid;
		        $title = $blog->title;
		        $postdate = $blog->postdate;
		        $image = $blog->image;
		        $tourguidename = $blog->tourguidename;
		      ?>

					<div class="col-md-6">
						<div class="card p-4 mb-3">
							<div class="row">
								<div class="col-sm-4">
									<img src="<?= base_url().'assets/backend/img/blog/'.$image ?>" alt="blog image" style="width: 100%;" class="rounded mb-3">
								</div>
								<div class="col-sm-8">
									<h5><?= $title ?></h5>
									<hr style="border: 1px solid #f2994a;" class="ml-0 w-25 rounded">
									<p class="text-secondary font-italic">
										<span class="text-dark"><small>By <?= $tourguidename ?></small></span>
										<br><small>Posted at <?= date("d M, Y", strtotime($postdate)) ?></small></p>
									<p class="text-right mt-3">
										<a href="<?= base_url().'index.php/Blog/show/'.$blogid ?>" class="font-weight-bold readmore">Read More</a>
									</p>
								</div>
							</div>
						</div>
					</div>

					<?php endforeach; ?>
				
				</div>

				<?php else: ?>
				<!-- searched tour -->
				<h4 class="mb-4">Searched Result</h4>
				<?php if (count($searchbloglist) == 0): ?>
					
					<div class="font-italic col-12 mb-4">Sorry, there is no matched result for your search...</div>

				<?php else: ?>

					<div class="row blogs bg-white">

						<?php  
			        $i = 0;
			        foreach ($searchbloglist as $blog): 
			        $i++;
			        $blogid = $blog->blogid;
			        $title = $blog->title;
			        $postdate = $blog->postdate;
			        $image = $blog->image;
			        $tourguidename = $blog->tourguidename;
			      ?>

						<div class="col-md-6">
							<div class="card p-4 mb-3">
								<div class="row">
									<div class="col-sm-4">
										<img src="<?= base_url().'assets/backend/img/blog/'.$image ?>" alt="blog image" style="width: 100%;" class="rounded mb-3">
									</div>
									<div class="col-sm-8">
										<h5><?= $title ?></h5>
										<hr style="border: 1px solid #f2994a;" class="ml-0 w-25 rounded">
										<p class="text-secondary font-italic">
											<span class="text-dark"><small>By <?= $tourguidename ?></small></span>
											<br><small>Posted at <?= date("d M, Y", strtotime($postdate)) ?></small></p>
										<p class="text-right mt-3">
											<a href="<?= base_url().'index.php/Blog/show/'.$blogid ?>" class="font-weight-bold readmore">Read More</a>
										</p>
									</div>
								</div>
							</div>
						</div>

						<?php endforeach; ?>
					
					</div>

				<?php endif ?>
					
				<div class="row mt-4">
					<a href="<?= base_url().'index.php/Blog/showall' ?>" class="btn-viewall m-auto">Show all Blogs</a>
				</div>
				<?php endif ?>

				</div>
			</div>

		</div>
	</div>
</section>