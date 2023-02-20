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
        $current_date = date('Y-m-d');
        $insert_data = "INSERT INTO userdata (name, email, password, date_joined)
                        values('$name', '$email', '$encpass', '$current_date')";
        $insert_details = "INSERT INTO userdetails (introduction, github, website) values('', '', '')";
        mysqli_query($connection, $insert_details);
        $data_check = mysqli_query($connection, $insert_data);
        echo $data_check;
        if($data_check){
                $info = "Account successfully created!";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                if(isset($_SESSION['current_page'])) {
                    header("Location: ". $_SESSION['current_page']);
                } else {
                    header("Location: home.php");
                }
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
                if(isset($_SESSION['current_page'])) {
                    header("Location: ". $_SESSION['current_page']);
                } else {
                    header("Location: home.php");
                }
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
    // Create post
    if(isset($_POST['create_post'])){
        $_SESSION['info'] = "";
        $postTitle = mysqli_real_escape_string($connection, $_POST['post_title']);
        $postContent = mysqli_real_escape_string($connection, $_POST['post_content']);
        
        $email = $_SESSION['email']; //getting this email using session
        $sql2 = "SELECT * FROM userdata WHERE email = '$email'";
        $run_sql2 = mysqli_query($connection, $sql2);
        $fetch_info = mysqli_fetch_assoc($run_sql2);
        $authorId = $fetch_info['id'];
        $current_date = date('Y-m-d');
        $insert_post = "INSERT INTO userposts (post_id, author_id, title, content, date_created) VALUES (NULL, $authorId, '$postTitle', '$postContent', '$current_date')";
        $run_query = mysqli_query($connection, $insert_post);
        if($run_query){
            if(isset($_SESSION['current_page'])) {
                header("Location: ". $_SESSION['current_page']);
            } else {
                header("Location: home.php");
            }
        }else{
            $errors['db-error'] = "Failed to create post!";
        } 
    }

    // Edit post
    if(isset($_POST['edit_post'])){
        $_SESSION['info'] = "";

        $postId = mysqli_real_escape_string($connection, $_POST['post-id']);
        $postTitle = mysqli_real_escape_string($connection, $_POST['post_title']);
        $postContent = mysqli_real_escape_string($connection, $_POST['post_content']);
    
        $current_date = date('Y-m-d');
        $update_post = "UPDATE userposts SET title = '$postTitle', content = '$postContent', date_created = '$current_date' WHERE post_id = $postId";
        $run_query = mysqli_query($connection, $update_post);
        if($run_query){
            if(isset($_SESSION['current_page'])) {
                header("Location: ". $_SESSION['current_page']);
            } else {
                header("Location: home.php");
            }
        }else{
            $errors['db-error'] = "Failed to edit post!";
        } 
    }

    // Delete post
    if(isset($_POST['confirm-delete'])){
        $_SESSION['info'] = "";
        
        $postId = mysqli_real_escape_string($connection, $_POST['confirm-delete']);
        echo $postId;
        
        $delete = "DELETE FROM userposts WHERE post_id = $postId";
        $run_query = mysqli_query($connection, $delete);
        if($run_query){
            if(isset($_SESSION['current_page'])) {
                header("Location: ". $_SESSION['current_page']);
            } else {
                header("Location: home.php");
            }
        }else{
            $errors['db-error'] = "Failed to delete post!";
        }
        
    }
?>


<?php
    if(isset($_POST['crop_image'])){
        // delete old picture
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM userdata WHERE email = '$email'";
        $get_pic_name = mysqli_query($connection, $sql);
        $pic_name = mysqli_fetch_assoc($get_pic_name)['picture'];
        if($pic_name != '') {
            unlink("upload/$pic_name"); 
        }
        $data = $_POST['crop_image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $base64_decode = base64_decode($image_array_2[1]);
        $path_img = 'upload/'.time().'.png';
        $imagename = ''.time().'.png';
        file_put_contents($path_img, $base64_decode);
        $update_pic = "UPDATE userdata SET picture = '$imagename' WHERE email = '$email'";
        $run_query = mysqli_query($connection, $update_pic);
        if($run_query){
            if(isset($_SESSION['current_page'])) {
                header("Location: ". $_SESSION['current_page']);
            } else {
                header("Location: home.php");
            }
        }else{
            $errors['db-error'] = "Failed to change your picture!";
        }
    }
?>

<?php
if(isset($_POST['delete-picture'])){
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM userdata WHERE email = '$email'";
    $get_pic_name = mysqli_query($connection, $sql);
    $pic_name = mysqli_fetch_assoc($get_pic_name)['picture'];
    $status = unlink("upload/$pic_name");    
    if($status){  
        echo "File deleted successfully";    
    }else{  
        echo "Sorry!";    
    } 
    $delete_pic = "UPDATE userdata SET picture = '' WHERE email = '$email'";
    $run_query = mysqli_query($connection, $delete_pic);
    if($run_query){
        if(isset($_SESSION['current_page'])) {
            header("Location: ". $_SESSION['current_page']);
        } else {
            header("Location: home.php");
        }
    }else{
        $errors['db-error'] = "Failed to delete your picture!";
    }
}
?>
<?php
//add comment
    if(isset($_GET['send'])) {
        $postId = mysqli_real_escape_string($connection, $_GET['post_id']);
        $comment_content = mysqli_real_escape_string($connection, $_GET['comment']);
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        if($email != false && $password != false){
            $sql = "SELECT * FROM userdata WHERE email = '$email'";
            $run_Sql = mysqli_query($connection, $sql);
            if($run_Sql){
                $fetch_info = mysqli_fetch_assoc($run_Sql);
                    $date = date("Y-m-d H:i:s");
                    $userId = $fetch_info['id'];
                    $sql = "INSERT INTO `postcomments`(`comment_id`, `post_id`, `user_id`, `parent_comment_id`, `content`, `date_created`, `is_edited`) VALUES (NULL, $postId, $userId, NULL, '$comment_content', '$date' , 0)";

                    $run_query = mysqli_query($connection, $sql);
                    if($run_query){
                        header("Location: singlepost.php?post_id=$postId");
                    }else{
                        echo "Failed to add comment!";
                    } 
            }
        }else{
            $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
            header('Location: login.php');
        }
    }
?>
<?php
    if(isset($_GET['reply'])) {
        $postId = mysqli_real_escape_string($connection, $_GET['post_id']);
        $comment_content = mysqli_real_escape_string($connection, $_GET['comment']);
        $parent_comment_id = mysqli_real_escape_string($connection, $_GET['reply']);
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        if($email != false && $password != false){
            $sql = "SELECT * FROM userdata WHERE email = '$email'";
            $run_Sql = mysqli_query($connection, $sql);
            if($run_Sql){
                $fetch_info = mysqli_fetch_assoc($run_Sql);
                    $date = date("Y-m-d H:i:s");
                    $userId = $fetch_info['id'];
                    $sql = "INSERT INTO `postcomments`(`comment_id`, `post_id`, `user_id`, `parent_comment_id`, `content`, `date_created`, `is_edited`) VALUES (NULL, $postId, $userId, $parent_comment_id, '$comment_content', '$date' , 0)";
                    
                    $run_query = mysqli_query($connection, $sql);
                    if($run_query){
                        header("Location: singlepost.php?post_id=$postId");
                    }else{
                        echo "Failed to add comment!";
                    } 
            }
        }else{
            $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
            header('Location: login.php');
        }
    }
?>