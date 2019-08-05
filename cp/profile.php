<?php
	session_start();
	
		if(isset($_SESSION['uid']))
		{
			echo "";
			$id=$_SESSION['uid'];
		}
		else
		{
			 header('location:  ../index.php');
		}
?>
<?php
	include('../dbcon.php');
	$query = " SELECT * FROM `registration` WHERE `id` ='$id' ";
	$run = mysqli_query($con,$query);
	$data = mysqli_fetch_assoc($run);
?>
<html>
	<head>
		<title>
			My Profile
		</title>
	</head>
	<body style="background-image: url('../images.jpg');background-repeat:no-repeat;background-size:cover;">
	<div style="width: 70%;height: 520px;background:white; margin: 50 auto;padding-bottom: 50;border: 2px solid white;">
	<div style="float: left;width: 50%;height:550px;">
			<img src= "../images/car8.jpg" width=100% height=569px>
	</div>
	<div style="color:blue">
		<h1><i>&emsp;&emsp;&emsp;&emsp;MY PROFILE</i></h1>
	</div>
				
				<div style="margin:0%;"><h2 style="margin:0%;">&emsp;Name&emsp;:</h2></div>
				<div style="margin:1%">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<u style="border-bottom: 2px solid black;font-size:25px;"><?php echo $data['First Name']." ".$data['Last Name'];?></u></div>
			
				<div style=""><h2 style="margin: 0.5%;">&emsp;Gender&emsp;:</h2></div>
				<div style="margin:1%">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<u style="border-bottom: 2px solid black;font-size:25px;"><?php echo $data['Sex']; ?></u></div>
				<div style=""><h2 style="margin: 0.5%;">&emsp;Mobile Number&emsp;:</h2></div>
				<div style="margin:1%">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<u style="border-bottom: 2px solid black;font-size:25px;"><?php echo $data['Phone Number'];?></u></div>
			
				<div style=""><h2 style="margin: 0.5%;">&emsp;Registered Email&emsp;:</h2></div>
				<div style="margin:1%">&emsp;&emsp;&emsp;&emsp;<u style="border-bottom: 2px solid black;font-size:25px;"><?php echo $data['Email'];?></u></div>
				
				<div style=""><h2 style="margin: 0.5%;">&emsp;Aadhar Number&emsp;:</h2></div>
				<div style="margin:1%">&emsp;&emsp;&emsp;&emsp;<u style="border-bottom: 2px solid black;font-size:25px;"><?php echo "";?></u></div>
				
				<div style=""><h2 style="margin: 0.5%;">&emsp;Driving Lisence No&emsp;:</h2></div>
				<div style="margin:1%">&emsp;&emsp;&emsp;&emsp;<u style="border-bottom: 2px solid black;font-size:25px;"><?php echo "";?></u></div>
				
		</div>
	</body>
</html>
