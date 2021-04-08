<?php session_start(); ?>
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

   
</head>
<body style="background:#42413d;">

    <!--== Navigation Bar ==-->
    <?php include_once ('header.php'); ?>
    <!--== Navigation Bar Ends Here ==-->

    <?php
        include_once ('dbcons.php');

        $user = $_POST['idn'];
        $pass = $_POST['pass'];

        $query = "SELECT id_num, nric_num, first_name, user_type FROM `user` WHERE id_num = '".$user."'";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) > 0){
            while($row = mysqli_fetch_array($query_run)){
                $dbUser = $row['id_num'];
                $dbPass = $row['nric_num'];
                $dbfname= $row['first_name'];
                $dbType = $row['user_type'];
            }

            if($pass == $dbPass){
                echo '<script>alert("Login Success!!");</script>';
                $_SESSION['staffID'] = $dbUser;
                $_SESSION['fname'] = $dbfname;
                $_SESSION['type'] = $dbType;
                $_SESSION['status'] = 'Logged In';
                header("refresh: 0; url = dashboard.php");
                exit;
            }
            else{
                echo '<script>alert("Wrong Password!");</script>';
                header("refresh: 0; url = login.php");
                exit;
            }
        }
        else{
           echo '<script>alert("Incorrect Username");</script>';
           header("refresh: 0; url = login.php");
           exit;
        }
       

    ?>

</body>
</html>