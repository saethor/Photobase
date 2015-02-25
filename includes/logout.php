<?php
// Run this script only if the logout button is clicked
if (isset($_POST['logout'])) {
    $_SESSION = [];

    // Invalidate the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 86400, '/');
    }

    // end session and redirect
    session_destroy();
    header('Location: http://localhost/Photobase/sessions/login.php');
    exit;
}
?>
<form method="post" action="">
    <input name="logout" type="submit" value="Log Out">
</form>