<?php

function randHeroImg($previous) {
    $images = ['hero1', 'hero2', 'hero3'];

    $previous = array_search($previous, $images);

    unset($images[$previous]);
    $images = array_values($images);

    $i = rand(0, (count($images) - 1));

    return $images[$i];
}
do {
    $selected = randHeroImg($_SESSION['selected']);
} while ($selected == $_SESSION['selected']);

$_SESSION['selected'] = $selected;



?>


<main class="hero" style="background: url(<?php echo $path . 'assets/images/' . $selected . '.jpg'; ?>) no-repeat center center fixed;">
    <div class="container">

        <div class="hero-title">
            <h1><?php echo $heroTitle; ?></h1>
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
