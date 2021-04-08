<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Styling link -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
	<!-- Icon -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" 
    crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- sidenav -->
    <script type="text/javascript" src="js/side.nav.js"></script>
	<title>Test Home Page</title>
</head>

<body style="background:url('images/bg-lay.svg'); shape-rendering: auto;" id="main">

	<!--== Navigation Bar ==-->
	<?php include_once ('header.php'); ?>
	<!--== Navigation Bar Ends Here ==-->

	<!--== HERO ==-->
	
	<section id="hero">
		<div class="container-fluid jumbotron">
			<div class="row">
				<div class="col">
					<div id="demo" class="carousel slide text-center" data-ride="carousel">
						<!-- Indicators -->
						<ul class="carousel-indicators">
							<li data-target="#demo" data-slide-to="0" class="active"></li>
							<li data-target="#demo" data-slide-to="1"></li>
							<li data-target="#demo" data-slide-to="2"></li>
						</ul>

						<!-- The slideshow -->
						<div class="carousel-inner text-center">
							<div class="carousel-item active">
								<img src="images/book1.jpg" alt="" width="600px" height="300px">
								<div class="carousel-caption" style="color:#FFCE2B; background: rgba(178, 175, 172, 0.8);">
									<h3>Lorem Ipsum</h3>
									<p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
								</div>
							</div>
							<div class="carousel-item">
								<img src="images/book2.jpg" alt="" width="600px" height="300px">
								<div class="carousel-caption" style="color:#FFCE2B; background: rgba(178, 175, 172, 0.8);">
									<h3>Lorem Ipsum</h3>
									<p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
								</div>
							</div>
							<div class="carousel-item">
								<img src="images/book3.jpg" alt="" width="600px" height="300px">
								<div class="carousel-caption" style="color:#FFCE2B; background: rgba(178, 175, 172, 0.8);">
									<h3>Lorem Ipsum</h3>
									<p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
								</div>
							</div>
						</div>

						<!-- Left and right controls -->
						<a class="carousel-control-prev" href="#demo" data-slide="prev">
							<span class="carousel-control-prev-icon"></span>
						</a>
						<a class="carousel-control-next" href="#demo" data-slide="next">
							<span class="carousel-control-next-icon"></span>
						</a>
					</div>
				</div>

				<div class="col text-center mx-auto">
					<h1>Lorem Ipsum</h1>
					<h4>Lorem Ipsum</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut turpis porttitor, finibus sapien et, 
					scelerisque erat. Fusce tristique semper iaculis. Aliquam eu sodales nunc, a viverra lorem. Quisque 
					condimentum ex vitae nunc efficitur tincidunt. Pellentesque sit amet mollis risus, vel rutrum quam. 
					Curabitur bibendum convallis lacus at rutrum. Ut eleifend tortor non tincidunt rhoncus. Nunc pretium 
					augue in nibh luctus, bibendum ornare turpis fringilla. Aliquam erat volutpat. Mauris congue dignissim 
					ornare. Maecenas pulvinar, orci eget vestibulum finibus, nunc nibh semper sapien, vitae ultrices odio turpis 
					id quam. Sed accumsan egestas leo, id elementum lacus commodo pretium. Sed id turpis eu leo faucibus gravida.</p>
				</div>

			</div>

		</div>
	</section>
	<!--== Hero Ends Here ==-->

	<!--== Main ==-->
	<main>

	<?php /*
		<!--== Content ==-->
			<section>
				<div class="container-fluid text-center">
					<div class="section-title">
						<div class="row">
							<div class="col-sm-2 mx-auto">
								<div class="card">
									<img class="card-img-top" src="images/studyroom.jpg" alt="room"/>
									<div class="card-body">
										<div class="card-title">Lorem Ipsum</div>
										<div class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
									</div>
								</div>
							</div>

							<div class="col-sm-2 mx-auto">
								<div class="card">
									<img class="card-img-top" src="images/studyroom.jpg" alt="room"/>
									<div class="card-body">
										<div class="card-title">Lorem Ipsum</div>
										<div class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
									</div>
								</div>
							</div>

							<div class="col-sm-2 mx-auto">
								<div class="card">
									<img class="card-img-top" src="images/studyroom.jpg" alt="room"/>
									<div class="card-body">
										<div class="card-title">Lorem Ipsum</div>
										<div class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
									</div>
								</div>
							</div>

							<div class="col-sm-2 mx-auto">
								<div class="card">
									<img class="card-img-top" src="images/studyroom.jpg" alt="room"/>
									<div class="card-body">
										<div class="card-title">Lorem Ipsum</div>
										<div class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<!--== Content Ends Here ==-->
		*/ ?>

		<!--== Services Section ==-->
		<section id="services" class="services text-white py-5 mt-5">
			<div class="container-fluid text-center pt-5 pb-5">
				<div class="section-title py-3">
					<h2>Services</h2>
				</div>

				<div class="row">
					<div class="col">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum ultrices lorem eu sodales. Vestibulum.</p>
					</div>
				</div>

				<div class="row content">
					<div class="col">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis nunc pretium, congue nibh ac, pretium mauris. 
						Donec pulvinar rutrum orci, at efficitur lacus fermentum id. Integer vestibulum vulputate turpis, ac feugiat dui 
						vulputate eu. Integer ullamcorper massa sit amet leo blandit dictum. Nullam mollis at mi pulvinar sagittis. Integer 
						ac orci a erat efficitur eleifend id nec quam. Integer in elit sed urna venenatis lobortis. Pellentesque blandit purus 
						vel porta iaculis. Suspendisse a ipsum quis nisi tempus luctus ac at justo. Aliquam tempus in dolor sit amet condimentum.
					</p>
					</div>
				</div>
			</div>
		</section>
		<!--== Services Ends Here ==-->

		<!--== About Section ==-->
		<section id="about" class="about mb-5 pt-5 text-white"  >
			<div class="container-fluid  text-center pt-5 pb-5">
				<div class="section-title py-3">
					<h2>
						About Us
					</h2>
				</div>

				<div class="row content">
					<div class="col-5 mx-auto">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed mi et velit tincidunt commodo. Duis ultrices fringilla sem, ac lobortis elit aliquet a. Morbi nec justo massa. Sed rutrum dictum purus ac finibus. Nam erat lorem, scelerisque eget eros ut, imperdiet dictum ex. Maecenas nec condimentum nibh, ut aliquam felis. Proin venenatis ullamcorper turpis. In hendrerit, erat accumsan commodo rutrum, neque ligula mattis velit, eu euismod nisi eros ut libero. Vestibulum non orci vel tortor viverra lobortis sit amet sit amet purus.</p>
						<ul>
							<li>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</li>
							<li>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</li>
							<li>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</li>	
						</ul>
					</div>
					<div class="col-5 mx-auto">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed mi et velit tincidunt commodo. Duis ultrices fringilla sem, ac lobortis elit aliquet a. Morbi nec justo massa. Sed rutrum dictum purus ac finibus. Nam erat lorem, scelerisque eget eros ut, imperdiet dictum ex. Maecenas nec condimentum nibh, ut aliquam felis. Proin venenatis ullamcorper turpis. In hendrerit, erat accumsan commodo rutrum, neque ligula mattis velit, eu euismod nisi eros ut libero. Vestibulum non orci vel tortor viverra lobortis sit amet sit amet purus.</p>
					</div>
				</div>
			</div>
		</section>
		<!--== About Ends Here ==-->

		<!--== Contact Us Section ==-->
			<section class="contact" id="contact" style="background: white;">
				<div class="container-fluid text-center py-5">
					<div class="row content">
						<div class="col">
							<h2>Experiencing Difficulties?</h2>
						</div>

						<div class="col">
							<a href="#contact" class="btn btn-lg btn-primary">Contact Us</a>
						</div>
					</div>
				</div>
			</section>
		<!--== Contact Us Ends Here ==-->
	</main>
	<!--== Main Ends Here ==-->

	<!--== Footer ==-->
	<?php include_once ('_footer.php'); ?>
	<!--== Footer Ends Here ==-->
</body>
</html>