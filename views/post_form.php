<?php
include_once("../includes/partials/head.php");

$connection = require_once("../classes/connection.php");
$posts = $connection->getPosts();
?>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h2>Millhouse</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="post_view_user_design.php">Home</a></li>
                    <li><a href="all_post.php">View all</a></li>
                    <li class="active"><a href="#">Create new post</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul><br>

            </div>


            <!-- mx-auto class will keep it in center-->
            <div class="col-sm-9 mx-auto">
                <div class="card card-body mt-5">
                    <div class="container-fluid">
                        <div class="row content">

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
                                    <input type="file" class="form-control" name="postImage" style="padding: 2px;"><br>
                                </div>

                                <button type="submit" class="btn btn-primary">New Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>