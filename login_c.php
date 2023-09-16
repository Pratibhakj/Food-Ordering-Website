<?php include('partials-front/menu-login.php'); ?>
<link rel="stylesheet" href="css/login.css">
<br><br><br>
<div id="gradiantBG">
<div class="columns">
    <div class="column"></div>
    <?php 
            if(isset($_SESSION['loggedIn'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['loggedIn']; //Display the SEssion Message if SEt
                unset($_SESSION['loggedIn']); //Remove Session Message
            }
            
                if(isset($_SESSION['loggedIN']))
                {
                    echo $_SESSION['loggedIN'];
                    unset($_SESSION['loggedIN']);
                }
        ?>
<div class="box boxHW">
<form action="" method="POST" class="text-center label">
            <label for="username">Username: </label>
            <br>
            <input type="text" name="Username" placeholder="Enter username:" class="input is-rounded">
            <br>
            <br>
            <label for="password">Password:</label>
            <br>
            <input type="password" name="Password" placeholder="Enter password" class="input is-rounded">
            <br>
            <br>
            <input type="submit" name="submit" value="Login" class="button is-link">
            <br>
        </form>
        <br><br>
            <p class='text-center'>Don't have an account <a href="<?php echo SITEURL;?>signup_c.php" class="button is-link">Sign Up</a>
</p>
</div>
<div class="column"></div>
</div>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $Username = $_POST['Username'];
        $Password = ($_POST['Password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_customer WHERE Username='$Username' AND Password='$Password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            echo "<script>
            function showAlert() {
              alert ('Login Successful !!');
            }
            showAlert();
            </script>";
            //User AVailable and Login Success
            $_SESSION['loggedIN'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $Username; //TO check whether the user is logged in or not and logout will unset it
            echo '<script>window.location.href="index.php"</script>';
            //REdirect to HOme Page/Dashboard
            //header('location:'.SITEURL.'index.php');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['loggedIN'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'login_c.php');
        }


    }

?>
</div>