<?php

require_once 'app/init.php';

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

    <?php include "includes/nav.inc.php"; ?>

    <main class="hero">
        <div class="container">

            <div class="hero-title">
                <h1>Web album</h1>
            </div>

            <div class="hero-footer">

                <div class="social-icons">
                    <a href="https://facebook.com/saethor94" target="_blank" class="social-icon">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/saethor94" target="_blank" class="social-icon">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://plus.google.com/u/0/+S%C3%A6%C3%BE%C3%B3rHallgr%C3%ADmsson/" target="_blank" class="social-icon">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a href="https://github.com/saethor" target="_blank" class="social-icon">
                        <i class="fa fa-github"></i>
                    </a>
                </div>

                <div class="scroll">
                    <a href="#section-album"><i class="fa fa-angle-double-down"></i></a>
                </div>

            </div>

        </div>
    </main>
    <!-- /.Hero -->



    <section class="section-album" id="section-album">

        <div class="row">

            <h2 class="section-title">Nýjustu albúmin</h2>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo $path; ?>assets/images/london.jpg" alt="London 2014 Album" width="140" height="140">
                <h2>London 2014</h2>
                <p>Skelltum okkur til London um páskana 2014 þar sem orlofið var nýtt vel í misgáfaða hluti</p>
                <p><a class="btn btn-default" href="<?php echo $path; ?>albums/london/" role="button">Skoða albúm &raquo;</a>
                </p>
            </div>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo $path; ?>assets/images/krit.jpg" alt="Krít 2013 Album" width="140" height="140">
                <h2>Krít 2013</h2>
                <p>Notuðum tækifærið að slappa aðeins af á grískueyjunni Krít áður en alvaran í Reykjavík verð að veruleika og langt og strangt frystihúsasumar var á enda.</p>
                <p><a class="btn btn-default" href="<?php echo $path; ?>albums/krit" role="button">Skoða albúm &raquo;</a>
                </p>
            </div>

            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo $path; ?>assets/images/bustadur.jpg" alt="Bústaðarferð 2013 Album" width="140" height="140">
                <h2>Bústaður 2013</h2>
                <p>Bústaðarferð rétt fyrir utan laugarvatn með Ragnheiði og Braga í febrúar 2013.</p>
                <p><a class="btn btn-default" href="<?php echo $path; ?>albums/bustadur" role="button">Skoða albúm &raquo;</a>
                </p>
            </div>

        </div>
        <!-- /.row -->

    </section>

    <section class="section-photos" id="section-photos">

        <div class="row">
            <h2 class="section-title">Nýjustu myndirnar</h2>

            <div class="col-xs-6 col-sm-4 col-md-3 item">
                <img src="<?php echo $path; ?>assets/images/thumbnails/SAM_0229_thumbnail.jpg" alt="">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 item">
                <img src="<?php echo $path; ?>assets/images/thumbnails/SAM_0286_thumbnail.jpg" alt="">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 item">
                <img src="<?php echo $path; ?>assets/images/thumbnails/SAM_0295_thumbnail.jpg" alt="">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 item">
                <img src="<?php echo $path; ?>assets/images/thumbnails/SAM_0258_thumbnail.jpg" alt="">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 item">
                <img src="<?php echo $path; ?>assets/images/thumbnails/SAM_0303_thumbnail.jpg" alt="">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 item">
                <img src="<?php echo $path; ?>assets/images/thumbnails/SAM_0319_thumbnail.jpg" alt="">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 item">
                <img src="<?php echo $path; ?>assets/images/thumbnails/SAM_0330_thumbnail.jpg" alt="">
            </div>

            <div class="col-xs-6 col-sm-4 col-md-3 item">
                <img src="<?php echo $path; ?>assets/images/thumbnails/SAM_0455_thumbnail.jpg" alt="">
            </div>

        </div>

    </section>

    <section class="section-contact" id="section-contact">

        <div class="row">
            <h2 class="section-title">Hafðu samband</h2>

            <form class="contact">
                <div class="col-md-6 form-group">
                    <input type="text" id="name" class="form-control">
                    <label for="name">Your name</label>
                </div>
                <div class="col-md-6 form-group">
                    <input type="email" id="email" class="form-control">
                    <label for="email">Your email</label>
                </div>
                <div class="col-md-12 form-group">
                    <textarea id="message" class="form-control" rows="10"></textarea>
                    <label for="message">Your message</label>
                </div>
                <div class="col-md-12 form-group">
                    <input type="submit" class="form-control">
                </div>

            </form>
        </div>

    </section>

    <?php include 'includes/footer.inc.php'; ?>

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
