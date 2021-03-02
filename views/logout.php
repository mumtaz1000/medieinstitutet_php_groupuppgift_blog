<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['User_role']);
unset($_SESSION['User_id']);
session_destroy();
header("location:login_form.php");
