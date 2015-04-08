<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>
	<?php

		$dblink= mysql_connect("localhost","root","") or die ('can\'t connect to mysql');
		mysql_select_db("the_lending_list", $dblink) or die ('can\'t connect to db');

		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL";
		} else {
			
		}
	?>

</body>

</html>
