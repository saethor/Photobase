<?php 

Class User 
{
    private $_error;

    public function __constructor() 
    {

    }

    public function login($userlist, $username, $password, $redirect) 
    {
        if (!file_exists($userlist) || !is_readable($userlist)) 
        {
            $this->error = 'Login facility unavailable. Please try later.';
        } 
        else 
        {
            $file = fopen($userlist, 'r');

            // Loop through the remaining lines
            while (($data = fgetcsv($file)) !== false) 
            {
                // ignore if first element is null
                if (is_null($data[0])) 
                {
                    continue;
                }

                // If username and password match, create session variable,
                // regenerate the session ID, and break out of the loop
                if ($data[0] == $username && password_verify($password, $data[1])) 
                {
                    $_SESSION['authenticated'] = 'Jethro Tull';
                    $_SESSION['start'] = time();
                    session_regenerate_id();
                    break;
                }
            }
            fclose($file);

            // If the session variable has been set, redirect
            if (isset($_SESSION['authenticated'])) 
            {
                header("Location: $redirect");
                exit;
            } 
            else
            {
                $this->error = 'Invalid username or password';
            }
        }
    }

    public function logout() 
    {
        $_SESSION = [];

        // Invalidate the session cookie
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 86400, '/');
        }

        // end session and redirect
        session_destroy();
        header('Location: http://localhost/Photobase/login/');
        exit;
    }

    public function isLoggedIn() 
    {
        // set a time limit in seconds
        $timelimit = 15 * 60; // set the timeout to 15 minutes

        // Get the current time
        $now = time();

        // Where to redirect if rejected
        $redirect = 'http://localhost/Photobase/login/';

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
    }

}