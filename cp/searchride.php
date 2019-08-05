<?php
	session_start();
	
		if(isset($_SESSION['uid']))
		{
			echo "";
			$idd = $_SESSION['uid'];
		}
		else
		{
			 header('location:  ../index.php');
		}
?>
<html>
<head>
	<title>search ride</title>
</head>
<body>
<body style="margin:0px;padding:0px;">
	<div style="background-size: 100% 70%;width: 100%;height: 70vh;">
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
	<div>
	
	<form action="searchride.php" method="post">
	<ul>
	<li style="display: inline-block;"><div>From</div></li>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<li style="display: inline-block;"><div>To</div></li>
	
	</ul>
	
	<ul>
	<li style="display: inline-block;"><div><textarea name="address" placeholder="Origin city" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 300px;" required ></textarea></div></li>&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<li style="display: inline-block;"><h1>&rarr;<h1></li>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<li style="display: inline-block;"><div><textarea name="addres" placeholder=" Destination city" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 300px;" required ></textarea></div></li>
	</ul>
	<div>&emsp;&emsp;&nbsp;&nbsp;Departure Date</div>&emsp;&emsp;
	<div>&emsp;&emsp;&nbsp;&nbsp;<input type="date" name="date" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width:600px;" required ></div>&emsp;&emsp;&emsp;&emsp;&emsp;
	<div>&emsp;&emsp;&nbsp;&nbsp;<input type="submit" name="continue" value="continue" style="background-color: blue;color: white;font-size: 30;border: 2px solid #456879;border-radius: 10px;height:40px;width:1300px;" ></div>
	</form>
	</div>
	<!--<div style="margin-left: 40px">
	<img src='../cp3.jpg' width=1300px height=280px>
	</div>-->
	</div>
</body>
</html>
<?php

	$con= mysqli_connect('localhost','root','','carpool');
		
	if(isset($_POST['continue']))
	{
		$Address = $_POST['address'];
		$Addres = $_POST['addres'];
		$date = $_POST['date'];
		if($Address == $Addres)
		{
			?>
			<script>
				alert('Origin And Destination are not Same !!');
				window.open('searchride.php','_self');
			</script>
			<?php
		}
		else
		{
		
		$query = "SELECT * FROM `offerride` WHERE `origin` = '$Address' AND `destination` = '$Addres' AND `date` = '$date'";
		$run= mysqli_query($con,$query);
		$row= mysqli_num_rows($run);
		if($row <1)
		{
			
			header('location:nosearchride.php');
		}
		else
		{
			
			$count=0;?>
				<div style="width: 70%;height: 15px;background: lightblue; margin: 0 auto;padding-bottom: 50;border: 2px solid black;">
				<ul style="margin:0 0 0 0;">
				<li style="display: inline-block;"><div><h2>S.No</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
				<li style="display: inline-block;"><div><h2>Origin</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
				<li style="display: inline-block;"><div><h2>Destination</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
				<li style="display: inline-block;"><div><h2>Time</h2></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
				<li style="display: inline-block;"><div><h2>Available Seats</h2></div></li>
				</ul>
				</div><?php
			while($data=mysqli_fetch_assoc($run))
			{
				$count++;
				?>
				
				<a href ="searchride0.php?bc=<?php echo $data['random']; ?>" style="display: block;width: 70%;height: 20px;background: white; margin: 50 auto;padding-bottom: 50;border: 2px solid black;">
				<ul style="margin:0 0 0 0;">
					<li style="display: inline-block;"><div><h3><?php echo $count; ?></h3></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;
					<li style="display: inline-block;"><div><h3><?php echo $data['origin']; ?></h3></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<li style="display: inline-block;"><div><h3><?php echo $data['destination']; ?></h3></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<li style="display: inline-block;"><div><h3><?php echo $data['time'];?></h3></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<li style="display: inline-block;"><div><h3><?php echo $data['availseats'];?></h3></div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				</ul>
			
				</a>
				
				<!--<table align="center" width="80%" border="1" style ="margin-top:10px;">
				<tr>
					<th>No</th>
					<th>Origin</th>
					<th>Destination</th>
					<th>Time</th>
					<th>Available Seats</th>
					<th>Per Passenger Contribution</th>
					<th>Book Your Seats</th>
				</tr>
				
				<tr>
						
						<td><?php// echo $count;?> </td>
						<td><?php //echo $data['origin'];?></td>
						<td><?php // echo $data['destination'];?></td>
						<td><?php //echo $data['time'];?></td>
						<td><?php //echo $data['availseats'];?></td>
						<td><?php //echo $data['passcontri'];?></td>
						<td><a href ='searchride1.php?id=<?php// echo $id; ?>'>Book Seats</a></td>
				</tr>
				</table>-->
				<?php
			}
		}
		}
	}
		
?>