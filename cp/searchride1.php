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
<?php
		
	include('../dbcon.php');
	if(isset($_POST['continue']))
	{
		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$sex = $_POST['r1'];
		$aadno = $_POST['adn'];
		$mobno = $_POST['mno'];
		$email = $_POST['email'];
		$anotid = $_POST['randoman'];
		
		$query = " INSERT INTO `bookride`(`idd`, `anotid`, `firstname`, `lastname`, `sex`, `addharno`, `mobileno`, `email`) VALUES ('$idd','$anotid','$fname','$lname','$sex','$aadno','$mobno','$email') ";
		$ran = mysqli_query($con,$query);
		if($ran == true)
		{
			header('location:searchride2.php?an='.$anotid);
		}
		else
		{
			?>
			<script>
				alert('Please enter the details again something went wrong !!');
				window.open('searchride1.php','_self');
			</script>
			<?php
		}
	}
?>
<?php
	
	include('../dbcon.php');
	$query = " SELECT * FROM `registration1` WHERE `id` = '$idd' ";
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
		<title>
			book ride
		</title>
	</head>
	<body style="background-image: url('../cp7.jpg');background-repeat: no-repeat;background-attachment: fixed;background-position: top center;background-size:cover;">
	<!--<div style="width: 70%;height: 500px;background: white; margin: 50 auto;padding-bottom: 50;border: 2px solid white;">-->
		<form action="searchride1.php" method="post"><br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<div><h3 style="margin-left: 80px">Name</h3></div> 
				<ul>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li  style="display: inline-block;"><div><input type="text" name="fname" value=<?php echo $data['First Name']; ?> pattern="[A-Za-z]{1,10}" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 2px;width: 100px;" required /></div></li>&nbsp;&nbsp;
				<li  style="display: inline-block;"><div><input type="text" name="lname" value=<?php echo $data['Last Name']; ?>  style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 2px;width: 100px;" required pattern="[A-Za-z]{1,20}" /></div></li>
				</ul>
		<div><h3 style="margin-left: 80px">Gender</h3></div>
		<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="r1" value="male" checked  >Male<input type="radio" name="r1" value="female" >Female</div>
		<div><h3 style="margin-left: 80px">Aadhar No</h3></div>
		<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="adn" placeholder="Aadhar No" required pattern="[0-9]{16,16}" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 2px;width: 200px;"></div>
		<div><h3 style="margin-left: 80px">Mobile No</h3></div>
		<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="mno" value=<?php echo $data['Phone Number']; ?> required pattern="[6-9]{1,1}[0-9]{9,9}" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 2px;width: 200px;"></div>
		<div><h3 style="margin-left: 80px">Email</h3></div>
		<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" value=<?php echo $data['Email']; ?> required style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 2px;width: 230px;"></div>
		<?php
	}
	?>
		<br><input type="hidden" name="randoman" value="<?php echo $_GET['as'];?> ">
			<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="continue" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;continue" required style="background-color: blue;color: white;border: 2px solid #456879;border-radius: 10px;height:22px;width:270px;text-align: justify;" ></td>
		
			
		
	</body>
</html>
