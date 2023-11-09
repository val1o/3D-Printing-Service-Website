<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" name="submit "value="Login">
    </form>
    <br>
    <form action="Views/register.php">
        <input type="submit" value="Register"/>
    </form>
</body>
</html>

<?php
    //Include ressources
    include_once "connection.php";
    include_once "Models/user.php";
    include_once "Controllers/user_controller.php";

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(user::checkLoginUser($username, $password)){
            header("Location: Controllers/user_controller.php?action=viewAllUsers");
            exit;
        } else {
            echo "Invalid username or password";
        }
    }


?>