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
	$query = "SELECT * FROM `bookride` WHERE `idd` = '$id'";
	$run = mysqli_query($con,$query);
	$count=0;?>
	<html>
	<head>
		<title>my rides</title>
	</head>
	<body style="margin:0px;padding:0px;">
		<div style="background-size: 100% 70%;width: 100%;height: 100vh;">
		<div style="width: 100%;height: 100px;background-color: rgba(0,0,0,.2)">
		<div style="width: 20% line-height: 80px; float: left;">
		<h1 style="padding-left: 70px;color: red;font-weight: bold;font-size:40px">CAR POOL</h1>
		</div>
		<div style="width:75%; float: right;">
		<ul style="margin-left: 500px;">
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="myaccount.php">My Account</a></li>
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="../aboutus.php">About us</a></li>
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="../contactus.php">Contact</a></li>
		<li style="display: inline-block;font-weight: bold;font-size:20px; line-height:100px;margin-left:40px;"><a href="logout.php">Log out</a></li>
		</ul>
		</div>
		</div>
		<div style="background-color:lightblue;height:82vh" >
	<div style="color:blue;margin-left:36%"><h1><i>MY OFFERED RIDES</i></h1></div>
		<ul style="margin:0 0 0 0;">
			<li style="display: inline-block;"><div><h2>S.no</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<li style="display: inline-block;"><div><h2>Origin</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<li style="display: inline-block;"><div><h2>Destination</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<li style="display: inline-block;"><div><h2>Date</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<li style="display: inline-block;"><div><h2>Time</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<li style="display: inline-block;"><div><h2>No. Seats</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<li style="display: inline-block;"><div><h2>per passengers contri</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<li style="display: inline-block;"><div><h2>Total amount you paid</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<li style="display: inline-block;"><div><h2>Ride completed</h2></div></li>
	<?php
	while($data=mysqli_fetch_assoc($run))
	{
		
	$random=$data['anotid'];
	$query1 = "SELECT * FROM `offerride` WHERE `random` = '$random'";
	$run1 = mysqli_query($con,$query1);
	$data1=mysqli_fetch_assoc($run1);
	
		$count++;
?>
	<ul style="margin:0 0 0 0;">
		<li style="display: inline-block;margin-left:-2%"><div><?php echo $count;?></div></li>
		<li style="display: inline-block;margin-left:4.5%"><div><?php echo $data1['origin'];?></div></li>
		<li style="display: inline-block;margin-left:5%"><div><?php echo $data1['destination'];?></div></li>
		<li style="display: inline-block;margin-left:4%"><div><?php echo $data1['date'];?></div></li>
		<li style="display: inline-block;margin-left:1.5%"><div><?php echo $data1['time'];?></div></li>
		<li style="display: inline-block;margin-left:5%"><div><?php echo $data['nseats'];?></div></li>
		<li style="display: inline-block;margin-left:13%"><div><?php echo $data1['passcontri'];?></div></li>
		<?php $ttl = $data['nseats']* $data1['passcontri'] ?>
		<li style="display: inline-block;margin-left:15%"><div><?php echo $ttl; ?></div></li>
		<li style="display: inline-block;margin-left:5%"><div><?php echo ""; ?></div></li>
		
	</ul>
	
<?php
	}
?>