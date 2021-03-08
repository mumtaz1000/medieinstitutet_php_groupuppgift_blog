<?php
include_once("../includes/partials/head.php");
$connection = require("../classes/connection.php");
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