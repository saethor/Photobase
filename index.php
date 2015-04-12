<?php require_once 'app/init.php'; 

if (isset($_SESSION['user_id'])) 
{
    header("Location: {$path}users/");
    exit;
} else {
    header('Location: login/');
    exit;
}
?>