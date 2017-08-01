<!DOCTYPE html>
<?php
session_start();
require_once('mydb_connect.php');
$_SESSION['username'] = NULL;

if (isset($_POST['submit'])){

$message=NULL;

 if (empty($_POST['username'])){
  $_SESSION['username']=FALSE;
  $message.='<p>You forgot to enter your username!';
 } else {
  $_SESSION['username']=$_POST['username']; 
 }

 if (empty($_POST['password'])){
  $_SESSION['password']=FALSE;
  $message.='<p>You forgot to enter your password!';
 } else {
  $_SESSION['password']=$_POST['password']; 
 }

 if(!isset($message)) {
	$query = "SELECT username FROM users WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."';";
	$result = mysqli_query($dbc, $query);
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $_SESSION['userID'] = $_POST['userID'];
        $_SESSION['username'] = $_POST['username'];
	}
 }
 if($_SESSION['username'] == 'user')  {
		header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/numStudentsTable.php");
	}
    else {
        header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/numStudentsTable.php");
    }
	
}

if (isset($message)){
 echo '<font color="red">'.$message. '</font>';
}

?>
    <html lang="en" data-textdirection="ltr" class="loading">

    <!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/horizontal-menu-template-nav/login-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2017 05:32:26 GMT -->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Login Page - System Integration</title>
        <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
        <link href="../../fonts.googleapis.com/css9764.css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/fonts/feather/style.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
        <!-- END VENDOR CSS-->
        <!-- BEGIN STACK CSS-->
        <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/app.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
        <!-- END STACK CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.min.html">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- END Custom CSS-->
    </head>

    <body data-open="hover" data-menu="horizontal-menu" data-col="1-column" class="horizontal-layout horizontal-menu 1-column  blank-page blank-page">
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header no-border">
                                    <div class="card-title text-xs-center">
                                        <div class="p-1"><img src="app-assets/images/logo/stack-logo-dark.png" alt="branding logo"></div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login</span></h6>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <form class="form-horizontal form-simple" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <input type="text" class="form-control form-control-lg input-lg" name="username" placeholder="Your Username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" required>
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control form-control-lg input-lg" name="password" placeholder="Enter Password" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group row">
                                                <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="">
                                        <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html" class="card-link">Recover password</a></p>
                                        <p class="float-sm-right text-xs-center m-0">New to Stack? <a href="register-simple.html" class="card-link">Sign Up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->

        <div class="customizer border-left-blue-grey border-left-lighten-4 hidden-lg-down"><a href="#" class="customizer-close"><i class="ft-x font-medium-3"></i></a><a href="#" class="customizer-toggle bg-danger"><i class="ft-cog font-medium-3 fa-spin fa fa-spin fa-fw white"></i></a>
            <div class="customizer-content p-2">
                <h4 class="text-uppercase mb-0">Theme Customizer</h4>
                <hr>
                <p>Customize & Preview in Real Time</p>
                <h5 class="mt-1">Layout Options</h5>
                <ul class="nav nav-tabs nav-underline nav-justified layout-options">
                    <li class="nav-item">
                        <a class="nav-link layouts active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21" href="#tabIcon21" aria-expanded="true">Layouts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navigation" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22" href="#tabIcon22" aria-expanded="false">Navigation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23" href="#tabIcon23" aria-expanded="false">Navbar</a>
                    </li>
                </ul>
                <div class="tab-content px-1 pt-1">
                    <div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true" aria-labelledby="baseIcon-tab21">
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="collapsed-sidebar" id="collapsed-sidebar" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Collapsed Menu</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="fixed-layout" id="fixed-layout" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Fixed Layout</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="boxed-layout" id="boxed-layout" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Boxed Layout</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="static-layout" id="static-layout" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Static Layout</span>
				</label>
                        </p>
                    </div>
                    <div class="tab-pane" id="tabIcon22" aria-labelledby="baseIcon-tab22">
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="native-scroll" id="native-scroll" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Native Scroll</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="right-side-icons" id="right-side-icons" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Right Side Icons</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="bordered-navigation" id="bordered-navigation" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Bordered Navigation</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="flipped-navigation" id="flipped-navigation" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Flipped Navigation</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="collapsible-navigation" id="collapsible-navigation" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Collapsible Navigation</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="static-navigation" id="static-navigation" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Static Navigation</span>
				</label>
                        </p>
                    </div>
                    <div class="tab-pane" id="tabIcon23" aria-labelledby="baseIcon-tab23">
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="brand-center" id="brand-center" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Brand Center</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-checkbox">
					<input type="checkbox" name="navbar-static-top" id="navbar-static-top" class="custom-control-input">
					<span class="c-indicator bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Static Top</span>
				</label>
                        </p>
                    </div>
                </div>
                <hr>
                <h5 class="mt-1">Navigation Color Options</h5>
                <ul class="nav nav-tabs nav-underline nav-justified color-options">
                    <li class="nav-item">
                        <a class="nav-link nav-semi-light active" id="color-opt-1" data-toggle="tab" aria-controls="clrOpt1" href="#clrOpt1" aria-expanded="false">Semi Light</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-semi-dark" id="color-opt-2" data-toggle="tab" aria-controls="clrOpt2" href="#clrOpt2" aria-expanded="false">Semi Dark</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-dark" id="color-opt-3" data-toggle="tab" aria-controls="clrOpt3" href="#clrOpt3" aria-expanded="false">Dark</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-light" id="color-opt-4" data-toggle="tab" aria-controls="clrOpt4" href="#clrOpt4" aria-expanded="true">Light</a>
                    </li>
                </ul>
                <div class="tab-content px-1 pt-1">
                    <div role="tabpanel" class="tab-pane active" id="clrOpt1" aria-expanded="true" aria-labelledby="color-opt-1">
                        <div class="row">
                            <div class="col-xs-6">
                                <h6>Solid</h6>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-blue-grey">
							<span class="bg-default custom-control-indicator"></span>
							<span class="custom-control-description">Default</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-primary">
							<span class="bg-primary custom-control-indicator"></span>
							<span class="custom-control-description">Primary</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-danger">
							<span class="bg-danger custom-control-indicator"></span>
							<span class="custom-control-description">Danger</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-success">
							<span class="bg-success custom-control-indicator"></span>
							<span class="custom-control-description">Success</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-blue">
							<span class="bg-blue custom-control-indicator"></span>
							<span class="custom-control-description">Blue</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-cyan">
							<span class="bg-cyan custom-control-indicator"></span>
							<span class="custom-control-description">Cyan</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-pink">
							<span class="bg-pink custom-control-indicator"></span>
							<span class="custom-control-description">Pink</span>
						</label>
                                </p>
                            </div>
                            <div class="col-xs-6">
                                <h6>Gradient</h6>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" checked class="custom-control-input default" data-bg="bg-gradient-x-grey-blue">
							<span class="bg-default custom-control-indicator"></span>
							<span class="custom-control-description">Default</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-gradient-x-primary">
							<span class="bg-primary custom-control-indicator"></span>
							<span class="custom-control-description">Primary</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-gradient-x-danger">
							<span class="bg-danger custom-control-indicator"></span>
							<span class="custom-control-description">Danger</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-gradient-x-success">
							<span class="bg-success custom-control-indicator"></span>
							<span class="custom-control-description">Success</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-gradient-x-blue">
							<span class="bg-blue custom-control-indicator"></span>
							<span class="custom-control-description">Blue</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-gradient-x-cyan">
							<span class="bg-cyan custom-control-indicator"></span>
							<span class="custom-control-description">Cyan</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-slight-clr" class="custom-control-input" data-bg="bg-gradient-x-pink">
							<span class="bg-pink custom-control-indicator"></span>
							<span class="custom-control-description">Pink</span>
						</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="clrOpt2" aria-labelledby="color-opt-2">
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-sdark-clr" checked class="custom-control-input default" data-bg="bg-default">
					<span class="bg-default custom-control-indicator"></span>
					<span class="custom-control-description">Default</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-primary">
					<span class="bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Primary</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-danger">
					<span class="bg-danger custom-control-indicator"></span>
					<span class="custom-control-description">Danger</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-success">
					<span class="bg-success custom-control-indicator"></span>
					<span class="custom-control-description">Success</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-blue">
					<span class="bg-blue custom-control-indicator"></span>
					<span class="custom-control-description">Blue</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-cyan">
					<span class="bg-cyan custom-control-indicator"></span>
					<span class="custom-control-description">Cyan</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-sdark-clr" class="custom-control-input" data-bg="bg-pink">
					<span class="bg-pink custom-control-indicator"></span>
					<span class="custom-control-description">Pink</span>
				</label>
                        </p>
                    </div>
                    <div class="tab-pane" id="clrOpt3" aria-labelledby="color-opt-3">
                        <div class="row">
                            <div class="col-xs-6">
                                <h3>Solid</h3>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" checked class="custom-control-input default" data-bg="bg-blue-grey">
							<span class="bg-default custom-control-indicator"></span>
							<span class="custom-control-description">Default</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-primary">
							<span class="bg-primary custom-control-indicator"></span>
							<span class="custom-control-description">Primary</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-danger">
							<span class="bg-danger custom-control-indicator"></span>
							<span class="custom-control-description">Danger</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-success">
							<span class="bg-success custom-control-indicator"></span>
							<span class="custom-control-description">Success</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-blue">
							<span class="bg-blue custom-control-indicator"></span>
							<span class="custom-control-description">Blue</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-cyan">
							<span class="bg-cyan custom-control-indicator"></span>
							<span class="custom-control-description">Cyan</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-pink">
							<span class="bg-pink custom-control-indicator"></span>
							<span class="custom-control-description">Pink</span>
						</label>
                                </p>
                            </div>

                            <div class="col-xs-6">
                                <h3>Gradient</h3>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-gradient-x-grey-blue">
							<span class="bg-default custom-control-indicator"></span>
							<span class="custom-control-description">Default</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-gradient-x-primary">
							<span class="bg-primary custom-control-indicator"></span>
							<span class="custom-control-description">Primary</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-gradient-x-danger">
							<span class="bg-danger custom-control-indicator"></span>
							<span class="custom-control-description">Danger</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-gradient-x-success">
							<span class="bg-success custom-control-indicator"></span>
							<span class="custom-control-description">Success</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-gradient-x-blue">
							<span class="bg-blue custom-control-indicator"></span>
							<span class="custom-control-description">Blue</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-gradient-x-cyan">
							<span class="bg-cyan custom-control-indicator"></span>
							<span class="custom-control-description">Cyan</span>
						</label>
                                </p>
                                <p>
                                    <label class="display-inline-block custom-control custom-radio">
							<input type="radio" name="nav-dark-clr" class="custom-control-input" data-bg="bg-gradient-x-pink">
							<span class="bg-pink custom-control-indicator"></span>
							<span class="custom-control-description">Pink</span>
						</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="clrOpt4" aria-labelledby="color-opt-4">
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-light-clr" checked class="custom-control-input default" data-bg="bg-blue-grey bg-lighten-4">
					<span class="bg-default custom-control-indicator"></span>
					<span class="custom-control-description">Default</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-light-clr" class="custom-control-input" data-bg="bg-primary bg-lighten-4">
					<span class="bg-primary custom-control-indicator"></span>
					<span class="custom-control-description">Primary</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-light-clr" class="custom-control-input" data-bg="bg-danger bg-lighten-4">
					<span class="bg-danger custom-control-indicator"></span>
					<span class="custom-control-description">Danger</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-light-clr" class="custom-control-input" data-bg="bg-success bg-lighten-4">
					<span class="bg-success custom-control-indicator"></span>
					<span class="custom-control-description">Success</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-light-clr" class="custom-control-input" data-bg="bg-blue bg-lighten-4">
					<span class="bg-blue custom-control-indicator"></span>
					<span class="custom-control-description">Blue</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-light-clr" class="custom-control-input" data-bg="bg-cyan bg-lighten-4">
					<span class="bg-cyan custom-control-indicator"></span>
					<span class="custom-control-description">Cyan</span>
				</label>
                        </p>
                        <p>
                            <label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="nav-light-clr" class="custom-control-input" data-bg="bg-pink bg-lighten-4">
					<span class="bg-pink custom-control-indicator"></span>
					<span class="custom-control-description">Pink</span>
				</label>
                        </p>
                    </div>
                </div>
                <hr>
                <h5 class="mt-1 mb-1">Menu Color Options</h5>
                <div class="form-group">
                    <!-- Outline Button group -->
                    <div class="btn-group customizer-sidebar-options" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary" data-sidebar="menu-light">Light Menu</button>
                        <button type="button" class="btn btn-outline-primary" data-sidebar="menu-dark">Dark Menu</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN VENDOR JS-->
        <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
        <script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
        <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
        <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.html" type="text/javascript"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN STACK JS-->
        <script src="app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
        <script src="app-assets/js/core/app.min.js" type="text/javascript"></script>
        <script src="app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
        <!-- END STACK JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
        <script src="app-assets/js/scripts/forms/form-login-register.min.html" type="text/javascript"></script>
        <!-- END PAGE LEVEL JS-->
    </body>

    <!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/horizontal-menu-template-nav/login-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2017 05:32:26 GMT -->

    </html>
