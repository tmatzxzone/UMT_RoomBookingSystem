<?php
include_once('dbcons.php');

//set the cookie into variable and reset the cookie
$roomID = $_COOKIE['roomID'];
setcookie("roomID", "", time() - 3600);



$query = "DELETE FROM `room_details` WHERE `room_num` = '".$roomID."' AND NOT EXISTS (SELECT `room_num` FROM `booking` WHERE `room_num` = room_details.room_num AND `status` != 'Session End')";
$query_run = mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) > 0){
    echo '<script>alert("Room has been deleted.");</script>';
    header("refresh:0; url=staff_page.php?id=update");
}
else{
    if(!empty(mysqli_error($conn))){
        echo'FAIL!!<br>';
        echo mysqli_error($conn);
        echo'<br>';
        echo '<button type="button" onclick="javascript:window.location.replace(\'staff_page.php?id=update\');">Return</button>';
    }
    else{
        echo '<script>alert("Failed to delete room! \nReason: \nRoom in use. \nRoom has been booked.");</script>';
        header("refresh:0; url=staff_page.php?id=update");
    }
    
}

?>