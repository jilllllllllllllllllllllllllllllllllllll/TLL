<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include 'database.php';
		$current 	= $_SESSION['username'];
		$rname		= mysql_real_escape_string($_POST['rname']);
		$password	= md5($_POST['pword']);
		$cn			= $_POST['cn'];
		$eadd		= $_POST['eadd'];
		$fb			= $_POST['fb'];

		$target_dir = 'assets/db/users/';
		$target_file = $target_dir . basename($_FILES['user-img']['name']);

		$upload = move_uploaded_file($_FILES['user-img']['tmp_name'], $target_file);
		$addImage = basename($_FILES['user-img']['name']);
			
		if($rname) {
			$sql = "UPDATE `users` SET full_name='$rname' WHERE Name='$current'";
			$result  = mysql_query($sql);
		}

		if($password) {
			$sql = "UPDATE `users` SET Password='$password' WHERE Name='$current'";
			$result  = mysql_query($sql);
		}
		if($cn) {
			$sql = "UPDATE `users` SET contact_number='$cn' WHERE Name='$current'";
			$result  = mysql_query($sql);
		}
		if($eadd) {
			$sql = "UPDATE `users` SET email='$eadd' WHERE Name='$current'";
			$result  = mysql_query($sql);
		}
		if($fb) {
			$sql = "UPDATE `users` SET fb_url='$fb' WHERE Name='$current'";
			$result  = mysql_query($sql);
		}
		if($addImage) {
			$sql = "UPDATE `users` SET user_img='$addImage' WHERE Name='$current'";
			$result  = mysql_query($sql);
		}


		$_SESSION["userActive"] = 1;

		header('Location: account.php');
	?>

</body>

</html>
