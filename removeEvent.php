<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$rmEvent = $_POST['removeEvent'];
		$admin = $_POST['delBy'];

		$sql_upd = "DELETE FROM events WHERE id=$rmEvent";
		$result_upd = mysql_query($sql_upd);

		$_SESSION["eventRemoved"] = 1;
		
		header('Location: events.php')
	?>

</body>

</html>
