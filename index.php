<?php require_once "userDataController.php"; ?>
<?php  
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        $isUserLoggedIn = true;
    } else {
        $isUserLoggedIn = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a class="logo" href="#">LOGO</a>
        <?php
            if ($isUserLoggedIn) {
                ?>
                <p class='username'><?php echo $fetch_info['name'] ?></p>
                <div class="buttons">
                    <a href="createpost.php">Create Post</a>
                    <?php 
                        if($fetch_info['picture'] == '') {
                        echo "<button class='user-logo' id='user-logo'></button>";
                        } else {
                            echo '<button class="user-logo"><img class="user-logo" src="upload/'. $fetch_info['picture'].'"></button>';
                        }
                    ?>
                </div>
                <div class="dropdown">
                    <ul>
                        <li><a href="changepicture.php"><span class="material-symbols-outlined">image</span>Change Profile Picture</a></li>
                        <li><a href="changepassword.php"><span class="material-symbols-outlined">lock_reset</span>Change Your Password</a></li>
                        <li><a href="logout.php"><span class="material-symbols-outlined">logout</span> Log out</a></li>
                    </ul>
                </div>
        <?php
            } else {
                echo '
                <div class="buttons">
                    <a href="login.php">Log In</a>
                    <a href="sign_up.php">Sign Up</a>
                </div>';
            } 
        ?>
    </nav>
    <section></section>
</body>
</html>