<?php 
	include('header.php');

	$sql = "SELECT * FROM faq";
	$result  = mysql_query($sql);
  $sql_del = "SELECT * FROM faq";
  $result_del  = mysql_query($sql_del);
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
                    <?php if ($_SESSION["itemAdded"] == 1): ?>
                      <span class="success label news-alert"><i class="fi-alert"></i> Question added. </span>
                    <?php $_SESSION["itemAdded"] = 0; endif; ?>
                    <?php if ($_SESSION["itemRemoved"] == 1): ?>
                        <span class="success label news-alert"><i class="fi-alert"></i> Question removed. </span>
                    <?php $_SESSION["itemRemoved"] = 0; endif; ?>
                  </div>
                  <div class="options">
                    <?php if ($_SESSION["admin"] == 1): ?>       
                     <a href="#" data-reveal-id="modNewsMod" class="modNews options-alone"><span> Add/Remove Item </span></a>
                  </div>
                     <div id="modNewsMod" class="reveal-modal" data-reveal aria-labelledby="modNewsForm" aria-hidden="true" role="dialog">
                        <a href="#" data-reveal-id="addFAQMod" class="arContent"><div><span> Add Question </span></div></a>
                        <a href="#" data-reveal-id="removeFAQMod" class="arContent"><div><span> Remove Question </span></div></a>
                                        <div id="addFAQMod" class="reveal-modal" data-reveal aria-labelledby="faqForm" aria-hidden="true" role="dialog">
                                            <form id="faqForm" action="addFAQ.php" method="post">
                                                <input type="text" placeholder="Title" class="add-event-title" name="title">
                                                <textarea class="add-news-content" name="content"></textarea>
                                                <input type="submit" value="Create" class="button login-submit" name="submit">
                                            </form>
                                        </div>
                          <div id="removeFAQMod" class="reveal-modal" data-reveal aria-labelledby="removeNewsForm" aria-hidden="true" role="dialog">
                               <form id="removeNewsForm" action="removeFAQ.php" method="post">
                                      <span class="rmNewsMsg"> Please select FAQ entry to delete: </span> 
                                      <select name="removeFAQ" class="removeNews">
                                        <?php while ($row = mysql_fetch_assoc($result_del)): ?>
                                        <option value="<?php echo $row["id"]; ?>"> <?php echo $row['title']; ?></option>
                                        <?php endwhile; ?>
                                      </select>
                                      <input type="submit" value="Delete" class="button login-submit" name="submit">
                              </form>
                          </div>
                      </div>
                <?php endif;?>
                </div>
                	<div class="events-header">
                		    <img src="assets/img/faq.png" alt="news">
                	</div>
                  
                    <div class="news-carousel">
                      <ul class="accordion" data-accordion>
                        <?php
                          $i = 1;
                          while ($row = mysql_fetch_assoc($result)): 
                        ?>
                        <li class="accordion-navigation">
                          <a href="#panel<?php echo $i;?>a"><b><?php echo $row['title'];?></b></a>
                          <div id="panel<?php echo $i;?>a" class="content">
                            <?php echo nl2br($row['answer']);?>
                          </div>
                        </li>
                        <?php $i++ ?>
                        <?php endwhile; ?>
                      </ul>
                    </div>
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
