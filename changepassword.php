<?php require_once "userDataController.php"; ?>
<?php 
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
$email = $_SESSION['email'];
if($email == false){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="./loadTheme.js" defer></script>
</head>
<body class='center'>
    <form action="changepassword.php" method="POST" autocomplete="off">
        <h2>Change Password</h2>
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
            <input class="form-control" type="password" name="password" placeholder="Create new password" required>    
            <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
            <input class="form-control button" type="submit" name="change-password" value="Change">
            <a href="home.php">I changed my mind</a>
    </form>
</body>
</html>