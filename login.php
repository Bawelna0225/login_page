<?php require_once "userDataController.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="login.php" method="POST" autocomplete="">
        <h2>Login Form</h2>
        <p>Login with your email and password.</p>
        <?php
        if(count($errors) > 0){
            ?>
            <div class="alert alert-danger">
                <?php
                foreach($errors as $showerror){
                    echo $showerror;
                }
                ?>
            </div>
            <?php
        }
        ?>
        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        <a href="#">Forgot password?</a>
        <input class="form-control button" type="submit" name="login" value="Login">
        <p>Not yet a member? <a href="sign_up.php">Signup now</a></p>
    </form>
</body>
</html>