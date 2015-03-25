<?php 

if (!isset($db_man)) 
{
    $error = 'Login facility unavailable. Please try later.';
} 
else 
{
    if ($userID = $db_man->validateUser($username, $password))
    {
        $_SESSION['user_id'] = $userID;
        $_SESSION['start'] = time();
        session_regenerate_id();
    }

    // If the session variable has been set, redirect
    if (isset($_SESSION['user_id'])) 
    {
        header("Location: $redirect");
        exit;
    } 
    else
    {
        $error = 'Invalid username or password';
    }
}