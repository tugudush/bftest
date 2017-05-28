<header id="header">
    <div class="wrap clearfix">
        <a id="logo" href="<?php echo $site_url; ?>"><img src="images/logo.png"></a>
        
        <form id="login-form" name="login_form" class="clearfix" action="error.php" method="post">
           
            <div id="username-group" class="form-group">
                <label for="username">Email or Phone</label>
                <input type="text" id="username" name="username">
            </div><!--/username-group-->
            
            <div id="password-group" class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <a id="forgot-link" href="#">Forgout account?</a>
            </div><!--/password-group-->
            
            <div id="submit-group" class="form-group">
                <input type="submit" id="submit" name="submit" value="Log In">
            </div><!--/submit-group-->
            
        </form><!--/login-form-->
    </div><!--/.wrap-->
</header>