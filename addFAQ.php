<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$addTitle = mysql_real_escape_string($_POST['title']);
		$addContent = mysql_real_escape_string($_POST['content']);
				
		$sql = "INSERT INTO `faq`(`title`, `answer`) VALUES ('$addTitle', '$addContent')";

		$result = mysql_query($sql);

		$_SESSION["faqAdded"] = 1;
		
		header('Location: faq.php')
	?>

</body>

</html>
