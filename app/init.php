<?php
include_once "class.datamanager.php";
$db_man = new DatabaseManager('tsuts.tskoli.is','0505943279_picturebase','0505943279','saethor94');

$path = "/2t/0505943279/";

$title = basename(dirname($_SERVER['PHP_SELF']));
$title = str_replace('_', ' ', $title);
$title = ucwords($title);
