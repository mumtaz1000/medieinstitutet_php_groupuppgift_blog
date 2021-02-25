<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login Form</title>
</head>

<body>
    <?php
    include("../includes/partials/database_connection.php");
    session_start();
    if (isset($_SESSION['username']) && (isset($_SESSION['password']))) {
        echo "<h1>Welcome " . $_SESSION['username'] . "</h1>";
        echo '<a href="">Logout</a>';
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

</body>

</html>