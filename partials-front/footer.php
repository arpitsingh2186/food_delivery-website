<!-- social Section Starts Here -->
    <!--<section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <a>
                <?php
                    if ($_SESSION['user'] || $_COOKIE['user']) 
                    {
                        session_start();
                        echo "<a href = 'logout.php'>Log Out</a>";
                    }
                    else
                    {
                        session_start();
                        echo "<a href = 'login_user.php'>Log In</a>";
                    }
                ?>
            </a>
            &emsp;
            &ensp;
            <a href="contact.php">Contact Us</a>
            <br><br>
            <a href="shop/index.php">Shop</a>
            &emsp;
            &ensp;
            <a href="gofer/index.php">Gofer</a>
            <br><br>

            <p>
                <div class="center">
                <div class="food-menu-boxf">
                    <div class="food-menu-img">
                        <img src="css/freed.jpg" width="76" height="100">                        
                        <div class="food-detail">                            
                            Free Delivery Across Madhubani, at yor doorstep.
                        </div>
                    </div>
                </div>

                <div class="food-menu-boxf">
                    <div class="food-menu-img">
                        <img src="css/easyreturn.png" width="96" height="105">                      
                        <div class="food-detail">                            
                            Easy Returns after talk to customer Executive.
                        </div>
                    </div>
                </div>

                <div class="food-menu-boxf">
                    <div class="food-menu-img">
                         <img src="css/24*7.jpg" width="110" height="110">                    
                        <div class="food-detail">                            
                            24×7 Active Customer care Executive call 7545055444.
                        </div>
                    </div>
                </div>
                </div>

            </p>
           
            <p>All rights reserved. Designed By <a href="https://www.instagram.com/alien_brain.abhi/" target="_blank">Arpit Singh</a>&#127800;</p>
            
            
        </div>
    </section>
    <!-- footer Section Ends Here -->
    </body>
</html>