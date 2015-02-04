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
                    <a class="navbar-brand" href="#">Photobase</a>
                </div>


                <div id="navbar" class="navbar-collapse collapse navbar-right">

                    <ul class="nav navbar-nav">
                        <li <?php echo ($dirname == 'Photobase') ? 'class="active"' : ''; ?> ><a href="<?php echo $path; ?>">Home</a>
                        </li>
                        <li <?php echo ($dirname == 'albums') ? 'class="active"' : ''; ?> ><a href="<?php echo $path; ?>albums">Albums</a>
                        </li>
                        <li><a href="#contact">Contact</a>
                        </li>
                    </ul>

                </div>


            </div>
        </nav>
    </div>
</div>
