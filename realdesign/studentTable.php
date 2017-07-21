<?php
	require_once('mydb_connect.php');
	
	date_default_timezone_set("Asia/Hong_Kong");
	$data = array();
	$finaldata = array();
	
	$data2 = array();
	$finaldata2 = array();
	
	if(isset($_POST['submit'])){
		if(isset($_POST['minage']) && isset($_POST['maxage'])){
			$minage = $_POST['minage'];
			$maxage = $_POST['maxage'];
			if(isset($_POST['univ']) && count($_POST['univ']) > 0){
				for($cnt=0; $cnt < count($_POST['univ']); $cnt++){
					$univ = $_POST['univ'][$cnt];
					
					$students="select firstName as firstname, surname as lastname, birthday, university
							   from student
							   where university = '{$univ}'";
					$resultS=mysqli_query($dbc,$students);
					
					while($row=mysqli_fetch_array($resultS,MYSQLI_ASSOC)){
						array_push($data,$row);
					}
					
					for($x = 0; $x < count($data); $x++){
						$temp = date_diff(date_create($data[$x]['birthday']), date_create('today'))->y;
						if($temp >= $minage && $temp <= $maxage){
							$lastname = $data[$x]['lastname'];
							$firstname = $data[$x]['firstname'];
							$age = $temp;
							$birthday = $data[$x]['birthday']; 
							$univ = $data[$x]['university'];
							array_push($finaldata,$lastname);
							array_push($finaldata,$firstname);
							array_push($finaldata,$age);
							array_push($finaldata,$birthday);
							array_push($finaldata,$univ);
						} 
					}
					
					
					
				}
			}
			
			if(isset($_POST['univall']) && count($_POST['univall']) > 0){
				$allstudents="select firstName as firstname, surname as lastname, birthday, university
						      from student";
				$resultAS=mysqli_query($dbc,$allstudents);
				
				while($row=mysqli_fetch_array($resultAS,MYSQLI_ASSOC)){
					array_push($data2,$row);
				}
				
				for($x = 0; $x < count($data2); $x++){
					$temp = date_diff(date_create($data2[$x]['birthday']), date_create('today'))->y;
					if($temp >= $minage && $temp <= $maxage){
						$lastname = $data2[$x]['lastname'];
						$firstname = $data2[$x]['firstname'];
						$age = $temp;
						$birthday = $data2[$x]['birthday']; 
						$univ = $data2[$x]['university'];
						array_push($finaldata2,$lastname);
						array_push($finaldata2,$firstname);
						array_push($finaldata2,$age);
						array_push($finaldata2,$birthday);
						array_push($finaldata2,$univ);
					} 
				}
			
			}
			
			
		}
	}
	

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
          <li class=" nav-item"><a href="univTable.php"  class=" nav-link"><i class="ft-monitor"></i><span>University Data</span></a>

          </li>
		  
		  <li class=" nav-item"><a href="numStudentsTable.php"  class=" nav-link"><i class="ft-monitor"></i><span>Number of Students</span></a>

          </li>

        </ul>
      </div>
      <!-- /horizonta
      <!-- /horizontal menu content-->
    </div>





    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Student Data</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>

                  <li class="breadcrumb-item active">Student Data
                  </li>
                </ol>
              </div>
            </div>
          </div>

        </div>
        <div class="content-body"><!-- Zero configuration table -->

          <div class="col-md-3">
            <div class="card">
<!-- <div class="card-header">
<h4 class="card-title">Search</h4>
</div> -->
<div class="card-body collapse in">
  <div class="card-block">
    <div class="card-text" style="text-align: center;">
<!-- <fieldset class="form-group position-relative has-icon-right mb-0">
<input class="form-control  " id="user-name" placeholder="Search" required="" type="text">
<div class="form-control-position">

</div>

