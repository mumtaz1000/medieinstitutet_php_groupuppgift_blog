<?php


$id = $_POST['id'] ?? null;

if (!$id) {
    header("location:all_post_option.php");
    exit;
} else {
    try {
        $connection = require_once("../classes/connection.php");
    $connection->deletePost($id);
    } catch (PDOException $e) {
        echo "Error msg from delete post action " . $e->getMessage();
    }
}
