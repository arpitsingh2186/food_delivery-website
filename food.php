<?php include('partials-front/menu.php');?>  


 <?php 

            $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_setting WHERE id='1'"));

            $cart_min_price = $row['min_cart_value'];
            $cart_min_price_msg = $row['min_cart_msg'];
            $web_close = $row['web_close'];
            $web_close_msg = $row['web_close_msg'];

//$webCloseArr = array('No', 'Yes');

?>


	<!--Search Section Starts Here-->

	<section class="food-search text-center">
	        <div class="container">
	            
	            <form action="<?php echo SITEURL; ?>food-search" method="POST">
	                <input type="search" name="search" placeholder="Search for Food.." required>
	                <input type="submit" name="submit" value="Search" class="btn btn-primary">
	            </form>

	        </div>
    </section>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                //Start Session
                session_start();

                //Display Foods That Are Active
                $sql = "SELECT * FROM tbl_food WHERE active='Yes' order by RAND()";
                //Execute
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);
                //Check Whether the foods are available or not
                if ($count>0) 
                {
                    //Foods Available
                    while ($row=mysqli_fetch_assoc($res)) 
                    {
                        //Get the Values 
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $veg = $row['veg_non'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        //Check Whether Image Available or not
                                    if ($image_name=="") 
                                    {
                                        //Image Not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>css/image/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve zoom img-resizeFG">
                                        <?php
                                    }
                                    ?>
                                </div>
                                <form action="manage_cart.php" method="POST">
                                    <div class="food-menu-desc">
                                        <h4 ><?php echo $title; ?></h4>
                                        <input type="hidden" name="food_name" value='<?php echo $title?>'>
                                        <p class="food-price">₹
                                            <?php echo $price;?></p>
                                        <input type="hidden" name="food_price" value='<?php echo $price?>'>
                                        <p class="food-detail">
                                            <?php echo $description; ?>
                                        </p>
                                        

                                        <br>

                                        <p>
                                        <?php
                                            if ($veg == "Veg") 
                                            {
                                                 echo "<label style='color: green;'>$veg</label>";

                                            }
                                            else 
                                            {
                                                 echo "<label style='color: red;'>$veg</label>";
                                            }
                                            ?>
                                        </p>
                                        <input type="hidden" name="veg_non" value='<?php echo $veg?>'>



                                        <?php
                                        if ($web_close==0) 
                                        {
                                        ?>
                                        <div class="order-label">Quantity</div>
                                            <input type="number" name="qty" class="input-responsive" min="1" value="1" required>

                                        <button type="submit" class="btn btn-primary" name="add">Add to Cart</button>
                                        <input type="hidden" name="food_id" value='<?php echo $id?>'>

                                        <?php 
                                        } 
                                        else
                                        {
                                            ?>
                                            <div class="order-label">
                                                <strong><?php echo $web_close_msg?></strong>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </form>                                
                            </div>
                        <?php
                    }
                }
                else
                {
                    //Foods Not Available
                    echo "<div class='error'>Food Not Found.</div>";
                }
            ?>


            <div class="clearfix"></div>
            

        </div>

    </section>

    <!-- fOOD Menu Section Ends Here -->



<?php include('partials-front/footer.php');?>
