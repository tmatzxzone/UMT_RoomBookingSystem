
<?php
  session_start();
  //connect to database
  include_once ('dbcons.php');


if(!empty($_SESSION['room']))
{
  $roomNo = $_SESSION['room'];
  unset($_SESSION['room']); 
  print_r($roomNo);
   $query = "SELECT  *
              FROM room_details 
              WHERE room_num = '".$roomNo."'";
  $query_run = mysqli_query($conn, $query);

  if( mysqli_num_rows($query_run) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($query_run))
    {
      echo '<tr><td>' . $row["room_num"]. '</td><td>' .$row["room_name"]. '</td><td>' . $row["room_desc"] . '</td><td>' . $row["status"] . '</td>
      <td class="text-center"> <button class="btn btn-danger" type="button" onclick="delRoom(\''.$row["room_num"].'\')"><i class="fa fa-times" title="delete"></i></button> &nbsp 
      <a href="staff_page.php?id=roomEdit&room_num='.$row["room_num"].'" class="btn btn-primary" role="button" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>';
    }
    echo '</table>';

  }
  else {
    echo '<h4>THERE IS NO ROOM WITH THIS ID</h4>';
  }
  
}
else
{
  $query = "SELECT  *
              FROM room_details";
  $query_run = mysqli_query($conn, $query);

  if( mysqli_num_rows($query_run) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($query_run)){
      echo '<tr><td>' . $row["room_num"]. '</td><td>' .$row["room_name"]. '</td><td>' . $row["room_desc"] . '</td><td>' . $row["status"] . '</td>
      <td class="text-center"> <button class="btn btn-danger" type="button" onclick="delRoom(\''.$row["room_num"].'\')"><i class="fa fa-times" title="delete"></i></button> &nbsp 
      <a href="staff_page.php?id=roomEdit&roomID='.$row["room_num"].'" class="btn btn-primary" role="button" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>';
    }
    echo '</table>';

  }
}
?>