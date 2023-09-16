<?php include('partials-front/menu.php'); ?>

<div class="main">
    <div class="wrapper">
        <h1 class="text-center">My Cart</h1>
        <a href="foods.php" class="btn-primary">Add more</a>


        <input type="submit" name="submit" value="Check Out" class="btn-secondary">

    </div>
</div>

<?php 

    $sql="SELECT * FROM tbl_order";
    $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
    echo $sql




?>



<?php include('partials-front/footer.php'); ?>