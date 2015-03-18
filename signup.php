<!DOCTYPE html>

<?php 
	
	$dblink= mysql_connect("localhost","root","") or die ('D:< can't connect to mysql');
			 mysql_select_db("the_lending_list", $dblink) or die ('D:< can\'t connect to db');

			if (mysqli_connect_errno()){
			    echo "Failed to connect to MySQL";
			} else {
			    echo "Connected.";
			}

		$uname_ = suname;
		$pwd_ = spword;
		$email_ = semail;
		$name_ = sname;
		$fb_ = sfb;
		$cnum_ = scnum;
			
	$sql = "INSERT INTO users (name, pword, uname, fb, email, cnumber) VALUES ($name_, $pwd_, $uname_, $fb_, $email_, $cnum)";
	$result  = mysql_query($sql);


?>