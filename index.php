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
            
        </section> 
    </section>

    <?php if (PHP_SESSION_NONE): ?>

    <section id="body-content">
    	<section id="body-desktop" class="show-for-large-up">
        	<section id="home-content">
                
				<div id="home-header"> 

                    <div class="header-text">
                        <span class="login-subhead"> welcome, Stranger! <br> Login information is required to proceed. <br> </span>
                        <span class="login-head"> Please login to [The Lending List]. </span>
                    </div>

                	<form action="setSession.php" method="post" class="login-form">
                            <input type="text" placeholder="Username" class="login-uname" name="username"> 
                            <input type="password" placeholder="Password" class="login-pword" name="password">
                            <input type="submit" value="Log In" class="button login-submit"> 
                	</form>
                </div>

            </section>	
        </section>
    </section>

    <?php else:
        header('Location:home.php');
        endif;
    ?>

    <section id="footer-content">
    </section>

  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>