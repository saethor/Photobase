<?php 
session_start();

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
    <title>secret.php</title>
</head>
<body>
    Hello
</body>
</html>