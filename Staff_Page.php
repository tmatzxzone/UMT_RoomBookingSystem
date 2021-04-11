<?php
	session_start();

	//Log-in Validation
	if(empty($_SESSION['status'])){
		echo '<script>alert("Please Log-in First!");</script>';
		header("refresh: 0; url=/booking");
		exit;
	}
	else if($_SESSION['type'] != "staff"){
		echo '<script>alert("You are not a staff!");</script>';
		header("refresh: 0; url=dashboard.php");
		exit;
	}

	//Room status auto-update
	include_once ('bg_updates.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	</div>
  <title>Staff Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	  
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	
    <!-- Ajax dynamic page loader -->
    <script type="text/javascript">
		function loadpage(page){
			$.ajax({
				url:page,
				beforeSend:function(){
					$('#page_loader').html("Please wait...");
				},
				success:function(data){
					$('#page_loader').html(""); // to empty previous page contents.
					$('#page_loader').html(data);
				}
			});
		}
	</script>

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

.bg {
	max-width: 586px;
	width: 100%;
	margin: auto;
}

.bg .bg-header {
	text-align: center;
	margin-bottom: 25px;
}

.bg .bg-header h1 {
	font-size: 42px;
	color: #fff;
	margin-top: 0;
	margin-bottom: 0px;
	font-weight: 700;
	text-transform: capitalize;
}

.bg>form {
	background-color: #1e1e1e;
	padding: 40px;
	-webkit-box-shadow: 0px 5px 15px -5px rgba(0, 0, 0, 0.8);
	box-shadow: 0px 5px 15px -5px rgba(0, 0, 0, 0.8);
}

.bg .bg-group {
	position: relative;
	margin-bottom: 30px;
}

.bg .bg-control {
	background-color: #2d2d2d;
	height: 50px;
	padding: 0px 20px;
	border: none;
	-webkit-box-shadow: none;
	box-shadow: none;
	border-radius: 0px;
	color: #fff;
}

.bg .bg-control::-webkit-input-placeholder {
	color: rgba(255, 255, 255, 0.3);
}

.bg .bg-control:-ms-input-placeholder {
	color: rgba(255, 255, 255, 0.3);
}

.bg .bg-control::placeholder {
	color: rgba(255, 255, 255, 0.3);
}

.bg input[type="date"].bg-control:invalid {
	color: rgba(255, 255, 255, 0.3);
}

.bg select.bg-control {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

.bg select.bg-control+.select-arrow {
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

.bg select.bg-control+.select-arrow:after {
	content: '\279C';
	display: block;
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

.bg .bg-label {
	color: #fff;
	font-size: 14px;
	font-weight: 400;
	margin-bottom: 5px;
	display: inline-block;
	letter-spacing: 0.4px;
}

.bg .btn {
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

#parent {
    text-align:center;
    background-color:blue;
    height:400px;
    width:600px;
}
.block { 
    text-align:center;
}
.center {
    margin-left:auto;
    margin-right: auto;
    background-color:#212529;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%) }

}
.left {
    margin:auto auto auto 0;
    background-color:white;
}
.right {
    margin:auto 0 auto auto;
    background-color:white;
}

.container2 {
	width:90%;
}

</style>
</head>

<body id="main">

<!-- #################################### Accepting Form Data #################################### -->
<?php

	//Accepting data from Reservation search
	if(isset($_GET['sid'])){
    	$_SESSION['studentID'] = $_GET['sid'];
  	}
	
	//Accepting data from Availability Search
	if(isset($_GET['date'])){
		$_SESSION['date'] = $_GET['date'];

		if(!empty($_GET['startTime']) AND !empty($_GET['endTime'])){
			$sess = $_GET['startTime'].' - '.$_GET['endTime'];
			$_SESSION['sesi'] = $sess;
		}
	}

	//Accepting data from Update Data search
	if(isset($_GET['roomNo'])){
		$_SESSION['room'] = $_GET['roomNo'];
	}

	//Accepting data From Edit Room
	if(isset($_GET['roomID'])){
		$roomID = $_GET['roomID'];
		$_SESSION['roomID'] = $_GET['roomID'];
	
	}

	//Accepting data from room selection(availability's child)
	if(!empty($_POST['room'])){
		$room = $_POST['room'];
		
		if(!empty($_SESSION['count'])){
			for($i = 0; $i < $_SESSION['count']; $i++){
			
				if(!empty($room['submit'][$i])){
					//change direction to select session page
					$_SESSION['id'] = "sessionSelect";
					//carry these informations
					$_SESSION['roomNum'] = $room['roomID'][$i];
					$_SESSION['roomName'] = $room['roomName'][$i];
					$_SESSION['selectedDate'] = $room['date'][$i];
					break;
				}
			}
			unset($_SESSION['count']);
		}
	}


?>
<!-- #################################### end of Accepting Form Data #################################### -->

<!-- ####################################   Header ####################################-->
<?php   include_once ('header.php'); ?>
<!-- ####################################   End of header   #################################### -->
  

<!-- #################################### Content ####################################-->
	<div id="Staff_Page" >
		<!-- Loadpage-->
		<?php
			//Set Page target into a session to avoid loss of target
			if(!empty($_GET['id'])){
				$_SESSION['id'] = $_GET['id'];
			}
	
			include_once ('sp_loader.php');
		?>
		<div id="page_loader"></div>
	</div>
<!-- #################################### End Of Content ####################################-->


</body>
</html>
