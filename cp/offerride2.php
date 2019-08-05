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
	if(isset($_POST['continue']))
	{
		$uid1=$_POST['otp'];
		$otp1=$_POST['otp1'];
		$random4=$_POST['random4'];
		if($uid1==$otp1)
		{
			$query="UPDATE `offerride` SET `confirm`='1' WHERE `id` = '$id' AND `random` = '$random4'";
			$run= mysqli_query($con,$query);
			if($run==true)
			{
				$query1 = "SELECT * FROM `offerride` WHERE `id`='$id' AND `random`= '$random4'";
				$run1= mysqli_query($con,$query1);
				$data1= mysqli_fetch_assoc($run1);
				$id = $data1['id'];
				$origin= $data1['origin'];
				$destination= $data1['destination'];
				$date= $data1['date'];
				$time= $data1['time'];
				$offeredseats= $data1['availseats'];
				$perpasscontri= $data1['passcontri'];
				$stopover1= $data1['stopover1'];
				$stopover2= $data1['stopover2'];
				$stopover3= $data1['stopover3'];
				$query2 = "INSERT INTO `myofferride`(`id`, `origin`, `destination`, `date`, `time`, `offeredseats`, `perpasscontri`, `stopover1`, `stopover2`, `stopover3`) VALUES ('$id','$origin','$destination','$date','$time','$offeredseats','$perpasscontri','$stopover1','$stopover2','$stopover3')";
				$run2 = mysqli_query($con,$query2);
				if($run2==true)
				{
				header('location:homepage.php');
				}
			}
		}
		else
		{
			?>
			<script>
				alert('Please Enter the Correct OTP  !!');
				window.open('offerride2.php','_self');
			</script>
			<?php
		}
	}
?>
<html>
	<head>
		<title>
			confirm your ride
		</title>
		<body>
			<form action="offerride2.php" method="post">
			<div style="margin-top: 11%;margin-left:25%;margin-bottom:3%"><h1>Please enter the confirmation code you received :<h1></div>
			<div style="margin-left:24.7%;margin-bottom:3%;"><input type="text" name="otp" placeholder="&emsp;&emsp;Enter OTP Here" pattern="[0-9]{6,6}" style="border: 2px solid black;border-radius: 5px;height:40px;width:65%;margin-left: 0.5%;" required></div>
			<div style="margin-left:25.2%;"><input type="hidden" name="otp1" value="<?php echo $_GET['uid']; ?>"><input type="hidden" name="random4" value="<?php echo $_GET['rd3']; ?>"><input type="submit" name="continue" value="Verify" style="background-color: blue;color: white;font-size: 22;border: 2px solid #456879;border-radius: 10px;height:40px;width:65%;margin-bottom:1%"></div>
			</form>
		</body>
	</head>
</html>