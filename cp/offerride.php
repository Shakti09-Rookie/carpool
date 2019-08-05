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
		
		$Address = $_POST['address'];
		$Addres = $_POST['addres'];
		$stopover1 = $_POST['stopover1'];
		$stopover2 = $_POST['stopover2'];
		$stopover3 = $_POST['stopover3'];
		$date = $_POST['date'];
		$random2 = $_POST['random2'];
		if($_SESSION['uid'] == $id)
		{
		if($Address == $Addres)
		{
			?>
			<script>
				alert('Origin And Destination are not Same !!');
				window.open('offerride.php','_self');
			</script>
			<?php
		}
		else
		{
			$con=mysqli_connect('localhost','root','','carpool');
			$query =" UPDATE `offerride` SET `origin`='$Address',`destination`='$Addres',`stopover1`='$stopover1',`stopover2`='$stopover2',`stopover3`='$stopover3',`date`='$date' WHERE `id` = '$id' AND `random` ='$random2'";
			$run = mysqli_query($con,$query);
			if($run == true)
			{
				header('location:offerride1.php?rd2='.$random2);
			}
			else
			{
?>
			<script>
				alert('something goes wrong please insert again !!');
				window.open('offerride.php','_self');
			</script>
<?php
			}
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
	<div style="width: 70%;height: 520px;background:white; margin: 50 auto;padding-bottom: 50;border: 2px solid white;">
		<div style="float: left;width: 50%;height:550px;">
			<img src= "../images/car11.jpg" width=580px height=569px>
		</div>
	<form action="offerride.php" method="post">
	<div style="color: blue"><h1><i>&emsp;&emsp;&emsp;&emsp;&emsp;Enter Ride Details</i></h1></div>
	<div><h4 style="margin:0;margin-bottom:0.6%">
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Where are you leaving from ?
	</h4></div>
	<div>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<select name="address" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:" required>    
         <option value="Dehradun">Dehradun</option>  
      <option value="Muzaffarnagar">Muzaffarnagar</option>   
      <option value="Haridwar">Haridwar</option>    
      <option value="Roorkee">Roorkee</option>    
      <option value="Rishikesh">Rishikesh</option>    
      <option value="Meerut">Meerut</option>    
      <option value="Ghaziabad">Ghaziabad</option>    
       <option value="Mussoire">Mussoire</option>          
      <option value="New Delhi">New Delhi</option>  
      <option value="Mumbai">Mumbai</option>   
      <option value="Kolkata">Kolkata</option>    
      <option value="Chennai">Chennai</option>    
      <option value="Indore">Indore</option>    
      <option value="Hyderabad">Hyderabad</option>    
      <option value="Ahemdabad">Ahemdabad</option>    
       <option value="Pune">Pune</option>    
      <option value="Bhopal">Bhopal</option>    
      <option value="Jaipur">Jaipur</option>    
      <option value="Bengluru">Bengluru</option>      
    </select></div><br><br>
	<div><h4 style="margin:0;margin-bottom:0.6%">
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Where are you heading ?
	</h4></div>
	<div>
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<select name="addres" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:2%" required>
        <option value="Dehradun">Dehradun</option>  
      <option value="Muzaffarnagar">Muzaffarnagar</option>   
      <option value="Haridwar">Haridwar</option>    
      <option value="Roorkee">Roorkee</option>    
      <option value="Rishikesh">Rishikesh</option>    
      <option value="Meerut">Meerut</option>    
      <option value="Ghaziabad">Ghaziabad</option>    
       <option value="Mussoire">Mussoire</option>  
      <option value="New Delhi">New Delhi</option>  
      <option value="Mumbai">Mumbai</option>   
      <option value="Kolkata">Kolkata</option>    
      <option value="Chennai">Chennai</option>    
      <option value="Indore">Indore</option>    
      <option value="Hyderabad">Hyderabad</option>    
      <option value="Ahemdabad">Ahemdabad</option>    
       <option value="Pune">Pune</option>    
      <option value="Bhopal">Bhopal</option>    
      <option value="Jaipur">Jaipur</option>    
      <option value="Bengluru">Bengluru</option>      
    </select></div>
	<div><h4 style="margin:0;margin-bottom:0.6%">
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Want more passemgers? Add a few Stopovers?
	</h4></div>
	<div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<textarea name="stopover1" placeholder="city name 1" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:2%" ></textarea></div>
	<div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<textarea name="stopover2" placeholder="city name 2" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:2%" ></textarea></div>
	<div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<textarea name="stopover3" placeholder="city name 3" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:2%" ></textarea></div>
	
	<div><h4 style="margin:0;margin-bottom:0.6%">
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When are you going ?
	</h4></div>
	<div>
	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="date" name="date" style="outline: none;outline-style: none;border-top: none;border-left: none;border-right: none;border-bottom: solid black 3px;width: 220px;margin-bottom:2%" required />
	</div>
	<input type="hidden" name="random2" value="<?php echo $_GET['rd1']; ?>">
	<div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" name="continue" value="continue" style="background-color: blue;color: white;font-size: 19;border: 2px solid #456879;border-radius: 10px;height:24px;width:320px;margin-bottom:1%"></div>
	</form>
</body>
</html>