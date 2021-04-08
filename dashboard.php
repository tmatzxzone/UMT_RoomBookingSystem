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
	<title>Dashboard</title>

	<style>
		html *
		{
			font-size: 16px !important;
		}
	</style>

	<!-- ##### Ajax Dynamic Page Loader Initialization##### -->
    <script type="text/javascript">
		function loadpage(page){
			$.ajax({
				url:page,
				beforeSend:function(){
					$('#table_loader').html("Please wait...");
				},
				success:function(data){
					$('#table_loader').html(""); // to empty previous page contents.
					$('#table_loader').html(data);
				}
			});
		}
	</script>
	<!-- ##### End Of page loader ##### -->

	<!-- Title Animation -->
	<script>
	$(function() {

		var origTitle, animatedTitle, timer;
		

		function animateTitle(newTitle) {
			var currentState = false;
			origTitle = document.title;  // save original title
			animatedTitle = "UMT";
			timer = setInterval(startAnimation, 1000);

			function startAnimation() {
				// animate between the original and the new title
				document.title = currentState ? origTitle : animatedTitle;
				currentState = !currentState;
  			}
		}

		function restoreTitle() {
			clearInterval(timer);
			document.title = origTitle; // restore original title
		}

		// Change page title on blur
		$(window).blur(function() {
			animateTitle();
		});

		// Change page title back on focus
		$(window).focus(function() {
			restoreTitle();
		});

	});
	</script>


</head>

<body style="background:url('images/bg-lay.svg'); shape-rendering: auto;" id="main">

	<!--== Navigation Bar ==-->
	<?php include_once ('header.php'); ?>
	<!--== Navigation Bar Ends Here ==-->

	<!--== HERO ==-->
	
	<section id="hero">
		<div class="container-fluid jumbotron">
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<div class="card m-b-30">
						<div class="card-body">
							<h5 class="header-title pb-3">Available Rooms</h5>           
							<div class="row">
								<div class="col-sm-12">
									<div class="table-responsive">
										<table class="table table-hover m-b-0" id="table-loader">
											<script type="text/javascript">
												$(document).ready(function() {
												loadtable('#.php');
												});
											</script>
										</table>
									</div>
								</div>
							</div>              
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>
	<!--== Hero Ends Here ==-->

	<!--== Main ==-->
	<main>

		<!--== Donut Section ==-->
		<section id="" class=" mx-5 py-5">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-sm-14">
						<div class="card m-b-30">
							<div class="card-body">
								<h5 class="header-title pb-3">Summary</h5>           
								<div id="donut-chart"></div>             
							</div>
						</div>
					</div>
				</div> <!-- End Row -->                    
			</div><!--end container-->
		</section>
		<!--== Donut Ends Here ==-->

		<!--== Recent Section ==-->
		<section id="" class="mx-5 py-5"  >
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<div class="card m-b-30">
							<div class="card-body">
								<h5 class="header-title pb-3">Recent Booking</h5>           
								<div class="row">
									<div class="col-sm-12">
										<div class="table-responsive">
											<table class="table table-hover m-b-0" id="table-loader">
												<script type="text/javascript">
													$(document).ready(function() {
													loadtable('dashboard_table.php');
													});
												</script>
											</table>
										</div>
									</div>
								</div>              
							</div>
						</div>
					</div>
				</div> <!-- End Row -->                    
			</div><!--end container-->
		</section>
		<!--== Services Ends Here ==-->

		<!--== Us Section ==-->
			<section class="" id="" style="background: white;">
			
			</section>
		<!--== Services Us Ends Here ==-->
	</main>
	<!--== Main Ends Here ==-->

	
	<!-- jQuery to load donut -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script src="plugins/morris-chart/raphael-min.js"></script>
	<script src="plugins/morris-chart/morris.js"></script>
	


<?php
	/*********************************
	 *   							 *
	 * 			Charts Loader		 *
	 * 								 *
	 *********************************/
?>


	<!-- Donut Chart Data 
	<script>
            Morris.Donut({
              element: 'donut-chart',
              data: [
                {label: "Test", value: 13},
                {label: "Woo", value: 30},
                {label: "Kekw", value: 20}
              ], resize: true, colors: [ '#00bcd2', '#424858', '#ffcdd3']
            });
        </script>
 End Of Donut Chart Data -->

	<!--app js
        <script src="dashboard/js/jquery.app.js"></script>
        <script>
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                delay: 100,
                time: 1200
                });
            });
        </script>-->

</body>
</html>