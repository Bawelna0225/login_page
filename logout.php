<?php
session_start();
if(isset($_SESSION['current_page'])) {
    $location = $_SESSION['current_page'];
} else {
   $location = 'index.php';
}
session_unset();
session_destroy();
header('location: ' . $location);
?>