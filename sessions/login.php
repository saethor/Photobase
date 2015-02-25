<?php 

$error = '';
if (isset($_POST['login'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    // location of usernames and passwords
    $userlist = 'users.csv';

    // location to redirect on success
    $redirect = 'http://localhost/photobase/sessions/menu.php';

    require_once '../includes/authenticate.php';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logion</title>
</head>
<body>
<?php 
if ($error) {
    echo "<p>$error</p>";
}
?>
    <form method="post" action="">
        
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </p>

        <p>
            <label for="pwd">Password:</label>
            <input type="password" name="pwd" id="pwd">
        </p>

        <p>
            <input name="login" type="submit" value="login">
        </p>

    </form>
</body>
</html>