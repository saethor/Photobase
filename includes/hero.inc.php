<main class="hero" style="background: url(<?php echo $path . 'assets/images/' . $selected . '.jpg'; ?>) no-repeat center center fixed; background-size: cover; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;">
    <div class="container">

        <?php if ($dirname == 'login'): ?>

            
            <section class="section-contact" id="section-contact">

                <div class="row">

                    
                    <?php if ($missing || $errors): 
                    // Alerts the user if missing field or error with a red banner
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <p class="warning">Plese fix the item(s) indicated.</p>
                    </div>

                    <?php endif; ?>

                    <h2 class="section-title">Register</h2>
                    
                    <form class="contact" action="" method="post">
                        <div class="col-md-6 form-group">
                            <input type="text" id="firstname" name="firstname" class="form-control">
                            <label for="firstname">Firstname</label>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" id="lastname" name="lastname" class="form-control">
                            <label for="lastname">Lastname</label>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" id="username" name="username" class="form-control">
                            <label for="username">Username</label>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" id="email" name="email" class="form-control">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="password" id="password" name="password" class="form-control">
                            <label for="password">Your Password</label>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="password" id="password_again" name="password_again" class="form-control">
                            <label for="password">Your Password Again</label>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="submit" name="register" class="form-control">
                        </div>
                    </form>

                </div>
            </section>

            <section class="section-contact" id="section-contact">

                <div class="row">
                    <h2 class="section-title">Login</h2>        
                    <form class="contact">
                        <div class="col-md-6 form-group">
                            <input type="text" id="name" class="form-control">
                            <label for="name">Your Username</label>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="password" id="password" class="form-control">
                            <label for="password">Your Password</label>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="submit" class="form-control">
                        </div>
                    </form>
                </div>

            </section>
        <?php else: ?>
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
        <?php endif; ?>
    </div>
</main>
<!-- /.Hero -->