</fieldset> -->
<form method="post">
	<div class="col-md-12" style="margin-bottom: 10px;margin-top: 10px" >
	  <h3 class="card-title right">University</h3>

	  <div class="col-md-6 " style="text-align: left">
		<fieldset class="checkboxsas">
		  <label>
			<input value="De La Salle University" name="univ[]" type="checkbox">
			DLSU
		  </label>
		</fieldset>
		<fieldset class="checkboxsas">
		  <label>
			<input value="Ateneo De Manila University" name="univ[]" type="checkbox">
			ADMU
		  </label>
		</fieldset>
		<fieldset class="checkboxsas">
		  <label>
			<input value="University of Santo Thomas" name="univ[]" type="checkbox">
			UST
		  </label>
		</fieldset>
		<fieldset class="checkboxsas">
		  <label>
			<input value="Systems Technology Institute" name="univ[]" type="checkbox">
			STI
		  </label>
		</fieldset>
		
	  </div>
	  <div class="col-md-6" style="text-align: left">
		<fieldset class="checkboxsas">
		  <label>
			<input value="University of the Philippines" name="univ[]" type="checkbox">
			UP
		  </label>
		</fieldset>
		<fieldset class="checkboxsas">
		  <label>
			<input value="Mapua Institute of Technology" name="univ[]" type="checkbox">
			MIT
		  </label>
		</fieldset>
		<fieldset class="checkboxsas">
		  <label>
			<input value="Lyceum of the Philippines University" name="univ[]" type="checkbox">
			LPU
		  </label>
		</fieldset>
		<fieldset class="checkboxsas">
		  <label>
			<input value="All" name="univall[]" type="checkbox">
			All 
		  </label>
		</fieldset>
	  </div>
	</div>
	<div class="col-md-12"  style="margin-top: 10px;margin-bottom: 10px" >
	  <h3 class="card-title right">AGE</h3>
	  <div style="margin:10px 0px 10px 0px">
		<fieldset class="min-age" >
		  <label class="col-md-6" style="text-align: left">

			Min. Age
		  </label>
		  <input class="col-md-6" min="1" max="200" id="min-age" name="minage" type="number">
		</fieldset>
	  </div>
	  <div style="margin:10px 0px 10px 0px">
		<fieldset class="max-age" >
		  <label class="col-md-6" style="text-align: left">

			Max. Age
		  </label>
		  <input class="col-md-6" min="1" max="200" id="max-age" name="maxage" type="number">
		</fieldset>
	  </div>



	</div>
	<!-- s -->
	<div style="text-align: center" class="col-md-12">
	  <button type="submit" name="submit" style="margin: 10px 0 10px 0;width: 100% " class="  btn btn-primary">Submit</button>
	</div>
</form>


<div class="col-md-12">

</div>
</div>
</div>
</div>
</div>

</div>

<div class="col-md-9">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title"></h4>
    </div>
    <div class="card-body collapse in">
      <div class="card-block">
        <div class="card-text">
			<?php if(isset($resultS) && $resultS != null): ?>
			  <table class="table table-striped table-bordered column-rendering">
				<thead>
					<tr>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Age</th>
						<th>Birthday</th>
						<th>University</th>
					</tr>
				</thead>
				<tbody>
					<?php for($cnty = 0; $cnty < count($finaldata); $cnty+=5): ?>
						<tr>
							<td><?php echo $finaldata[$cnty] ?></td>
							<td><?php echo $finaldata[$cnty + 1] ?></td>
							<td><?php echo $finaldata[$cnty + 2]?></td>
							<td><?php echo $finaldata[$cnty + 3] ?></td>
							<td><?php echo $finaldata[$cnty + 4] ?></td>
						</tr>
					<?php endfor; ?>
				</tbody>
				<tfoot>
				</tfoot>
				</table>
			<?php endif; ?>
			
			<?php if(isset($resultS) && $resultS == null): ?>
				<h2 align="center">*NO RECORDS TO SHOW*</h2>
			<?php endif; ?>
			
			<?php if(isset($resultAS) && $resultAS != null): ?>
			  <table class="table table-striped table-bordered column-rendering">
				<thead>
					<tr>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Age</th>
						<th>Birthday</th>
						<th>University</th>
					</tr>
				</thead>
				<tbody>
					<?php for($cnty = 0; $cnty < count($finaldata2); $cnty+=5): ?>
						<tr>
							<td><?php echo $finaldata2[$cnty] ?></td>
							<td><?php echo $finaldata2[$cnty + 1] ?></td>
							<td><?php echo $finaldata2[$cnty + 2]?></td>
							<td><?php echo $finaldata2[$cnty + 3] ?></td>
							<td><?php echo $finaldata2[$cnty + 4] ?></td>
						</tr>
					<?php endfor; ?>
				</tbody>
				<tfoot>
				</tfoot>
				</table>
			<?php endif; ?>
			
			<?php if(isset($resultAS) && $resultAS == null): ?>
				<h2 align="center">*NO RECORDS TO SHOW*</h2>
			<?php endif; ?>
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