<?php 
	include('header.php');

	$sql = "SELECT * FROM users WHERE Name = '".$_SESSION['username']."'";
  $result = mysql_query($sql);

  $sql_del = "SELECT * FROM users WHERE active = 1 AND Name IS NOT NULL AND admin = 0";
  $result_del = mysql_query($sql_del);
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
                    <?php if ($_SESSION["userAdded"] == 1): ?>
                        <span class="success label news-alert"><i class="fi-alert"></i> User added. </span>
                    <?php $_SESSION["userAdded"] = 0; endif; ?>
                    <?php if ($_SESSION["userRemoved"] == 1): ?>
                        <span class="success label news-alert"><i class="fi-alert"></i> User removed. </span>
                    <?php $_SESSION["userRemoved"] = 0; endif; ?>
                  </div>
                  <div class="options"> 
                  <?php if ($_SESSION["admin"] == 1): ?>       
                    <a href="#" data-reveal-id="modNewsMod" class="modNews options-alone"><span> Add/Remove User </span></a>
                  <?php endif;?>
                  </div>
                
                  <div class="news-admin">
                    <div class="alerts alerts-nomargin">
                        <?php if ($_SESSION["userActive"] == 1): ?>
                        <span class="success label news-alert"><i class="fi-alert"></i> Account info edited. </span>
                        <?php $_SESSION["userActive"] = 0; endif; ?>
                    </div>
                    <div class="options options-reg">
                        <a href="#" data-reveal-id="modUserInfoMod" class="modNews"><span> Edit Account Info </span></a>
                        <a href="logout.php" class="modNews"><span> Log Out </span></a>
                    </div>
                  </div>

                      <div id="modNewsMod" class="reveal-modal" data-reveal aria-labelledby="modNewsForm" aria-hidden="true" role="dialog">
                        <a href="#" data-reveal-id="addUserMod" class="arContent"><div><span> Add User </span></div></a>
                        <a href="#" data-reveal-id="removeUserMod" class="arContent"><div><span> Remove User </span></div></a>
                          <div id="addUserMod" class="reveal-modal" data-reveal aria-labelledby="addUserForm" aria-hidden="true" role="dialog">
                               <form id="addUserForm" action="addUser.php" method="post">
                                      <input type="text" placeholder="Temporary Username" class="add-tmp-uname" name="tmp-uname">
                                      <input type="text" placeholder="Temporary Password" class="add-tmp-pwd" name="tmp-pword">
                                      <input type="hidden" name="delBy" value="<?php echo $_SESSION["username"]; ?>">
                                      <input type="submit" value="Add User" class="button login-submit" name="submit">
                              </form>
                          </div>              
                          <div id="removeUserMod" class="reveal-modal" data-reveal aria-labelledby="removeUserForm" aria-hidden="true" role="dialog">
                               <form id="removeUserForm" action="removeUser.php" method="post">
                                      <span class="rmNewsMsg"> Please select user to delete: </span> 
                                      <select name="removeUser" class="removeNews">
                                        <?php while ($row = mysql_fetch_assoc($result_del)): ?>
                                        <option value="<?php echo $row["id"]; ?>"> <?php echo $row['Name']; ?></option>
                                        <?php endwhile; ?>
                                      </select>
                                      <input type="hidden" name="delBy" value="<?php echo $_SESSION["username"]; ?>">
                                      <input type="submit" value="Delete" class="button login-submit" name="submit">
                              </form>
                          </div>
                        </div>
                    
                </div>
                    
                      <div id="modUserInfoMod" class="reveal-modal" data-reveal aria-labelledby="modNewsForm" aria-hidden="true" role="dialog">
                        <form id="userEditForm" action="editUser.php" method="post" enctype="multipart/form-data">
                          <input type="text" placeholder="Full Name" class="add-name" name="rname">
                          <input type="text" placeholder="Password" class="add-pword" name="pword">
                          <input type="text" placeholder="Contact Number: (+63)" class="add-cn" name="cn">
                          <input type="text" placeholder="E-mail Address" class="add-eadd" name="eadd">
                          <input type="text" placeholder="Facebook URL: http://www.facebook.com/" class="add-fb" name="fb">
                          <input type="file" name="user-img"> 
                          <input type="hidden" name="postedBy" value="<?php echo $_SESSION["username"]; ?>">
                          <input type="submit" value="Edit" class="button login-submit" name="submit">
                        </form>
                      </div>

            <?php  while ($row = mysql_fetch_assoc($result)): ?>
              <div class="account">
                <div class="account-img">
                  <img src="assets/db/users/<?php echo $row['user_img'];?>">
                </div>
                <div class="account-inf">
                  <section class="account-dt">
                    <span class="name"><?php echo $row['full_name'];?> <br> </span>
                    <span class="contact-dt">(+63)<?php echo $row['contact_number'];?> | <?php echo $row['email'];?> | <a href="http://fb.com/<?php echo $row['fb_url'];?>">Facebook</a></span>
                  </section>
                </div>
              </div>
            <?php endwhile; ?>
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
