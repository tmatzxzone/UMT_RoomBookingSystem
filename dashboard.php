<?php session_start(); include_once ('dbcons.php'); ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Styling link -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
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
    <!-- Table Scroll -->
    <script src="js/scroll.js"></script>
	<title>Dashboard</title>

	<!-- ##### Ajax Dynamic Page Loader Initialization##### -->
    <script type="text/javascript">
		function loadtable(page){
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

	<!-- ##### Ajax Dynamic Page Loader Initialization##### -->
    <script type="text/javascript">
		function loadtable2(page){
			$.ajax({
				url:page,
				beforeSend:function(){
					$('#table_loader2').html("Please wait...");
				},
				success:function(data){
					$('#table_loader2').html(""); // to empty previous page contents.
					$('#table_loader2').html(data);
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


	<!--== Main ==-->
	<div class="container-fluid jumbotron">
		<section>
				<div class="row">
					<div class="col-lg my-5">
						<h5 class="header-title pb-3 text-center">Popular Rooms</h5>           
						<div id="donut-chart" class="d-flex justify-content-center"></div>
					</div>

					<div class="col-lg bg-white py-4">
								<h5 class="header-title pb-3 text-center">Available Rooms</h5>
								<div class="table-responsive-lg" id="table_loader">
									<script type="text/javascript">
										$(document).ready(function() {
										loadtable('dash_rooms.php');
										});
									</script>
								</div>
					</div>
				</div>
		</section>
		
		<!--== Recent Section ==-->
		<section id="" class=" py-5">
				<div class="row">
					<div class="col-lg">
						<div class="card m-b-30">
							<div class="card-body">
								<h5 class="header-title pb-3 text-center">Recent Booking</h5>
								<div class="table-responsive-lg" id="table_loader2">
									<script type="text/javascript">
										$(document).ready(function() {
										loadtable2('dash_recent.php');
										});
									</script>
								</div>              
							</div>
						</div>
					</div>
				</div> <!-- End Row -->
		</section>
		<!--== Services Ends Here ==-->
	</div>
	<!--== Main Ends Here ==-->

	
	<!-- jQuery to load donut -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="plugins/morris-chart/raphael-min.js"></script>
	<script src="plugins/morris-chart/morris.js"></script>


	


<?php
	/*********************************
	 *   							 *
	 * 			Charts Loader		 *
	 * 								 *
	 *********************************/
	$room = array();
	$occur = array();
	$query_count= "SELECT `room_num`, COUNT(`room_num`) AS `value_occurrence` FROM `booking` GROUP BY `room_num` ORDER BY `value_occurrence` DESC LIMIT 5";
	$run = mysqli_query($conn, $query_count);

	if(mysqli_num_rows($run) > 0){
		while($row = mysqli_fetch_array($run)){
			$query_name = "SELECT `room_name` FROM `room_details` WHERE `room_num` = '".$row['room_num']."' ";
			$run_name = mysqli_query($conn, $query_name);
			while($row2 = mysqli_fetch_array($run_name)){
				array_push($room, $row2['room_name']);
			}
			array_push($occur, $row['value_occurrence']);
		}
	}
	else{
		echo '<script>alert("There Is No Data To Be Counted! #StatisticDonut");</script>';
	}

?>

	<script>
		var room = <?php echo json_encode($room, JSON_HEX_TAG); ?>;
        var occur = <?php echo json_encode($occur, JSON_HEX_TAG); ?>;


 		Morris.Donut({
              element: 'donut-chart',
              data: [
				{label: room[0], value: occur[0]},
				{label: room[1], value: occur[1]},
				{label: room[2], value: occur[2]},
				{label: room[3], value: occur[3]},
				{label: room[4], value: occur[4]}
              ], resize: true, colors: ['#21ea50', '#95eb21', '#eaeb21', '#ebb521', '#ee7a20']
        }); 

	</script>

</body>
</html>
