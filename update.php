<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet"/>

<link rel="stylesheet" href="css/style.css">
<style>
  input{
    color:white;
    background-color:white;
  }
</style>
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

<div class="container2 mx-auto py-5 my-5" style="background-color:#212529">
      <div class="container clearfix">
        <h2 style="color:#FFCE2B" class="text-center">Update Room Information</h2>

<!-- Pills Bar -->
      <!-- Pills navs -->
      <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation"></li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link active"
            id="room_info_tab"
            data-mdb-toggle="pill"
            href="#room_info"
            role="tab"
            aria-controls="room_info"
            aria-selected="true"
            >Room Info</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link"
            id="add_room_tab"
            data-mdb-toggle="pill"
            href="#add_room"
            role="tab"
            aria-controls="add_room"
            aria-selected="false"
            >Add Room</a
          >
        </li>
        <li class="nav-item" role="presentation"></li>
      </ul>
      <!-- Pills navs -->

      <!-- Pills content -->
    <div class="tab-content" id="ex2-content">

        <!-- ########## ROOM INFORMATION ##########-->
        <div
          class="tab-pane fade show active"
          id="room_info"
          role="tabpanel"
          aria-labelledby="room_info_tab"
        >

          <!-- Search bar -->
          <div class="d-flex justify-content-center">
            <form action="staff_page.php" class="py-2" method="GET" >
                <div class="input-group">
                  <div class="form-outline">
                    <input type="text" id="search-focus" id="form1" class="form-control" style="color:white;" name="roomNo">
                    <label class="form-label" for="form1" style="color:white;">Room ID</label>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary" value="search">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
            </form>
          </div>
          <!-- End of Search Bar -->

          <div class="table-responsive-lg">
            <table class="table table-sm bg-light my-2">
                <thead>
                  <tr>
                      <th scope="col">Room Number</th>
                      <th scope="col">Room Name</th>
                      <th scope="col">Room Description</th>
                      <th scope="col">Status</th>
                      <th scope="col" class="text-center">Setting</th>
                  </tr>
                </thead>
                <tbody id="table_loader">
                  <tr>
                        <script type="text/javascript">
                        $(document).ready(function() {
                        loadtable('update_process.php');
                      });
                  </script>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <!-- ########## END OF ROOM INFIRMATION ##########-->

        <!-- ########## ONCLICK FUNTIONS FOR ROOM INFORMATION ##########-->
        <script type="text/javascript">
          function delRoom(roomID){
            if(confirm("This data will be completely deleted, Continue?")){
            //set the values from parameter into cookie 
            document.cookie = "roomID =" + roomID;

            //redirect 
            window.location.replace('delete_room.php');
          }
          }
        </script>
        <!-- ########## END OF ONCLICK FUNTIONS FOR ROOM INFORMATION ##########-->

            <!-- ########## ADD ROOM ########## -->
        <div
          class="tab-pane fade"
          id="add_room"
          role="tabpanel"
          aria-labelledby="add_room_tab"
        >
          <!--Textarea -->
          <form action="add_room.php" class="py-2" method="GET" >
              <div class="row my-2">
                <div class="col-sm"></div>
                  <label class="text-center" style="color:white;">Room ID</label> 
                    <div class="col-sm"></div>
                    <div class="col-sm">
                        <div class="form-outline text-center">
                          <input required="" type="text" id="roomID" class="form-control text-white" name="roomID"/>
                         
                        </div>
                    </div>
                  <div class="col-sm"></div>
                
              </div>

                <div class="row">
                  <div class="col-sm"></div>
                    <label class="text-center" style="color:white;">Room Name</label> 
                    <div class="col-sm"></div>
                      <div class="col-sm">
                        <div class="form-outline">
                          <input required type="text" id="roomName" class="form-control text-white" name="roomName"/>
                          
                        </div>
                      </div>
                    <div class="col-sm"></div>
                  
                </div>
               
              <div class="row my-2">
                <div class="col-sm"></div>
                  <label class="text-center" style="color:white;">Room Description</label> 
                    <div class="col-sm"></div>
                        <div class="col-sm">
                          <div class="form-outline">
                              <textarea required class="form-control" id="roomDesc" name="roomDesc" rows="4" style="color:white;"></textarea>
     
                          </div>
                        </div>
                      <div class="col-sm"></div>
                    
                  </div>
              <div class="text-center">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
    </div>
    
    <!-- End Of Pills content -->
</div>
<!-- End Of Pills Bar -->
