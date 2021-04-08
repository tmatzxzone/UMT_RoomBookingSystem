<?php
    /* ********************************************** *
    *           Updating Room Status                  *                     
    *   (Current time > end time = Session End)       *
    *    (Current Time >= start time = In Use)        *
    * *********************************************** */ 
    
    //connect to database
    include_once ('dbcons.php');

    //set Timezone
    date_default_timezone_set('Singapore');

    //get current date
    $currentDate = date('Y-m-d');
    //get current time
    $currentTime = date('H:i');

    /******************** Current Updates ******************/
    
                        //Booked to In Use
    $query = "SELECT `session` , `room_num` FROM `booking` WHERE `date` = '".$currentDate."' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){
        while($row = mysqli_fetch_array($query_run)){
            $room_ID = $row['room_num'];
            $dbSession = $row['session'];
            $startTime = substr($dbSession, 0,5); //assigning start time
            $endTime = substr($dbSession, -5); //assigning end time

            if(strcmp($startTime, $currentTime) <= 0){
                $query2 = "UPDATE `booking` SET `status` = 'In Use' WHERE `room_num` = '".$room_ID."' AND `date` = '".$currentDate."' AND `session` = '".$dbSession."' ";
                mysqli_query($conn, $query2);

            }
            
            if(strcmp($endTime, $currentTime) <= 0){
                $query2 = "UPDATE `booking` SET `status` = 'Session End' WHERE `room_num` = '".$room_ID."' AND `date` = '".$currentDate."' AND `session` = '".$dbSession."' ";
                mysqli_query($conn, $query2);
            }
        }
    }
    /******************** End Of Current Updates ******************/



    /******************** Day Before Updates ******************/

    $query = "UPDATE `booking` SET `status` = 'Session End' WHERE `date` < '".$currentDate."' ";
    mysqli_query($conn, $query);

    /******************** End Of Day Before Updates ******************/

    //Disconnect From Database
    mysqli_close($conn);
?>