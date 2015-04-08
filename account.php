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
            
              <div class="news-top">
                	<div class="news-header">
                		    <img src="<?php echo "{$row['image']}" ?>" alt="news">
                	</div>
                  
                  <div class="news-carousel">
                    <ul class="accordion" data-accordion>
                      <li class="accordion-navigation">
                        <a href="#panel1a">What are the requirements of joining?</a>
                        <div id="panel1a" class="content active">
                          A gentle spirit and a tiger.
                          <?php echo "{$row['image']}"; ?>
                      </li>
                      <li class="accordion-navigation">
                        <a href="#panel2a">How many figure can I lend at a time?</a>
                        <div id="panel2a" class="content">
                          Only one.
                        </div>
                      </li>
                      <li class="accordion-navigation">
                        <a href="#panel3a">What do I put here?</a>
                        <div id="panel3a" class="content">
                          I DO NOT KNOW. HELP.
                        </div>
                      </li>
                    </ul>
                  </div>
              </div>
              <hr><hr>
            </section>
        </section>
    </section>

	
	<?php 
        else :
            header('Location: index.html');
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
