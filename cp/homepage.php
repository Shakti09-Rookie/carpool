<?php
	session_start();
	
		if(isset($_SESSION['uid']))
		{
			echo"";
		}
		else
		{
			 header('location:  ../index.php');
		}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CAR POOL</title> 
</head>
<body style="margin:0px;padding:0px;background-color:">
	<div style="background-size: 100% 110%;width: 100%;height: 100vh;">
	<div style="width: 100%;height: 100px;background-color:gold">
	<div style="width: 20% line-height: 80px; float: left;">
	<h1 style="padding-left: 70px;color: blue;font-weight: bold;font-size:40px">CAR POOL</h1>
	</div>
	<div style="width:40%; float: right;">
	<ul style="margin: 0;">
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="myaccount.php">My Account</a></li>
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="../aboutus.php">About us</a></li>
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="../contactus.php">Contact us</a></li>
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="logout.php">Log out</a></li>
	</ul>
	
	</div>
	</div>
	<div style="background-color:rosybrown;width: 100%;height:584px;">
	<img src="../cp4.jpg" style="float: left;width: 49%;height: 548px;margin-left: 0.5%;margin-right: 1%;margin-bottom: 0em;margin-top: 0.5%;border-radius: 10px;"><img src="../cp5.jpg" style="float: left;width: 49%;height: 548px;margin-right: 0.5%;margin-bottom: 0em;margin-top: 0.5%;border-radius: 10px;">
	<input type="button" value="Find a ride" onclick="window.location.href='searchride.php' " style="border: 2px solid #456879;border-radius: 10px;background-color: blue;color: white;font-size: 19px;height:30px;width:49%;margin-left: 0.5%;"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Offer a ride" onclick="window.location.href='offerride0.php' " style="border: 2px solid #456879;border-radius: 10px;background-color: blue;color: white;font-size: 19px;height:30px;width:49%;"/>
	<!--<div style="width: 50%;height: 580px;background: white; margin: 50 auto;padding-bottom: 50;border: 2px solid white;">
		<img src='../cp4.jpg' width=700px height=550px align=top style="padding-top: 0px; margin: 0;border: o;vertical-align: top;">
	</div>
		<!--<div style="width: 80%;height:100px;float:left";>
		<div style="float: left;margin: 0 20 0 20;"><img src='../cp4.jpg' height='500px' width='500px'></div></br>
		<div><input type="button" value="SEARCH RIDE" onclick="window.location.href='searchride.php' " style="border: 2px solid #456879;border-radius: 10px;height:22px;width:50%;"/></div>
		</div>
	<!--	<div><input type="button" value="OFFER RIDE" onclick="window.location.href='offerride0.php' " style="border: 2px solid #456879;border-radius: 10px;height:22px;width:230px;"/></div>-->
				
	</div>
	</div>
	
	</body>
	</html>
	
	