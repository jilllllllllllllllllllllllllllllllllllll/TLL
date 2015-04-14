<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$rmUser = $_POST['removeUser'];
		$admin = $_POST['delBy'];

		$sql_upd = "UPDATE users SET active=0 WHERE id=$rmUser";
		$result_upd = mysql_query($sql_upd);

		$sql_add = "INSERT INTO news ('delBy') VALUES ($admin)";
		$result_add = mysql_query($sql_add);

		$_SESSION["userRemoved"] = 1;
		
		header('Location: account.php')
	?>

</body>

</html>
