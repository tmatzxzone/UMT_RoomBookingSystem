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



<!-- ######################### Availability ######################### -->

	<div class="container2 mx-auto py-5 my-5" style="background-color:#212529">
		<div class="container clearfix">
			<h2 style="color:#FFCE2B" class="text-center">Room Availability Status</h2>
			<!-- Search bar -->
			<form action="" class="my-5 pb-5 d-flex justify-content-center" method="GET">
				<div class="row">
					<div class="col-1"></div>
					<div class="col-md-3">
						<div class="form-group">
							<span class="form-label" style="color:white;">Date</span>
							<input id="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" type="date" name="date" required>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<span class="form-label" style="color:white;">Start Time</span>
							<div class="input-group clockpicker">
								<input type="text" id="startTime" class="form-control" value="00:00" name="startTime">
							</div>
							<script type="text/javascript">
								$('.clockpicker').clockpicker({autoclose: 'True'});
								 var elem = $('#startTime');
								 var c = elem.clockpicker({autoclose: 'True', align: 'top', placement: 'bottom',
								 	afterHourSelect: function(){
								    	c.data('clockpicker').done();
								    }
								 });
								</script>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<span class="form-label" style="color:white;">End Time</span>
							<div class="input-group clockpicker">
								<input type="text" id="endTime" class="form-control" value="00:00" name="endTime">
							</div>
							<script type="text/javascript">
							$('.clockpicker').clockpicker({autoclose: 'True'});
							 var elem2 = $('#endTime');
							 var d = elem2.clockpicker({autoclose: 'True', align: 'top', placement: 'bottom',
							 	afterHourSelect: function(){
							    	d.data('clockpicker').done();
							    }
							 });
							</script>
						</div>
					</div>

					<div class="col-md-1">
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary my-4" value="search">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</div>
			</form>
			<!-- End of Search Bar -->

			<div class="table-responsive-lg" id="table_loader">
				<script type="text/javascript">
					$(document).ready(function() {
					loadtable('availability_process.php');
					});
				</script>
			</div>
		</div>
	</div>	
<!-- ######################### Availability ######################### -->
