<?php 

require_once '../app/init.php';
require_once '../includes/session_timeout.php';

$userID = $_SESSION['user_id'];

if (isset($_GET['q']) && !empty($_GET['q']))
{
    $search = $db_man->searchImage($_GET['q']);
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
    <link href="<?php echo $path; ?>assets/stylesheets/lightbox.css" rel="stylesheet">


</head>

<body>

    <?php require '../includes/nav.inc.php'; ?>

    <?php include '../includes/upload.php'; ?>

    <?php include '../includes/searchView.php'; ?>

    <?php include '../includes/footer.inc.php';?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?= $path . 'assets/javascripts/lightbox.min.js' ?>"></script>
    <script src="<?php echo $path ?>assets/javascripts/bootstrap.min.js"></script>
    <script src="<?php echo $path ?>assets/javascripts/main.js"></script>
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