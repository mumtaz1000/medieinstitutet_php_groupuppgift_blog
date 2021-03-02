<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h2>Millhouse</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#section1">Home</a></li>
                    <li><a href="post_form.php">Create new post</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul><br>

            </div>
            <?php
            $connection = require_once("../classes/connection.php");
            $posts = $connection->getPosts();
            ?>
            <?php foreach ($posts as $post) : ?>

                <div class="col-sm-9">
                    <h4><small>RECENT POSTS</small></h4>
                    <hr>
                    <h2><?php echo $post['Post_title'] ?></h2>
                    <img class="card-img-top" src="<?php echo $post['Post_image'] ?>" alt="Post image">
                    <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, <?php echo $post['Post_date'] ?>.</h5>
                    <h5><span class="label label-danger"><?php echo $post['Post_category'] ?></span> <span class="label label-primary">Ipsum</span></h5><br>
                    <p><?php echo $post['Post_description'] ?></p>
                    <br><br>
                    <hr>
                <?php endforeach; ?>
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <br><br>

                <p><span class="badge">2</span> Comments:</p><br>

                <div class="row">
                    <div class="col-sm-2 text-center">
                        <img src="bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                    </div>
                    <div class="col-sm-10">
                        <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
                        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <br>
                    </div>
                    <div class="col-sm-2 text-center">
                        <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                    </div>
                    <div class="col-sm-10">
                        <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
                        <p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <br>
                        <p><span class="badge">1</span> Comment:</p><br>
                        <div class="row">
                            <div class="col-sm-2 text-center">
                                <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                            </div>
                            <div class="col-xs-10">
                                <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
                                <p>Me too! WOW!</p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>

    <footer class="container-fluid">
        <p>Footer Text</p>
    </footer>

</body>

</html>