<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$rmNews = $_POST['removeFAQ'];

		$sql_upd = "DELETE FROM faq WHERE id=$rmNews";
		$result_upd = mysql_query($sql_upd);

		$_SESSION["faqRemoved"] = 1;
		
		header('Location: faq.php')
	?>

</body>

</html>
