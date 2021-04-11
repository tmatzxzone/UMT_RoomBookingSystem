<?php
    include_once ('dbcons.php');

    echo'
            <table class="table table-sm table-hover bg-light text-center"> 
                <thead>
                    <tr>
                        <th scope="col">Room Number</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Room Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>';
                    //retrieve current date
                    date_default_timezone_set("Singapore");
                    $cdate = date("Y-m-d");

                    //set all session in a day
                    $sessionList = Array("08:00 - 09:00", "09:00 - :10:00", "10:00 - 11:00", "11:00 - 12:00", "12:00 - 13:00",
                                    "14:00 - 15:00", "15:00 - 16:00", "16:00 - 17:00", "17:00 - 18:00");

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
                                    
                                    for($se = 0; $se < 9; $se++){
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
                            if($sessionCount == 9){
                                continue;
                            }
                            else{
                                echo '  <tr>
                                        <td>' . $row["roomID"]. '</td> <input type="hidden" name="room[roomID]['.$i.']" value="'.$row["roomID"].'">
                                        <td>' . $row["roomName"]. '</td> <input type="hidden" name="room[roomName]['.$i.']" value="'.$row["roomName"].'">
                                        <td>' .$row["roomDesc"]. '</td>
                                        <td>' . $cdate . '</td> <input type="hidden" name="room[date]['.$i.']" value="'.$cdate.'">
                                        <td>' . $row["rStatus"] . '</td>
                                        </tr>';
                                $i++;
                            }
                        }
                    }
                echo '
                </tbody>
            </table>';
    mysqli_close($conn);
?>