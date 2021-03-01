<?php

$connection = require_once("../classes/connection.php");
try {
    $connection->addPost($_POST);
    header("location:post_form.php");
} catch (PDOException $e) {
    echo "Error msg from post action " . $e->getMessage();
}
