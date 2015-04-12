<?php
$dirname = basename(dirname($_SERVER['PHP_SELF']));
?>

<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-default <?php echo ($dirname == 'users') ? 'user' : ''; ?>">
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
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $db_man->getUser($_SESSION['user_id'])[4]; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo $path . 'users/' ?>">Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $path . 'includes/logout.php'; ?>">Logout</a> 
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                    </ul>

                </div>


            </div>
        </nav>
    </div>
</div>
