<nav class="sticky-top">
	<!--== Side Navigation Bar ==-->
	<?php
		if(!empty($_SESSION['type'])){
			if($_SESSION['type'] == "staff"){
				include_once ('side_nav.php');
			}
		}
	?>
	<!--== Side Navigation Bar Ends Here ==-->
</nav>

<nav class="navbar navbar-expand-md navbar-dark mb-3 sticky-top" style="background: rgb(0,53,106,0.9)0;">
		<div class="container-fluid">
			<?php 
				if(!empty($_SESSION['status'])){
					echo '<a href="dashboard.php" class="navbar-brand mr-3"><img src="images/logo.png" alt="logo" width="50px" height="50px"/></a>';
					
				}
				else{
					echo '<a href="/booking" class="navbar-brand mr-3"><img src="images/logo.png" alt="logo" width="50px" height="50px"/></a>';
				}
			?>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="fas fa-bars"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="navbar-nav">
			<a href="dashboard.php" class="nav-item nav-link active" style="color:#FFCE2B;">Home</a>
			<!--
			<a href="#" class="nav-item nav-link" style="color:#FFCE2B;"></a>
			<a href="#" class="nav-item nav-link" style="color:#FFCE2B;"></a>
			<a href="#" class="nav-item nav-link" style="color:#FFCE2B;"></a>
			-->
			</div>

				<div class="navbar-nav ml-auto">
					<?php 
						if(!empty($_SESSION['status'])){
							$user = $_SESSION['fname'];

							echo '<a href="dashboard.php" class="nav-item nav-link" style="color:#ffffff;"><i class="fas fa-user-circle fa-lg" style="color:#FFCE2B;"></i>&nbsp'.$user.'</a>';
							echo '<a href="logout.php" class="nav-item nav-link" style="color:#ffffff;">Log Out</a>';
							
						}
						else{
							echo '<a href="login.php" class="nav-item nav-link" style="color:#ffffff;"><i class="fas fa-sign-in-alt fa-lg" style="color:#FFCE2B;"></i>&nbspLogin</a>';
							echo '<a href="register.php" class="nav-item nav-link" style="color:#ffffff;">Register</a>';
						}
					?>
				</div>
			</div>
	</nav>


		