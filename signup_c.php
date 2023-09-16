<?php include('partials-front/menu.php'); ?>

<br><br>
<div class="columns">
    <div class="column"></div>
    <?php 
            if(isset($_SESSION['loggedIn'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['loggedIn']; //Display the SEssion Message if SEt
                unset($_SESSION['loggedIn']); //Remove Session Message
            }
        ?>
<div class="box boxHW">
 
<form action="" method="POST" class="text-center label">
            <label for="">Full Name: </label>
            <input type="text" name="Full_name" placeholder="Full name" class="input is-rounded" required>
            <br>
            <br><br>
            <label for="username">Username: </label>
            <input type="text" name="Username" placeholder="Enter username:" class="input is-rounded" required>
            <br><br>
            <label for="email">Email: </label>
            <input type="email" name="Email" placeholder="yourEmail@something.com" class="input is-rounded" required>
            <br><br>
            <label for="phone_no">Phone Number: </label>
            <input type="text" name="phone_no" class="input is-rounded" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="Password" placeholder="Enter password" class="input is-rounded" required>
            <br>
            <br>
            <input type="submit" name="submit" value="Login" class="button is-link">
            <br>
        </form>
        <br><br>
</div>
<div class="column"></div>
</div>

<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        echo $Full_name = $_POST['Full_name'];
        echo $Username = $_POST['Username'];
        echo $Email=$_POST['Email'];
        echo $phone_no=$_POST['phone_no'];
        echo $Password = ($_POST['Password']); //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_customer SET 
            Full_name='$Full_name',
            Username='$Username',
            Email='$Email',
            phone_no='$phone_no',
            Password='$Password'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['loggedIn'] = "<div class='success'>Signed up Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'login_c.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['loggedIn'] = "<div class='error'>Failed to log in.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'signup_c.php');
        }

    }
    
?>