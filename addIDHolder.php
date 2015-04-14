<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$holder	= $_POST['addHolder'];


		$sql = "UPDATE users SET idHolder=1 WHERE ID=$holder";
		$result  = mysql_query($sql);
		
		$_SESSION["idHolderAdded"] = 1;

		header('Location: list.php')
	?>

</body>

</html>
