<?php require_once(dirname(__FILE__) . '/config.php');
if ( !isset($_SESSION['Admin_ID']) || !isset($_SESSION['Login_Type']) ) {
   	header('location:' . BASE_URL);
} ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="https://srishringarr.com/static/images/icons/favicon.png" />
	<title>Add Salary - Payroll</title>

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datepicker/datepicker3.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/timepicker/bootstrap-timepicker.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/clockpicker/css/bootstrap-clockpicker.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/skins/_all-skins.min.css">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php require_once(dirname(__FILE__) . '/partials/topnav.php'); ?>

		<?php require_once(dirname(__FILE__) . '/partials/sidenav.php'); ?>

		<div class="content-wrapper">
			<section class="content-header">
				<h1>Manual Add Salary </h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Add Salaries</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
					<?php
					if ( $_SESSION['Login_Type'] == 'admin' ) {
						$query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "admin` WHERE `admin_id` = " . $_SESSION['Admin_ID']);
						if ( $query ) {
							if ( mysqli_num_rows($query) == 1 ) {
								$data = mysqli_fetch_assoc($query); ?>
			        			<div class="col-lg-12">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title">Add Salary</h3>
										</div>
										<div class="box-body">
											<form action="#" role="form" data-toggle="validator" id="manual_salary">
												<div class="row">
													<div class="col-lg-3">
														<div class="form-group">
															<label for="last_name">First Name </label>
															<select class="form-control" name="empid" id="empid" required>
																<option value="">Select Emp ID</option>
																<? $con_sql = mysqli_query($db,"select firstname,lastname,empid,ssn from employee order by ssn asc");
																
                                                               while($con_sql_result = mysqli_fetch_assoc($con_sql)){ ?>
                                                                  <option value="<? echo strtoupper($con_sql_result['ssn']); ?>" <? if(isset($_POST['empid']) && $_POST['empid']==$con_sql_result['ssn'] ){ echo 'selected'; } ?>>
                                                               <? echo strtoupper($con_sql_result['firstname']." ".$con_sql_result['lastname']); ?>
                                                            </option> 
                                                               <? } ?>
															</select>
														</div>
													</div>
													
													<div class="col-lg-3">
														<div class="form-group">
															<label for="salary">Salary </label>
															<input type="text" class="form-control" name="salary" id="salary"  required />
														</div>
													</div>
												
												
													
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-primary">Submit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								
							<?php
							}
						}
					}  ?>
				</div>
			</section>
		</div>

		<footer class="main-footer">
		<strong> &copy; <?php echo date("Y");?> Payroll Management System | </strong> Developed By SAR Software Solutions Pvt. Ltd.
		</footer>
	</div>
	
	

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/jquery-validator/validator.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
	
	<script src="<?php echo BASE_URL; ?>plugins/timepicker/bootstrap-timepicker.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
	
	<script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>
	<script type="text/javascript">var baseurl = '<?php echo BASE_URL; ?>';</script>
	<script src="<?php echo BASE_URL; ?>dist/js/script.js?rand=<?php echo rand(); ?>"></script>
	<script>
	  /*  $(function () {
          $('#datetimepicker').datetimepicker({
              inline: true,
              sideBySide: true
          });
      }); */
      $(document).ready(function(){
          $('.clockpicker').clockpicker({
            //   donetext: 'Done'
          })
      })
	</script>
</body>
</html>
