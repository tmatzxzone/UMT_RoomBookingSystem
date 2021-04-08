<?php
    if($_SESSION['id'] == "update"){
      echo '  <script type="text/javascript">
			$(document).ready(function() {
			loadpage(\'update.php\');
			});
		</script> ';
    }
    
    if($_SESSION['id'] == "reservation"){
        echo '  <script type="text/javascript">
			$(document).ready(function() {
			loadpage(\'reservation.php\');
			});
		</script> ';
    }

    if($_SESSION['id'] == "availability"){
        echo '  <script type="text/javascript">
			$(document).ready(function() {
			loadpage(\'availability.php\');
			});
		</script> ';
    }

	if($_SESSION['id'] == "sessionSelect"){
        echo '  <script type="text/javascript">
			$(document).ready(function() {
			loadpage(\'session.php\');
			});
		</script> ';
    }

	if($_SESSION['id'] == "roomEdit"){
		echo '  <script type="text/javascript">
			$(document).ready(function() {
			loadpage(\'room_edit.php\');
			});
		</script> ';
	}
?>