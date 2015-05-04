<?php

include_once __DIR__ . "/../PhpSolutions/Database/DatabaseManager.php";
use PhpSolutions\Database\DatabaseManager;
$db_man = new DatabaseManager('tsuts.tskoli.is','0505943279_picturebase','0505943279','saethor94');

$path = "/Photobase/";

$title = basename(dirname($_SERVER['PHP_SELF']));
$title = str_replace('_', ' ', $title);
$title = ucwords($title);


$heroTitle = "Web Album";
$heroImages = ['hero1', 'hero2', 'hero3'];
$selected = $heroImages[0];

session_start();
ob_start();

?>