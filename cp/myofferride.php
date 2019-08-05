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
	$query = " SELECT * FROM `myofferride` WHERE `id`= '$id' ";
	$run = mysqli_query($con,$query);
	$count=0;
	
?>
<html>
	<head>
		<title>My offered rides</title>
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
				<li style="display: inline-block;"><div><h2>S.No</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;"><div><h2>Origin</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;"><div><h2>Destination</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;"><div><h2>Date</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;"><div><h2>Time</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;"><div><h2>Offered Seats</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;"><div><h2>per passengers contri</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;"><div><h2>stopover_1</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;"><div><h2>stopover_2</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;"><div><h2>stopover_3</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</ul>
<?php
	while($data=mysqli_fetch_assoc($run))
	{
		$count++;
?>
		
			<ul style="margin:0 0 0 0;">
				<li style="display: inline-block;"><div>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count; ?></div></li>
				<li style="display: inline-block;margin-left:5%"><div><?php echo $data['origin'];?></div></li>
				<li style="display: inline-block;margin-left:4%"><div><?php echo $data['destination'];?></div></li>
				<li style="display: inline-block;margin-left:5%"><div><?php echo $data['date'];?></div></li>
				<li style="display: inline-block;margin-left:1.5%"><div><?php echo $data['time'];?></div></li>
				<li style="display: inline-block;margin-left:7%"><div><?php echo $data['offeredseats'];?></div></li>
				<li style="display: inline-block;margin-left:15%"><div><?php echo $data['perpasscontri'];?></div></li>
				<li style="display: inline-block;margin-left:10%"><div><?php echo $data['stopover1'];?></div></li>
				<li style="display: inline-block;margin-left:5%"><div><?php echo $data['stopover2'];?></div></li>
				<li style="display: inline-block;margin-left:5%"><div><?php echo $data['stopover3'];?></div></li>
			</ul><br>
			

<?php
	}
?>
</div>
</body>
</html>