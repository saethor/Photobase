<?php 


// set a time limit in seconds
$timelimit = 15 * 60; // set the timeout to 15 minutes

// Get the current time
$now = time();

// Where to redirect if rejected
$redirect = $path . 'login/';

// If session variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) 
{
    header("Location: {$redirect}");
    exit;
}
elseif ($now > $_SESSION['start'] + $timelimit)
{
    // If timelimit has expired, destroy session and redirect
    $_SESSION = [];

    // Invalidate the session cookie
    if (isset($_COOKIE[session_name()])) 
    {
        setcookie(session_name(), '', time()-86400, '/');
    }

    // End session and redirect with query string
    session_destroy();
    header("Location: {$redirect}?expired=yes");
    exit;
} 
else
{
    // if it's got this far, it's OK, so update start time
    $_SESSION['start'] = time();
}
?>