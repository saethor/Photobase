<?php
$dirname = basename(dirname($_SERVER['PHP_SELF']));
?>

<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-default <?php echo ($dirname == 'users') ? 'user' : ''; ?>">
            <div class="container">


                <div class="navbar-header">

                <?php if (isset($_SESSION['user_id'])): ?>
                    <button type="button" class="toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        Menu
                    </button>
                <?php endif ?>

                    <a class="navbar-brand" href="<?php echo $path ?>">Photobase</a>
                </div>

                <?php if (isset($_SESSION['user_id'])): ?>

                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo $path . 'users/' ?>">Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo $path . 'includes/logout.php'; ?>">Logout</a> 
                        </li>
                    </ul>
                </div>
                <?php endif ?>
            </div>
        </nav>
    </div>
</div>
