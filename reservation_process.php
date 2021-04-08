<?php
  session_start();
  // Connect To Databse, $conn
  include_once ("dbcons.php");

  
   /* ********************************************* *
    *           Reserved Room Display               *
    *                                               *
    * ********************************************* */
  
    /*************************** Table Rows  *************************************/

    if(!empty($_SESSION['studentID']))
    {
      $studentID = $_SESSION['studentID'];
      unset($_SESSION['studentID']);
      $query = "SELECT booking.student_id studid, booking.student_name as studna , booking.room_num as rNum, room_details.room_name as rName, booking.date as date, booking.session as sess, booking.pin as pin, booking.status as status 
                FROM booking, room_details
                WHERE room_details.room_num = booking.room_num AND booking.student_id = '".$studentID."' AND NOT booking.status = 'Session End' ";
      $query_run = mysqli_query($conn, $query);

      if( mysqli_num_rows($query_run) > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($query_run))
        {
          if(strcmp($row['status'], "Booked") != 0){
            echo '<tr class="table-active"><td>' . $row["studid"]. '</td><td>' . $row["studna"]. '</td><td>' .$row["rNum"]. '</td><td>' . $row["rName"] . '</td><td>' . $row["date"] . '</td><td>' . $row["sess"] . '</td><td>' . $row["pin"] . '</td>
          <td> <button class="btn btn-danger" type="button" onclick="delRow(\''.$row["studid"].'\', \''.$row["rNum"].'\', \''. $row["date"] .'\', \''. $row["sess"] .'\')"><i class="fa fa-times" title="delete"></i></button></td>';
          }
          else{
            echo '<tr><td>' . $row["studid"]. '</td><td>' . $row["studna"]. '</td><td>' .$row["rNum"]. '</td><td>' . $row["rName"] . '</td><td>' . $row["date"] . '</td><td>' . $row["sess"] . '</td><td>' . $row["pin"] . '</td>
          <td> <button class="btn btn-danger" type="button" onclick="delRow(\''.$row["studid"].'\', \''.$row["rNum"].'\', \''. $row["date"] .'\', \''. $row["sess"] .'\')"><i class="fa fa-times" title="delete"></i></button></td>';
          }
        }
        echo '</table>';

      }
      else {
        echo '<h4>THERE IS NO RESERVATION MADE BY THIS STUDENT</h4>';
      }
      
    }
    else
    {
      $query = "SELECT booking.student_id studid, booking.student_name as studna , booking.room_num as rNum, room_details.room_name as rName, booking.date as date, booking.session as sess, booking.pin as pin, booking.status as status 
                FROM booking, room_details
                WHERE room_details.room_num = booking.room_num AND NOT booking.status = 'Session End' ";
      $query_run = mysqli_query($conn, $query);

      if( mysqli_num_rows($query_run) > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($query_run))
        {
          if(strcmp($row['status'], "Booked") != 0){
            echo '<tr class="table-active"><td>' . $row["studid"]. '</td><td>' . $row["studna"]. '</td><td>' .$row["rNum"]. '</td><td>' . $row["rName"] . '</td><td>' . $row["date"] . '</td><td>' . $row["sess"] . '</td><td>' . $row["pin"] . '</td>
          <td> <button class="btn btn-danger" type="button" onclick="delRow(\''.$row["studid"].'\', \''.$row["rNum"].'\', \''. $row["date"] .'\', \''. $row["sess"] .'\')"><i class="fa fa-times" title="delete"></i></button></td>';
          }
          else{
            echo '<tr><td>' . $row["studid"]. '</td><td>' . $row["studna"]. '</td><td>' .$row["rNum"]. '</td><td>' . $row["rName"] . '</td><td>' . $row["date"] . '</td><td>' . $row["sess"] . '</td><td>' . $row["pin"] . '</td>
          <td> <button class="btn btn-danger" type="button" onclick="delRow(\''.$row["studid"].'\', \''.$row["rNum"].'\', \''. $row["date"] .'\', \''. $row["sess"] .'\')"><i class="fa fa-times" title="delete"></i></button></td>';
          }
          
        }
        echo '</table>';

      }
      else{
        echo '<h4>THERE IS NO DATA ON RESERVED ROOM</h4>';
      }
    }
    
    /*************************** End Of Table Rows  *************************************/
    
    //Disconnect from database
    mysqli_close($conn);
?>
