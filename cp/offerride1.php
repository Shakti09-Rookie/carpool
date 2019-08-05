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
	$con=mysqli_connect('localhost','root','','carpool');
	if(isset($_POST['continue']))
	{
		$time = $_POST['time'];
		$passcomfort = $_POST['r2'];
		$passnumber = $_POST['passengers'];
		$passcontri = $_POST['number'];
		$addsomething = $_POST['any'];
		$random3 = $_POST['random3'];
		if($id == $_SESSION['uid'])
		{
		$query =" UPDATE `offerride` SET `time`='$time',`passcomfort`='$passcomfort',`availseats`='$passnumber',`passcontri`='$passcontri',`addsomething`='$addsomething' WHERE `id` ='$id' AND `random` ='$random3' ";
		$run = mysqli_query($con,$query);
		if($run == true)
		{
			$query1=" SELECT * FROM `registration1` WHERE `id` = $id";
			$run1= mysqli_query($con,$query1);
			$data1=mysqli_fetch_assoc($run1);
			require '../PHPMailerAutoload.php';
			require '../credential.php';

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
			$mail->addAddress($data1['Email']);     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo(EMAIL);
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Ride Confirmation for carpool';
			$random = rand(000000,999999);
			$mail->Body    = 'This is the six digit otp for ride confirmation '.$random.'';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send())
			{
				?>
				<script>
					alert('Message not send,Please try again !!');
					window.open('offerride1.php'_self');
				</script>
				<?php
			} 
			else
			{
			header('location:offerride2.php?uid='.$random.'&rd3='.$random3);
			}
		}
		else
		{
			?>
			<script>
				alert('something goes wrong please insert again !!');
				window.open('offerride1.php','_self');
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
	<title>offer ride</title>
</head>
<body style="background-image: url('../back2.jpg');">
	<div style="width: 70%;height: 480px;background:white; margin: 85 auto;padding-bottom: 15;border: 2px solid white;">
	<div style="float: left;width: 50%;height:550px;">
			<img src= "../images/car7.jpg" width=480px height=496x>
	</div>
	<form action="offerride1.php" method="post">
		<div style="color: blue;margin-bottom:4%"><h1><i>&emsp;&emsp;&emsp;Enter Ride Details</i></h1></div>
	<div style="margin-bottom:3%">
	<div style="display: inline-block;"><h4 style="margin:0;margin-bottom:0.6%">
		&nbsp;&nbsp;What time will you pick passengers up ?
	</h4></div>
	<div style="display: inline-block;">&emsp;&emsp;<input type="time" name="time" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:80px;text-align: justify;" required ></div></div>
	<div><h4 style="margin:0;margin-bottom:0.6%">
		&nbsp;&nbsp;Want your passengers to be comfotable? keep the middle seat empty:
	</h4></div>
	<div style="margin-bottom:1.6%">
		&emsp;&emsp;&emsp;&emsp;<input type="radio" name="r2" value="2" checked>YES&emsp;&emsp;<input type="radio" name="r2" value="3">No I'll squeeze in 3
	</div>
	<div style="margin-bottom:3%">
	<div style="display: inline-block;"><h4 style="margin:0;margin-bottom:0.6%">
		&nbsp;&nbsp;So how many passengers can you take ?
	</h4></div>
	<div style="display: inline-block;">&emsp;&emsp;
		<select name="passengers" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:80px;text-align: justify;" required >
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</div>
	</div>
	<div style="margin-bottom:2%">
	<div style="display: inline-block;"><h4 style="margin:0;margin-bottom:0.6%">
		&nbsp;&nbsp;Add Passenger Contribution
	</h4></div>
	<div style="display: inline-block;">
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="number" name="number" style="border: 2px solid #456879;border-radius: 10px;height:22px;width:82px;text-align: justify;" required />
	</div>
	</div>
	<div><h4 style="margin:0;margin-bottom:2%">
		&nbsp;&nbsp;Anything to add about your side 
	</h4></div>
	<div>
		&nbsp;&nbsp;<textarea name="any" placeholder="you want to tell something to co-travellers" style="border: 2px solid #456879;border-radius: 5px;height:100px;width:430px;text-align: justify;" required ></textarea>
	</div>
		<input type="hidden" name="random3" value="<?php echo $_GET['rd2']; ?>">
	<div>&nbsp;&nbsp;<input type="submit" name="continue" value="continue" style="background-color: blue;color: white;font-size: 19;border: 2px solid #456879;border-radius: 10px;height:28px;width:430px;margin-bottom:1%"></div>
	</form>
	</div>
</body>
</html>
