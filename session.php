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
    <!--Ajax dynamic page loader -->
    <script type="text/javascript">
    function loadtable(page){
    $.ajax({
    url:page,
    beforeSend:function(){
      $('#table_loader').html("Please wait...");
    },
    success:function(data){
      $('#table_loader').html(""); // to empty previous page contents.
      $('#table_loader').html(data);
    }
  });
}
</script>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js">
</script>



<!-- ######################### Available Session ######################### -->

	<div class="container2 mx-auto py-5 my-5" style="background-color:#212529">
		<div class="container clearfix">
			<h2 style="color:#FFCE2B" class="text-center">Available Session</h2>
			

			<?php 
						if(!empty($_SESSION['roomNum'])){
							echo '<h2 style="color:#FFCE2B" class="text-center">'.$_SESSION['roomNum'].'/'.$_SESSION['roomName'].'</h2>';
						}
			?>
			

			<!-- Table -->
			<div class="table-responsive-sm my-5">
				<form action="booking.php" method="POST" id="bookingForm" > 
						<table class="table bg-light my-n3">
						<thead>
							<tr>
								<th scope="col">Date</th>
								<th scope="col">Session</th>
								<th scope="col">Status</th>
								<th scope="col">Select</th>

							</tr>
						</thead>
						<tbody id="table_loader">
								<script type="text/javascript">
									$(document).ready(function() {
									loadtable('session_process.php');
									});
								</script>
						</tbody>
					</table>
				</form>
			</div>
		</div>
		<!-- End Of Table -->

		<div class="text-center">
			<a href="?id=availability" class="btn btn-info my-5" role="button">Cancel</a>
			<input type="submit" form="bookingForm" class="btn btn-primary my-5" value="Submit" />
        </div> 
    </div>
<!-- ######################### End Of Available Session ######################### -->