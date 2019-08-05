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
		$random1= rand(0,9999);
		$brand = $_POST['brand'];
		$Carmodel = $_POST['carmodel'];
		$Seats = $_POST['seats'];
		$color = $_POST['color'];
		$carno = $_POST['carno'];
		$drlicence = $_POST['drlicence'];
		$aadharno = $_POST['aadharno'];
		if($_SESSION['uid']== $id)
		{
		
		$query = "INSERT INTO `offerride`(`id`, `random`, `brand`, `carmodel`, `noofseats`, `carcolor`, `carno`, `dlno`, `adno`) VALUES ('$id','$random1','$brand','$Carmodel','$Seats','$color','$carno','$drlicence','$aadharno')";
		$run = mysqli_query($con,$query);
		if($run==true)
		{	
			header('location:offerride.php?rd1='.$random1);
		}
		else
		{
			
?>
			<script>
				alert('something goes wrong please insert again !!');
				window.open('offerride0.php','_self');
			</script>
<?php
		
		}
		}
		else
		{
			echo"error";
		}
		
	}	
	
?>
<html>
	<head>
		<title>
			offer ride
		</title>
	</head>
	<body style="background-image: url('../back2.jpg');">
		<div style="width: 70%;height: 520px;background:white; margin: 50 auto;padding-bottom: 50;border: 2px solid white;">
		<div style="float: left;width: 50%;height:550px;">
			<img src= "../images/car8.jpg" width=580px height=569px>
		</div>
		<!--<div style="float: right:width: 40%;height: 500px;background-color: ;">-->
			<form action="offerride0.php" method="post">
				<div style="color: blue"><h1><i>&emsp;&emsp;&emsp;&emsp;Enter Your Car Details</i></h1></div>
				<div><h4 style="margin:0;margin-bottom:0.6%">
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Which Brand car is yours ?
				</h4></div>
				<div>
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" name="brand" placeholder="&nbsp;Brand" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:1.3%" required>
				</div>
		<div><h4 style="margin:0;margin-bottom:0.6%">
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Car Model
		</h4></div>
		<div>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" name="carmodel" placeholder="&nbsp;Car model" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:1.3%"  required>
		</div>
		<div><h4 style="margin:0;margin-bottom:0.6%">
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;No of Seats 
		</h4></div>
		<div>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<select name="seats"  style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:1.3%" required >
				&nbsp;<option value="1">1</option>
				&nbsp;<option value="2">2</option>
				&nbsp;<option value="3">3</option>
				&nbsp;<option value="4">4</option>
				&nbsp;<option value="5">5</option>
				&nbsp;<option value="6">6</option>
				&nbsp;<option value="7">7</option>
			</select>
		</div>
		<div><h4 style="margin:0;margin-bottom:0.6%">
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Enter the color of your car
		</h4></div>
		<div>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" name="color" placeholder="&nbsp;Color" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:1.3%"  required>
		</div>
		<!--<div><input type="color" name="color"></div>-->
		<div><h4 style="margin:0;margin-bottom:0.6%">
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Car no
		</h4></div>
		<div>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" name="carno" placeholder="&nbsp;Car Plate No" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:1.3%"  required>
		</div>
		<div><h4 style="margin:0;margin-bottom:0.6%">
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Car Driving license no
		</h4></div>
		<div>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="text" name="drlicence" placeholder=" Driving license no" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:1.3%"  required>
		</div>
		<div><h4 style="margin: 0;margin-bottom:0.6%">
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Aadhar no
		</h4></div>
		<div>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="number" name="aadharno" placeholder="&nbsp;Aadhar no" pattern="[0-9]{16,16}" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;margin-bottom:1.3%;width: 220px;"  required>
		</div><br>
		<div>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" name="continue" value="continue" style="background-color: blue;color: white;font-size: 19;border: 2px solid #456879;border-radius: 10px;height:24px;width:220px;margin-bottom:1%">
		</div>
		</form>
		</div>
		</div>
	</body>
</html>