<?php session_start(); ?>

<!DOCTYPE html>
<html class="no-js" lang="en" >


<head>
</head>

<body>

	<?php 

		include 'database.php';

		$event_name = mysql_real_escape_string($_POST['eventName']);
		$location	= $_POST['eventLoc'];
		$url		= "http://" . $_POST['eventSource'];
		$admin 		= $_POST['postedBy'];
		$date    	= $_POST['month'] . " " . $_POST['date'];
		$day 		= $_POST['date'];

		switch($_POST['month']) {
			case "Jan":
				$month = 1;
			break;
			case "Feb":
				$month = 2;
			break;
			case "Mar":
				$month = 3;
			break;
			case "Apr":
				$month = 4;
			break;
			case "May":
				$month = 5;
			break;
			case "Jun":
				$month = 6;
			break;
			case "Jul":
				$month = 7;
			break;
			case "Aug":
				$month = 8;
			break;
			case "Sep":
				$month = 9;
			break;
			case "Oct":
				$month = 10;
			break;
			case "Nov":
				$month = 11;
			break;
			case "Dec":
				$month = 12;
			break;
		}



		$target_dir = 'assets/db/events/';
		$target_file = $target_dir . basename($_FILES['events-img']['name']);

		if(($_FILES["events-img"]['tmp_name'])) {
			
			list($width, $height) = getimagesize($_FILES["events-img"]['tmp_name']);
			if($width != $height) {
				$_SESSION["eventsError"] = 1;
			} else {
				$upload = move_uploaded_file($_FILES['events-img']['tmp_name'], $target_file);
				$addImage = basename($_FILES['events-img']['name']);

				$sql = "INSERT INTO `events` (`title`, `date`, `location`, `event_url`, `createdBy`, `img_src`, `month`, `day`) VALUES ('$event_name', '$date', '$location', '$url', '$admin', '$addImage', '$month', '$day')";
				$result  = mysql_query($sql);

				$_SESSION['eventAdded'] = 1;
			} 

		} else {
			$_SESSION["eventsError"] = 1;
		}

		
		header('Location: events.php');
	?>

</body>

</html>
