<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$rmFig = $_POST['removeFigure'];

		$sql_upd = "DELETE FROM lending_list WHERE id=$rmFig";
		$result_upd = mysql_query($sql_upd);

		$_SESSION["figureRemoved"] = 1;
		
		header('Location: list.php')
	?>

</body>

</html>
