<?php
$connection = require_once("../classes/connection.php");
try {
    $image = $_FILES ?? NULL;
    if ($image) {
        $upload_dir = "../images/";
        $target_file = $upload_dir . basename($image['postImage']['name']);

        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST['submit'])) {
            $check = getimagesize($image['postImage']['tmp_name']);
            if ($check == false) {
                echo "The file is not image";
                die;
            }
        }
        if ($image['postImage']['size'] > 1000000) {
            echo "The file is too big!";
            die;
        }
        if ($fileType != "png" && $fileType != "gif" && $fileType != "jpg" && $fileType != "jpeg") {
            echo "You can only upload PNG, GIF, JPG or JPEG.";
            die;
        }
        if (move_uploaded_file($image['postImage']['tmp_name'], $target_file)) {
            echo $target_file;
        } else {
            echo "Something goes wrong!";
            die;
        }
        $connection->updatePost($_POST, $target_file);
    } /*else {
        echo "No update image";
        $connection->updatePost($_POST, $_POST['postImage']);
    }
*/
    header("location:post_view_user_design.php");
} catch (PDOException $e) {
    echo "Error msg from update post action " . $e->getMessage();
}
