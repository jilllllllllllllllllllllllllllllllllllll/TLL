<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$rm = $_POST['removeID'];
		echo $rm;
		$sql_upd = "UPDATE users SET idHolder=0 WHERE ID=$rm";
		$result_upd = mysql_query($sql_upd);

		$_SESSION["idHolderRemoved"] = 1;
		
		header('Location: list.php')
	?>

</body>

</html>
