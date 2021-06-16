<div class="innerpage-banner">
  <div class="layer1"></div>
</div>

<section class="blogdetail py-5">
  <div class="container py-3">
  <h3 class="heading text-center mb-md-5 mb-4"> My Liked Blogs </h3>

  	<?php if (count($likelist) == 0 ): ?>
  		<div class="text-center">
	  		<span class="font-italic">"There is no liked blogs. You can save blogs from the following link."</span>
	  		<br><br>
	  		<a href="<?= base_url().'index.php/Blog/showall' ?>" class="btn-viewall m-auto">Show all Blogs</a>
	  	</div>
  	<?php else: ?>
  		<div class="table-responsive mb-4">
		    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th>No.</th>
		          <th>Image</th>
		          <th>Title</th>
		          <th>Author</th>
		          <th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
		      	 <?php  
		          $i = 0;
		          foreach ($likelist as $blog): 
		          $i++;
		          $blogid = $blog->blogid;
		          $image = $blog->image;
		          $title = $blog->title;
		          $author = $blog->tourguidename;
		        ?>

		        <tr>
		        	<td width="20"><?= $i ?>.</td>
		          <td width="100"><img src="<?= base_url().'assets/backend/img/blog/'.$image ?>" class="w-100 rounded"></td>
		          <td><?= $title ?></td>
		          <td><?= $author ?></td>
		          <td>
		          	<a href="<?php echo base_url(); ?>index.php/Blog/show/<?= $blogid ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i> View</a>
		          </td>
		        </tr>

		        <?php endforeach; ?>
		      </tbody>
		    </table>
		  </div>
  	<?php endif ?>

	  	

	</div>
</section>