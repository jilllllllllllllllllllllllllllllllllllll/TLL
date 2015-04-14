<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$addTitle = mysql_real_escape_string($_POST['Title']);
		$addContent = mysql_real_escape_string($_POST['Content']);
		$admin = $_POST['postedBy'];
		$addTags = $_POST['Tags'];
		$target_dir = 'assets/db/news_thumb/';
		$target_file = $target_dir . basename($_FILES['activity-img']['name']);

				$upload = move_uploaded_file($_FILES['activity-img']['tmp_name'], $target_file);
				$addImage = basename($_FILES['activity-img']['name']);
				
				$sql = "INSERT INTO `news`(Title, Content, ImageURL, Creator, tags) VALUES ('$addTitle', '$addContent', '$addImage', '$admin', '$addTags')";
				$result = mysql_query($sql);

				$_SESSION["newsAdded"] = 1;
		
		header('Location: activity.php')
	?>

</body>

</html>
