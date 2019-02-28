<?php
    $Entity="UserSignUp";
    $EntityLower=strtolower($Entity);

    $User=array("SignUpUserName"=>"", "SignUpUserEmail"=>"", "UserTypeID"=>0);

    $FormTitle="Register";
    $ButtonCaption="Proceed";
    $ActionURL=ApplicationURL($Theme=$_REQUEST["Theme"],$Script="signupaction");

	$Input=array();
    $Input[]=array("VariableName"=>"UserName", "DefaultValue"=>$User["UserName"], "Caption"=>"User Name", "ControlHTML"=>CTL_InputText("UserName", "", "", 61), "Required"=>true);
    $Input[]=array("VariableName"=>"Email", "DefaultValue"=>$User["UserEmail"], "Caption"=>"Email", "ControlHTML"=>CTL_InputText("Email", "", "", 61), "Required"=>true);
    $Input[]=array("VariableName"=>"Password", "DefaultValue"=>"", "Caption"=>"Password", "ControlHTML"=>CTL_InputPassword("Password", "", "", 61), "Required"=>true);
    $Input[]=array("VariableName"=>"ConfirmPassword", "DefaultValue"=>"", "Caption"=>"Confirm Password", "ControlHTML"=>CTL_InputPassword("ConfirmPassword", "", "", 61), "Required"=>true);

    //$Input[]=array("VariableName"=>"UserTypeID", "DefaultValue"=>$User["UserTypeID"], "Caption"=>"User Type", "ControlHTML"=>CCTL_UserTypeLookup($Name="UserTypeID", $ValueSelected=$User["UserTypeID"], $Where="UT.UserTypeID NOT IN ({$Application["UserTypeIDAdministrator"]}, {$Application["UserTypeIDGuest"]})", $PrependBlankOption=false), "Required"=>false);

	/*$Echo.=FormInsertUpdate(
		$EntityName=$EntityLower,
		$FormTitle,
		$Input,
		$ButtonCaption,
		$ActionURL
	);*/

$BeforeEcho.='
        <body class="account separate-inputs boxed" data-page="login">
        <div class="container" id="login-block">
    ';
$Echo.='
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3">
                    <div class="account-wall">
                        <i class="user-img icons-faces-users-03"></i>
                        <form class="form-signup" method="post" id="app-form" action="'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script="signupaction").'" role="form">
                            <div class="append-icon">
                                <input name="Name" id="Name" class="form-control form-white email" placeholder="Name" required="" type="text">
                                <i class="icon-user"></i>
                            </div>
                            <div class="append-icon">
                                <input name="Email" id="Email" class="form-control form-white email" placeholder="Email" required="" type="email">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="append-icon">
                                <input name="Password" id="Password" class="form-control form-white password" placeholder="Password" required="" type="password">
                                <i class="icon-lock"></i>
                            </div>
                            <div class="append-icon m-b-20">
                                <input name="ConfirmPassword" id="password2" class="form-control form-white password2" placeholder="Repeat Password" required="" type="password">
                                <i class="icon-lock"></i>
                            </div>
                            <div class="terms option-group">
                                <label  for="terms" class="m-t-10">
                                <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue"/>
                                I agree with terms and conditions
                                </label>
                            </div>
                            <button type="submit" id="submit-form" class="btn btn-lg btn-dark m-t-20" data-style="expand-left">Register</button>
                            <!--<div class="social-btn">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-lg btn-block btn-primary"><i class="fa fa-facebook pull-left"></i>Sign In with Facebook</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-lg btn-block btn-danger"><i class="fa fa-google pull-left"></i>Sign In with Google</button>
                                    </div>
                                </div>
                            </div>-->
                            <div class="clearfix">
                                <p class="pull-right m-t-20"><a href="'.ApplicationURL($Theme=$_REQUEST["Theme"],$Script="").'">Already have an account? Sign In</a></p>
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
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
        <script src="'.$Application["BaseURL"].'/library/jquery.datetimepicker.js" language="javascript" type="text/javascript" ></script>
        <script src="'.$Application["BaseURL"].'/theme/'.$_REQUEST["Theme"].'/js/pages/login-v1.js"></script>
    ';