<?php require_once 'app/init.php'; 

if (isset($_SESSION['authenticated'])) 
{
    header('Location: ../users/');
    exit;
} else {
    header('Location: login/');
    exit;
}
?>