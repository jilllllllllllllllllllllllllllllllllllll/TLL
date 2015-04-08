<?php 
	include('header.php');

	$sql = "SELECT * FROM news";
	$result  = mysql_query($sql);
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
              <div class="news-admin">
                <?php if ($_SESSION["newsAdded"]): ?>
                		<span class="success label news-alert"> News added. </span>
                <?php	$_SESSION["newsAdded"] = 0; endif; ?>

    					  <?php if ($_SESSION["admin"] == 1): ?>
    		                <a href="#" data-reveal-id="addNewsMod" class="addNews"><span> Add Content </span> </a>
            							<div id="addNewsMod" class="reveal-modal" data-reveal aria-labelledby="newsForm" aria-hidden="true" role="dialog">
            							  	<form id="newsForm" action="addNews.php" method="post" enctype="multipart/form-data">
            									<input type="text" placeholder="Title" class="add-news-title" name="Title"> 
            		                			<textarea class="add-news-content" name="Content"></textarea>
            		                			<input type="file" name="activity-img" class="add-news-img">
            		                			<input type="submit" value="Submit" class="button login-submit" name="submit">
            		                			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
            								  </form>
    							        </div>
    			      <?php endif;?>
              </div>
              <div class="news-top">
                	<div class="news-header">
                		    <img src="assets/img/news.png" alt="news">
                	</div>
                  
                  <div class="news-carousel">
                    <ul class="example-orbit" data-orbit>
                      <li>
                        <img src="http://placehold.it/600x250" alt="slide 1" />
                      </li>
                      <li class="active">
                        <img src="http://placehold.it/600x250" alt="slide 2" />
                      </li>
                      <li>
                        <img src="http://placehold.it/600x250" alt="slide 3" />
                      </li>
                    </ul>
                  </div>
              </div>
              <hr><hr>
              <?php while ($row = mysql_fetch_assoc($result)): ?>
              <div class="news-text">
          						<span class="news-title"> <?php echo "<br>{$row['Title']}"; ?> </span>
          						<span class="news-date"> Date posted: <?php echo "{$row['Date']}"; ?> </span>
          						<span class="news-subhead"> <?php echo "<br>{$row['Content']}<br>"; ?> </span>
              </div>
              <?php endwhile;?>  
                        
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
