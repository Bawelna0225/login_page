<?php require_once "userDataController.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];

if(isset($_POST['postId'])) {
    $postId = $_POST['postId'];
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
    <title><?php echo $fetch_info['name'] ?> | Delete Post</title>
    <script src="./loadTheme.js" defer></script>

</head>
<body class='center'>
        <form class='delete-post' action="deletepost.php" method="POST" autocomplete="off">
        <h2>Are You Sure?</h2>
        <p>This action cannot be reverted</p>
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
        <div class="buttons">
            <button type='submit' value='<?php echo $postId ?>' name='confirm-delete'>Confirm</button>
            <a href='home.php'>Cancel</a>
        </div>
    </form>
</body>
</html>