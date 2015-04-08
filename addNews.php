<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$addTitle = $_POST['Title'];
		$addContent = $_POST['Content'];
		
		$target_dir = 'assets/db/';
		$target_file = $target_dir . basename($_FILES['activity-img']['name']);
		$upload = move_uploaded_file($_FILES['activity-img']['tmp_name'], $target_file);
		$addImage = $target_file;

		$sql = "INSERT INTO `news`(Title, Content, ImageURL) VALUES ('$addTitle', '$addContent', '$addImage')";
		$result = mysql_query($sql);
		
		//insert restrictions

		$_SESSION["newsAdded"] = 1;
		header('Location: activity.php')
	?>

</body>

</html>
