<?php 
require_once '../app/init.php';
require_once '../includes/session_timeout.php';

use PhpSolutions\File\Upload;

// Loops through images in database in filters out used catagories
$tabs = [];
foreach ($db_man->imageList() as $key => $value) {
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
$max = 5120000;
if (isset($_POST['upload']))
{
    // Define the path to the upload folder
    $destination = '/Users/Saethor/Protjects/Photobase/user/images/';

    require_once '../PhpSolutions/File/Upload.php';
    
    try 
    {
        $loader = new Upload($destination);
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

    <?php require '../includes/nav.inc.php'; ?>

    <section class="section-contact" id="section-contact">

        <div class="row">
            <h2 class="section-title">Upload a new image</h2>
            
            <?php 
            if (isset($result)) 
            {
                echo '<ul class="alert alert-success" role="alert">';
                foreach ($result as $message) {
                    echo "<li>{$message}</li>";
                }
                echo '</ul>';
            } ?>
            <form method="post" enctype="multipart/form-data" id="uploadImage" class="">
                <div class="col-md-6 form-group">
                    <label for="image">Upload image</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?= $max; ?>">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                
                <div class="col-md-12 form-group">
                    <button type="submit" name="upload" class="btn btn-default">Upload</button>
                </div>

            </form>
        </div>

    </section>

    <section class="section-photos" id="section-photos">
        <div class="row" role="tabpanel">

        <?php if (empty($tabs)): ?>
            <h2 class="section-title">Engar myndir til að birta</h2>
        <?php else: ?>
            <h2 class="section-title">Nýjustu myndirnar þínar</h2>
            
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <!-- Counter checks if it is the first element, if so it adds the class active -->
                <?php $counter = 0;
                foreach ($tabs as $key): ?>
                    <li role="presentation"  class="<?php echo ($counter++ == 0) ? 'active' : ''; ?>">
                        <a href="#<?php echo $key ?>" aria-controls="<?php echo $key ?>" role="tab" data-toggle="tab"><?php echo ucfirst($key) ?></a>
                    </li>
                <?php endforeach ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                
                <!-- Counter checks if it is the first element, if so it adds the class active -->
                <?php $counter = 0; 
                foreach ($tabs as $key): ?>
                    <div role="tabpanel" class="tab-pane <?php echo ($counter++ == 0) ? 'active' : ''; ?>" id="<?php echo $key ?>">          
                    <?php foreach ($db_man->imageList() as $key2 => $value): 
                        if ($value[2] == $key): ?>                 
                        <div class="col-xs-6 col-sm-4 col-md-3 item">
                            <a href="<?php echo $path; ?>assets/images/<?php echo $db_man->getImageInfo($value[0])[2]; ?>">
                                <img src="<?php echo $path; ?>assets/images/<?php echo $db_man->getImageInfo($value[0])[2]; ?>" alt="<?php echo $db_man->getImageInfo($value[0])[3]; ?>">
                            </a>
                        </div> 
                    <?php endif; endforeach; ?>    
                    </div>
                <?php endforeach ?>
            
            </div>
        <?php endif ?>
        </div>
    </section>

    <section class="section-album" id="section-album">

        <div class="row">

            <h2 class="section-title">Nýjustu albúmin</h2>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo $path; ?>assets/images/london.jpg" alt="London 2014 Album" width="140" height="140">
                <h2>London 2014</h2>
                <p>Skelltum okkur til London um páskana 2014 þar sem orlofið var nýtt vel í misgáfaða hluti</p>
                <p><a class="btn btn-default" href="<?php echo $path; ?>albums/london_2014/" role="button">Skoða albúm &raquo;</a>
                </p>
            </div>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo $path; ?>assets/images/krit.jpg" alt="Krít 2013 Album" width="140" height="140">
                <h2>Krít 2013</h2>
                <p>Notuðum tækifærið að slappa aðeins af á grískueyjunni Krít áður en alvaran í Reykjavík verð að veruleika og langt og strangt frystihúsasumar var á enda.</p>
                <p><a class="btn btn-default" href="<?php echo $path; ?>albums/krit_2013/" role="button">Skoða albúm &raquo;</a>
                </p>
            </div>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo $path; ?>assets/images/bustadur.jpg" alt="Bústaðarferð 2013 Album" width="140" height="140">
                <h2>Bústaður 2013</h2>
                <p>Bústaðarferð rétt fyrir utan laugarvatn með Ragnheiði og Braga í febrúar 2013.</p>
                <p><a class="btn btn-default" href="<?php echo $path; ?>albums/bustadur_2013/" role="button">Skoða albúm &raquo;</a>
                </p>
            </div>

        </div>
        <!-- /.row -->

    </section>

    <?php include '../includes/footer.inc.php';?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo $path ?>assets/javascripts/bootstrap.min.js"></script>
    <script>
        $(function(){

            $('.contact .form-group .form-control').focusout(function() {

                var text_val = $(this).val();

                if(text_val === "") {
                    $(this).removeClass('has-value');
                } else {
                    $(this).addClass('has-value');
                }

            });

        });
    </script>

</body>

</html>