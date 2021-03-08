<?php
include_once("../includes/partials/head.php");
$connection = require("../classes/connection.php");
session_start();
if ($_SESSION['User_role'] == "Admin") {
    echo '<a href="all_post_option.php" class="btn btn-success">Admin menu</a>';
}
?>

<body>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h2>Millhouse</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="post_view_user_design.php">Home</a></li>
                    <li class=""><a href="#">View all</a></li>
                    <li><a href="post_form.php">Create new post</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul><br>

            </div>
            <?php $posts = $connection->getallPosts();  ?>
            <div class="col-sm-9">
                <?php foreach ($posts as $post) : ?>


                    <h2><small>POST</small></h2>
                    <hr>
                    <h2><?php echo $post['Post_title'] ?></h2>
                    <img class="card-img-top" src="<?php echo $post['Post_image'] ?>" alt="Post image" width="460" height="345">
                    <h5><span class="glyphicon glyphicon-time"></span>
                        Post by <?php $name = $connection->getUserName($post['Post_id']);
                                foreach ($name as $names) :
                                    echo $names['User_name'];
                                endforeach; ?>, <?php echo $post['Post_date'] ?>.</h5>
                    <h5><span class="label label-info"><?php echo $post['Post_category'] ?></span> </h5>

                    <p><?php echo $post['Post_description'] ?></p>
                    <br><br>
                    <a href="update_post_form.php?id=<?php echo $post['Post_id'] ?>" class="btn btn-primary">Edit post</a>
                    <form style="display:inline-block" action="delete_post_action.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $post['Post_id'] ?>">
                        <button type="submit" class="btn btn-danger">Delete post</button>
                    </form>

                    <hr>
                    <?php $comments = $connection->getComments($post['Post_id']);
                    // print_r($comments);
                    ?>
                    <h1><small> Comments:</small></h1><br>
                    <?php foreach ($comments as $comment) : ?>
                        <div class="row">
                            <div class="col-sm-10" style="background-color:beige;">
                                <h4><?php $name = $connection->getCommentUserName($comment['Comment_id']);
                                    foreach ($name as $names) :
                                        echo $names['User_name'];
                                    endforeach; ?> <small><?php echo $comment['Comment_date'] ?></small>
                                    <form class="form-close-icon" action="delete_comment_action.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $comment['Comment_id'] ?>">
                                        <button type="submit" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </form>
                                </h4>
                                <p><?php echo $comment['Comment_content'] ?></p>
                                <br>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach;  ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <footer class="container-fluid">
        <p>&copy; 2021 Mumtaz Fatima</p>
    </footer>

</body>

</html>