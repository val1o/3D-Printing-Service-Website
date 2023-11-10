<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>

    
</head>

<body>
    <h2>Add User</h2>    

    <form method="POST" action="index.php?c=User&a=register">

    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName"><br>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName"><br>

    <label for="telephoneNumber">Telephone Number:</label>
    <input type="text" name="telephoneNumber" id="telephoneNumber"><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address"><br>
    
    <label for="postalCode">Postal Code:</label>
    <input type="text" id="postalCode" name="postalCode"><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br>

    <label for="password">Password:</label>
    <input type="text" id="password" name="password"><br>

    <input type="submit" value="Register">

    </form>

</body>
</html>