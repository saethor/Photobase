<?php
$dirname = basename(dirname($_SERVER['PHP_SELF']));
?>

<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-default">
            <div class="container">


                <div class="navbar-header">
                    <button type="button" class="toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        Menu
                    </button>
                    <a class="navbar-brand" href="<?php echo $path ?>">Photobase</a>
                </div>


                <div id="navbar" class="navbar-collapse collapse navbar-right">

                    <ul class="nav navbar-nav">
                        <li <?php echo ($dirname == 'Photobase') ? 'class="active"' : ''; ?> >
                            <a href="<?php echo $path; ?>">Home</a>
                        </li>
                        <li <?php echo (($dirname == 'albums') || ($dirname == 'london_2014') || ($dirname == 'krit_2013') || ($dirname == 'bustadur_2013')) ? 'class="active"' : ''; ?> >
                            <a href="<?php echo $path; ?>albums">Albums</a>
                        </li>
                        <li <?php echo ($dirname == 'categories') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo $path; ?>categories">Categories</a>
                        </li>
                        <li <?php echo ($dirname == 'login') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo $path ?>login">Login</a>
                        </li>
                    </ul>

                </div>


            </div>
        </nav>
    </div>
</div>
