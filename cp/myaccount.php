<?php
	session_start();
	
		if(isset($_SESSION['uid']))
		{
			echo "";
		}
		else
		{
			 header('location:  ../index.php');
		}
?>
<html>
	<head>
		<title>
			my account
		</title>
	</head>
	<body style="background-image: url('../back1.jpg');background-repeat: no-repeat;background-size:cover;">
				<div style="display: inline-block;margin-top:30%;margin-left:40%">
				<div style="display: inline-block;">*</div>
				<div style="display: inline-block;"><a href="profile.php"><h2>Profile</h2></a></div>
				</div>
				<div style="display: inline-block;margin-top:0%;margin-left:20%">
				<div style="display: inline-block;">*</div>
				<div style="display: inline-block;"><a href="myride.php"><h2>My  booked rides</h2></a></div>
				</div>
				</div>
				<div style="display: inline-block;margin-top:0%;margin-left:40%">
				<div style="display: inline-block;">*</div>
				<div style="display: inline-block;"><a href="logout.php"><h2>Log out</h2></a></div>
				</div>
				<div style="display: inline-block;margin-top:0%;margin-left:19.3%">
				<div style="display: inline-block;">*</div>
				<div style="display: inline-block;"><a href="myofferride.php"><h2>My offered rides</h2></a></div>
				</div>
				
	</body>
</html>