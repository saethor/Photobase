<?php 
require_once '../app/init.php';
require_once '../includes/session_timeout.php';

use PhpSolutions\Image\ThumbnailUpload;

// Get userID
$userID = $_SESSION['user_id'];

// Loops through images in database in filters out used catagories
$tabs = [];
foreach ($db_man->imageList($userID) as $key => $value) {
    if (in_array($value[2], $tabs))
    {
        continue;
    }
    else 
    {
        array_push($tabs, $value[2]);
    }
}

// Max file size limit 
$max = 6000 * 1024; // 6000 KB
if (isset($_POST['upload']))
{
    // Define the path to the upload folder
    $destination = 'images/';
    $destinationThumb = 'images/thumbnails/';

    require_once '../PhpSolutions/Image/ThumbnailUpload.php';
    
    try 
    {
        $loader = new ThumbnailUpload($destination);
        $loader->setThumbDestination($destinationThumb);
        $loader->setMaxSize($max);
        $loader->setThumbSuffix('');
        $loader->upload();
        $result = $loader->getMessages();
    } 
    catch (Exception $e) 
    {
        echo $e->getMessage();
    }
}

include '../includes/usersView.php';
?>