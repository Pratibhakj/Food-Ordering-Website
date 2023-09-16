<?php include('partials-front/menu-front.php'); ?>
<link rel="stylesheet" href="css/app.css">

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        
        
        <form action="<?php echo SITEURL; ?>food-search-login.php" method="POST">
            <input type="search" name="search" placeholder="Search Foods" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Various Food Categories</h2>

        <?php 
            //Create SQL Query to Display CAtegories from Database
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' ORDER BY id DESC LIMIT 3";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count rows to check whether the category is available or not
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //CAtegories Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values like id, title, image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="login_c.php">
                        <div class="box-3 float-container">
                            <?php 
                                //Check whether Image is available or not
                                if($image_name=="")
                                {
                                    //Display MEssage
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white" ><mark style="background-color:white;"><?php echo $title; ?></mark></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //Categories not Available
                echo "<div class='error'>Category not Added.</div>";
            }
        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->
<!-- <h1 class="text-center"> Famous Brands </h1> -->

      <div class="Brands">
        <img src="images/KFC.png" alt="">
      </div>
      <div class="Brands">
        <img src="images/Dominos.jpeg" alt="">
      </div>
      <div class="Brands">
        <img src="images/MC donald´s.jpeg" alt="">
      </div>
      <div class="Brands">
        <img src="images/pizzaHut.png" alt="">
      </div>
      <div class="Brands">
        <img src="images/SubWay.jpeg" alt="">
        </div>

    <!-- <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section> -->
<!-- fOOD Menu Section Ends Here -->


<?php include('partials-front/footer.php'); ?>