<?php

$connection = require_once("../classes/connection.php");
try {
    $connection->addPost($_POST, $_FILES);
    //$connection->uploadImage($_FILES);
    header("location:post_view_user_design.php");
} catch (PDOException $e) {
    echo "Error msg from post action " . $e->getMessage();
}
