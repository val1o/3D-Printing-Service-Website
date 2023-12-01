<?php $this->render("Shared", "header", ["css" => "profile", "title" => "Profile Page"]); ?>

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

            <form action="index.php?c=User&a=viewAllUsers" method="POST">
                <br>
                <button type="submit" name="viewAllUsers" class="manage">Manage Users</button>

            </form>

        <?php } else { ?>
            <p>Please Login before accessing your profile.</p>
        <?php } ?>
</div>

<?php $this->render("Shared", "footer"); ?>