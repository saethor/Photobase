<?php 
require_once '../app/init.php';
require_once '../includes/session_timeout.php';

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