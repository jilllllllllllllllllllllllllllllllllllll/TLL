<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$rmNews = $_POST['removeNewsHL'];

		$sql_upd = "DELETE FROM news_hl WHERE id=$rmNews";
		$result_upd = mysql_query($sql_upd);

		$_SESSION["newsHLRemoved"] = 1;
		
		header('Location: activity.php')
	?>

</body>

</html>
