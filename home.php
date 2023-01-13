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
    <title><?php echo $fetch_info['name'] ?> | Home</title>
</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">Brand name</a>
        <div class="buttons">
            <button type="button" class="btn">Settings</button>
            <button type="button" class="btn"><a href="logout.php">Logout</a></button>
        </div>
    </nav>
    <div class="home">
        <h1>Welcome <span><?php echo $fetch_info['name'] ?></span></h1>
    </div>

</body>
</html>