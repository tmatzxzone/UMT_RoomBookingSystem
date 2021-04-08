<?php
include_once ('dbcons.php');

//set the cookie into variable and reset the cookie
$studentID = $_COOKIE['studID'];
$roomID = $_COOKIE['roomID'];
$date = $_COOKIE['bdate'];
$sess = $_COOKIE['session'];
setcookie("studID", "", time() - 3600);
setcookie("roomID", "", time() - 3600);
setcookie("bdate", "", time() - 3600);
setcookie("session", "", time() - 3600);

$query = "DELETE FROM `booking` WHERE `student_id` = '".$studentID."' AND `room_num` = '".$roomID."' AND `date` = '".$date."'AND `session` = '".$sess."' ";

if(mysqli_query($conn, $query)){
    header("refresh:0; url=staff_page.php?id=reservation");
}
else{
    echo'FAIL!!<br>';
   echo mysqli_error($conn);
}

?>