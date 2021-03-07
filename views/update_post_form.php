<?php
include_once("../includes/partials/head.php");
$id = $_GET['id'] ?? null;

if (!$id) {
    header("location:all_post_option.php");
    exit;
} else {
    try {
        $connection = require_once("../classes/connection.php");
        $posts = $connection->getCurrentPost($id);
        foreach ($posts as $post) :
?>
            <h1>Creating Post</h1>
            <form action="update_post_action.php" method="post" enctype="multipart/form-data">
                <?php if ($post['Post_image']) : ?>
                    <img src="<?php echo $post['Post_image'] ?>" width="460" height="345">
                <?php endif; ?>
                <input type="hidden" name="postId" value="<?php echo $id ?>">

                <div class="form-group">
                    <label for="postTitle">Title</label>
                    <input type="text" class="form-control" name="postTitle" value="<?php echo $post['Post_title'] ?>">
                </div>
                <div class="form-group">
                    <label for="postCategory">Category</label>
                    <input type="text" class="form-control" name="postCategory" value="<?php echo $post['Post_category'] ?>">
                </div>
                <div class="form-group">
                    <label for="postDescription">Description</label>
                    <input type="textarea" class="form-control" name="postDescription" value="<?php echo $post['Post_description'] ?>">
                </div>
                <div class="form-group">
                    <label for="postImage">Image</label>
                    <input type="file" class="form-control" style="padding: 2px;" name="postImage"><br>
                </div>

                <button type="submit" class="btn btn-primary">Update Post</button>
            </form>

<?php endforeach;
    } catch (PDOException $e) {
        echo "Error msg from update post action " . $e->getMessage();
    }
}
?>