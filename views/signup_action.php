<?php
include("../includes/partials/database_connection.php");

$name = $_POST['username'];
$password = $_POST['password'];

$salt = "*-+/12345678aqwsdertgyjh!#¤=)((";
$password = md5($password . $salt);

$sql = "INSERT INTO users (User_name,User_password) VALUES(:name_IN,:password_IN)";
$stm = $pdo->prepare($sql);
$stm->bindParam(':name_IN', $name);
$stm->bindParam(':password_IN', $password);
if ($stm->execute()) {
    header("location:login_form.php");
} else {
    echo "Cannot signup!";
}
