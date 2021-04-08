<?php 
	session_start(); 
	//Log-in Validation
	if(empty($_SESSION['type'])){
		echo '<script>alert("Please Log-in First!");</script>';
		header("refresh: 0; url=/booking");
		exit;
	}
	else if($_SESSION['type'] != "staff"){
		echo '<script>alert("You are not a staff!");</script>';
		header("refresh: 0; url=dashboard.php");
		exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	</div>
  <title>Booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	<!-- Bootstrap -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	  <!-- MDB -->
	  <link
	  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet"/>
	  <!-- Font Awesome -->
	  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	
<style>
body { 
  background: url(images/bg-lay.svg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.section {
	position: relative;
	height: 100vh;
}

.section .section-center {
	position: absolute;
	top: 50%;
	left: 0;
	right: 0;
	-webkit-transform: translateY(-50%);
	transform: translateY(-50%);
}

#booking {
	font-family: 'Hind', sans-serif;
	background-image: url('../img/background.jpg');
	background-size: cover;
	background-position: center;
}

#booking::before {
	content: '';
	position: absolute;
	left: 0;
	right: 0;
	bottom: 0;
	top: 0;

}

.booking-form {
	max-width: 586px;
	width: 100%;
	margin: auto;
}

.booking-form .form-header {
	text-align: center;
	margin-bottom: 25px;
}

.booking-form .form-header h1 {
	font-size: 42px;
	color: #fff;
	margin-top: 0;
	margin-bottom: 0px;
	font-weight: 700;
	text-transform: capitalize;
}

.booking-form>form {
	background-color: #1e1e1e;
	padding: 40px;
	-webkit-box-shadow: 0px 5px 15px -5px rgba(0, 0, 0, 0.8);
	box-shadow: 0px 5px 15px -5px rgba(0, 0, 0, 0.8);
}

.booking-form .form-group {
	position: relative;
	margin-bottom: 30px;
}

.booking-form .form-control {
	background-color: #2d2d2d;
	height: 50px;
	padding: 0px 20px;
	border: none;
	-webkit-box-shadow: none;
	box-shadow: none;
	border-radius: 0px;
	color: #fff;
}

.booking-form .form-control::-webkit-input-placeholder {
	color: rgba(255, 255, 255, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
	color: rgba(255, 255, 255, 0.3);
}

.booking-form .form-control::placeholder {
	color: rgba(255, 255, 255, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
	color: rgba(255, 255, 255, 0.3);
}

.booking-form select.form-control {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

.booking-form select.form-control+.select-arrow {
	position: absolute;
	right: 6px;
	bottom: 6px;
	width: 32px;
	line-height: 32px;
	height: 32px;
	text-align: center;
	pointer-events: none;
	color: #fff;
	font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
	content: '\279C';
	display: block;
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

.booking-form .form-label {
	color: #fff;
	font-size: 14px;
	font-weight: 400;
	margin-bottom: 5px;
	display: inline-block;
	letter-spacing: 0.4px;
}

.booking-form .submit-btn {
	color: #42413D;
	background-color: #ffce2b;
	font-weight: 400;
	height: 50px;
	border: none;
	width: 100%;
	display: block;
	letter-spacing: 0.4px;
	font-size: 15px;
}

h1 {
	color: white;
	font-size: 30px;
}

</style>

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
<body style="background-color: #42413D" id="main">
<?php include 'header.php';?>



	<!-- ====================== ACCEPTING FORM ====================== -->
	<?php
		//empty variable declaration
		$roomID = null;
		$roomName = null;
		$date = null;
		$sesi = Array();

		/******************************************************
		 * 				FORM FROM OTHER PAGES				  *
		 ******************************************************/
		//Accepting data from room selection(availability's child)
		if(!empty($_POST['room'])){
			$room = $_POST['room'];
			
			if(!empty($_SESSION['count'])){
				for($i = 0; $i < $_SESSION['count']; $i++){
				
					if(!empty($room['submit'][$i])){
						//Room Information
						$roomID = $room['roomID'][$i];
						$roomName = $room['roomName'][$i];
						$date = $room['date'][$i];
						array_push($sesi, $room['sesi'][$i]);
						break;
					}
				}
				unset($_SESSION['count']);
				print_r(sizeof($sesi));
			}
		}	

		//Accepting data from session selection
		if(!empty($_POST['book'])){
			//Store the array into variable
			$book = $_POST['book'];
			//Store hidden fixed values
			$roomID = $book['roomID'][9];
			$roomName = $book['roomName'][9];
			$date	= $book['date'][9];

			for($i = 0; $i < sizeof($book['session']); $i++){
				if(!empty($book['chk'][$i])){
					array_push($sesi,$book['session'][$i]);
				}
			}
		}
		/******************************************************
		 * 			END OF FORM FROM OTHER PAGES			  *
		 ******************************************************/
	?>
	<!-- ====================== ACCEPTING FORM ====================== -->




	<!-- ====================== BOOKING FORM ====================== -->

	<div id="booking">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Make your reservation</h1>
						</div>
						<form action="booking_process.php" method="POST" class="my-3">
							<div class="row">
								<div class="col-md-6">
								
								</div>
								<div class="col-md-6">
								<button type="button" class="btn-close btn-close-white float-right" aria-label="Close" onclick="javascript:window.location='staff_page.php?id=availability';"></button>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Rooms:</span>
										<h1>
											<?php echo $roomID.'/'.$roomName; ?>
											<input type="hidden" name="RoomID" value="<?php echo $roomID;?>">
										</h1>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" style="font-size: 20px">
										<span class="form-label">Time:</span>
										<p class="text-white">
											<?php
												echo $date;
												echo '<input type="hidden" name="date" value="'.$date.'">';
												for($i = 0; $i < sizeof($sesi); $i++){
													echo '<br>';
													echo $sesi[$i];
													echo '<input type="hidden" name="session['.$i.']" value="'.$sesi[$i].'">';
												}
											?>
										</p>
											
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Student ID:</span>
										<input type="text" class="form-control" id="studID" name="studID" placeholder="" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Student Name:</span>
										<input type="text" class="form-control text-white" id="studName" name="studName" placeholder="" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Phone Number:</span>
										<input type="text" class="form-control text-white" id="phone" name="phone" placeholder="" required>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">IC Number:</span>
										<input type="text" class="form-control text-white" id="icNum" name="icNum" placeholder="" required>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<span class="form-label">Pin Number:</span>
										<input type="text" class="form-control text-white" id="pin" name="pin" placeholder="0000" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<button class="submit-btn" type="submit" name="submit" id="submit">Book Now!</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ====================== END OF BOOKING FORM ====================== -->



	

</body>
</html>