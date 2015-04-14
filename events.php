<?php 
	include('header.php');

	$sql = "SELECT * FROM events WHERE active = 1 ORDER BY month, day";
    $result  = mysql_query($sql);
    $sql_del= "SELECT * FROM events WHERE active = 1";
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
                	<?php if ($_SESSION["eventAdded"] == 1): ?>
                		<span class="success label news-alert"><i class="fi-alert"></i> Event added. </span>
                	<?php $_SESSION["eventAdded"] = 0; endif; ?>
                    <?php if ($_SESSION["eventRemoved"] == 1): ?>
                        <span class="success label news-alert"><i class="fi-alert"></i> Event removed. </span>
                    <?php $_SESSION["eventRemoved"] = 0; endif; ?>
                    <?php if ($_SESSION["eventsError"] == 1): ?>
                        <span class="success label news-alert banner-error"> <i class="fi-alert"></i> Event cannot be uploaded. </span>
                    <?php $_SESSION["eventsError"] = 0; endif; ?>
                  </div>
                  <div class="options">
                <?php if ($_SESSION["admin"] == 1): ?>       
                    <a href="#" data-reveal-id="modNewsMod" class="modNews options-alone absolute"><span> Add/Remove Event </span></a>
                <?php endif; ?>
                  </div>
                      <div id="modNewsMod" class="reveal-modal" data-reveal aria-labelledby="modNewsForm" aria-hidden="true" role="dialog">
                        <a href="#" data-reveal-id="addNewsMod" class="arContent"><div><span> Add Event </span></div></a>
                        <a href="#" data-reveal-id="removeNewsMod" class="arContent"><div><span> Remove Event </span></div></a>
                                        <div id="addNewsMod" class="reveal-modal" data-reveal aria-labelledby="newsForm" aria-hidden="true" role="dialog">
                                            <form id="eventsForm" action="addEvent.php" method="post" enctype="multipart/form-data">
                                                <input type="text" placeholder="Title" class="add-event-title" name="eventName">
                                                    <div class="add-event-date">
                                                        <select name="month" class="addMonth">
                                                            <option value="Jan"> Jan </option>
                                                            <option value="Feb"> Feb </option>
                                                            <option value="Mar"> Mar </option>
                                                            <option value="Apr"> Apr </option>
                                                            <option value="May"> May </option>
                                                            <option value="Jun"> Jun </option>
                                                            <option value="Jul"> Jul </option>
                                                            <option value="Aug"> Aug </option>
                                                            <option value="Sep"> Sep </option>
                                                            <option value="Oct"> Oct </option>
                                                            <option value="Nov"> Nov </option>
                                                            <option value="Dec"> Dec </option>
                                                        </select>
                                                        <select name="date" class="addDate"> 
                                                            <?php for ($i=1;$i<=31;$i++): ?><option value=<?php echo $i; ?>><?php echo $i; ?></option><?php endfor;?>
                                                        </select> 
                                                    </div>
                                                <input type="text" placeholder="Location" class="add-event-loc" name="eventLoc"> 
                                                <input type="text" placeholder="Event URL: http://" class="add-event-src" name="eventSource">
                                                <span class="imgWarning"> Image must be a nicely shaped square. O u O </span>
                                                <input type="file" name="events-img">
                                                <input type="hidden" name="postedBy" value="<?php echo $_SESSION["username"]; ?>">
                                                <input type="submit" value="Create" class="button login-submit" name="submit">
                                            </form>
                                        </div>
                          <div id="removeNewsMod" class="reveal-modal" data-reveal aria-labelledby="removeNewsForm" aria-hidden="true" role="dialog">
                               <form id="removeNewsForm" action="removeEvent.php" method="post" enctype="multipart/form-data">
                                      <span class="rmNewsMsg"> Please select event item to delete: </span> 
                                      <select name="removeEvent" class="removeNews">
                                        <?php while ($row = mysql_fetch_assoc($result_del)): ?>
                                            <option value="<?php echo $row["id"]; ?>"> <?php echo $row['title']?>: <?php echo $row['date']; ?></option>
                                        <?php endwhile; ?>
                                      </select>
                                      <input type="hidden" name="delBy" value="<?php echo $_SESSION["username"]; ?>">
                                      <input type="submit" value="Delete" class="button login-submit" name="submit">
                              </form>
                          </div>
                        </div>
                    
                </div>

            	<div class="events-header">
            		<img src="assets/img/events.png" alt="news">
            	</div>

                            <!--<img src="assets/db/events/<?php echo $row['img_src']; ?>" class="events-img">-->

                <div class="events-ln">
                    <?php while ($row = mysql_fetch_assoc($result)): ?>
                        <a class="eventsAfter" href="<?php echo $row['event_url']; ?>">
                            <div class="event">
                                <img src="assets/db/events/<?php echo $row['img_src']; ?>" class="events-img">
                                <img src="assets/img/bg.png" class="events-img-bg">
                                <div class="title-loc">
                                    <span class="date"> <?php echo $row['date']; ?> <br> </span>
                                    <span class="title"> <?php echo $row['title']; ?> <br> </span>
                                    <span class="location"> <?php echo $row['location']; ?> <br> </span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
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

    <script src="assets/js/jquery.js"></script>
  <script src="assets/js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>

</body>
</html>
