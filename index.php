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

    <?php include 'includes/hero.inc.php'; ?>

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

    <?php include 'includes/footer.inc.php';
    ?>

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
