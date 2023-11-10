<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Home/style.css">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <style>
        body {
    background-color: #f2f2f2;
    font-family: Montserrat, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    height: 30px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}

input[type="submit"] {
    background-color: #344966;
    color: #fff;
    border: none;
    padding: 10px 0;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

p {
    color: red;
    margin: 10px 0;
    font-weight: bold;
}



    </style>
</head>

<body>
    <div class="login-container">
        <?php if(!isset($user)) {?>
        <form action="index.php?c=User&a=login" method="POST">
            <h2>Login</h2>
            <?php if (isset($error)) {
                // echo '<p style="color: red;">' . $error . '</p>';
            } ?>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Login">
        </form>
        <?php } else {?>
            <h2>Login</h2>
            <?= "<p>You are already logged in " . $user['username'] . " living at " . $user['address'] . ".</p>" ?>
        <?php }?>
    </div>

    

    
</body>

</html>