<?php 
	include('header.php');

	$sql = "SELECT * FROM lending_list_requirements, events WHERE lending_list_requirements.requirements_pk = events.event_pk";
  $result  = mysql_query($sql);
?>

<!DOCTYPE html>
<html class="no-js" lang="en" >

<head>

</head>

<body>
  <div class="list-body">
	 <center>
    <br><br><br>
    <a href= "#" class="button">Add New List</a>
    <a href = "logout.php" class="button" >Log out</a>
    
    <h3>Requirements</h3>
    <table>
      <tr>
      <th>Event</th>
      <th>Large</th>
      <th>Small</th>
      <th>Articulated </th>
      <th>Theme</th>
      <th>Comment</th>
      <?php
      if ($_SESSION["admin"] == "yes"){
      echo "<th></th>";
      }
      ?>
      </tr>
      <tr>
      <?php while ($row = mysql_fetch_assoc($result)):
      echo "<td> {$row['event_name']} </td>";
      echo "<td> {$row['req_large']} </td>";
      echo "<td> {$row['req_small']} </td>";
      echo "<td> {$row['req_articulated']} </td>";
      echo "<td> {$row['theme']} </td>";
      echo "<td> {$row['comment']} </td>";
      if ($_SESSION["admin"] == 1){
        echo "<td> <a href='list/editRequirements.php'>Edit Requirements</a> </td>";
      }
            
      ?>
      </tr>
    <?php //INSERT INTO `the_lending_list`.`lending_list_requirements` (`requirements_pk`, `req_large`, `req_small`, `req_articulated`, `theme`, `comment`)
      // VALUES (NULL, '10', '20', '10', 'Matsuri', 'Total of 40 figs');?>
    
    <?php endwhile; ?>
    </table><hr>
    
    
    
    
    
    
    
    <?php // =================== LENDING LIST  HERE  ================?>
    
    <h2>List</h2>
    <?php
    $sql = "SELECT * FROM lending_list";
    $result  = mysql_query($sql);
    
    $headers = $col = "";
    
    ?>
    <table>
      <tr>
      <th>#</th>
      <th>Manufacturer</th>
      <th>Figure Name</th>
      <th>Size</th>
      <th>Lender</th>
      <th>Days</th>
      <?php
      if ($_SESSION["admin"] == "yes"){
      echo "<th>Comments</th>";
      }
      ?>
      <th>Edit</th>
      <th>Delete</th>
      </tr>
      <tr>
      <?php while ($row = mysql_fetch_assoc($result)): //loop until nothing is left
      echo "<td> {$row['pk_lending_list']} </td>";
      echo "<td> {$row['manufacturer']} </td>";
      echo "<td> {$row['figure_name']} </td>";
      echo "<td> {$row['scale']} </td>";
      echo "<td> {$row['Name']} </td>";
      echo "<td> {$row['days']} </td>";
      if ($_SESSION["admin"] == "yes"){
        echo "<td> {$row['comments']}"." <a href='list/comment.php'>Add/Edit Comment</a> </td>";
      }
      if ( $row['Name'] == $_SESSION["username"] || $_SESSION["admin"] == "yes"){
        $_SESSION["itemID"] = $row['pk_lending_list'];
        echo "<td><a href='list/editing.php'>Edit</a></td>";
        echo "<td><a href='list/deleting.php'>Delete</a></td>";
        } 
            
      ?>
      </tr>
    <?php //echo $row['Name'];?>
    
    <?php endwhile; ?>
    </table>
    <?php 
    /*
     
    INSERT INTO `the_lending_list`.`lending_list` (`pk_lending_list`, `manufacturer`,
     `scale`, `figure_name`, `Name`, `days`) 
    VALUES ('0', 'GSC', 'Large', 'Tomoe Mami', 'Jill', '2');
     */?>
    <a href="list/add.php" class="button"> Add</a> <hr>
    <?php //===================ID HOLDERS HERE ====================?>
    <?php 
      $sql = "SELECT * FROM users WHERE users.idHolder = 'yes'";
      $result  = mysql_query($sql);
    ?>
      <table>
      <tr>
      <th>ID HOLDERS</th>
      <?php
      if ($_SESSION["admin"] == "yes"){
      echo "<th>Edit</th>";
      }
      ?>
      </tr>
      <tr>
      <?php while ($row = mysql_fetch_assoc($result)): //loop until nothing is left
      echo "<td> {$row['Name']} </td>";
      if ($_SESSION["admin"] == "yes"){
        echo "<td> <a href=''>Remove</a> </td>";
      }
      ?>
      </tr>
    
    <?php endwhile; ?>
    </table>
  
    
    </center>
</div>
</body>
</html>
