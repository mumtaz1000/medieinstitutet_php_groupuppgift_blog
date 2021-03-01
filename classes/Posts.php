<?php
include_once("../includes/partials/head.php");
?>
<h1>Creating Post</h1>
<form action="post_action.php" method="post">
    <div class="form-group">
        <label for="username">Title</label>
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
        <label for="exampleInputPassword">Picture</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>

    <button type="submit" class="btn btn-primary">Signup</button>
</form>

</body>

</html>