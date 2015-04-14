<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>
	<?php 
		
	include 'database.php';	

	$sql = "SELECT * FROM users WHERE active = 1 AND Name = '".$_POST['username']."' AND Password ='".md5($_POST['password'])."'";
	$result = mysql_query($sql);

	$sql_tmp = "SELECT * FROM users WHERE active = 1 AND Name = '".$_POST['username']."' AND tmp_pword ='".md5($_POST['password'])."'";
	$result_tmp = mysql_query($sql_tmp);

		while ($row = mysql_fetch_assoc($result)){ 
			$isAdmin =  $row['admin'];
		}

	if( (mysql_num_rows($result) > 0) || (mysql_num_rows($result_tmp) > 0) ){
			session_start();
			$_SESSION["username"] = $_POST['username'];
			$_SESSION["password"] = $_POST['password'];

			$_SESSION["admin"] = $isAdmin;
			$_SESSION["newsAdded"] = 0;
			$_SESSION["eventAdded"] = 0;
			$_SESSION["newsHLAdded"] = 0;
			$_SESSION["addNewsImg"] = 0;
			$_SESSION["newsContentRemoved"] = 0;
			$_SESSION["newsHLRemoved"] = 0;
			$_SESSION["eventRemoved"] = 0;
			$_SESSION["eventsError"] = 0;
			$_SESSION["bannerError"] = 0;
			$_SESSION["itemAdded"] = 0;
			$_SESSION["itemRemoved"] = 0;
			$_SESSION["userAdded"] = 0;
			$_SESSION["userRemoved"] = 0;
			$_SESSION["userActive"] = 0;
			$_SESSION["figureAdded"] = 0;
			$_SESSION["figureRemoved"] = 0;
			$_SESSION["idHolderAdded"] = 0;
			$_SESSION["idHolderRemoved"] = 0;

			header('Location: home.php');
	}
	else {
		header('Location: retry.php');
	}

	?>
</body>

</html>
