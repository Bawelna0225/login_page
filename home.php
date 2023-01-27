<?php require_once "userDataController.php"; ?>
<?php 
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
    <title><?php echo $fetch_info['name'] ?> | Home</title>
</head>
<body>
    <nav>
        <a class="logo" href="index.php">LOGO</a>
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
                <li><a href="changepicture.php"><span class="material-symbols-outlined">image</span>Change Profile Picture</a></li>
                <li><a href="changepassword.php"><span class="material-symbols-outlined">lock_reset</span>Change Your Password</a></li>
                <li><a href="logout.php"><span class="material-symbols-outlined">logout</span> Log out</a></li>
            </ul>
        </div>
    </nav>

    <div class="home">
        <h1>Welcome <span><?php echo $fetch_info['name'] ?></span></h1>
        <h3>Your Posts</h3>
         <div class="cards">
            <?php 

                $sql2 = "SELECT * FROM userdata WHERE email = '$email'";
                $run_sql2 = mysqli_query($connection, $sql2);
                $fetch_info = mysqli_fetch_assoc($run_sql2);
                $id = $fetch_info['id'];

                $sql3 = "SELECT * FROM userposts WHERE author_id='$id'";
                $fetch_posts = mysqli_query($connection, $sql3);
                while ($row = mysqli_fetch_assoc($fetch_posts))
                {
                    echo "<div class='card'>";
                        echo "<div class='forms'><form action='editpost.php' method='POST' autocomplete='off'><input type='hidden' name='postId' value='".$row['post_id']."'><button><span class='material-symbols-outlined'>delete</span></button></form><form action='editpost.php' method='POST' autocomplete='off'><input type='hidden' name='postId' value='".$row['post_id']."'><button><span class='material-symbols-outlined'>edit</span></button></form></div>";
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
   

</body>
</html>