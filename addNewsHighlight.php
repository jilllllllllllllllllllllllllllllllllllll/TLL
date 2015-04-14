<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include'database.php';

		$addTitle = $_POST['newsHL'];
		$admin = $_POST['postedBy'];
		$target_dir = 'assets/db/news_hl/';
		$target_file = $target_dir . basename($_FILES['activityHL-img']['name']);
		$ifExists = file_exists($target_file);
		echo $ifExists;

		if(($_FILES["activityHL-img"]['tmp_name'])) {
			list($width, $height) = getimagesize($_FILES["activityHL-img"]['tmp_name']);
			if(($width%800 > 0) || ($height%250 > 0)) {
				$_SESSION["bannerError"] = 1;
			} else {
				$upload = move_uploaded_file($_FILES['activityHL-img']['tmp_name'], $target_file);
				$addImage = basename($_FILES['activityHL-img']['name']);
				
				$sql = "INSERT INTO `news_hl`(title, img_url, createdBy) VALUES ('$addTitle', '$addImage', '$admin')";
				$result = mysql_query($sql);

				$_SESSION["newsHLAdded"] = 1;
			} 
		} else {
			$_SESSION["bannerError"] = 1;
		}
		
		header('Location: activity.php')
	?>

</body>

</html>
