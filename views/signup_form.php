<?php
include_once("../includes/partials/head.php");
?>
<h1>SignUp Form</h1>
<form action="signup_action.php" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username..." required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email..." required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <label for="exampleInputPasswordCheck">Re-enter Password</label>
        <input type="password" class="form-control" name="passwordCheck" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Signup</button>
</form>

</body>

</html>