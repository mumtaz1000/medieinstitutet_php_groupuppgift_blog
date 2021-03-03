<?php

$connection = require_once("../classes/connection.php");
try {
    $connection->addComments($_POST, $_GET);
    header("location:post_view_user_design.php");
} catch (PDOException $e) {
    echo "Error msg from post action " . $e->getMessage();
}
