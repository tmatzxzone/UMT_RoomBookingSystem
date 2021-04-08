<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>Library Room Reservation</title>
        <!-- Theme Css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
        <style>
            html *
                {
                   font-size: 16px !important;
                }
        </style>
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
    </head>

    <body class="" id="main">
        <section>

            <!-- body content start-->
            <div style="background:url('images/bg-lay.svg'); shape-rendering: auto;" >

                <!--== Navigation Bar ==-->
                <?php include_once ('header.php'); ?>
                <!--== Navigation Bar Ends Here ==-->

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12 col-sm-14">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h5 class="header-title pb-3">Summary</h5>           
                                    <div id="morris-donut-chart"></div>             
                                </div>
                            </div>
                        </div>
 

                        <div class="col-lg-12 col-sm-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h5 class="header-title pb-3">Recent Booking</h5>           
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover m-b-0" id="table-loader">
                                                    <script type="text/javascript">
                                                          $(document).ready(function() {
                                                          loadtable('dashboard_table.php');
                                                        });
                                                    </script>
                                                </table>
                                            </div>
                                        </div>
                                    </div>              
                                </div>
                            </div>
                        </div>

                        
                    </div>                            
                    
                </div><!--end container-->
            </div>
            <!--end body content-->
        </section>

        <!-- jQuery to load donut -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="plugins/morris-chart/raphael-min.js"></script>
        <script src="plugins/morris-chart/morris.js"></script>
        <script src="js/dashboard-init.js"></script> 


        <!--app js
        <script src="dashboard/js/jquery.app.js"></script>
        <script>
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                delay: 100,
                time: 1200
                });
            });
        </script>-->
    </body>
</html>
