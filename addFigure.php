<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$manufacturer 	= $_POST['manufacturer'];
		$scale 			= $_POST['scale'];
		$figure_name 	= $_POST['figure_name'];
		$days 			= $_POST['days'];
		$username		= $_SESSION["username"];

		$sql = "INSERT INTO `the_lending_list`.`lending_list` (`manufacturer`, `scale`, `figure_name`, `Name`, `days`) VALUES ('$manufacturer', '$scale', '$figure_name', '$username', '$days')";
		$result  = mysql_query($sql);
				
		$_SESSION["figureAdded"] = 1;

		header('Location: list.php')
	?>

</body>

</html>
