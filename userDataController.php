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
?>