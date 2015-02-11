<?php
echo session_cache_limiter();

echo $_COOKIE['selected'];

$heroImages = ['hero1', 'hero2', 'hero3'];

if (isset($_COOKIE['selected'])) {

    do {

        $i = rand(0, (count($heroImages) - 1));

        $selected = $heroImages[$i];

    } while ($selected == $_COOKIE['selected']);

} else {
    $selected = $heroImages[0];
}

setcookie('selected', $selected);


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