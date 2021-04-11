<?php session_start(); ?>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- Clock Picker -->
<link rel="stylesheet" type="text/css" href="css/clockpicker.css"/>
<link rel="stylesheet" type="text/css" href="css/standalone.css"/>
<script type="text/javascript" src="js/clockpicker.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js">
</script>

<!-- ######################### Get room ######################### -->
<?php
  include_once('dbcons.php');
  if(!empty($_SESSION['roomID'])){
    $roomID = $_SESSION['roomID'];

    $query = "SELECT * FROM `room_details` WHERE `room_num` = '".$roomID."' ";
		$query_run = mysqli_query($conn, $query);
	
		if(mysqli_num_rows($query_run) > 0){
		  while($row = mysqli_fetch_array($query_run)){
			$ID = $row['room_num'];
			$Rname = $row['room_name'];
			$Desc = $row['room_desc'];
			$status = $row['status'];
		  }
		}
  }

  
  ?>
<!-- ######################### END OF GET ######################### -->

<!-- ######################### Availability ######################### -->

  <div class="container mx-auto py-5 my-5" style="background-color:#212529;">
      <div class="container clearfix">
        <h2 style="color:#FFCE2B; font-family:'Roboto',sans-serif;" class="text-center">Update Room Information</h2>
        <!--Textarea with icon prefix-->
        <form action="edit_process.php" method="POST">
          <div class="row my-5">
            <div class="col-sm"></div>
            <div class="col-sm my-3">
              <div class="form-outline">
                  <input type="text" class="form-control text-white" id="roomNumber" name="roomNumber" value="<?php echo $ID; ?>" rows="4" required/>
                  <label class="form-label" style="color:white;">Room Number</label>
              </div>
            </div>
              <div class="col-sm my-3">
                <div class="form-outline">
                  <input type="text" class="form-control text-white" id="roomName" name="roomName" value="<?php echo $Rname; ?>" rows="4" required/>
                  <label class="form-label" style="color:white;">Room Name</label>
              </div>
              </div>
              <div class="col-sm"></div>
          </div>
          <div class="row my-5">
            <div class="col-sm"></div>
            <div class="col-sm my-3">
              <div class="form-outline">
                  <input type="text" class="form-control text-white" id="roomDesc" name="roomDesc" value="<?php echo $Desc; ?>" rows="4" cols="40" required>
                  <label class="form-label" style="color:white;">Room Description</label>
              </div>
            </div>
              <div class="col-sm my-3">
                <div class="form-outline">
                  <input type="text" class="form-control text-white" id="roomStatus" name="roomStatus" value="<?php echo $status; ?>" rows="4" required/>
                  <label class="form-label" style="color:white;">Room Status</label>
              </div>
              </div>
              <div class="col-sm"></div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
  </div>
<!-- ######################### Availability ######################### -->
