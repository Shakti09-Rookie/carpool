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
