<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <style>
        <style>
        body {
            font-family: Montserrat, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Montserrat, sans-serif;
            
        }

        .heading {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
    </style>
    </style>
    
</head>

<body>

<div class="container">
    <div class="heading">
    <h2>Register</h2>    
    </div>

    <form method="POST" action="index.php?c=User&a=register">

    <label for="firstName">First Name:</label>
    <input type="text" name="firstName"><br>

    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName"><br>

    <label for="telephoneNumber">Telephone Number:</label>
    <input type="text" name="telephoneNumber"><br>

    <label for="address">Address:</label>
    <input type="text" name="address"><br>
    
    <label for="postalCode">Postal Code:</label>
    <input type="text" name="postalCode"><br>

    <label for="username">Username:</label>
    <input type="text" name="username"><br>

    <label for="password">Password:</label>
    <input type="text" name="password"><br>

    <input type="submit" value="Register">

    </form>
    </div>
</body>
</html>