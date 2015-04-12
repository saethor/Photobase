<?php 

require_once '../app/init.php';

// define error page
$error = '../404.html';

// define the path to the download folder
$filepath = __DIR__ . '/images/';

$getfile = NULL;

// Block any attempt to explore the filesystem
if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {
    $getfile = $_GET['file'];
}
else {
    header("location: $error");
    exit;
}

if ($getfile) {
    $downloadPath = $filepath . $getfile;
    // Check that it exists and is readable
    if (file_exists($downloadPath) && is_readable($downloadPath)) {
        // send the appropriate headers
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($downloadPath));
        header('Content-Disposition: attachment; filename=' . $getfile);
        header('Content-Transfer-Encoding: binary');

        // Output the file content
        readfile($downloadPath);
    }
    else {
        header("Location: {$error}");
    }
}