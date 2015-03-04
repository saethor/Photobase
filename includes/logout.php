<?php
require_once '../app/init.php';

$_SESSION = [];

// Invalidate the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 86400, '/');
}

// end session and redirect
session_destroy();
$redirect = $path . 'login/';
header("Location: {$redirect}");
exit;

?>