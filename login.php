<?php include "config.php";

if ($toogle_maintainance == 1) {
    echo "<script>window.location='" . base_url() . "/maintenis.php';</script>";
} else { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>FORMATIK - Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/logreg.css" />
        <link rel="icon" href="./images/aset/logo.png" type="image/x-icon">

    </head>

    <body>
        
        <div class="login-card"> <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>/images/aset/logo3.png" alt="LOGO FORMATIK" height="50"></a>
            <?php
            if (count($errors) > 0) { ?>
            <div class="error">
                <?php foreach ($errors as $error) { ?>
                    <p><?php echo $error ?></p>
                <?php } ?>
            </div>
            <?php } ?>
            <p class="profile-name-card"> </p>
            <form class="form-signin" method="post" action="login.php">
                <input class="form-control" type="text" name="username" required placeholder="Username" autofocus id="inputEmail" />
                <input class="form-control" type="password" name="password" required placeholder="Password" id="inputPassword" />
                <div class="checkbox">
                    <div class="checkbox">
                        <label><input type="checkbox">Remember me</input></label>
                    </div>
                </div>

                <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="login_user">Sign in</button>

            </form><a href="forgot_password.php" class="forgot-password">Forgot your password?</a>
            <a href="register.php">Daftar</a>
        </div>
    </body>

    </html>

<?php } ?>