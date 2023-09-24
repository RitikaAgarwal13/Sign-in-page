<?php

$invalid = 0;
$login = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registration WHERE username='$username' and password='$password'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $login=1;
            session_start();
            $_SESSION['username'] = $username;
            header('location: welcome.php');
            } 
            else {
                $invalid = 1;
                }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php
if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Succcessfully, Logged in!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
if ($invalid) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Invalid credentials!</strong> Please check your username and password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
?>
<h1 class="text-center">Login Page</h1>
<div class="container mt-5">
    <form action="login.php" method="post">
        <div class="form-group mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Enter your username" name="username">
        </div>
        <div class="form-group mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <p>Don't have an account? <a href="sign.php">Register</a></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
