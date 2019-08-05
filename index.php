<?php
	session_start();
		if(isset($_SESSION['uid']))
		{
			header('location:cp/homepage');
		}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CAR POOL</title> 	
</head>
<body style="margin:0px;padding:0px;">
	<div style="background-image: url('waze.jpg');background-size: 100% 110%;width: 100%;height: 100vh;">
	<div style="width: 100%;height: 80px;">
	<div style="width: 20% line-height: 80px; float: left;">
	<h1 style="padding-left: 70px;color: red;font-weight: bold;font-size:40px">CAR POOL</h1>
	<!--<figure  style="border-radius:10px;">
	<video  width=500 height=300 controls="controls" autoplay="autoplay">
	<source src="videos/v1.mp4" type="video/mp4">
	</figure>-->
	</div>
	<div style="width:75%; float: right;">
	<ul style="margin-left: 700px;">
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="aboutus.php">About us</a></li>
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="contactus.php">Contact us</a></li>
	</ul>
	
	</div>
	</div>
	<div style="width: 800px;padding: 10% 0 0;margin-left: 600px;">
		<form action="index.php" method="post" style="position: relative;z-index: 1;background: ;max-width: 360px;margin: 0 auto 100px;padding: 45px;text-align:center;" >
			<div><center><h3>Login with email<h3></center></div>
					&nbsp;
					<div><input type="email" name="email" placeholder="&nbsp;&nbsp;Email" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:230px;text-align: justify;" required></div>
					&nbsp;
					<div><input type="password" name="password" placeholder="&nbsp;&nbsp;Password" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:230px;" required></div>
					&nbsp;
					<div><center><input type="submit" name="login" value="LOGIN" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:100px;" ></center></div>
					&nbsp;
					&nbsp;
					<div><center>Don't have an account ?</center></div>
					<div><center><a href="signin.php">SIGN UP NOW</a></center></div>
		</form>
	</div>
	<!-- <font color="lightred">Carpooling (also car-sharing,ride-sharing and lift-sharing) is the sharing
	of car journeys so that more than one person travels in a car,
	and prevents the need for others to have to drive to the same location</font> -->
	</div>
</body>
</html>
<?php

	$con=mysqli_connect('localhost','root','','carpool');
	
    
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
	
		$query = "(SELECT * FROM `registration1` WHERE `Email` = '$email' AND `Password` = '$password')";
		
		$run= mysqli_query($con,$query);
	

		
	$row= mysqli_num_rows($run);
		
		if($row <1)
		{
			?>
			<script>
				alert('Email or Password not match !!');
				window.open('index.php','_self');
			</script>
			<?php
		}
		else
		{
			$data= mysqli_fetch_array($run);
			
			
			$id=$data['id'];
			
			
			session_start();
			$_SESSION['uid']=$id;
			header('location:cp/homepage.php');
		}
	}
?> 
		
		
		
		
