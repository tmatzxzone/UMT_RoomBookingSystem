<?php
    session_start();

    include_once('dbcons.php');
    /*************************************
     *      Accept Data From Form        *
     *************************************/

     $room_name = $_POST['roomName'];
     $room_ID = $_POST['roomNumber'];
     $room_desc = $_POST['roomDesc'];
     $room_status = $_POST['roomStatus'];


     
    /***************************************
     *        PROCESSING THE DATA          *
     ***************************************/
    $update = false;
    
    $queryvalidate = "SELECT `room_num` FROM `room_details`";
    $runrun = mysqli_query($conn, $queryvalidate);
    
    if(mysqli_num_rows($runrun) > 0){
        while($row = mysqli_fetch_array($runrun)){
            if($room_ID == $row['room_num'] AND $_SESSION['roomID'] != $room_ID)
            {
                echo '<script>alert("Room Number Already Exist!");</script>';
                header("refresh:0; url=staff_page.php?id=update");
            }
            else{
                $update = true;
            }
        }
    }
    
    if($update){
        $query = "UPDATE `room_details` SET `room_num` = '".$room_ID."', `room_name` = '".$room_name."', `room_desc` = '".$room_desc."', `status` = '".$room_status."'
                 WHERE `room_num` = '".$_SESSION['roomID']."' ";
        if(mysqli_query($conn, $query)){
            unset($_SESSION['roomID']);
            header("refresh:0; url=staff_page.php?id=update");
        }
        else{
            echo'  <script>alert('.mysqli_error($conn).');</script>';
        }
    }


    mysqli_close($conn);

?>