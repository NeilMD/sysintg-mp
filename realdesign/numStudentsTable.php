<?php
	require_once('mydb_connect.php');
	
	date_default_timezone_set("Asia/Hong_Kong");
	$allstudents="select university, count(studentId) as numStudents
				  from student
				  group by university";
	$resultAS=mysqli_query($dbc,$allstudents);
	

?>

<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/horizontal-menu-template-nav/dt-basic-initialization.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2017 05:32:27 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
	<meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="PIXINVENT">
	<title>Student Data</title>
	<link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
	<link href="../../fonts.googleapis.com/css9764.css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<!-- BEGIN VENDOR CSS-->
	<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="app-assets/fonts/feather/sty`le.min.css">
	<link rel="stylesheet" type="text/css" href="app-assets/fonts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
	<!-- <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.html"> -->
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
	<!-- END Page Level CSS-->
	<!-- BEGIN Custom CSS-->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

	<!-- END Custom CSS-->
</head>
<body data-open="hover" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns ">



	<!-- ////////////////////////////////////////////////////////////////////////////-->

	<nav class="header-navbar navbar navbar-with-menu navbar-static-top navbar-dark bg-gradient-x-grey-blue navbar-border navbar-brand-center">
		<div class="navbar-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					<li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
					<li class="nav-item"><a href="index.html" class="navbar-brand"><img alt="stack admin logo" src="app-assets/images/logo/stack-logo-light.png" class="brand-logo">
						<h2 class="brand-text">Stack</h2></a></li>
						<li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
					</ul>
				</div>
			</div>

		</nav>


		<!-- Horizontal navigation-->
		<div role="navigation" data-menu="menu-wrapper" class="header-navbar navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border">
			<!-- Horizontal menu content-->
			<div data-menu="menu-container" class="navbar-container main-menu-content">
				<!-- include ../../../includes/mixins-->
				<ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
					<li  class=" nav-item"><a href="studentTable.php"  class="nav-link"><i class="ft-home"></i><span>Student Data</span></a>

					</li>
					<li class=" nav-item"><a href="univTable.php"	class=" nav-link"><i class="ft-monitor"></i><span>University Data</span></a>

					</li>
					
					<li class=" nav-item"><a href="numStudentsTable.php"  class=" nav-link"><i class="ft-monitor"></i><span>Number of Students</span></a>

					</li>
	
				</ul>
			</div>
			<!-- /horizontal menu content-->
		</div>





		<div class="app-content content container-fluid">
			<div class="content-wrapper">
				<div class="content-header row">
					<div class="content-header-left col-md-6 col-xs-12 mb-2">
						<h3 class="content-header-title mb-0">University Data</h3>
						<div class="row breadcrumbs-top">
							<div class="breadcrumb-wrapper col-xs-12">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a>
									</li>

									<li class="breadcrumb-item active">University Data
									</li>
								</ol>
							</div>
						</div>
					</div>

				</div>
				<div class="content-body"><!-- Zero configuration table -->


<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"></h4>
		</div>
		<div class="card-body collapse in">
			<div class="card-block">
				<div class="card-text">
					<table class="table table-striped table-bordered column-rendering">
						<thead>
							<tr>
								<th>University</th>
								<th>Number of Students</th>
							</tr>
						</thead>
						<tbody>
							<?php $total = 0; ?>
							<?php while($row=mysqli_fetch_array($resultAS,MYSQLI_ASSOC)): ?>
								<tr>
									<td><?php echo $row["university"] ?></td>
									<td><?php echo $row["numStudents"] ?></td>
								</tr>
								<?php $total = $total + $row["numStudents"]; ?>
							<?php endwhile; ?>
						</tbody>
						<tfoot>
							<tr>
								<td>Total: </td>
								<td><?php echo $total ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>

</div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->



<!--  <footer class="footer footer-static footer-light navbar-shadow">
<p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
</footer> -->

<!-- BEGIN VENDOR JS-->

<script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script type="text/javascript" src="app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>

<script src="app-assets/vendors/js/tables/jquery.dataTables.min.html" type="text/javascript"></script>
<!-- <script src="app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.html" type="text/javascript"></script> -->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script type="text/javascript" src="app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
<!-- <script src="app-assets/js/scripts/tables/datatables/datatable-basic.min.html" type="text/javascript"></script> -->
<!-- END PAGE LEVEL JS-->
<script type="text/javascript" src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
</body>
<script type="text/javascript">
	$(".table").DataTable({

	});
	$(document).ready(function(){
		$("#min-age").val("");
		$("#max-age").val("");
		$("#min-age").change(function(){
			console.log($(this).val());
			$("#max-age").attr("min",$(this).val());
		});
	});
</script>
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/horizontal-menu-template-nav/dt-basic-initialization.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2017 05:32:27 GMT -->
</html>