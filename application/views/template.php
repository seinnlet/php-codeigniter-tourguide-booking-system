
<?php 
  if ($this->uri->segment(1) == 'Booking' && $this->session->userdata('role') == '') {
    echo "<script>alert('Please Log in First!')</script>";
    redirect(base_url() . 'index.php/Login', 'refresh');
  }
  if ($this->uri->segment(1) == 'Request' && $this->session->userdata('role') == '') {
    echo "<script>alert('Please Log in First!')</script>";
    redirect(base_url() . 'index.php/Login', 'refresh');
  }
  if ($this->uri->segment(1) == 'Blog' && $this->uri->segment(2) == 'likelist' && $this->session->userdata('role') == '') {
    echo "<script>alert('Please Log in First!')</script>";
    redirect(base_url() . 'index.php/Login', 'refresh');
  }
  if ($this->uri->segment(1) == 'User' && $this->session->userdata('role') == '') {
    echo "<script>alert('Please Log in First!')</script>";
    redirect(base_url() . 'index.php/Login', 'refresh');
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Locals One Tour Guide Booking System</title>
	
	<!-- Meta tag Keywords -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="This is the academic project, Online Local Tour Guide Booking System for Locals One.">
	<meta name="keywords" content="tour guide, tour guide booking, locals one, local tour guide, php project, tour booking">
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/logo.png">	
	<!-- pop up box -->
	<link href="<?php echo base_url(); ?>assets/frontend/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //pop up box -->
 
	<!-- css files -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>

<!--Header-->
<header>
	<div class="container agile-banner_nav">
		<div class="row header-top">
			<div class="col-md-5 top-left p-0">
				<p><i class="fa fa-phone" aria-hidden="true"></i> Call us : +959-123-456-7890 </p>
			</div>
			<div class="col-md-7 top-right p-0">
				<p><i class="fa fa-map-marker" aria-hidden="true"></i> Tour Guide Agency, Yangon, Myanmar.
			</div>
		</div>
	
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			
			<h1><a class="navbar-brand" href="<?= base_url() ?>">Locals One</a></h1>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?php if($this->uri->segment(1) == "") echo 'active' ?>">
						<a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item <?php if($this->uri->segment(1) == "About") echo 'active' ?>">
						<a class="nav-link" href="<?php echo base_url().'index.php/About'; ?>">About</a>
					</li>
					<li class="dropdown nav-item <?php if($this->uri->segment(1) == "Tour" || $this->uri->segment(1) == "Tourguide") echo 'active' ?>">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Find
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="<?= base_url().'index.php/Tour/showall' ?>">Tours</a>
							</li>
							<li>
								<a href="<?= base_url().'index.php/Tourguide/showall' ?>">Tour Guides</a>
							</li>
						</ul>
					</li>
					<li class="nav-item <?php if($this->uri->segment(1) == "Blog") echo 'active' ?>">
						<a class="nav-link" href="<?php echo base_url().'index.php/Blog/showall'; ?>">Blog</a>
					</li>
					<li class="nav-item <?php if($this->uri->segment(1) == "Contact") echo 'active' ?>">
						<a class="nav-link" href="<?php echo base_url().'index.php/Contact'; ?>">Contact</a>
					</li>
					<?php if ($this->session->userdata('role') == 'user'): ?>
						<li class="dropdown nav-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<img src="<?= base_url().'assets/frontend/images/profile/'.$this->session->userdata('profilepicture'); ?>" style="width: 40px; height: 40px;" class="rounded-circle mr-2">
									<?= $this->session->userdata('name'); ?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li class="pl-3">
									<a href="<?= base_url().'index.php/User/profile/'.$this->session->userdata('id') ?>">
										<i class="fa fa-user pr-3"></i>Profile
									</a>
								</li>
								<li class="pl-3">
									<a href="<?= base_url().'index.php/Booking/bookinglist' ?>">
										<i class="fa fa-history pr-3"></i>My Bookings
									</a>
								</li>
								<li class="pl-3">
									<a href="<?= base_url().'index.php/Blog/likelist/'.$this->session->userdata('id') ?>">
										<i class="fa fa-thumbs-up pr-3"></i>Liked Blog
									</a>
								</li>
								<li class="pl-3">
									<a href="<?= base_url().'index.php/Report/help' ?>">
										<i class="fa fa-info-circle pr-3"></i>Help
									</a>
								</li>
								<li class="pl-3">
									<a href="<?php echo base_url().'index.php/Login/logout'; ?>">
										<i class="fa fa-sign-out pr-3"></i>Log out
									</a>
								</li>
							</ul>
						</li>
					<?php else: ?>
						<li class="nav-item pr-lg-0">
							<a class="nav-link pr-lg-0" href="<?= base_url().'index.php/Login' ?>">Register | Log In</a>
						</li>
					<?php endif ?>
						
				</ul>
			</div>
		  
		</nav>
	</div>
</header>
<!--Header-->
		
		<?php $this->load->view($innerdata); ?>

<!-- footer -->
<footer class="pt-5">
	<div class="container py-md-3">
		<div class="row footer-grids pb-md-5 pb-3">	
			<div class="col-md-3 col-sm-6 col-6">
				<a href="tel: +959-123-456-7890"> <i class="fa fa-phone"></i>Call Us</a>
			</div>
			<div class="col-md-3 col-sm-6 col-6">
				<a href="mailto: info@localsone.com"> <i class="fa fa-envelope"></i>Send Message</a>
			</div>
			<div class="col-md-3 col-sm-6 col-6 mt-md-0 mt-2">
				<a href="http://linkedin.com" target="_blank"> <i class="fa fa-linkedin"></i>Follow Us</a>
			</div>
			<div class="col-md-3 col-sm-6 col-6 mt-md-0 mt-2">
				<a href="http://facebook.com" target="_blank"> <i class="fa fa-facebook"></i>Connect Us</a>
			</div>
		</div>
		
		<div class="subscribe-grid text-center">
			<p class="para three mt-4">local tour guides can explain well about their regions, so it is the best way to feel real experience and enjoy beautiful culture of that region</p>
		</div>
	</div>
</footer>
<!-- //footer -->

<!-- copyright -->
<section class="copyright py-4 text-center">
	<div class="container">
		<p>Copyright &copy; Locals One Tour Guide Agency 2020. | Templated by <a href="http://w3layouts.com/" target="=_blank"> W3layouts </a> | Developed by <a href="http://seinnletlethninn.me/" target="=_blank"> Seinn Let. </a></p>
	</div>
</section>
<!-- //copyright -->

<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->
	
	<!-- clients-slider-script -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/slideshow.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/js/launcher.js"></script>
	<!-- //clients-slider-script -->
	
	<!-- desoslide-JavaScript -->

	<!-- banner slider -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- //banner slider -->
	
	<!--pop-up-box -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});
		});
	</script>
	<!-- //pop-up-box -->

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/easing.js"></script>
	<script src="<?php echo base_url(); ?>assets/backend/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});

		$(document).ready( function () {
	    $('#dataTable').DataTable();
	} );
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});

			 $('.accordion a').click(function(){
			    $(this).toggleClass('active');
			    $(this).next('.content').slideToggle(400);
			   });

			$('.multi-item-carousel').on('slide.bs.carousel', function (e) {
			  let $e = $(e.relatedTarget),
			      itemsPerSlide = 3,
			      totalItems = $('.carousel-item', this).length,
			      $itemsContainer = $('.carousel-inner', this),
			      it = itemsPerSlide - (totalItems - $e.index());
			  if (it > 0) {
			    for (var i = 0; i < it; i++) {
			      $('.carousel-item', this).eq(e.direction == "left" ? i : 0).
			        // append slides to the end/beginning
			        appendTo($itemsContainer);
			    }
			  }
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->
	<?php if($this->uri->segment(1) == "Request" && $this->uri->segment(2) == "add"): ?> 

		<script type="text/javascript">
			$(document).ready(function(){
			  $( "#duration" ).keyup(function() {
					var duration = parseInt($('#duration').val());
					var fromdate = $('#fromdate').val();

			    var date = new Date(fromdate);
			    var newdate = new Date(date);

			    newdate.setDate(newdate.getDate() + (duration-1));
			    
			    var dd = newdate.getDate();
			    dd = dd < 10 ? '0' + dd : '' + dd;
			    var mm = newdate.getMonth() + 1;
			    mm = mm < 10 ? '0' + mm : '' + mm;
			    var y = newdate.getFullYear();

			    var someFormattedDate = y + '-' + mm + '-' + dd;
			    $('#todate').val(someFormattedDate);
			  });
			});

		</script>

	<?php endif ?>

	<?php if($this->uri->segment(1) == "Booking" && $this->uri->segment(2) == "add"): ?> 
		<script src="<?= base_url().'assets/frontend/js/booking-progress.js'?>"></script>

		<script type="text/javascript">
		$(document).ready(function(){
			$('#noofchild').hide();

			$("#checknoofchild").change(function() {
			  if (this.checked) {
			    $('#noofchild').show();
			  } else {
			  	$('#noofchild').hide();
			  }
			});

			$('#cardNumber').on('keyup', function(e){
		    var val = $(this).val();
		    var newval = '';
		    val = val.replace(/\s/g, '');
		    val = val.replace(/\D/g, '');
		    for(var i=0; i < val.length; i++) {
		        if(i%4 == 0 && i > 0) newval = newval.concat(' ');
		        newval = newval.concat(val[i]);
		    }
		   $(this).val(newval);
			});

			$('#cvc').on('keyup', function(e){
		    var val = $(this).val();
		    var newval = '';
		    val = val.replace(/\s/g, '');
		    val = val.replace(/\D/g, '');
		    for(var i=0; i < val.length; i++) {
		        if(i%4 == 0 && i > 0) newval = newval.concat(' ');
		        newval = newval.concat(val[i]);
		    }
		   $(this).val(newval);
			});



		})
	</script>

	<?php endif ?>
<!-- //js-scripts -->

</body>
</html>
