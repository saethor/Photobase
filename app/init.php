<?php
session_start();
$path = "/Photobase/";

$title = basename(dirname($_SERVER['PHP_SELF']));
$title = str_replace('_', ' ', $title);
$title = ucwords($title);
