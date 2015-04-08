<?php
    session_start();
    include 'database.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Lending List</title>

  <link rel="stylesheet" href="assets/css/normalize.css">
  <link rel="stylesheet" href="assets/css/foundation.css">
  <link rel="stylesheet" href="assets/icon/foundation-icons.css">
  <link rel="stylesheet" href="assets/css/custom.css">

  <script src="js/vendor/modernizr.js"></script>

</head>

<body>
    
    <section id="header-content">
        <section id="topbar-desktop" class="show-for-large-up">

            <div id="topbar-desktop-grid">
               <a href="home.php">
                    <div class="li-desktop">
                        <i class="fi-home"></i>
                        <h1> Home </h1>
                    </div>
                </a>
                <a href="activity.php">
                    <div class="li-desktop">
                        <i class="fi-microphone"></i>
                        <h1> Activity </h1>
                    </div>
                </a>
                <a href="events.php">
                    <div class="li-desktop">
                        <i class="fi-megaphone"></i>
                        <h1> Events </h1>
                    </div>
                </a>
                 <a href="#">
                    <div id="logo-desktop" class="li-desktop li-desktop-logo no-hover">
                        <img src="assets/img/logo_.png">
                    </div>
                </a>
                <a href="list.php">
                    <div class="li-desktop">
                        <i class="fi-list"></i>
                        <h1> Lists </h1>
                    </div>
                </a>
                <a href="faq.php">
                    <div class="li-desktop">
                        <i class="fi-info"></i>
                        <h1> Faq </h1>
                    </div>
                </a>
                <a href="account.php">
                    <div class="li-desktop">
                        <i class="fi-torso"></i>
                        <h1> Account </h1>
                    </div>
                </a>
            </div>

            <!--
            <div id="utilities">
                <div id="setSession">
                    <span class="inSession">
                        <?php 
                            //echo $_SESSION["username"] . " is currently logged in.";
                        ?>
                    </span>
                </div>
                <div id="logout">
                    <span class="logout-t">
                        <a href="logout.php"> Log Out </a>
                    </span>
                </div>
            </div
        -->
            
        </section> 
    </section>
</body>
</html>