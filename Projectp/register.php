<?php
   include('partials/header.php')
//    include('verify.php');


   ?>
   
    <div class="register_container">
        <div class="overlay">


        </div>
        <div class="tittleDiv">
            <h1 class="title">Register</h1>
            <span class="subTittle">Thanks for choosing us</span>

        </div>
        <form action=" " method="POST" autocomplete="off">
           <div class="row grid">
            <div class="row">

                <label for="username">User Name</label>
                <input type="text" id="username" name="userName" placeholder="Enter user Name" required>
            </div>
            <div class="row">

                <label for="username">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter user email" required>
            </div>
            <div class="row">

                <label for="username">phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone Number" required>
            </div>
            <div class="row">

                <label for="username">Password</label>
                <input type="text" id="Password" name="Password" placeholder="Enter your Password" required minlength="6">
            </div>
           
            <div class="row">
                <input type="submit" id="submitBtn" name="submit" value="Login" required>

                <span class="registerLink"> have an account? <a href="index.php">Login</a></span>

            </div>
           </div>


        </form>
    </div>

    
    <?php
   include('partials/footer.php')


   ?>


   <?php
   if(isset($_POST['submit'])){
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $phone = $_POST['phone'];

    //establish a connection
    $conn = mysqli_connect("localhost", "username", "password", "database_name");

    if(!$conn){
        die("connection failed:" .mysqli_connect_error());
    }


    $sql = "INSERT INTO admin SET
      username = '$userName',
      email = '$email',
      passwords = '$password',
      phone = '$phone'
    ";


    $res = mysqli_query($conn, $sql);


     if($res == true){
        $_SESSION['accountcreated'] = '<span class="addAccount">Account ' .$userName.'created!</span>';
        header('location:' .SITEURL. 'dashboard.php');
        exit();
     }
     else{
        $_SESSION['unsuccessful'] = '<span class="fail">Account ' .$userName.'failed!</span>';
        header('location:' .SITEURL. 'register.php');
        exit();
     }

   }
   ?>
