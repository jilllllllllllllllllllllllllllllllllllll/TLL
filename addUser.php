<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include 'database.php';

		$tmpUser 	= mysql_real_escape_string($_POST['tmp-uname']);
		$tmpPwd		= md5($_POST['tmp-pword']);
		$admin 		= $_POST['postedBy'];

		$sql = "INSERT INTO `users` (`tmp_uname`, `tmp_pword`,  `createdby`) VALUES ('$tmpUser', '$tmpPwd', '$admin')";
		$result  = mysql_query($sql);

		$_SESSION["userAdded"] = 1;

		header('Location: account.php');
	?>

</body>

</html>
