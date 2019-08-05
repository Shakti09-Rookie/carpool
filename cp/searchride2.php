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
		<title>
			Book seats
		</title>
	</head>
	<body style="background-image: url('../back2.jpg');">
		<div style="width: 70%;height: 520px;background:white; margin: 50 auto;padding-bottom: 50;border: 2px solid white;">
		<div style="float: left;width: 50%;height:550px;">
			<img src= "../images/car8.jpg" width=520px height=569px>
		</div>
	<form action="searchride2.php" method="post">
				<div style="margin-left:5%;margin-top:20%;"><h3 style="margin: 0">&emsp;&emsp;&emsp;How many numbers of seats you want to book ?<h3></div></li>
				<div style="margin-left:5%;margin-top:2%;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<select name="seats" required style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 2px;width: 100px;" >
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select></div></li><br>
			<div><input type="hidden" name="random" value="<?php echo $_GET['an']; ?> ">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="continue" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;continue" required style="display: inline-block;background-color: blue;color: white;border: 2px solid #456879;border-radius: 10px;height:22px;width:170px;text-align: justify;" >
			
			<input type="button" value="back" onclick="window.location.href='searchride.php' " style="display: inline-block;border: 2px solid #456879;border-radius: 10px;background-color: blue;color: white;height:22px;width:170px;margin-left: 0.5%;"/></div>
			</form>
	</body>
	</html>
	<?php
		if(isset($_POST['continue']))
	{
		$nseats = $_POST['seats'];
		$ano = $_POST['random'];
		include('../dbcon.php');
		$qrey = " SELECT * FROM `bookride` WHERE `idd` = '$idd' ";
		$run =mysqli_query($con,$qrey);
		$data1 = mysqli_fetch_assoc($run);
		$sid = $data1['anotid'];
		$query1 = "SELECT * FROM `offerride` WHERE `random` = '$ano' ";
		$run2 = mysqli_query($con,$query1);
		$data2 = mysqli_fetch_assoc($run2);
		$aseats = $data2['availseats'];
		if($nseats <= $aseats)
		{
			$query = " UPDATE `bookride` SET `nseats`= '$nseats' WHERE `idd` = '$idd' AND `anotid` = '$ano' ";
			$run1 = mysqli_query($con,$query);
			$query2 = " SELECT * FROM `bookride` WHERE `idd` = '$idd' ";
			$run3 = mysqli_query($con,$query2);
			$data3=mysqli_fetch_assoc($run3);
			$st = $data2['availseats']-$data3['nseats'];
			$query3= " UPDATE `offerride` SET `availseats`='$st'  WHERE `random` = '$ano' ";
			$run4=mysqli_query($con,$query3);
			if($run4 == true)
			{
				if($run1 == true)
				{
					header('location:total.php?az='.$ano);
				}
				else
				{
				echo"please enter error";
				}
			}
			else
			{
			echo "error1";
			}
		}
	}
?>

		
		