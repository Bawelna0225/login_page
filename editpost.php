<?php require_once "userDataController.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$postId = $_POST['postId'];
$postDataSql = "SELECT * FROM userposts WHERE post_id = $postId";
$run_query = mysqli_query($connection, $postDataSql);
if($run_query){
    $fetch_post_data = mysqli_fetch_assoc($run_query);
}

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
    <title><?php echo $fetch_info['name'] ?> | Edit Post</title>
</head>
<body>
    <form action="editpost.php" method="POST" autocomplete="off">
        <h2>Edit Post</h2>
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
            <input type="hidden" name='post-id' value='<?php echo $postId ?>'>
            <input class="form-control" type="text" name="post_title" value='<?php echo $fetch_post_data['title']?>' placeholder="Post Title" required>    
            <textarea class="form-control" name="post_content" placeholder="Post Content"><?php echo $fetch_post_data['content']?> </textarea>
            <input class="form-control button" type="submit" name="edit_post" value="Edit">
            <a href="home.php">I changed my mind</a>
    </form>
</body>
</html>