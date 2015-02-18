<?php
include_once "class.datamanager.php";
$db_man = new DatabaseManager('tsuts.tskoli.is','0505943279_picturebase','0505943279','saethor94');

$path = "/2t/0505943279/";

$title = basename(dirname($_SERVER['PHP_SELF']));
$title = str_replace('_', ' ', $title);
$title = ucwords($title);

session_start();
$heroTitle = "Web Album";

$heroImages = ['hero1', 'hero2', 'hero3'];

if (!isset($_SESSION['selected'])) {

    $_SESSION['selected'] = -1;

}

do {

    $i = array_rand($heroImages);
    $selected = $heroImages[$i];

} while ($selected == $_SESSION['selected']);

$_SESSION['selected'] = $selected;

?>