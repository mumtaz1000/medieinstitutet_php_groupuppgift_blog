<?php
$username = $_POST['username'];
$password = $_POST['password'];
include("../includes/partials/database_connection.php");
$salt = "*-+/12345678aqwsdertgyjh!#¤=)((";
$password = md5($password . $salt);

$stm = $pdo->prepare("SELECT count(User_id) FROM Users WHERE User_name=:username_IN AND User_password=:password_IN");
$stm->bindParam(":username_IN", $username);
$stm->bindParam(":password_IN", $password);
$stm->execute();
$return = $stm->fetch();

if ($return[0] > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header("location:login_form.php");
} else {
    header("location: signup_form.php");
}
