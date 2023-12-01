<?php $this->render("Shared", "header", ["css" => "loginPage", "title" => "Login Page"]); ?>

<div class="page-container">
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
    </div>

        <?php $this->render("Shared", "footer"); ?>