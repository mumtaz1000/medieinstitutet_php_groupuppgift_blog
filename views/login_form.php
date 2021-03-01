<?php
include_once("../includes/partials/head.php");
?>

<?php
include("../includes/partials/database_connection.php");
session_start();
if (isset($_SESSION['username']) && (isset($_SESSION['password']))) {
    echo "<h1>Welcome " . $_SESSION['username'] . "</h1>";
    if (isset($_SESSION['User_role']) && $_SESSION['User_role'] == "Admin") {
        include_once('../includes/partials/header_admin.php');
    } else 
        if (isset($_SESSION['User_role']) && $_SESSION['User_role'] == "User") {
        echo "You are not admin.<br>";
        include_once('../classes/Posts.php');
    } else {
        echo "No user role to display.<br>";
    }
    echo '<a href="logout.php">Logout</a>';
    die();
}
?>
<h1>Login Form</h1>
<form action="login_action.php" method="post">
    <div class="form-group">
        <label for="exampleInputUsername">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username..." required>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

</div>
</div>
</div>
</div>


</body>

</html>