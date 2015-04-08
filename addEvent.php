<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include 'database.php';

		$event_name = $_POST['EName'];
		$dateM		= $_POST['EMonth'];
		$dateD		= $_POST['EDate'];
		$dateY		= $_POST['EYear'];
		$location	= $_POST['ELoc'];
		$details	= $_POST['EDetails'];
		$page		= $_POST['EPage'];
		$date    	= $_POST['EMonth'] . " " . $_POST['EDate'] . ", " .  $_POST['EYear'];


		$sql = "INSERT INTO `the_lending_list`.`events` (`event_name`, `event_date`, `event_location`, `event_desc`, `event_link`) VALUES ('$event_name', '$date', '$location', '$details', '$page')";
		$result  = mysql_query($sql);

		$_SESSION['eventAdded'] = 1;
		header('Location: events.php');
	?>

</body>

</html>
