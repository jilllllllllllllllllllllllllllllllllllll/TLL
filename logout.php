<?php
	session_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="en" >

<head>
</head>

<body>
	<?php
		session_unset(); 
		session_destroy();

		if (session_status() == PHP_SESSION_NONE) {
			header('Location: index.php');
		} else {
			echo "Session still ongoing.";
		} 
	?>
</body>

</html>
