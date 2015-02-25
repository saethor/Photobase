<?php session_start(); 
ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php 
    //check whether session variable is set
    if (isset($_SESSION['username'])) {
        // if set, greet by name
        echo 'Hi, ' . $_SESSION['username'] . '. See, I remembered your name!';
        unset($_SESSION['name']);
        // invalidate the session cookie
        if (isset($_COOKIE['session_name'])) {
            setcookie(session_name(), '', time()-864000, '/');
        }
        ob_end_flush();
        // end session
        session_destroy();
        echo '<a href="login.php">Page 2</a>';
    } else {
        // Display if not recognized
        echo "Sorry, I don't know you <br/>";
        echo '<a href="../login/>Login</a>';
    }
    ?>
</body>
</html>