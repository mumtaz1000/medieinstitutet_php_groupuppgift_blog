<?php
include_once("../includes/partials/head.php");
?>

<body>
    <h1>SignUp Form</h1>
    <form action="signup_action.php" method="post">
        <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username..." required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Signup</button>
    </form>

</body>

</html>