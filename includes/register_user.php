<?php

use Photobase\Authenticate\CheckPassword;

require_once __DIR__ . '/../PhpSolutions/Authenticate/CheckPassword.php';

$usernameMinChars = 6;
$errors = [];

if (strlen($username) < $usernameMinChars) 
{
    $errors[] = "Username must be at least $usernameMinChars characters.";
}

if (preg_match('/\s/', $username)) 
{
    $errors[] = 'Username should not contain spaces.';
}

$checkPwd = new CheckPassword($password);
$checkPwd->requireMixedCase();
$checkPwd->requireNumbers(2);
$checkPwd->requireSymbols();
$passwordOK = $checkPwd->check();

if (!$passwordOK) 
{
    $errors = array_merge($errors, $checkPwd->getErrors());
}

if ($password != $retyped) 
{
    $errors[] = "Your passwords don't match.";
}

if (!$errors) 
{
    // encrypt password using default encryption
    // $password = password_hash($password, PASSWORD_DEFAULT);
    
    if ($db_man->newUser($firstname, $lastname, $email, $username, $password))
    {
        $result = "$username registered.";
    }
    else
    {
        $result = "$username taken - choose a different username.";
    }
}