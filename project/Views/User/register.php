<?php $this->render("Shared", "header", ["css" => "register", "title" => "Register Page"]); ?>

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

<?php $this->render("Shared", "footer"); ?>