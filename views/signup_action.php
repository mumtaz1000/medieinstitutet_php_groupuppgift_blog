<?php
include("../includes/partials/database_connection.php");

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordCheck = $_POST['passwordCheck'];
if ($password !== $passwordCheck) {
    echo '<div class="alert alert-danger" role="alert">
    Both passwords are not same
    </div>';
    include_once("signup_form.php");
} else {

    $stm = $pdo->prepare("SELECT count(User_id) FROM Users WHERE User_name=:username_IN OR User_email=:email_IN");
    $stm->bindParam(":username_IN", $name);
    $stm->bindParam(":email_IN", $email);
    $stm->execute();
    $return = $stm->fetch();

    if ($return[0] < 1) {
        $salt = "*-+/12345678aqwsdertgyjh!#¤=)((";
        $password = md5($password . $salt);
        $sql = "INSERT INTO users (User_name,User_email,User_password) VALUES(:name_IN,:email_IN,:password_IN)";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(':name_IN', $name);
        $stm->bindParam(':email_IN', $email);
        $stm->bindParam(':password_IN', $password);
        if ($stm->execute()) {
            header("location:../index.php");
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Cannot signup!</div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">
        Username or email already exists!</div>';
        include_once("signup_form.php");
    }
}
