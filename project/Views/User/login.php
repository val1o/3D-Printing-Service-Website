<?php
    //Include ressources
    include_once "../connection.php";
    include_once "../Models/user.php";
    include_once "../Controllers/user_controller.php";


    //Start or resume session
    session_start();

    //Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        
        //Check if the username and password are set
        if (isset($_GET['username']) && isset($_GET['password'])){
            //Put them in vars if yes
            $username = $_GET['username'];
            $password = $_GET['password'];

            //Check if username and password are valid
            if(user::checkLoginUser($username, $password)){
                header("Location: ../Controllers/user_controller.php?action=viewAllUsers");
                exit;
            } else {
                echo '<script language="javascript">';
                echo 'alert("Please enter a valid username and password.")';
                echo '</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="login-container">
        <form action="login.php" method="get">
            <h2>Login</h2>
            <?php if (isset($error)) {
                echo '<p style="color: red;">' . $error . '</p>';
            } ?>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>

    
</body>

</html>