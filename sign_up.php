<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form">
        <form action="signup-user.php" method="POST" autocomplete="">
            <h2 class="text-center">Signup Form</h2>
            <p class="text-center">It's quick and easy.</p>
            <input type="text" name="name" placeholder="Full Name" required >
            <input type="email" name="email" placeholder="Email Address" required >
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="cpassword" placeholder="Confirm password" required>
            <input class="form-control button" type="submit" name="signup" value="Sign Up">
            <p>Already a member? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>