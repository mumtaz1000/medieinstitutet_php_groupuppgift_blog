<?php
include("../includes/partials/database_connection.php");

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordCheck = $_POST['passwordCheck'];
if ($password !== $passwordCheck) {
    echo "Both passwords are not same";
} else {
    $salt = "*-+/12345678aqwsdertgyjh!#¤=)((";
    $password = md5($password . $salt);

    $stm = $pdo->prepare("SELECT count(User_id),User_role FROM Users WHERE User_name=:username_IN OR User_email=:email_IN");
    $stm->bindParam(":username_IN", $username);
    $stm->bindParam(":email_IN", $email);
    $stm->execute();
    $return = $stm->fetch();

    if ($return[0] < 1) {
        $sql = "INSERT INTO users (User_name,User_email,User_password) VALUES(:name_IN,:email_IN,:password_IN)";
        $stm = $pdo->prepare($sql);
        $stm->bindParam(':name_IN', $name);
        $stm->bindParam(':email_IN', $email);
        $stm->bindParam(':password_IN', $password);
        if ($stm->execute()) {
            header("location:login_form.php");
        } else {
            echo "Cannot signup!";
        }
    } else {
        echo "Username or email already exists!";
        header("location:signup_form.php");
    }
}
