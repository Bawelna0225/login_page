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
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $fetch_info['name'] ?> | Create Post</title>
</head>
<body>
        <form action="createpost.php" method="POST" autocomplete="off">
        <h2>Create New Post</h2>
        <?php 
        if(isset($_SESSION['info'])){
            ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
            </div>
            <?php
        }
        ?>
        <?php
        if(count($errors) > 0){
            ?>
            <div class="alert alert-danger text-center">
                <?php
                foreach($errors as $showerror){
                    echo $showerror;
                }
                ?>
            </div>
            <?php
        }
        ?>
            <input class="form-control" type="text" name="post_title" placeholder="Post Title" required>    
            <textarea class="form-control" name="post_content" placeholder="Post Content"></textarea>
            <input class="form-control button" type="submit" name="change-password" value="Create">
            <a href="home.php">I changed my mind</a>
    </form>
</body>
</html>