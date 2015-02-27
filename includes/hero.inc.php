<main class="hero" style="background: url(<?php echo $path . 'assets/images/' . $selected . '.jpg'; ?>) no-repeat center center fixed; background-size: cover; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;">
    <div class="container">

        <?php if ($dirname == 'login'): ?>

            
            <section class="section-contact" id="section-contact">

                <div class="row">
                    <!--     
                    <?php //if ($missing || $errors): // Alerts the user if missing field or error with a red banner ?>
                    <div class="alert alert-danger" role="alert">
                        <p class="warning">Plese fix the item(s) indicated.</p>
                    </div>

                    <?php //endif; ?>
 -->
                    <h2 class="section-title">Register</h2>
                    <?php
                    if (isset($result) || isset($errors) && !empty($result))
                    {
                        echo '<ul class="alert alert-danger" role="alert">';
                        if (!empty($errors))
                        {
                            foreach ($errors as $item) 
                            {
                                echo "<li>{$item}</li>";
                            }
                        }
                        else 
                        {
                            if (!empty($result))
                            echo "<li>{$result}</li>";
                        }
                        echo '</ul>';
                    }
                    ?>
                    <form class="contact" action="" method="post">

                        <div class="col-md-6 form-group">
                            <input type="text" id="firstname" name="firstname" class="form-control" 
                            <?php if ($missing || $errors) echo 'value="' . htmlentities($firstname) . '"'; ?>
                            >
                            <label for="firstname">
                                <?php if ($missing && in_array('firstname', $missing)): ?>
                                    <span class="warning">Please enter your firstname</span>
                                <?php else: ?>
                                    Firstname
                                <?php endif; ?>
                            </label>
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" id="lastname" name="lastname" class="form-control"
                            <?php if ($missing || $errors) echo 'value="' . htmlentities($lastname) . '"'; ?>
                            >
                            <label for="lastname">
                                <?php if ($missing && in_array('lastname', $missing)): ?>
                                    <span class="warning">Please enter your lastname</span>
                                <?php else: ?>
                                    Lastname
                                <?php endif ?>
                            </label>
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" id="username" name="username" class="form-control"
                            <?php if ($missing || $errors) echo 'value="' . htmlentities($username) . '"'; ?>
                            >
                            <label for="username">
                                <?php if ($missing && in_array('username', $missing)): ?>
                                    <span class="warning">Please choose your username</span>
                                <?php else: ?>
                                    Username
                                <?php endif ?>
                            </label>
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="email" id="email" name="email" class="form-control"
                            <?php if ($missing || $errors) echo 'value="' . htmlentities($email) . '"'; ?>
                            >
                            <label for="email">
                                <?php if ($missing && in_array('email', $missing)): ?>
                                    <span class="warning">Please enter your email address</span>
                                <?php else: ?>
                                    Email
                                <?php endif ?>
                            </label>
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="password" id="pwd" name="pwd" class="form-control">
                            <label for="pwd">
                                <?php if ($missing && in_array('pwd', $missing)): ?>
                                    <span class="warning">Please enter your password of choose</span>
                                <?php else: ?>
                                    Your Password
                                <?php endif ?>
                            </label>
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="password" id="conf_pwd" name="conf_pwd" class="form-control">
                            <label for="conf_pwd">
                                <?php if ($missing && in_array('conf_pwd', $missing)): ?>
                                    <span class="warning">Please enter your password again</span>
                                <?php else: ?>
                                    Your Password Again
                                <?php endif ?>
                            </label>
                        </div>

                        <div class="col-md-12 form-group">
                            <?php if ($missing && in_array('howHear', $missing)): ?>
                                <div class="alert alert-danger" role="alert">
                                <span class="warning">Please make a selection</span>
                                    
                                </div> 
                            <?php else: ?>
                                <p>How did your hear about us?</p>
                            <?php endif ?>
                            <select name="howHear" id="howHear" class="form-control">
                                <option value=""
                                    <?php 
                                    if (!$_POST || $_POST['howHear'] == '') echo 'selected';
                                    ?>>
                                    Select one
                                </option>
                                <option value="Google"
                                    <?php 
                                    if (isset($_POST['howHear']) && $_POST['howHear'] == 'Google') echo 'selected';
                                    ?>>
                                    Google
                                </option>
                                <option value="Facebook"
                                    <?php 
                                    if (isset($_POST['howHear']) && $_POST['howHear'] == 'Facebook') echo 'selected';
                                    ?>>
                                    Facebook
                                </option>
                                <option value="Twitter"
                                    <?php 
                                    if (isset($_POST['howHear']) && $_POST['howHear'] == 'Twitter') echo 'selected';
                                    ?>>
                                    Twitter
                                </option>
                            </select>

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
                    <form class="contact" method="post" action="<?php echo $path ?>sessions/login.php">
                        <div class="col-md-6 form-group">
                            <input type="text" name="username" id="username" class="form-control">
                            <label for="username">Your Username</label>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="password" name="password" id="password" class="form-control">
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