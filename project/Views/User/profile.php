<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

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

        button .delete{
            background-color: #4caf50;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Profile Page</h2>
        <?php if(isset($user)) { ?>
            <form action="index.php?c=User&a=updateProfile" method="POST">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstName" value="<?= $user['firstName'] ?>" required>

                <label for="lastname">Last Name:</label>
                <input type="text" name="lastName" value="<?= $user['lastName'] ?>" required>

                <label for="telephonenumber">Telephone Number:</label>
                <input type="tel" name="telephoneNumber" value="<?= $user['telephoneNumber'] ?>" required>

                <label for="address">Address:</label>
                <input type="text" name="address" value="<?= $user['address'] ?>" required>

                <label for="postalcode">Postal Code:</label>
                <input type="text" name="postalCode" value="<?= $user['postalCode'] ?>" required>

                <label for="username">Username:</label>
                <input type="text" name="username" value="<?= $user['username'] ?>" required>

                <label for="password">Password:</label>
                <input type="password" name="password" value="<?= $user['password'] ?>" required>

                <button type="submit" name="update">Update</button>

            </form>

            <form action="index.php?c=User&a=deleteProfile" method="POST">
                <br>
                <button type="submit" name="delete" class="delete">Delete</button>

            </form>

        <?php } else { ?>
            <p>Please Login before accessing your profile.</p>
            <form action="index.php?c=User&a=updateProfile" method="POST">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstName" disabled>

                <label for="lastname">Last Name:</label>
                <input type="text" name="lastName" disabled>

                <label for="telephonenumber">Telephone Number:</label>
                <input type="tel" name="telephoneNumber" disabled>

                <label for="address">Address:</label>
                <input type="text" name="address" disabled>

                <label for="postalcode">Postal Code:</label>
                <input type="text" name="postalCode" disabled>

                <label for="username">Username:</label>
                <input type="text" name="username" disabled>

                <label for="password">Password:</label>
                <input type="password" name="password" disabled>
            </form>
        <?php } ?>
</div>

</body>
</html>