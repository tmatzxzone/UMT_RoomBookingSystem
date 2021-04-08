<?php
    include_once ('dbcons.php');

    //Accepting Form Add new data
     $roomDetails = Array($_GET['roomID'], $_GET['roomName'], $_GET['roomDesc']);
    

    /* Add data */
    $querytester = "SELECT `room_num` FROM room_details WHERE `room_num` = '' "

    if(!empty($roomDetails))
    {
        $query = "INSERT INTO `room_details` (`room_num`, `room_name`, `room_desc`) 
            VALUES ('".$roomDetails[0]."', '".$roomDetails[1]."', '".$roomDetails[2]."') ";
        mysqli_query($conn, $query);

        if(mysqli_affected_rows($conn) > 0){
            echo '<script>alert("Records inserted successfully."); </script>';
            header("refresh:0; url = staff_page.php?id=update");
        }
        else{
            if(mysqli_error($conn)){
                echo "ERROR: Failed to execute : <br>" . mysqli_error($conn)."<br>";
                echo '<button type="button" onclick="javascript:window.location.replace(\'staff_page.php?id=update\');">Return</button>';
            }
            else{
                echo '<script>alert("Failed to insert records!\nRoom ID already exists!"); </script>';
            }
            
        }
    }
    
    mysqli_close($conn);
?>