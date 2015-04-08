<?php
    include 'header.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en" >

<head>

</head>
<body>
   
    <?php
    if ($_SESSION["username"]):

        //Hexagrid Algorithm
        //Optimise hexagrid colorisation
    ?>

    <section id="body-content">
        <section id="body-desktop" class="show-for-large-up">
            <section id="home-content">
            
                <div id="home-header"> 
                    <div class="header-text">
                        <span class="index-subhead"> welcome to the <br> </span>
                        <span class="index-head"> THE LENDING LIST </span>
                    </div>
                </div>
                
                
                <div id="hexagrid" class="contain-to-grid">
                    <div class="row row-desktop">
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-desktop">
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-desktop">
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-desktop">
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-desktop">
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hex">
                            <div class="hex-lr">
                                <div class="hex-rl">
                                    <div class="hex-content" style="#"></div>
                                </div>
                            </div>
                        </div>
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

</body>
</html>