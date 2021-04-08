
<?php
    session_start();
    //Connect to Database
    include_once ("dbcons.php");

    /* ****************************************************************** * 
     *                          Load Table Rows                           *
     * ****************************************************************** */

     //Initialize the sessioned data
    $date = $_SESSION['selectedDate'];
    $roomID = $_SESSION['roomNum'];
    $roomName = $_SESSION['roomName'];

    //set default time zone and fetches current time
    date_default_timezone_set("Singapore");
    $currentTime = date("H:i");
    $currentDate = date("Y-m-d");

    //set all existing session
    $sessionList = Array("08:00 - 09:00", "09:00 - 10:00", "10:00 - 11:00", "11:00 - 12:00", "12:00 - 13:00",
    "14:00 - 15:00", "15:00 - 16:00", "16:00 - 17:00", "17:00 - 18:00");

    //set array to store db values
    $dbStatus = Array();
    $dbSession = Array();

    $query = "SELECT `status`, `session` FROM `booking` WHERE `room_num` = '".$roomID."' AND  `date` = '".$date."' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){
        while($row = mysqli_fetch_array($query_run)){
            array_push($dbStatus, $row['status']);
            array_push($dbSession, $row['session']);
        }
    }

    //loops based on size of existing session
    for($i = 0; $i < sizeof($sessionList); $i++){

        //Check if there is data for selected date session
        if(!empty($dbSession)){
            //boolean expression to indicate whether the existing session and fetched session matched or not
            $matched = false;
            //looping based on size of fetched data from database
            for($idb = 0; $idb < sizeof($dbSession); $idb++){
                //determine whether the session matched with fetched session from db
                if(strcmp($sessionList[$i], $dbSession[$idb]) == 0){
                    //boolean expressions became true when existing ssession and fetched session match
                    $matched = true;
                    break;
                }
            }

            if($matched)
                {
                    echo '  <tr>
                                <td>' . $date. '</td> 
                                <td>' . $dbSession[$idb]. '</td> <input type="hidden" name="book[session]['.$i.']" value="'.$dbSession[$idb].'">
                                <td>' .$dbStatus[$idb]. '</td>
                                <td><input type="checkbox" name="book[chk]['.$i.']" disabled></input></td>
                            </tr>';
                }
                else{
                    
                    $endTime = substr($sessionList[$i], -5);
                    if(strcmp($endTime, $currentTime) <= 0 AND $date == $currentDate){
                            echo '  <tr>
                                        <td>' . $date. '</td> 
                                        <td>' . $sessionList[$i]. '</td> <input type="hidden" name="book[session]['.$i.']" value="'.$sessionList[$i].'">
                                        <td>Session End</td>
                                        <td><input type="checkbox" name="book[chk]['.$i.']" disabled></input></td>
                                    </tr>';
                        
                    }
                    else{
                        echo '  <tr>
                                <td>' . $date. '</td> 
                                <td>' . $sessionList[$i]. '</td> <input type="hidden" name="book[session]['.$i.']" value="'.$sessionList[$i].'">
                                <td>Available</td>
                                <td><input type="checkbox" name="book[chk]['.$i.']"></input></td>
                                </tr>';
                    }
                }
        }
        else{
            $endTime = substr($sessionList[$i], -5);
            if(strcmp($endTime, $currentTime) <= 0 AND $date == $currentDate){
                echo '  <tr>
                        <td>' . $date. '</td> 
                        <td>' . $sessionList[$i]. '</td> <input type="hidden" name="book[session]['.$i.']" value="'.$sessionList[$i].'">
                        <td>Session End</td>
                        <td><input type="checkbox" name="book[chk]['.$i.']" disabled></input></td>
                        </tr>';
            }
            else{
                echo '  <tr>
                        <td>' . $date. '</td> 
                        <td>' . $sessionList[$i]. '</td> <input type="hidden" name="book[session]['.$i.']" value="'.$sessionList[$i].'">
                        <td>Available</td>
                        <td><input type="checkbox" name="book[chk]['.$i.']"></input></td>
                        </tr>';
            }
        }
    }
    

    //Hidden Values
    echo '
            <input type="hidden" name="book[roomID]['.$i.']" value="'.$roomID.'">
            <input type="hidden" name="book[roomName]['.$i.']" value="'.$roomName.'">
            <input type="hidden" name="book[date]['.$i.']" value="'.$date.'">
         ';
    

     /* ****************************************************************** * 
     *                      End Of Load Table Rows                         *
     * ******************************************************************* */
    
    //Disconnect From Database
    mysqli_close($conn);
    
?>