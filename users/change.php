<?php 
require_once '../app/init.php';

$image = $db_man->getImageInfo($_GET['id']);
$redirect =  $redirect = $path . 'users/';

if (!(isset($_GET['id']) && !empty($image))) 
{
    // If there is no image id ore image is not available user is redirected
    header("Location: {$redirect}?error=yes");
    exit;
}

if (isset($_GET['save']))
{

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
    <!-- Navbar -->
    <?php include '../includes/nav.inc.php'; ?>
    
    <section class="section-contact" id="section-contact">
        <div class="row">
            <h2 class="section-title">Change image information</h2>

            <div class="col-xs-12 col-md-6 col-lg-4">
                <img src="<?= $image[2]; ?>" alt="<?= $image[3] ?>" class="img-responsive">
            </div>

            <div class="col-xs-12 col-md-6 col-lg-8">
                <form action="" method="post">

                    <div class="form-group">
                        <label for="image-name">Image Name</label>
                        <input type="text" name="image-name" class="form-control" id="image-name" value="<?= $image[1]; ?>">
                    </div>

                    <div class="form-group">
                        <label for="image-text">Image text</label>
                        <textarea name="image-text" id="image-text" class="form-control" cols="30" rows="10"><?= $image[3]; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image-categorie">Image Categorie</label>
                        <select name="image-categorie" id="image-categorie" class="form-control">
                            <?php foreach ($db_man->categoryList() as $categorie): ?>
                                <option value="<?= $categorie[0] ?>">
                                    <?= $categorie[1] ?>
                                </option>
                            <?php endforeach ?>
                        </select>  
                    </div>

                    <button type="submit" class="btn btn-success btn-lg pull-right">Save</button>
                
                </form>
            </div>
        </div>
    </section>
</body>
</html>
