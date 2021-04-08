<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html>
<head>

</head>

<body>
    <?php
        //Staff Information
		$staffId = $_SESSION['staffID'];


        /******************************************************
		 * 				  ACCEPTING FORM			     	  *
		 ******************************************************/
        $roomID = $_POST['RoomID'];
        $date = $_POST['date'];
        $session = $_POST['session'];
        $studentID = $_POST['studID'];
        $studentName = $_POST['studName'];
        $studentPhone = $_POST['phone'];
        $studentIC = $_POST['icNum'];
        $roomPin = $_POST['pin'];
		
		/******************************************************
		 * 				END OF ACCEPTING FORM    			  *
		 ******************************************************/


        /******************************************************
		 * 				        PROCESS    			          *
		 ******************************************************/
        //Connect to database
        include_once ('dbcons.php');


        for($i = 0; $i < sizeof($session); $i++){
            $queryRoom = "SELECT room_num FROM `room_details` WHERE room_num = '".$roomID."' ";
            if(mysqli_query($conn, $queryRoom)){
                $queryStaff = "SELECT id_num FROM `user` WHERE id_num = '".$staffId."' ";
                if(mysqli_query($conn, $queryStaff)){
                    $query = "INSERT INTO `booking`(`staff_id`, `student_id`, `student_name`, `room_num`, `date`, `session`, `pin`, `status`) 
                      VALUES ('".$staffId."', '".$studentID."', '".$studentName."', '".$roomID."', '".$date."', '".$session[$i]."', '".$roomPin."', 'Booked')";

                    if(mysqli_query($conn, $query)){
                        echo '<script>alert("Room Successfully Booked");</script>';
                    }
                    else{
                        echo '<script>alert("fail to book");</script>';
                        echo '<script>alert('.mysqli_error($conn).')</script>';

                    }
                }
                else{
                    echo '<script>alert("fail to select staff");</script>';
                    echo '<script>alert('.mysqli_error($conn).')</script>';
                }
            }
            else{
                echo '<script>alert("Fail to select room");</script>';
                echo '<script>alert('.mysqli_error($conn).')</script>';
            }
        }

        header("refresh:0; url=staff_page.php?id=availability");


         /******************************************************
		 * 				END OF ACCEPTING FORM    			   *
		 *******************************************************/


        //Disconnect from database
        mysqli_close($conn);
    ?>
</body>
</html>