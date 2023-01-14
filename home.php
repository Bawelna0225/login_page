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
        <a class="logo" href="#">LOGO</a>
        <p class='username'><?php echo $fetch_info['name'] ?></p>
        <button class='user-logo'></button>
        <div class="dropdown">
            <ul>
                <li><a href="changepassword.php"><span class="material-symbols-outlined">lock_reset</span>Change Your Password</a></li>
                <li><a href="logout.php"><span class="material-symbols-outlined">logout</span> Log out</a></li>
            </ul>
        </div>
    </nav>

    <div class="home">
        <h1>Welcome <span><?php echo $fetch_info['name'] ?></span></h1>
    </div>

</body>
</html>