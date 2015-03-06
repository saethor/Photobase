<?php
/*
    LOGIN FORM
*/

use Photobase\Authenticate\CheckPassword;

require_once '../app/init.php';

// Checks if user is already loged in and redirects to right page
if (isset($_SESSION['authenticated'])) 
{
    header('Location: ../user/');
    exit;
}

$validationErrors = [];
$missing = [];
$error = '';

// Script to register a user
if (isset($_POST['register'])) 
{
    $firstname  = trim($_POST['firstname']);
    $lastname   = trim($_POST['lastname']);
    $email      = trim($_POST['email']);
    $username   = trim($_POST['username']);
    $password   = trim($_POST['pwd']);
    $retyped    = trim($_POST['conf_pwd']);
    require_once '../includes/register_user.php';

    // Expected fields, processing only expected variables so attacker can't inject other variables into the $_POST array.
    $expected = ['firstname', 'lastname', 'username', 'email', 'pwd', 'conf_pwd', 'howHear'];

    // Required fields
    $required = ['firstname', 'username', 'email', 'pwd', 'conf_pwd', 'howHear'];
    require '../includes/validationcheck.php';

}
if (isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    // location of usernames and passwords
    $userlist = '../sessions/encrypted.csv';

    // location to redirect on success
    $redirect = $path . 'user/';

    require_once '../includes/authenticate.php';
}

$heroTitle = $title;

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="<?php echo $path; ?>assets/stylesheets/main.css" rel="stylesheet">

</head>

<body>

    <?php require '../includes/nav.inc.php'; ?>

    <?php include '../includes/hero.inc.php'; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo $path ?>assets/javascripts/bootstrap.min.js"></script>
    <script>
        $(function(){

            $('.contact .form-group .form-control').focusout(function() {

                var text_val = $(this).val();

                if(text_val === "") {
                    $(this).removeClass('has-value');
                } else {
                    $(this).addClass('has-value');
                }

            });

        });
    </script>

</body>

</html>
