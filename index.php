<?php require_once "userDataController.php"; ?>
<?php  
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        echo  $_SESSION['email'];
    } else {
        echo "nima sysji";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>