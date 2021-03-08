<?php
$connection = require_once("../classes/connection.php");
try {
    $image = $_FILES['size'] ?? null;
    if ($image) {
        $connection->updateImage($_FILES, $_POST['postId']);
    }
    $connection->updatePost($_POST);
} catch (PDOException $e) {
    echo "Error msg from update post action " . $e->getMessage();
}
