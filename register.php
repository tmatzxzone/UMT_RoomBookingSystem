<?php
	session_start();
    //Determine whether the user is logged in or not
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

    <title>Register</title>

    <style>
        .shadow-lg{
            color: #fff;
        }

        input{
            border-color:#86c5da;
            border-radius: 24px;
        }
        input::placeholder{
            text-align:center;
        }
        input:focus{
            border-color: #ffce2b;
            outline:none;
        }
    </style>
</head>
<body style="background:url('images/bgn/register.jpg'); background-size: cover;">

    <!--== Navigation Bar ==-->
    <?php include_once ('header.php'); ?>
    <!--== Navigation Bar Ends Here ==-->

    <div class="container-fluid">
        <div class="row">
            <br>
        </div>

        <div class="row">
           
            <div class="col-sm-3 mx-auto rounded-lg shadow-lg" style="background:url('images/bg-lay.svg');">

                <form action="verify.php" method="POST" >
                    <div class="row text-center">
                        <div class="col my-2">
                            <h1>Register</h1>
                        </div>
                    </div>

                    <div class="row mx-auto my-4">
                        
                        <div class="col">
                            <div class="form-group"><input type="text" class="w-100"  name="fname" placeholder="First Name"/></div>
                            
                        </div>

                        <div class="col">   
                            <input type="text" class="w-100" name="lname" placeholder="Last Name"/>
                        </div>

                    </div>

                    <div class="row mx-auto my-4 p-auto">

                        <div class="col">
                            <input type="email" name="email" id="email" class="w-100" placeholder="Email Address"/>
                        </div>
                        
                    </div>

                    <div class="row mx-auto my-4 p-auto">
                        <div class="col">
                            <input type="tel" name="tel" id="tel" class="w-100" placeholder="Phone Number (+601132035124)">
                        </div>
                    </div>

                    <div class="row mx-auto my-4 p-auto">
                        <div class="col">
                            <input type="text" name="nic" id="nic" class="w-100" placeholder="Identifcation Card Number (000624115071)">
                        </div>
                    </div>

                    <div class="row mx-auto my-4 p-auto">
                        <div class="col">
                            <input type="text" name="idn" id="idn" class="w-100" placeholder="ID Number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col px-5">
                            <input type="radio" name="user" id="staff" value="staff" checked="checked">&nbsp;<label for="staff" class="medium font-weight-bold">Staff</label>
                        </div>
                    </div>

                    <div class="row mx-auto my-4 p-auto">
                         <div class="col">
                             <a class="btn btn-secondary" href="/booking" role="button">Cancel</a>
                        </div>
                        <div class="col d-flex justify-content-end ">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>   
           </div>

        </div>

    </div>
</body>
</html>