<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//Sign Up
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM userdata WHERE email = '$email'";
    $res = mysqli_query($connection, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);

        $insert_data = "INSERT INTO userdata (name, email, password)
                        values('$name', '$email', '$encpass')";
        $data_check = mysqli_query($connection, $insert_data);
        echo $data_check;
        if($data_check){
                $info = "Account successfully created!";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: home.php');
                exit();
            }
        else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
}
    //Log In
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $check_email = "SELECT * FROM userdata WHERE email = '$email'";
        $res = mysqli_query($connection, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: home.php');
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }


    // Change password
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE userdata SET password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($connection, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
?>