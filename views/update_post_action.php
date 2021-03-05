<?php

$id = $_GET['id'] ?? null;

if (!$id) {
    header("location:all_post_option.php");
    exit;
} else {
    try {
        $connection = require_once("../classes/connection.php");
        $connection->updatePost($id);
    } catch (PDOException $e) {
        echo "Error msg from update post action " . $e->getMessage();
    }
}
