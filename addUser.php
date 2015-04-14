<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include 'database.php';

		$user 	= mysql_real_escape_string($_POST['uname']);
		$tmpPwd		= md5($_POST['tmp-pword']);
		$admin 		= $_POST['postedBy'];

		$sql = "INSERT INTO `users` (`Name`, `tmp_pword`,  `createdby`) VALUES ('$user', '$tmpPwd', '$admin')";
		$result  = mysql_query($sql);

		$_SESSION["userAdded"] = 1;

		header('Location: account.php');
	?>

</body>

</html>
