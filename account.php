<?php 
	include('header.php');

	$sql = "SELECT * FROM users WHERE Name = '".$_SESSION['username']."'";
  $result = mysql_query($sql);
?>

<!DOCTYPE html>
<html class="no-js" lang="en" >

<head>

</head>

<body>
	 <?php
    if ($_SESSION["username"]):
    ?>
	

	<section id="body-content">
        <section id="body-desktop" class="show-for-large-up">
            <section id="home-content">
            <?php  while ($row = mysql_fetch_assoc($result)): ?>
              <div class="news-top">
                	<div class="profile-header">  
                		    <img src="<?php echo "{$row['image']}" ?>" alt="news">
                	</div>
                  
                  <div class="news-carousel">
                        <!--
                        <span class="profile-name"><?php echo "{$row['full_name']}" ?></span>
                        <span class="profile-cn"><?php echo "{$row['contact_number']}" ?></span>
                        <span class="profile-fb"><?php echo "{$row['fb_url']}" ?></span>
                        -->
                        
                        <?php include('database.php');
                            $sql = "SELECT * FROM users,user_links WHERE users.ID = user_links.ID AND Name = '".$_SESSION['username']."' AND Password ='".$_SESSION['password']."'";
                            $result  = mysql_query($sql);
                            while ($row = mysql_fetch_assoc($result)): //loop until nothing is left
                            echo "<img width = '200' src ='http://i2.hdslb.com/u_user/b0573d06e1f89d5a474a46fefe89f5af.jpg'><br>";
                            echo $row['Name']."<br>#".$row['ID'];
                            echo "<br>Joined: ".$row['date_joined']."<br>";
                            echo "<a href='{$row['facebook']}'>Facebook</a> ";
                            echo "<a href='{$row['twitter']}'>Twitter</a> ";
                            echo "<a href='{$row['mfc']}'>MFC</a><br>";
                            echo "Contact #:".$row['contact_number']."<br>";
                            endwhile;

                            ?>


                            <a href = "profile/myFigures.php">My Figures</a>
                            <a href = "logout.php">Log out</a><br>

                            <a href="profile/addSocMed.php">Edit Social Media Account</a><br>
                            <a href="profile/addPersonal.php">Edit Contact Number</a>
                            <hr>
                  </div>

              </div>
              <hr><hr>
            <?php endwhile; ?>
            </section>
        </section>
    </section>

	
	<?php 
        
        else :
            header('Location: index.php');
        endif;
    ?>

  <script src="assets/js/foundation.js"></script>
  <script src="assets/js/foundation.orbit.js"></script>


  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/foundation.min.js"></script>
  <script type="text/javascript"> 
    $(document).foundation();
  </script>


</body>
</html>
