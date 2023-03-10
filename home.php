<?php require_once "userDataController.php"; ?>
<?php 
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM userdata WHERE email = '$email'";
    $run_Sql = mysqli_query($connection, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
    }
}else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="./script.js" defer></script>
    <script src="./theme-customizer.js" defer></script>
    <script src="./loadTheme.js" defer></script>
    <title><?php echo $fetch_info['name'] ?> | Home</title>
</head>
<body>
    <nav>
        <a class="logo" href="index.php">LOGO</a>
        <p class='username'><?php echo $fetch_info['name'] ?></p>
        
        <div class="buttons">
            <a href="createpost.php"><span class="material-symbols-outlined">post_add</span>Create Post</a>
            <a id='help-btn' href="help.php"><span class="material-symbols-outlined">help</span>Help</a>
            <?php 
                if($fetch_info['picture'] == '') {
                   echo "<button class='user-logo' data-user-logo id='user-logo'></button>";
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
    </nav>

    <div class="home">
        <?php 
            $user_details_sql = "SELECT * FROM userdetails WHERE id =". $fetch_info['id'];
            $run_user_details_sql = mysqli_query($connection, $user_details_sql);
            $fetch_user_details = mysqli_fetch_assoc($run_user_details_sql);
        ?>
        <h1>Welcome <span><?php echo $fetch_info['name'] ?></span></h1>
        <div class="layout">
            <div class="left-panel">
                <h3>Your Profile Picture</h3>
                <?php 
                if($fetch_info['picture'] == '') {
                   echo "<a href='changepicture.php' class='logo-container'><div class='user-logo' data-user-logo></div><div class='overlay'><span class='material-symbols-outlined'>photo_camera</span></div></a>";
                } else {
                    echo '<a href="changepicture.php" class="logo-container"><img src="upload/'. $fetch_info['picture'].'"><div class="overlay"><span class="material-symbols-outlined">photo_camera</span></div></a>';
                }
                ?>
                <h3>Introduction</h3>
                 <form action="home.php" class='layout_form' method="post">
                    <h4 style='color: var(--accent-color);'>Tell us about yourself</h4>
                    <label for="introduction">About <span style='color: var(--accent-color);'>*</span></label>
                    <textarea placeholder='Introduce Yourself' name='introduction' required><?php echo $fetch_user_details['introduction'] ?></textarea>
                    <label for="github_link">Github</label>
                    <input type="text" placeholder='https://github.com/...' value='<?php echo $fetch_user_details['github'] ?>' name='github_link'>
                    <label for="website_link">Website</label>
                    <input type="text" placeholder='https://yourwebsite' value='<?php echo $fetch_user_details['website'] ?>' name='website_link'>
                    <button type='submit' name='user_id' class='submit' value="<?php echo $fetch_info['id'] ?>">Submit</button>
                    <p><span style='color: var(--accent-color);'>*</span> required fields</p>
                </form>
            </div>
          
            <div class='posts'>
                <h3>Your Posts</h3>
                <div class="cards">
                    <?php 

                        $sql2 = "SELECT * FROM userdata WHERE email = '$email'";
                        $run_sql2 = mysqli_query($connection, $sql2);
                        $fetch_info = mysqli_fetch_assoc($run_sql2);
                        $id = $fetch_info['id'];

                        $sql3 = "SELECT * FROM userposts WHERE author_id='$id' ORDER BY post_id desc";
                        $fetch_posts = mysqli_query($connection, $sql3);
                        while ($row = mysqli_fetch_assoc($fetch_posts))
                        {
                            echo "<div class='card'>";
                                echo "<div class='forms'><form action='deletepost.php' method='POST' autocomplete='off'><button name='postId' type='submit' value='".$row['post_id']."'><span class='material-symbols-outlined'>delete</span></button></form><form action='editpost.php' method='POST' autocomplete='off'><input type='hidden' name='postId' value='".$row['post_id']."'><button><span class='material-symbols-outlined'>edit</span></button></form></div>";
                                echo "<h2>".$row['title']."</h2>";
                                echo "<p>".$row['content']."</p>";
                                echo "<div class='bottom'>";
                                    echo "<small>".$row['date_created']."</small>";
                                    echo "<b>".$fetch_info['name']."</b>";
                                echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>

            <div class="right-panel">
                <h3>Theme</h3>
                 <form class='layout_form' id='theme-form'>
                    <h4>Customize Your Colors</h4>
                    <div class="color-input">
                        <label for="introduction">Primary</label>
                        <input type="color" data-theme-option='primary-color'>
                    </div>
                    <div class="color-input">
                        <label for="introduction">Text</label>
                        <input type="color" data-theme-option='text-color'>
                    </div>
                    <div class="color-input">
                        <label for="introduction">Accent</label>
                        <input type="color" data-theme-option='accent-color'>
                    </div>
                    <div class="color-input">
                        <label for="introduction">Hover Accent</label>
                        <input type="color" data-theme-option='hover-accent-color'>
                    </div>
                    <div class="color-input">
                        <label for="introduction">Input Border</label>
                        <input type="color" data-theme-option='input-border-color'>
                    </div>
                    <div class="color-input">
                        <label for="introduction">Shadow Color</label>
                        <input type="color" data-theme-option='shadow-color'>
                    </div>
                    <p><span style='color: var(--accent-color);'>*</span> Be careful to not break your UI</p>
                    <button type='submit' class='submit'>Save</button>
                </form>
            </div>
        </div>
    </div>
   

</body>
</html>