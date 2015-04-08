<?php 
	include('header.php');

	$sql = "SELECT * FROM events";
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
                	<?php if ($_SESSION["eventAdded"]): ?>
                		<span class="success label news-alert"> Event added. </span>
                	<?php 
                		$_SESSION["eventAdded"] = 0;
                		endif; 
                	?>

                	<?php 
    					if ($_SESSION["admin"] == 1): ?>
    		                <a href="#" data-reveal-id="addEventsMod" class="addNews"><span>Add Event</span></a>
    							<div id="addEventsMod" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    							  	<form id="modalTitle" action="addEvent.php" method="post" enctype="multipart/form-data">
    									<input type="text" placeholder="Event Name" class="add-event-title" name="EName">
                                        <div class="add-event-date">
                                            <select name="EMonth" class="addMonth">
                                                <option value="January">January</option>
                                                <option value="February">January</option>
                                                <option value="March">January</option>
                                                <option value="April">January</option>
                                                <option value="May">January</option>
                                                <option value="June">January</option>
                                                <option value="July">January</option>
                                                <option value="August">January</option>
                                                <option value="September">January</option>
                                                <option value="October">January</option>
                                                <option value="November">January</option>
                                                <option value="December">January</option>
                                            </select>
                                            <select name="EDate" class="addDate">
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <select name="EYear" class="addYear">
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="1995">1995</option>
                                            </select>
                                        </div>
                                        <input type="text" placeholder="Event Location" class="add-event-location" name="ELoc">
                                        <input type="text" placeholder="Event Page" class="add-event-page" name="EPage">   
    		                			<textarea class="add-news-content" name="EDetails"></textarea>
    		                			<input type="submit" value="Submit" class="button login-submit" name="submit">
    		                			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
    								</form>
    							</div>
    				<?php endif;?>
                </div>

            	<div class="events-header">
            		<img src="assets/img/events.png" alt="news">
            	</div>


                <?php while ($row = mysql_fetch_assoc($result)): ?>
                <div class="events-text">
                        <span class="event-title"> <?php echo "{$row['event_name']}"; ?>: </span>
                        <span class="event-date"> <?php echo "{$row['event_date']}"; ?><br> </span>
                        <span class="event-location"> Location: <?php echo "{$row['event_location']}"; ?><br><br> </span>
                        <span class="event-desc"> <?php echo "{$row['event_desc']}"; ?><br><br></span>
                        <span class="event-link"> Source: <?php echo "<a href='{$row['event_link']}'>Event Page</a>"; ?></span>
                </div>
                <?php endwhile; ?>
                
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
