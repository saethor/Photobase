<?php 

if (!isset($db_man)) 
{
    $error = 'Login facility unavailable. Please try later.';
} 
else 
{
    if ($db_man->validateUser($username, $password))
    {
        $_SESSION['authenticated'] = 'Jethro Tull';
        $_SESSION['start'] = time();
        session_regenerate_id();
    }

    // If the session variable has been set, redirect
    if (isset($_SESSION['authenticated'])) 
    {
        header("Location: $redirect");
        exit;
    } 
    else
    {
        $error = 'Invalid username or password';
    }
}