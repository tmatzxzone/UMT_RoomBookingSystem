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


    <title>Loading</title>

</head>
<body style="background:#42413d;">
   
    <?php
        include_once ('dbcons.php');

        //collect data
        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $ic = $_POST['nic'];
        $id = $_POST['idn'];
        $type = $_POST['user'];

        $subId = substr($id, 0, 3);
        
        $query = "INSERT INTO `user` (first_name, last_name, email, phone, nric_num, id_num, user_type) 
        VALUES ('".$Fname."', '".$Lname."', '".$email."', '".$tel."',' ".$ic."', '".$id."', '".$type."')";

        if(mysqli_query($conn, $query)){
           echo '<script>alert("You Have Successfully Registered!");</script>';
           header("refresh: 1; url = dashboard.php");
           exit;
        }
        else
        {
            echo '<script>alert("Register Failed! User already exist!");</script>';
        }
        

    ?>

    <script>
        
    </script>

</body>
</html>