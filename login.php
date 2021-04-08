<?php
	session_start();
	if(!empty($_SESSION['type'])){
		header("refresh: 0; url=main.php");
        exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    <title>Login</title>

    <style>
        input::placeholder{
            text-align:center;
        }

        input{
            border-radius: 24px;
            border-color:#86c5da;
        }

        input:focus{
            border-color: #ffce2b;
            outline:none;
        }
        body{ 
              background: url(images/bgn/login.jpg) no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
            }
    </style>    
</head>
<body>

    <!--== Navigation Bar ==-->
    <?php include_once ('header.php'); ?>
    <!--== Navigation Bar Ends Here ==-->

    <div class="container-fluid clearfix">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-md-4 my-5 mx-auto rounded-lg " style="background-image: url('images/bg-lay.svg');">
                    <form action="log_auth.php" method="POST" class="my-3">
                        <div class="row">
                            <div class="col">
                                <img src="images/grad.jpg" alt="" class="w-100 rounded-lg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2 text-center text-muted">
                                <h4 style="color:black;">LOGIN</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <span class="medium font-weight-bold text-light">Username</span><br>
                                <input type="text" class="w-75" id="idn" name="idn" placeholder="ID Number"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col text-center">
                                <span class="medium font-weight-bold text-light">Password</span><br>
                                <input type="password" class="w-75" id="pass" name="pass" placeholder="IC Number"/>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col my-3 text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>