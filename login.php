<?php require_once "userDataController.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <script src="./passwd_visibility.js" defer></script>
</head>
<body class='center'>
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
        <div class="input">
            <input class="password" type="password" name="password" placeholder="Password" required>    
            <span class="material-symbols-outlined">
                visibility
            </span>
        </div>
        
        <a href="#">Forgot password?</a>
        <input class="form-control button" type="submit" name="login" value="Login">
        <p>Not yet a member? <a href="sign_up.php">Signup now</a></p>
    </form>
</body>
</html>