<?php 
  include('header.php');

  $sql_ll = "SELECT * FROM lending_list";
  $result_ll  = mysql_query($sql_ll);
  $sql_ld = "SELECT * FROM users WHERE active = 1 AND Name IS NOT NULL";
  $result_ld  = mysql_query($sql_ld);
  $sql_dl = "SELECT * FROM lending_list WHERE figure_name IS NOT NULL";
  $result_dl  = mysql_query($sql_dl);
  $sql_hd = "SELECT * FROM users WHERE active = 1 AND Name IS NOT NULL AND idHolder = 0";
  $result_hd  = mysql_query($sql_hd);
  $sql_hddl = "SELECT * FROM users WHERE active = 1 AND idHolder = 1";
  $result_hddl  = mysql_query($sql_hddl);
  $sql = "SELECT * FROM users WHERE active = 1 AND idHolder = 1";
  $result  = mysql_query($sql);

  $headers = $col = "";
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
                  <?php if ($_SESSION["figureAdded"] == 1): ?>
                      <span class="success label news-alert"> <i class="fi-alert"></i> Entry added.  </span>
                  <?php $_SESSION["figureAdded"] = 0; endif; ?>
                  <?php if ($_SESSION["figureRemoved"] == 1): ?>
                      <span class="success label news-alert"> <i class="fi-alert"></i> Entry removed. </span>
                  <?php $_SESSION["figureRemoved"] = 0; endif; ?>

                  <?php if ($_SESSION["idHolderAdded"] == 1): ?>
                      <span class="success label news-alert"> <i class="fi-alert"></i> ID holder added.  </span>
                  <?php $_SESSION["idHolderAdded"] = 0; endif; ?>
                  <?php if ($_SESSION["idHolderRemoved"] == 1): ?>
                      <span class="success label news-alert"> <i class="fi-alert"></i> ID Holder removed. </span>
                  <?php $_SESSION["idHolderRemoved"] = 0; endif; ?>

                  
                </div>
                <div class="options absolute"> 
                <?php if ($_SESSION["admin"] == 1): ?>      
                    <a href="#" data-reveal-id="modNewsMod" class="modNews"><span> Add/Remove Figure </span></a>
                    <a href="#" data-reveal-id="modNewsHLMod" class="modNews modNewsHL"><span> Add/Remove IDs </span></a>
                <?php endif;?>
                </div>
                      <div id="modNewsMod" class="reveal-modal" data-reveal aria-labelledby="modListForm" aria-hidden="true" role="dialog">
                        <a href="#" data-reveal-id="addListMod" class="arContent"><div><span> Add Figure </span></div></a>
                        <a href="#" data-reveal-id="removeListMod" class="arContent"><div><span> Remove Figure </span></div></a>

                          <div id="addListMod" class="reveal-modal" data-reveal aria-labelledby="listForm" aria-hidden="true" role="dialog">
                              <form id="listForm" action="addFigure.php" method="post">
                                      <input type="text" placeholder="Figure Name" class="add-figure-nm" name="figure_name">
                                      <input type="text" placeholder="Manufacturer" class="add-figure-mn" name="manufacturer">
                                      <select name="scale" class="add-figure-sc">
                                        <option value="Large">Large</option>
                                        <option value="Small">Small</option>
                                        <option value="Articulated">Articulated</option>
                                      </select> 
                                      <select name="days" class="add-figure-dy">
                                        <option value="1">01 Day</option>
                                        <option value="2">02 Days</option>
                                      </select> 
                                      <select name="username" class="add-figure-dy">
                                        <?php while ($row = mysql_fetch_assoc($result_ld)): ?>
                                          <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
                                        <?php endwhile; ?>
                                      </select> 
                                      <input type="submit" value="Add" class="button login-submit" name="submit">
                              </form>
                          </div>
                          <div id="removeListMod" class="reveal-modal" data-reveal aria-labelledby="removeNewsForm" aria-hidden="true" role="dialog">
                               <form id="removeNewsForm" action="removeFigure.php" method="post" enctype="multipart/form-data">
                                      <span class="rmNewsMsg"> Please select figure entry to delete: </span> 
                                      <select name="removeFigure" class="removeNews">
                                        <?php while ($row = mysql_fetch_assoc($result_dl)): ?>
                                          <option value="<?php echo $row["pk_lending_list"]; ?>"> <?php echo $row['figure_name']; ?></option>
                                        <?php endwhile; ?>
                                      </select>
                                      <input type="hidden" name="delBy" value="<?php echo $_SESSION["username"]; ?>">
                                      <input type="submit" value="Delete" class="button login-submit" name="submit">
                              </form>
                          </div>
                        </div>

                    
                      <div id="modNewsHLMod" class="reveal-modal" data-reveal aria-labelledby="modNewsHLForm" aria-hidden="true" role="dialog">
                        <a href="#" data-reveal-id="addNewsHLMod" class="arHLContent"><div><span> Add ID Holder </span></div></a>
                        <a href="#" data-reveal-id="removeNewsHLMod" class="arHLContent"><div><span> Remove ID Holder </span></div></a>

                          <div id="addNewsHLMod" class="reveal-modal" data-reveal aria-labelledby="newsHLForm" aria-hidden="true" role="dialog">
                              <form id="addIDHolderForm" action="addIDHolder.php" method="post">
                                      <select name="addHolder">
                                        <?php while ($row = mysql_fetch_assoc($result_hd)): ?>
                                            <option value="<?php echo $row["ID"]; ?>"> <?php echo $row['Name']; ?></option>
                                        <?php endwhile; ?>
                                      </select> 
                                      <input type="hidden" name="postedBy" value="<?php echo $_SESSION["username"]; ?>">
                                      <input type="submit" value="Submit" class="button login-submit" name="submit">
                              </form>
                          </div>
                          <div id="removeNewsHLMod" class="reveal-modal" data-reveal aria-labelledby="removeNewsHLForm" aria-hidden="true" role="dialog">
                               <form id="removeNewsHLForm" action="removeIDHolder.php" method="post" enctype="multipart/form-data">
                                      <span class="rmNewsMsg"> Please select user to remove from the list: </span> 
                                      <select name="removeID" class="removeNews">
                                        <?php while ($row = mysql_fetch_assoc($result_hddl)): ?>
                                          <option value="<?php echo $row["ID"]; ?>"> <?php echo $row['Name']; ?></option>
                                        <?php endwhile; ?>
                                      </select>
                                      <input type="hidden" name="delBy" value="<?php echo $_SESSION["username"]; ?>">
                                      <input type="submit" value="Delete" class="button login-submit" name="submit">
                              </form>
                          
                          </div>
                        </div>
                
              </div>
              <div class="events-header">
                    <img src="assets/img/list.png">
              </div>
              <div class="ll-table">
                <table>
                  <tr>
                  <th>#</th>
                  <th>Manufacturer</th>
                  <th>Figure Name</th>
                  <th>Size</th>
                  <th>Lender</th>
                  <th>Days</th>
                  </tr>

                  
                  <?php 
                  $i = 1;
                  while ($row = mysql_fetch_assoc($result_ll)) : ?>
                  <tr>
                  <td> <?php echo $i; ?> </td>
                  <td> <?php echo $row['manufacturer']; ?> </td>
                  <td> <?php echo $row['figure_name']; ?> </td>
                  <td> <?php echo $row['scale']; ?> </td>
                  <td> <?php echo $row['Name']; ?> </td>
                  <td> <?php echo $row['days']; ?> </td>
                  </tr>
                  
                  <?php  $i++; endwhile; ?>
                  
                </table>
              </div>
              <hr><hr>
              <div class="hd-table">
                <table>
                  <tr><th>ID HOLDERS</th></tr>
                  <?php while ($row = mysql_fetch_assoc($result)): ?>
                    <tr><td> <?php echo $row['Name']; ?> </td></tr>
                  <?php endwhile; ?>
                </table>
              </div>
              </section> 
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
