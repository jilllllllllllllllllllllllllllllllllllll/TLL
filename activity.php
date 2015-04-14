<?php 
	include('header.php');

	$sql_nw = "SELECT * FROM news WHERE active = 1 ORDER BY id DESC";
  $sql_del = "SELECT * FROM news WHERE active = 1";
  $sql_hl = "SELECT * FROM news_hl";
  $sql_delhl = "SELECT * FROM news_hl";

	$result_nw = mysql_query($sql_nw);
  $result_hl  = mysql_query($sql_hl);
  $result_del  = mysql_query($sql_del);
  $result_delhl  = mysql_query($sql_delhl);
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
        <section id="body-desktop">
            <section id="home-content">
            <div id="news">
              <div class="news-admin">
                <div class="alerts">
                  <?php if ($_SESSION["newsAdded"] == 1): ?>
                      <span class="success label news-alert"> <i class="fi-alert"></i> News added.  </span>
                  <?php $_SESSION["newsAdded"] = 0; endif; ?>

                  <?php if ($_SESSION["newsHLAdded"] == 1): ?>
                      <span class="success label news-alert"> <i class="fi-alert"></i> Banner added. </span>
                  <?php $_SESSION["newsHLAdded"] = 0; endif; ?>

                  <?php if ($_SESSION["bannerError"] == 1): ?>
                      <span class="success label news-alert banner-error"> <i class="fi-alert"></i> Banner cannot be uploaded. </span>
                  <?php $_SESSION["bannerError"] = 0; endif; ?>

                  <?php if ($_SESSION["newsContentRemoved"] == 1): ?>
                      <span class="success label news-alert"> <i class="fi-alert"></i> News item removed. </span>
                  <?php $_SESSION["newsContentRemoved"] = 0; endif; ?>

                  <?php if ($_SESSION["newsHLRemoved"] == 1): ?>
                      <span class="success label news-alert"> <i class="fi-alert"></i> Banner removed. </span>
                  <?php $_SESSION["newsHLRemoved"] = 0; endif; ?>

      					  <?php if ($_SESSION["admin"] == 1): ?>
                </div>
                <div class="options">       
                    <a href="#" data-reveal-id="modNewsMod" class="modNews"><span> Add/Remove Content </span></a>
                    <a href="#" data-reveal-id="modNewsHLMod" class="modNews modNewsHL"><span> Add/Remove Banner </span></a>
                </div>
                      <div id="modNewsMod" class="reveal-modal" data-reveal aria-labelledby="modNewsForm" aria-hidden="true" role="dialog">
                        <a href="#" data-reveal-id="addNewsMod" class="arContent"><div><span> Add Content </span></div></a>
                        <a href="#" data-reveal-id="removeNewsMod" class="arContent"><div><span> Remove Content </span></div></a>

            							<div id="addNewsMod" class="reveal-modal" data-reveal aria-labelledby="newsForm" aria-hidden="true" role="dialog">
            							  	<form id="newsForm" action="addNews.php" method="post" enctype="multipart/form-data">
            									        <input type="text" placeholder="Title" class="add-news-title" name="Title"> 
            		                			<textarea class="add-news-content" name="Content"></textarea>
                                      <input type="text" placeholder="Tags" class="add-news-tags" name="Tags"> 
            		                			<div class="add-news-img border"><input type="file" name="activity-img" class=""></div>
                                      <input type="hidden" name="postedBy" value="<?php echo $_SESSION["username"]; ?>">
            		                			<input type="submit" value="Create" class="button login-submit" name="submit">
            								  </form>
    							        </div>
                          <div id="removeNewsMod" class="reveal-modal" data-reveal aria-labelledby="removeNewsForm" aria-hidden="true" role="dialog">
                               <form id="removeNewsForm" action="removeNews.php" method="post" enctype="multipart/form-data">
                                      <span class="rmNewsMsg"> Please select news item to delete: </span> 
                                      <select name="removeNews" class="removeNews">
                                        <?php while ($row = mysql_fetch_assoc($result_del)): ?>
                                        <option value="<?php echo $row["id"]; ?>"> <?php echo $row['Title']; ?></option>
                                        <?php endwhile; ?>
                                      </select>
                                      <input type="hidden" name="delBy" value="<?php echo $_SESSION["username"]; ?>">
                                      <input type="submit" value="Delete" class="button login-submit" name="submit">
                              </form>
                          </div>
                        </div>

                    
                      <div id="modNewsHLMod" class="reveal-modal" data-reveal aria-labelledby="modNewsHLForm" aria-hidden="true" role="dialog">
                        <a href="#" data-reveal-id="addNewsHLMod" class="arHLContent"><div><span> Add Banner </span></div></a>
                        <a href="#" data-reveal-id="removeNewsHLMod" class="arHLContent"><div><span> Remove Banner </span></div></a>

                          <div id="addNewsHLMod" class="reveal-modal" data-reveal aria-labelledby="newsHLForm" aria-hidden="true" role="dialog">
                              <form id="newsHLForm" action="addNewsHighlight.php" method="post" enctype="multipart/form-data">
                                      <span class="rmNewsMsg"> !! Banner resolution must be 800 x 250 </span> 
                                      <input type="text" placeholder="Title" class="add-newsHL-title" name="newsHL"> 
                                      <div class="add-news-img border"><input type="file" name="activityHL-img" class="add-newsHL-img"></div>
                                      <input type="hidden" name="postedBy" value="<?php echo $_SESSION["username"]; ?>">
                                      <input type="submit" value="Submit" class="button login-submit" name="submit">
                              </form>
                          </div>
                          <div id="removeNewsHLMod" class="reveal-modal" data-reveal aria-labelledby="removeNewsHLForm" aria-hidden="true" role="dialog">
                               <form id="removeNewsHLForm" action="removeNewsHighlight.php" method="post" enctype="multipart/form-data">
                                      <span class="rmNewsMsg"> Please select banner item to delete: </span> 
                                      <select name="removeNewsHL" class="removeNews">
                                        <?php while ($row = mysql_fetch_assoc($result_delhl)): ?>
                                        <option value="<?php echo $row["id"]; ?>"> <?php echo $row['title']; ?></option>
                                        <?php endwhile; ?>
                                      </select>
                                      <input type="hidden" name="delBy" value="<?php echo $_SESSION["username"]; ?>">
                                      <input type="submit" value="Delete" class="button login-submit" name="submit">
                              </form>
                          
                          </div>
                        </div>
    			      <?php endif;?>
              </div>
              <div class="events-header">
                		<img src="assets/img/news.png">
              </div>

                  <div class="news-carousel">
                    <ul class="orbit" data-orbit>
                      <?php while ($row = mysql_fetch_assoc($result_hl)): ?>
                      <li>
                        <img src="<?php echo "assets/db/news_hl/{$row['img_url']}";?>">
                      </li>
                      <?php endwhile;?> 
                    </ul>
                  </div>
              <hr><hr>
              <?php while ($row = mysql_fetch_assoc($result_nw)): ?>
              <section id="news"> 
                <div class="news-text">
                  <div class="news-img">
                      <?php if ($row['ImageURL']): ?>
                        <img src="<?php echo "assets/db/news_thumb/{$row['ImageURL']}";?>">
                      <?php else: ?>
                        <img src="assets/db/news_thumb/placeholder.png">
                      <?php endif; ?>
                  </div>
                  <div class="news-content">
                      <div class="news-head">
            						<span class="news-title"> <?php echo "{$row['Title']}"; ?> </span>
            						<span class="news-date"> Date posted: <?php echo "{$row['Date']}"; ?> by <?php echo "{$row['Creator']}"; ?> </span>
                      </div>
            						<span class="news-subhead"><?php echo nl2br($row['Content']) . "<br>"; ?> </span>
                        <!--<span class="news-tags"><br>{ <b>tags: </b><?php echo "{$row['tags']}"; ?> }</span>-->
                  </div>
                </div>
              </section>
              <?php endwhile;?>  
            </div>            
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
