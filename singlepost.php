<?php require_once "userDataController.php"; ?>
<?php  
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
        }else{
            header('Location: login.php');
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
    <?php 
        if ($isUserLoggedIn) {
        ?>
            <script src="./script.js" defer></script>
        <?php
        }
    ?>
    <title>Document</title>
</head>
<body>
    <?php 
        $postId = $_GET['post_id'];
    ?>
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
        <section class='post'>
                <?php 
                    $sql3 = "SELECT * FROM userposts WHERE post_id = '$postId'";
                    $fetch_data_query = mysqli_query($connection, $sql3);
                    $fetch_data =  mysqli_fetch_assoc($fetch_data_query);
                    echo "<div class='top'>";
                        echo "<p> Created on: ".$fetch_data['date_created']."</p>";
                        $authorId = $fetch_data['author_id'];
                        $select_author = "SELECT * FROM userdata WHERE id='$authorId'";
                        $run_sql = mysqli_query($connection, $select_author);
                        $fetch_info = mysqli_fetch_assoc($run_sql);
                        if($fetch_info['picture'] == '') {
                            echo "<div class='author'><p>Created by: </p>";
                        } else {
                            echo "<div class='author'><p>Created by: </p><img class='author_pic' src='upload/". $fetch_info['picture']."'>";
                        }
                        echo "<b>". $fetch_info['name']."</b></div>";
                    echo "</div>";
                    echo "<div class='post-content'>";
                        echo "<h1 class='title'>".$fetch_data['title']."</h1>";
                        echo "<p>".$fetch_data['content']."</p>";
                    echo "</div>";
                ?>
        </section>
        <section class='comments-section'>
            <h2>Leave Your Comment</h2>
            <form class='comment' action="singlepost.php" method='get' autocomplete='off'>
                <input type="hidden" name="post_id" value='<?php echo $postId ?>'>
                <textarea name="comment" id="" cols="30" rows="10" placeholder='Your Comment' required></textarea>
                <div class="buttons">
                    <button type="reset" value="reset">Cancel</button>
                    <button type='submit'>Submit</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>