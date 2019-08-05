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
<?php
	$random = $_GET['bc'];
	include('../dbcon.php');
	$query = "SELECT * FROM `offerride` WHERE `random` = '$random'";
	$run = mysqli_query($con,$query);
	$row = mysqli_num_rows($run);
	if($row < 1)
	{
		echo"";
	}
	else
	{
		$data=mysqli_fetch_assoc($run);
	?>
<html>
<head>
	search details
</head>
<body style="margin:0px;padding:0px;background-color: black;width: 100%;height :100vh;">
	<div style="width: 70%;height: 500px;background: white; margin: 50 auto;padding-bottom: 50;border: 2px solid white;">
		<div style="float: left;width: 50%;height:550px;background-image: url(../cp6.jpg);background-size: cover;box-sizing:border-box;"></div>
	<div style="float: right:width: 50%;height: 550px;background-color:;">
	<h1><i><center>DETAILS</center></i></h1>
		<div style="display: inline-block;"><h4 style="margin:0px">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;Origin</h4></div>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['origin']; ?></div><br>
		<div style="display: inline-block;"><h4 style="margin:0px;margin-top:20px;">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;Destination</h4></div>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['destination']; ?></div><br>
		<div style="display: inline-block;"><h4 style="margin:0px;margin-top:20px;">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;Date</h4></div>&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['date']; ?></div><br>
		<div style="display: inline-block;"><h4 style="margin:0px;margin-top:20px;">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;Time</h4></div>&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['time']; ?></div><br>
		<div style="display: inline-block;"><h4 style="margin:0px;margin-top:20px;">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;Per Passenger Charge</h4></div>&emsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['passcontri']; ?></div><br>
		<div style="display: inline-block;"><h4 style="margin:0px;margin-top:20px;">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;Seats Available</h4></div>&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['availseats']; ?></div><br>
		<div style="display: inline-block;"><h4 style="margin:0px;margin-top:20px;">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;It will squeeze 3 or not</h4></div>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['passcomfort']; ?></div><br>
		<div style="display: inline-block;"><h4 style="margin:0px;margin-top:20px;">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;Stopover1</h4></div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['stopover1']; ?></div><br>
		<div style="display: inline-block;"><h4 style="margin:0px;margin-top:20px;">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;Stopover2</h4></div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['stopover2']; ?></div><br>
		<div style="display: inline-block;"><h4 style="margin:0px;margin-top:20px;">&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;Stopover3</h4></div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&rarr;&emsp;&emsp;<div style="display: inline-block;"><?php echo $data['stopover3']; ?></div><br>
	<?php
	}
	?>
		<input type="button" value="Book Seats" onclick="window.location.href='searchride1.php?as=<?php echo $_GET['bc']; ?>' " style="display: inline-block;border: 2px solid #456879;border-radius: 10px;height:22px;width:24.5%;margin-left: 0.5%;margin-top:40px"/><input type="button" value="Back" onclick="window.location.href='searchride.php' " style="display: inline-block;border: 2px solid #456879;border-radius: 10px;height:22px;width:24.5%;margin-left: 0.5%;margin-top:40px"/>
	</div>
	</div>
</body>
</html>