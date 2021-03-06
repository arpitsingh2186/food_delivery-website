<?php include('partials-front/menu.php');?>


    <?php
        //Check Whether id is passed or not
    if (isset($_GET['category_id'])) 
    {
        //Category id is set and get the id
        $category_id = $_GET['category_id'];
        //Get category title based on category id
        $sql = "SELECT title FROM tbl_category_grocery WHERE id=$category_id";
        //Execute
        $res = mysqli_query($conn, $sql);
        //Get the value from databse
        $row = mysqli_fetch_assoc($res);
        //Get the title
        $category_title = $row['title'];
    }
    else
    {
        //Category not passed
        //Redirect to home page
        header('location:'.SITEURL);
    }
    ?>

	<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Items on <a href="#" class="text-blue">"<?php echo $category_title?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu</h2>

            <?php

                //Create Sql Qyery to get foods on delected category
            $sql2 = "SELECT * FROM tbl_grocery WHERE category_id=$category_id";

                //Execute
                $res2 = mysqli_query($conn, $sql2);
                //count the rows
                $count2 = mysqli_num_rows($res2);
                //Check whether food is available or not
                if ($count2>0) 
                {
                    //Food id available
                    while ($row2=mysqli_fetch_assoc($res2)) 
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        $image_name = $row2['image_name'];
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
                                <h4><?php echo $title;?></h4>
                                <input type="hidden" name="food_name" value='<?php echo $title?>'>
                                <p class="food-price">???<?php echo $price;?></p>
                                <input type="hidden" name="food_price" value='<?php echo $price?>'>
                                <p class="food-detail">
                                    <?php echo $description;?>
                                </p>
                                <br>

                                <div class="order-label">Quantity</div>
                                    <input type="number" name="qty" class="input-responsive" min="1" value="1" required>

                                <button type="submit" class="btn btn-primary" name="add">Add to Cart</button>
                                    <input type="hidden" name="food_id" value='<?php echo $id?>'>
                                    </form>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //not Available
                    echo "<div class='error'>Item not Available.</div>";
                }
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->



<?php include('partials-front/footer.php');?>