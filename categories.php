<?php include('partials-front/menu.php');?>

	

	<!--Search Section Starts Here-->

	<section class="food-search text-center">
	        <div class="container">
	            
	            <form action="<?php echo SITEURL; ?>category-search" method="POST">
	                <input type="search" name="search" placeholder="Search for Food.." required>
	                <input type="submit" name="submit" value="Search" class="btn btn-primary">
	            </form>

	        </div>
    </section>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php

                //category Displaying that are active
            //SQL Query
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

            //Execute
            $res = mysqli_query($conn , $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Check Whther categories availablr or not
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

                    <a href="<?php echo SITEURL; ?>category-foods?category_id=<?php echo $id;?>">
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