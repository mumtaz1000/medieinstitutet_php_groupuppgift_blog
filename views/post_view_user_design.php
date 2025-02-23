<?php
include_once("../includes/partials/head.php");
$connection = require("../classes/connection.php");
session_start();
if ($_SESSION['User_role'] == "Admin") {
    echo '<a href="all_post_option.php" class="btn btn-link">Admin menu</a>';
}
?>

<body>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h2>Millhouse</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#section1">Home</a></li>
                    <li><a href="all_post.php">View all</a></li>
                    <li><a href="post_form.php">Create new post</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul><br>

            </div>
            <?php

            $posts = $connection->getPosts();
            ?>
            <?php foreach ($posts as $post) : ?>

                <div class="col-sm-9">
                    <h4><small>RECENT POST</small></h4>
                    <hr>
                    <h2><?php echo $post['Post_title'] ?></h2>
                    <img class="card-img-top" src="<?php echo $post['Post_image'] ?>" alt="Post image" width="460" height="345">
                    <h5><span class="glyphicon glyphicon-time"></span>
                        Post by <?php
                                $name = $connection->getUserName($post['Post_id']);
                                foreach ($name as $names) :
                                    echo $names['User_name'];
                                endforeach; ?>, <?php echo $post['Post_date'] ?>.</h5>
                    <h5><span class="label label-info"><?php echo $post['Post_category'] ?></span></h5>
                    <p><?php echo $post['Post_description'] ?></p>
                    <br><br>
                    <hr>
                <?php endforeach; ?>
                <h4>Leave a Comment:</h4>
                <form role="form" method="post" action="comments_action.php?id=<?= $post['Post_id'] ?>">
                    <div class=" form-group">
                        <textarea class="form-control" rows="3" name="commentContent" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <br><br>
                <?php

                $comments = $connection->getComments($post['Post_id']);
                // print_r($comments);
                ?>
                <h3> Comments:</h3><br>
                <?php foreach ($comments as $comment) : ?>
                    <div class="row">
                        <div class="col-sm-10" style="background-color:beige;">
                            <h4><?php  $name = $connection->getCommentUserName($comment['Comment_id']);
                            foreach ($name as $names) :
                                echo $names['User_name'];
                            endforeach; ?>
                                <small><?php echo $comment['Comment_date'] ?></small></h4>
                            <p><?php echo $comment['Comment_content'] ?></p>
                            <br>
                        </div>
                    </div>
                    <hr>
                <?php endforeach;  ?>
                </div>
        </div>
    </div>

    <footer class="container-fluid">
        <p>&copy; 2021 Mumtaz Fatima</p>
    </footer>

</body>

</html>