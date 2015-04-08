<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>
	<?php 
		
	include 'database.php';	

	$sql = "SELECT * FROM users WHERE Name = '".$_POST['username']."' AND Password ='".$_POST['password']."'";
	$result = mysql_query($sql);
	echo $result;

		while ($row = mysql_fetch_assoc($result)){ 
			$isAdmin =  $row['admin'];
		}

	if(mysql_num_rows($result) > 0){
			session_start();
			$_SESSION["username"] = $username = $_POST['username'];
			$_SESSION["password"] = $password = $_POST['password'];
			$_SESSION["admin"] = $isAdmin;
			$_SESSION["newsAdded"] = 0;
			$_SESSION["eventAdded"] = 0;
			header('Location: home.php');
	}
	else {
		header('Location: retry.php');
	}

	?>
</body>

</html>
