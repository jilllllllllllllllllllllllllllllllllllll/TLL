<?php 
    include('header.php');
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
    <?php if (PHP_SESSION_NONE): ?>
            <section id="body-content">
            	<section id="body-desktop">
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