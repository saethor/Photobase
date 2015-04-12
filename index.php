<?php require_once 'app/init.php'; 

if (isset($_SESSION['user_id'])) 
{
    header('Location: ../users/');
    exit;
} else {
    header('Location: login/');
    exit;
}
?>