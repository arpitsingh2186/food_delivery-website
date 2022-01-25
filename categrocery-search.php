<?php include('partials-front/menu.php');?>



	<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                //GEt the Search Keyword
                $search = $_POST['search'];
            ?>
            <h2>Categories on Your Search <a href="#" class="text-blue">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Categories Menu</h2>

            <?php
                

                //SQL Query to Get foods based on search keyword
                $sql = "SELECT * FROM tbl_category_grocery WHERE title LIKE '%$search%'";

                //Execute
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                //Check whether food available or not
                if ($count>0) 
            {
                //Categories Available
                while ($row=mysqli_fetch_assoc($res)) 
                {
                    //Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                    <a href="<?php echo SITEURL; ?>categories-grocery.php?category_id=<?php echo $id;?>">
                        <div class="box-4 float-container">
                            <?php
                                if ($image_name=="") 
                                {
                                    //Image Not Available
                                    echo "<div class='error'>Image Not Found.</div>";
                                }
                                else
                                {
                                    //Omage Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>css/image/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve img-resize">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //Categories Not Available
                echo "<div class='error'>Categories Not Found.</div>";
            }


            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php');?>