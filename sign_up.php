<?php require_once "userDataController.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="sign_up.php" method="POST" autocomplete="">
        <h2>Signup Form</h2>
        <p>It's quick and easy.</p>
          <?php
            if(count($errors) == 1){
                ?>
                <div class="alert alert-danger">
                    <?php
                    foreach($errors as $showerror){
                        echo $showerror;
                    }
                    ?>
                </div>
                <?php
            }elseif(count($errors) > 1){
                ?>
                <div class="alert alert-danger">
                    <?php
                    foreach($errors as $showerror){
                        ?>
                        <li><?php echo $showerror; ?></li>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        <input type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
        <input type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="cpassword" placeholder="Confirm password" required>
        <input class="button" type="submit" name="signup" value="Sign Up">
        <p>Already a member? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>