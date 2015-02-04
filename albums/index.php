<?php

require_once '../app/init.php';

$heroTitle = $title;

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

    <?php include '../includes/hero.inc.php'; ?>

    <section class="section-album" id="section-album">

        <div class="row">

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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/javascripts/bootstrap.min.js"></script>
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
