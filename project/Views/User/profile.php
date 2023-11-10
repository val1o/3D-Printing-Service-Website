<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
    </style>
</head>
<body>

<div class="container">
    <h2>Profile Page</h2>
        <?php if($data[0]) { ?>
            <form action="index.php?c=User&a=profile" method="POST">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" required>

                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" required>

                <label for="telephonenumber">Telephone Number:</label>
                <input type="tel" id="telephonenumber" name="telephonenumber" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="postalcode">Postal Code:</label>
                <input type="text" id="postalcode" name="postalcode" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Update</button>
            </form>
        <?php } else { ?>
            <p>Please Login before accessing your profile.</p>
            <form action="index.php?c=User&a=profile" method="POST">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" disabled>

                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" disabled>

                <label for="telephonenumber">Telephone Number:</label>
                <input type="tel" id="telephonenumber" name="telephonenumber" disabled>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" disabled>

                <label for="postalcode">Postal Code:</label>
                <input type="text" id="postalcode" name="postalcode" disabled>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" disabled>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" disabled>

                <button type="submit">Update</button>
            </form>
        <?php } ?>
</div>

</body>
</html>