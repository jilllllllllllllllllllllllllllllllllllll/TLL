<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$rmNews = $_POST['removeNews'];
		$admin = $_POST['delBy'];

		$sql_upd = "UPDATE news SET active=0 WHERE id=$rmNews";
		$result_upd = mysql_query($sql_upd);

		$sql_add = "INSERT INTO news ('delBy') VALUES ($admin)";
		$result_add = mysql_query($sql_add);

		$_SESSION["newsRemoved"] = 1;
		
		header('Location: activity.php')
	?>

</body>

</html>
