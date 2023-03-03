<?php
// session_start(); // add this line to start the session

include('partials/header.php');

// define the database connection code here
// $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');

if (isset($_SESSION['accountcreated'])) {
    echo $_SESSION['accountcreated'];
    unset($_SESSION['accountcreated']);
}

?>
<div class="form_container">
    <div class="overlay"></div>
    <div class="tittleDiv">
        <h1 class="title">Login</h1>
        <span class="subTittle">Welcome back!</span>
    </div>
    <?php
    if (isset($_SESSION['noAdmin'])) {
        echo $_SESSION['noAdmin'];
        unset($_SESSION['noAdmin']);
    }
    ?>
    <form action="" method="POST">
        <div class="row grid">
            <div class="row">
                <label for="username">User Name</label>
                <input type="text" id="username" name="userName" placeholder="Enter user Name" required>
            </div>
            <div class="row">
                <label for="Password">Password</label>
                <input type="text" id="Password" name="Password" placeholder="Enter your Password" required>
            </div>
            <div class="row">
                <input type="submit" id="submitBtn" name="submit" value="Login">
                <span class="registerLink">Don't have an account? <a href="register.php">Register</a></span>
            </div>
        </div>
    </form>
</div>

<?php
include('partials/footer.php');

if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM admin WHERE username = '$userName' and passwords = '$Password'";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['loginMessage'] = '<span class="success">Welcome ' . $row['username'] . ' </span>'; // use $row instead of $username
        header('location:' . SITEURL . 'dashboard.php');
        exit();
    } else {
        $_SESSION['noAdmin'] = '<span class="fail">Account ' . $username.' is not registered! </span>';
        header('location:' .SITEURL. 'index.php');
        exit();
    }

}

?>

