<?php 
session_start();
ob_start();

// If session variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) {
    header('Location: http://localhost/Photobase/sessions/login.php');
    exit;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu.php</title>
</head>
<body>
    Hello
    <?php include '../includes/logout.php'; ?>
</body>
</html>