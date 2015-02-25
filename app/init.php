<?php

include_once "class.datamanager.php";
$db_man = new DatabaseManager('tsuts.tskoli.is','0505943279_picturebase','0505943279','saethor94');

$path = "/Photobase/";

$title = basename(dirname($_SERVER['PHP_SELF']));
$title = str_replace('_', ' ', $title);
$title = ucwords($title);


$heroTitle = "Web Album";

session_start();
ob_start();

$heroImages = ['hero1', 'hero2', 'hero3'];

if (!isset($_SESSION['selected'])) {

    $_SESSION['selected'] = 'hero1';

}

do {

    $i = array_rand($heroImages);
    $selected = $heroImages[$i];

} while ($selected == $_SESSION['selected']);

unset($_SESSION['selected']);
$_SESSION['selected'] = $selected;

?>