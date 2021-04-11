
<?php
    session_start();
    //Connect to Database, $conn
    include_once ("dbcons.php");

    /* ********************************************* *
    *           Available Room Display               *
    *                                                *
    * ********************************************** */
 
  /* ********************* Table ************************ */

    if( !empty($_SESSION['date']) AND !empty($_SESSION['sesi'])) //Date and Session are searched
    {
        echo'
        <form action="booking.php" method="POST" > 
            <table class="table table-sm bg-light my-n3">
                <thead>
                    <tr>
                        <th scope="col">Room Number</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Room Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Select Room</th>
                    </tr>
                </thead>
                <tbody>';
                    $date = $_SESSION['date'];
                    $sesi = $_SESSION['sesi'];
                    unset($_SESSION['sesi']);
                    unset($_SESSION['date']);

                    //set current time & end time
                    date_default_timezone_set('Singapore');
                    $currentDate = date('Y-m-d');
                    $currentTime = date('H:i');
                    $endTime = substr($sesi,-5);
                    
                    $query = "SELECT room_details.room_num as roomID, room_details.room_name as roomName, room_details.room_desc as roomDesc, room_details.status as rStatus 
                                FROM room_details
                                WHERE NOT EXISTS (SELECT booking.date, booking.session FROM booking WHERE booking.room_num = room_details.room_num 
                                AND booking.date = '".$date."' AND booking.session =  '".$sesi."')
                                AND room_details.status = 'Available'
                                ";
                                
                    $query_run = mysqli_query($conn, $query);

                    if($date > $currentDate){
                        // output data of each row
                        if(mysqli_num_rows($query_run) > 0){
                            $i = 0;
                            while($row = mysqli_fetch_array($query_run))
                            {
                                        echo '  <tr>
                                        <td>' . $row["roomID"]. '</td> <input type="hidden" name="room[roomID]['.$i.']" value="'.$row["roomID"].'">
                                        <td>' . $row["roomName"]. '</td> <input type="hidden" name="room[roomName]['.$i.']" value="'.$row["roomName"].'">
                                        <td>' .$row["roomDesc"]. '</td>
                                        <td>' . $date . '</td> <input type="hidden" name="room[date]['.$i.']" value="'.$date.'">
                                                            <input type="hidden" name="room[sesi]['.$i.']" value="'.$sesi.'">
                                        <td>' . $row["rStatus"] . '</td>
                                        <td><button class="btn btn-primary" name="room[submit]['.$i.']" value="submit"><i class="fa fa-book" title="book now!"></i></button></td>
                                        </tr>';
                                        $i++;
                            }
                            $_SESSION['count'] = $i;
                        }
                        else{
                            echo '<tr><th>THERE IS NO AVAILABLE ROOM ON THIS DATE</h4></th></tr>';
                        }
                    }
                    else{
                        if(strcmp($endTime,$currentTime) > 0) {
                            // output data of each row
                            if(mysqli_num_rows($query_run) > 0){
                                $i = 0;
                                while($row = mysqli_fetch_array($query_run))
                                {
                                            echo '  <tr>
                                            <td>' . $row["roomID"]. '</td> <input type="hidden" name="room[roomID]['.$i.']" value="'.$row["roomID"].'">
                                            <td>' . $row["roomName"]. '</td> <input type="hidden" name="room[roomName]['.$i.']" value="'.$row["roomName"].'">
                                            <td>' .$row["roomDesc"]. '</td>
                                            <td>' . $date . '</td> <input type="hidden" name="room[date]['.$i.']" value="'.$date.'">
                                                                   <input type="hidden" name="room[sesi]['.$i.']" value="'.$sesi.'">
                                            <td>' . $row["rStatus"] . '</td>
                                            <td><button class="btn btn-primary" name="room[submit]['.$i.']" value="submit"><i class="fa fa-book" title="book now!"></i></button></td>
                                            </tr>';
                                            $i++;
                                }
                                $_SESSION['count'] = $i;
                            }
                            else{
                                echo '<tr><th>THERE IS NO AVAILABLE ROOM ON THIS DATE</h4></th></tr>';
                            }
                        }
                        else {
                            echo '<tr><th>SESSION HAS ENDED, PLEASE CHOOSE A LATER ONE</th></tr>';
                        }
                    }
            
                echo'
                </tbody>
            </table>
        </form>';
        
        
    
    }
    else if(!empty($_SESSION['date'])){ //Date is searched
        $date = $_SESSION['date'];
        unset($_SESSION['date']);
        echo'
        <form action="Staff_Page.php" method="POST" > 
            <table class="table table-sm bg-light my-n3">
                <thead>
                    <tr>
                        <th scope="col">Room Number</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Room Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Select Room</th>
                    </tr>
                </thead>
                <tbody>';
                    //set all session in a day
                    $sessionList = Array("08:00 - 09:00", "09:00 - 10:00", "10:00 - 11:00", "11:00 - 12:00", "12:00 - 13:00", "13:00 - 14:00",
                                        "14:00 - 15:00", "15:00 - 16:00", "16:00 - 17:00", "17:00 - 18:00", "18:00 - 19:00", "19:00 - 20:00",
                                        "20:00 - 21:00", "21:00 - 22:00", "22:00 - 23:00", "23:00 - 00:00", "00:00 - 01:00", "01:00 - 02:00",
                                        "02:00 - 03:00", "03:00 - 04:00", "04:00 - 05:00", "05:00 - 06:00", "06:00 - 07:00", "07:00 - 08:00");

                    //query to select all the rooms existing in room_details table
                    $query = "SELECT room_details.room_num as roomID, room_details.room_name as roomName, room_details.room_desc as roomDesc, room_details.status as rStatus 
                                FROM room_details
                                WHERE room_details.status = 'Available'";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_array($query_run))
                        {
                            //assigning room id to a variable for comparison
                            $id = $row["roomID"];
                            $sessionCount = 0; // when sessionCount equals to size of sessionList, it means all sessions are used and will not list the room

                            //2nd query, to see if all the session used or not.
                            $query2 = "SELECT booking.session as _session FROM booking WHERE booking.room_num = '".$id."' AND booking.date = '".$date."' ";
                            $query2_run = mysqli_query($conn, $query2);

                            if(mysqli_num_rows($query2_run) > 0){
                                while($row2 = mysqli_fetch_array($query2_run)){
                                    $sesdb = $row2["_session"];
                                    
                                    for($se = 0; $se < sizeof($sessionList); $se++){
                                        if(strcmp($sesdb,$sessionList[$se]) == 0){
                                            $sessionCount++;
                                        }
                                        else{
                                            continue;
                                        }
                                    }
                                }
                            }

                            //determine whether the current room has full booked/used session or not
                            if($sessionCount == sizeof($sessionList)){
                                continue;
                            }
                            else{
                                echo '  <tr>
                                        <td>' . $row["roomID"]. '</td> <input type="hidden" name="room[roomID]['.$i.']" value="'.$row["roomID"].'">
                                        <td>' . $row["roomName"]. '</td> <input type="hidden" name="room[roomName]['.$i.']" value="'.$row["roomName"].'">
                                        <td>' .$row["roomDesc"]. '</td>
                                        <td>' . $date . '</td> <input type="hidden" name="room[date]['.$i.']" value="'.$date.'">
                                        <td>' . $row["rStatus"] . '</td>
                                        <td><button class="btn btn-primary" name="room[submit]['.$i.']" value="submit"><i class="fa fa-book" title="book now!"></i></button></td>
                                        </tr>';
                                $i++;
                            }
                        }
                        $_SESSION['count'] = $i;
                    }
                    else{
                        echo '<h4>THERE IS NO ROOM AVAILABLE ON THIS DATE</h4>';
                    }
                echo'
                </tbody>
            </table>
        </form>';
    
        
    }
    else        //default, no search value.
    {
        echo'
        <form action="Staff_Page.php" method="POST" > 
            <table class="table table-sm bg-light my-n3">
                <thead>
                    <tr>
                        <th scope="col">Room Number</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Room Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Select Room</th>
                    </tr>
                </thead>
                <tbody>';
                    //retrieve current date
                    date_default_timezone_set("Singapore");
                    $cdate = date("Y-m-d");

                    //set all session in a day
                    $sessionList = Array("08:00 - 09:00", "09:00 - 10:00", "10:00 - 11:00", "11:00 - 12:00", "12:00 - 13:00", "13:00 - 14:00",
                                        "14:00 - 15:00", "15:00 - 16:00", "16:00 - 17:00", "17:00 - 18:00", "18:00 - 19:00", "19:00 - 20:00",
                                        "20:00 - 21:00", "21:00 - 22:00", "22:00 - 23:00", "23:00 - 00:00", "00:00 - 01:00", "01:00 - 02:00",
                                        "02:00 - 03:00", "03:00 - 04:00", "04:00 - 05:00", "05:00 - 06:00", "06:00 - 07:00", "07:00 - 08:00");

                    //query to select all the rooms existing in room_details table
                    $query = "SELECT room_details.room_num as roomID, room_details.room_name as roomName, room_details.room_desc as roomDesc, room_details.status as rStatus 
                            FROM room_details
                            WHERE room_details.status = 'Available'";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        $i = 0;
                        while($row = mysqli_fetch_array($query_run))
                        {
                            //assigning room id to a variable for comparison
                            $id = $row["roomID"];
                            $sessionCount = 0; // when sessionCount hit 9, it means all sessions are used and will not list the room
                            
                            //2nd query, to see if all the session used or not.
                            $query2 = "SELECT booking.session as _session FROM booking WHERE booking.room_num = '".$id."' AND booking.date = '".$cdate."' ";
                            $query2_run = mysqli_query($conn, $query2);
                            
                            if(mysqli_num_rows($query2_run) > 0){
                                while($row2 = mysqli_fetch_array($query2_run)){
                                    $sesdb = $row2["_session"];
                                    
                                    for($se = 0; $se < sizeof($sessionList); $se++){
                                        if(strcmp($sesdb,$sessionList[$se]) == 0){
                                            $sessionCount++;
                                        }
                                        else{
                                            continue;
                                        }
                                    }
                                }
                            }

                            //determine whether the current room has full booked/used session or not
                            if($sessionCount == sizeof($sessionList)){
                                continue;
                            }
                            else{
                                echo '  <tr>
                                        <td>' . $row["roomID"]. '</td> <input type="hidden" name="room[roomID]['.$i.']" value="'.$row["roomID"].'">
                                        <td>' . $row["roomName"]. '</td> <input type="hidden" name="room[roomName]['.$i.']" value="'.$row["roomName"].'">
                                        <td>' .$row["roomDesc"]. '</td>
                                        <td>' . $cdate . '</td> <input type="hidden" name="room[date]['.$i.']" value="'.$cdate.'">
                                        <td>' . $row["rStatus"] . '</td>
                                        <td><button class="btn btn-primary" name="room[submit]['.$i.']" value="submit"><i class="fa fa-book" title="book now!"></i></button></td>
                                        </tr>';
                                $i++;
                            }
                        }
                        $_SESSION['count'] = $i;
                    }
                echo '
                </tbody>
            </table>
        </form>';
    }

    /* ********************* End Of Table ************************ */

    //Disconnect From Database
    mysqli_close($conn);
?>
