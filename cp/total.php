<?php
	session_start();
	
		if(isset($_SESSION['uid']))
		{
			echo "";
			$id = $_SESSION['uid'];
		}
		else
		{
			 header('location:  ../index.php');
		}
?>
<?php
	include('../dbcon.php');
	$ano = $_GET['az'];
	$query1 = "SELECT * FROM `offerride` WHERE `random` = '$ano' ";
	$run2 = mysqli_query($con,$query1);
	$data2 = mysqli_fetch_assoc($run2);
	$query2 = " SELECT * FROM `bookride` WHERE `idd` = '$id' ";
	$run3 = mysqli_query($con,$query2);
	$data3=mysqli_fetch_assoc($run3);
?>
					<html>
					<head>
					<title> payment information</title>
					</head>
					<body>
					<table align="center" width="80%" border="1" style ="margin-top:10px;">
					<tr>
					<th>origin</th>
					<th>destination</th>
					<th>No of seats</th>
					<th>per seat charge</th>
					<th>Total</th>
					</tr>
					<tr>
					<td><?php echo $data2['origin']; ?></td>
					<td><?php echo $data2['destination'];?></td>
					<td><?php echo $data3['nseats'];?></td>
						<?php $total = $data2['passcontri'] * $data3['nseats'];?>
					<td><?php echo $data2['passcontri'];?></td>
					<td><?php echo $total ;?></td></tr>
					<tr>
					<td><a href=payment.php>Proceed to payment</a></td></tr></table>
					
					</body></html>