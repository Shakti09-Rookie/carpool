<?php
	include('dbcon.php');
?>
<?php
	include('dbcon.php');
	if(isset($_POST['submit']))
	{
		$FirstName=$_POST['First_Name'];
		$LastName = $_POST['Last_Name'];
		$Sex = $_POST['r1'];
		$DateofBirth = $_POST['Date_of_Birth'];
		$Email = $_POST['Email'];
		$PhoneNumber = $_POST['Phone_Number'];
		$Address = $_POST['Address'];
		$Password = $_POST['Password'];
		$query1 = " SELECT * FROM `registration1` WHERE `Email` = '$Email' ";
		$run1 = mysqli_query($con,$query1);
		$row1 = mysqli_num_rows($run1);
		$query2 = " SELECT * FROM `registration1` WHERE `Phone Number` = '$PhoneNumber' ";
		$run2 = mysqli_query($con,$query2);
		$row2 = mysqli_num_rows($run2);
		if($row1 > 0 || $row2 > 0)
		{
			?>
								<script>
									alert('EMAIL Or Phone Number is Already registered!!');
									window.open('signin.php','_self');
								</script>
			<?php
		}
		
		else
		{
			require 'PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;

			$mail->SMTPDebug = 0;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'car pool');
			$mail->addAddress($_POST['Email']);     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo(EMAIL);
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Email verification for carpool';
			$random = rand(000000,999999);
			$mail->Body    = 'This is the six digit otp for email verification '.$random.'';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send())
			{
				?>
				<script>
					alert('Message not send,Please try again !!');
					window.open('signin.php','_self');
				</script>
				<?php
			} 
			else
			{
			$con=mysqli_connect('localhost','root','','carpool');
			$query = " INSERT INTO `registration`(`First Name`, `Last Name`, `Sex`, `Date of Birth`, `Email`, `Phone Number`, `Address`, `Password`, `otp1`) VALUES ('$FirstName','$LastName','$Sex','$DateofBirth','$Email','$PhoneNumber','$Address','$Password','$random') ";
			$run= mysqli_query($con,$query);
			if($run	== true)
			{
				session_start();
				$_SESSION['otp'] = $random;
				header('location:insert.php');
			}
			else
			{
				echo"error";
			}
			}
		}
	}
?>
<html>
<head>
	<title>Create Account</title>
</head>
<body style="margin:0px;padding:0px;background-color: black;width: 100%;height :100vh;">
	<div style="width: 70%;height: 500px;background: white; margin: 50 auto;padding-bottom: 50;border: 2px solid white;">
		<div style="float: left;width: 50%;height:500px;background-image: url(cp1.jpg);background-size: cover;box-sizing:border-box;"></div>
	<div style="float: right:width: 50%;height: 500px;background-color: ;">
	<h1 style="color: blue;"><center>Welcome to Registration</center></h1>
	<form action="signin.php" method="post" style="margin: 30 auto;">
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</div> 
				<ul>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li  style="display: inline-block;"><div><input type="text" name="First_Name" placeholder="&nbsp;&nbsp;&nbsp;First Name" pattern="[A-Za-z]{1,10}" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:150px;text-align: justify;" required /></div></li>&nbsp;&nbsp;
				<li  style="display: inline-block;"><div><input type="text" name="Last_Name" placeholder="&nbsp;&nbsp;&nbsp;Last Name" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:160px;text-align: justify;" required pattern="[A-Za-z]{1,20}" /></div></li>
				</ul>
				<ul>
				<li  style="display: inline-block;"><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender</div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li  style="display: inline-block;"><div><input type="radio" name="r1" value="male" checked />Male<input type="radio" name="r1" value="female"/>Female</div></li>
				</ul>
				<ul>
				<li  style="display: inline-block;"><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth</div></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li  style="display: inline-block;"><div><input type="date" name="Date_of_Birth" placeholder="&nbsp;&nbsp;Date" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:180px;text-align: justify;" required /></div></li>
				</ul>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="Email" placeholder="&nbsp;&nbsp;Email" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:320px;text-align: justify;" required /></div>&nbsp;
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone Number</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Phone_Number" placeholder="&nbsp;&nbsp;Phone Number" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:320px;text-align: justify;" required pattern="[6-9]{1,1}[0-9]{9,9}"/></div>&nbsp;
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="Address" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:320px;text-align: justify;" required ></textarea></div>&nbsp;
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Password" name="Password" placeholder="&nbsp;&nbsp;Password" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:320px;text-align: justify;" required /></div>&nbsp;
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit"  style="border: 2px solid #456879;border-radius: 10px;height:22px;width:320px;text-align: justify;" ></div>
				</form></div>
	</div>
	<!--<h1><i><center></center></i></h1>
			<form action="signin.php" method="post">
				<table>
					<tr>
						<td>First Name</td>
						<td><input type="text" name="First_Name" placeholder="First Name" pattern="[A-Za-z]{1,10}" required /></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type="text" name="Last_Name" placeholder="Last Name" required pattern="[A-Za-z]{1,20}" /></td>
					</tr>
					<tr>
						<td>Sex</td>
						<td><input type="radio" name="r1" value="male" checked />Male<input type="radio" name="r1" value="female"/>Female</td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input type="date" name="Date_of_Birth" placeholder="Date" required /></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="Email" placeholder="Email" required /></td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td><input type="text" name="Phone_Number" placeholder="Phone Number" required pattern="[6-9]{1,1}[0-9]{9,9}"/></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><textarea name="Address" required ></textarea></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="Password" name="Password" placeholder="Password" required /></td>
					</tr>
					<tr>
					<td></td>
					<td><center><input type="submit" name="submit" value="Submit"/></center></td>
					</tr>
				</table>
				</form>
				</div>-->
			</body>
		</html>
