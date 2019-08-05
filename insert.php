<?php
	session_start();
	
		if(isset($_SESSION['otp']))
		{
			echo "";
			$otp1 = $_SESSION['otp'];
		}
		else
		{
			 header('location:  ../signin.php');
		}
?>
<?php
	if(isset($_POST['continue']))
	{
		$otp2=$_POST['otp'];
		if($otp2 == $otp1)
		{
			$con=mysqli_connect('localhost','root','','carpool');
			$query =" SELECT * FROM `registration` WHERE `otp1` = '$otp1' ";
			$run= mysqli_query($con,$query);
			$data = mysqli_fetch_assoc($run);
			$id = $data['id'];
			$firstname = $data['First Name'];
			$lastname = $data['Last Name'];
			$sex = $data['Sex'];
			$dateofbirth = $data['Date of Birth'];
			$email = $data['Email'];
			$number = $data['Phone Number'];
			$address = $data['Address'];
			$password = $data['Password'];
			if($run==TRUE)
			{
				include('dbcon.php');
				$query1 = " INSERT INTO `registration1`(`id`, `First Name`, `Last Name`, `Sex`, `Date of Birth`, `Email`, `Phone Number`, `Address`, `Password`) VALUES ('$id','$firstname','$lastname','$sex','$dateofbirth','$email','$number','$address','$password') ";
				//$query1 = " INSERT INTO `registration1`(`id`, `First Name`, `Last Name`, `Sex`, `Date of Birth`, `Email`, `Phone Number`, `Address`, `Password`) VALUES ('$id','$firstname','$lastname','$sex','$dateofbirth','$email','$number','$address','$password') ";
				$run1 = mysqli_query($con,$query1);
				if($run == true)
				{
					?>
						<script>
							alert('Registration is succesfull!!');
							<?php session_destroy(); ?>
							window.open('index.php','_self');
							
						</script>
					<?php
				}
				else
				{
					echo "error";
				}
			}
		}
		else
		{
			?>
			<script>
				alert('please enter the valid otp  !!');
				window.open('insert.php','_self');
			</script>
			<?php
		}
	}
?>
<html>
	<head>
		<title>
			email verification
		</title>
</head>
<body>
			<form action="insert.php" method="post">
			<div style="margin-top: 11%;margin-left:25%;margin-bottom:3%"><h1>Please enter the confirmation code you received :<h1></div>
			<div style="margin-left:24.7%;margin-bottom:3%;"><input type="text" name="otp" placeholder="&emsp;&emsp;Enter OTP Here" pattern="[0-9]{6,6}" style="border: 2px solid black;border-radius: 5px;height:40px;width:65%;margin-left: 0.5%;" required></div>
			<div style="margin-left:25.2%;"><input type="submit" name="continue" value="Verify" style="background-color: blue;color: white;font-size: 22;border: 2px solid #456879;border-radius: 10px;height:40px;width:65%;margin-bottom:1%"></div>
			</form>
</body>
</html>

