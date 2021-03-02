<?php
include_once("../includes/partials/head.php");

$connection = require_once("../classes/connection.php");
$posts = $connection->getPosts();
?>
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
</div>
</body>

</html>