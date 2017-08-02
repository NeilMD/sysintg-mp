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
                                    <!-- <div class="card-title text-xs-center">
                                        <div class="p-1"><img src="app-assets/images/logo/stack-logo-dark.png" alt="branding logo"></div>
                                    </div> -->
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
                                           
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                </div>
                               <!--  <div class="card-footer">
                                    <div class="">
                                       
                                        <p class="float-sm-right text-xs-center m-0">New to Stack? <a href="register-simple.html" class="card-link">Sign Up</a></p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->

        
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
