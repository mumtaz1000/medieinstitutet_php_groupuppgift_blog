<?php
include_once("../includes/partials/head.php");

$connection = require_once("../classes/connection.php");
$posts = $connection->getPosts();
?>
<h1>Creating Post</h1>
<form action="post_action.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="postTitle">Title</label>
        <input type="text" class="form-control" name="postTitle" placeholder="Title..." required>
    </div>
    <div class="form-group">
        <label for="postCategory">Category</label>
        <input type="text" class="form-control" name="postCategory" placeholder="Category..." required>
    </div>
    <div class="form-group">
        <label for="postDescription">Description</label>
        <input type="textarea" class="form-control" name="postDescription" placeholder="Description..." required>
    </div>
    <div class="form-group">
        <label for="postImage">Image</label>
        <input type="file" class="form-control" name="postImage"><br>
    </div>

    <button type="submit" class="btn btn-primary">New Post</button>
</form>
</div>
<br>
<br>
<?php foreach ($posts as $post) : ?>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?php echo $post['Post_image'] ?>" alt="Post image">
        <div class="card-body">
            <h5 class="card-title"><?php echo $post['Post_title'] ?></h5>
            <p class="card-text"><?php echo $post['Post_description'] ?></p>
        </div>
        <a class="btn btn-primary">
            <?php echo $post['Post_category'] ?></a>
        <div class="card-footer text-muted">
            <?php echo $post['Post_date'] ?>
        </div>
    </div>
    <br>
    <br>
<?php endforeach; ?>
</body>

</html>