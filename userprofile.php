<?php require_once "userDataController.php"; ?>
<?php  
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        $isUserLoggedIn = true;
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        if($email != false && $password != false){
            $sql = "SELECT * FROM userdata WHERE email = '$email'";
            $run_Sql = mysqli_query($connection, $sql);
            if($run_Sql){
                $fetch_info = mysqli_fetch_assoc($run_Sql);
            }
        }
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="./createlogo.js" defer></script>
    <?php 
        if ($isUserLoggedIn) {
        ?>
            <script src="./script.js" defer></script>
        <?php
        }
        
        $userId = $_GET['user_id'];
        $sql = "SELECT * FROM userdata WHERE id = '$userId'";
        $run_sql = mysqli_query($connection, $sql);
        $fetch_user_info = mysqli_fetch_assoc($run_sql);
        
           
    ?>
    <title><?php echo "User | ". $fetch_user_info['name'];?></title>
</head>
<body>
    <nav>
        <a class="logo" href="index.php">LOGO</a>
        <?php
            if ($isUserLoggedIn) {
                ?>
                <p class='username'><?php echo $fetch_info['name'] ?></p>
                <div class="buttons">
                    <a href="createpost.php"><span class="material-symbols-outlined">post_add</span>Create Post</a>
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
                        <li><a href="home.php"><span class="material-symbols-outlined">cottage</span>Go to Home</a></li>
                        <li><a href="changepicture.php"><span class="material-symbols-outlined">image</span>Change Profile Picture</a></li>
                        <li><a href="changepassword.php"><span class="material-symbols-outlined">lock_reset</span>Change Your Password</a></li>
                        <li><a href="logout.php"><span class="material-symbols-outlined">logout</span> Log out</a></li>
                    </ul>
                </div>
        <?php
            } else {
                echo '
                <div class="buttons">
                    <a href="login.php"><span class="material-symbols-outlined">login</span>Log In</a>
                    <a href="sign_up.php"><span class="material-symbols-outlined">person_add</span>Sign Up</a>
                </div>';
            } 
        ?>
    </nav>
    <main>
        <section class='header'>
            <?php 
            if($fetch_user_info['picture'] == '') {
                echo "<div class='author'>";
                echo "<p class='authorname'>".$fetch_user_info['name']."</p>";
                $string = str_replace(' ', '', $fetch_user_info['name']);
                echo "<span class='".$string." authorlogo'></span>";
                
            } else {
                echo "<div class='author'><img class='author_pic' src='upload/". $fetch_user_info['picture']."'>";
            }
            echo "<div class='content'>";
                echo "<h2>". $fetch_user_info['name']."</h2>";
                echo "<p class='introduction'>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora amet ullam, ea perferendis nostrum modi dolor molestias facilis odio laborum? "."</p>";
                echo "<p><b>Joined on:</b> ". $fetch_user_info['date_joined']."</p>";
                echo "<div class='social'>";
                    echo "<p><b>Email:</b> ". $fetch_user_info['email']."</p>";
                    echo "<p><b>Github:</b> <a href='#'>https://github.com/bawelna0225 </a>"."</p>";
                    echo "<p><b>Website:</b> <a href='#'>https://pawel-czarnecki.com </a>"."</p>";
                echo "</div>";
            echo "</div>";
            ?>
        </section>
    </main>
</body>
</html>