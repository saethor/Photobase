<?php

require_once '../app/init.php';
require_once '../includes/session_timeout.php';

use PhpSolutions\Image\ThumbnailUpload;

// Max file size limit 
$max = 6000 * 1024; // 6000 KB
if (isset($_POST['upload']))
{
    // Define the path to the upload folder
    $destination = $db_man->getUser($_SESSION['user_id'])[4] . '/images/';
    $destinationThumb = $db_man->getUser($_SESSION['user_id'])[4] . '/images/thumbnails/';

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

<div class="row">
    
<?php foreach ($loader->returnImages() as $key => $value): ?>
    <div class="col-sm-12 col-md-4 col-lg-3">
        <div class="thumbnail">
            <img src="<?= $value ?>" class="img-responsive">
            <div class="caption">

                <div class="form-group">
                    <label for="image-name">Name:</label>
                    <input type="text" name="image-name" class="form-control" id="image-name">
                </div>

                <div class="form-group">
                    <label for="image-text">Description</label>
                    <textarea name="image-text" id="image-text" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="image-category">Category</label>
                    <select name="image-category" id="image-category" class="form-control">
                        <option value="">Choose a category</option>
                        <?php foreach ($db_man->categoryList() as $category): ?>
                            <option value="<?= $category[0] ?>">
                                <?= $category[1] ?>
                            </option>
                        <?php endforeach ?>
                    </select>  
                </div>

            </div>
        </div>
    </div>     
<?php endforeach ?>

</div>

</body>