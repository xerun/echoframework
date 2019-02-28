<?php
    //$User=SQL_Select($Entity="User", $Where="U.UserUUID = {$_SESSION["UserUUID"]}", $OrderBy="", $SignleRow=true, $Debug=false);
    $BeforeEcho.='
        <link href="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
        <body class="account separate-inputs" data-page="login">
        <div class="container" id="login-block">
    ';
    $Echo.='
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <i class="user-img icons-faces-users-03"></i>
                        <form class="form-signin" method="post" id="app-form" action="'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script="loginaction").'" role="form">
                            <div class="append-icon">
                                <input type="text" name="UserName" id="username" class="form-control form-white username" placeholder="Username" required>
                                <i class="icon-user"></i>
                            </div>
                            <div class="append-icon m-b-20">
                                <input type="password" name="Password" class="form-control form-white password" placeholder="Password" required>
                                <i class="icon-lock"></i>
                            </div>
                            <button type="submit" id="submit-form" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-right">Sign In</button>
                            <!--<div class="social-btn">
                                <button type="button" class="btn-fb btn btn-lg btn-block btn-primary"><i class="icons-socialmedia-08 pull-left"></i>Connect with Facebook</button>
                                <button type="button" class="btn btn-lg btn-block btn-blue"><i class="icon-social-twitter pull-left"></i>Login with LinkedIn</button>
                            </div>-->
                            <div id="basic-preview" class="preview active" style="display:none">
                                <div class="alert media fade in alert-success">
                                    <p></p>
                                </div>
                            </div>
                            <div class="clearfix">
                                <p class="pull-left m-t-20"><a id="password" href="#">Forgot password?</a></p>
                                <p class="pull-right m-t-20">
                                    <a href="'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script="signup").'">New here? Sign up</a>
                                </p>
                            </div>
                        </form>
                        <form class="form-password" role="form" method="post" id="app-form" action="'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script="passwordrecoveraction").'">
                            <div class="append-icon m-b-20">
                                <input type="text" name="Email" class="form-control form-white password" placeholder="Email" required>
                                <i class="icon-lock"></i>
                            </div>
                            <button type="submit" id="submit-password" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-right">Send Password Reset Link</button>
                            <div id="basic-preview" class="preview active" style="display:none">
                                <div class="alert media fade in alert-success">
                                    <p></p>
                                </div>
                            </div>
                            <div class="clearfix">
                                <p class="pull-left m-t-20"><a id="login" href="#">Already got an account? Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="account-copyright">
                <span>Copyright <span class="copyright">&copy;</span> '.date("Y").' </span><span>'.$Application["Title"].'</span>.<span>All rights reserved.</span>
            </p>
        </div>
    ';
    $AfterEcho.='
        </div>
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/jquery-validation/jquery.validate.js"></script> <!-- Form Validation -->
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/jquery-validation/additional-methods.min.js"></script> <!-- Form Validation Additional Methods - OPTIONAL -->
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/backstretch/backstretch.min.js"></script>
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-loading/dist/spin.min.js"></script>
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/sweetalert2.min.js"></script>
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/pages/login-v1.js"></script>
    ';