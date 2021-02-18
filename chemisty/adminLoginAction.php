<?php
$username = 'admin';
$password = 'admin1';
echo $_GET['user'] . " " . $_GET['password'];
if($_GET['user'] === $username && $_GET['password'] === $password){
    session_start();
    $_SESSION['login'] = True;
    header("Location: molarMass.php");
} else{
    ?>
    <h5 style="color: red;">Wrong user name or passowrd</h5>
    <a href="adminLogin.php">Go back to login</a>
    <?php
}
 