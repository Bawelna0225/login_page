<?php require_once "userDataController.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: login.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="./loadTheme.js" defer></script>
</head>
<body>
    <div class="wrapper">
        <?php 
        if(isset($_SESSION['info'])){
            ?>
            <div class="alert alert-success">
            <?php echo $_SESSION['info']; ?>
            </div>
            <?php
        }
        ?>
        <a href="home.php">Ok</a>
    </div>
</body>
</html>