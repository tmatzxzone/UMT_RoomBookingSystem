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

  <link rel="stylesheet" href="css/style.css">

  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <!-- Ajax dynamic page loader -->
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
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
  ></script>


  <!-- ################### Reservation ################### -->

  <div class="container2 mx-auto py-5 my-5" style="background-color:#212529">
    <div class="container clearfix">
      <h2 style="color:#FFCE2B" class="text-center">Room Reservation Status</h2>
      <!-- Search bar -->
      <div class="d-flex justify-content-center my-3">
        <form action="staff_page.php" class="float-right pb-5" method="GET" >
            <div class="input-group">
              <div class="form-outline">
                <input type="text" id="search-focus" id="form1" class="form-control" style="color:white;" name="sid">
                <label class="form-label" for="form1" style="color:white;">Student ID</label>
              </div>
              <button type="submit" name="submit" class="btn btn-primary" value="search">
                <i class="fas fa-search"></i>
              </button>
            </div>
        </form>
      </div>
      <!-- End of Search Bar -->

      <!-- Table -->
      <div class="table-responsive-lg">
        <table class="table table-sm bg-light my-n3">
          <thead>
            <tr>
              <th scope="col">Student ID</th>
              <th scope="col">Student Name</th>
              <th scope="col">Room Number</th>
              <th scope="col">Room Name</th>
              <th scope="col">Date</th>
              <th scope="col">Session</th>
              <th scope="col">Passcode</th>
              <th scope="col">Setting</th>
            </tr>
          </thead>
          <tbody id="table_loader">
            <!-- Load Table Rows -->
            <tr>
                  <script type="text/javascript">
                  $(document).ready(function() {
                  loadtable('reservation_process.php');
                });
            </script>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- End Of Table -->

    <!-- Script For Delete Button -->
      <script type="text/javascript">
        function delRow(studID, roomID, bdate, session){
          if(confirm("This data will be completely deleted, Continue?")){
            //set the values from parameter into cookie 
            document.cookie = "studID =" + studID;
            document.cookie = "roomID =" + roomID;
            document.cookie = "bdate =" + bdate;
            document.cookie = "session =" + session;

            //redirect 
            window.location.replace('delete_reserve.php');
          }
        }
      </script>
 
    </div>
  </div>

  <!-- ################### End Of Reservation ################### -->