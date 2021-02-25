<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Signup Form</title>
</head>

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