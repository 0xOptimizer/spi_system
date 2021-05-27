<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Attendance - SPI SYSTEM</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.css">

	<link rel="stylesheet" href="<?=base_url()?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/app.css">
	<link rel="shortcut icon" href="<?=base_url()?>/assets/images/favicon.svg" type="image/x-icon">

	<style>
		.spi-logo{
			margin: auto;
		}

		#clock{
			font-size: 3.2rem;
			font-weight: bolder;
		}

		#salutation {
			font-size: 2.2rem;
		}
	</style
</head>
<body>
<div id="app">
	<div id="sidebar" class="active">
		<div class="sidebar-wrapper active">
			<div class="sidebar-header">
				<div class="d-flex justify-content-between">
					<div class="logo spi-logo">
						<a href="index.html">SPI SYSTEM</a>
					</div>
					<div class="toggler">
						<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
					</div>
				</div>
			</div>
			<?php $this->load->view('employee/template/sidebar') ?>
			<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
		</div>
	</div>
	<div id="main">
		<header class="mb-3">
			<a href="#" class="burger-btn d-block d-xl-none">
				<i class="bi bi-justify fs-3"></i>
			</a>
		</header>

		<div class="page-heading">
			<div class="page-title">
				<div class="row">
					<div class="col-12 col-md-6 order-md-1 order-last">
						<h3>Attendance</h3>
						<p class="text-subtitle text-muted">Your daily attendance. </p>
					</div>
					<div class="col-12 col-md-6 order-md-2 order-first">
						<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Attendance</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<section class="section">
				<div class="card">
					<div class="card-header">
						<div class="row" style="text-align: center">
							<h4 class="card-title" id="salutation">Good Morning, Christopher John!</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="row" style="text-align: center">
							<h4 class="card-title" id="clock"></h4>
						</div>
						<div class="row" style="text-align: center">
							<h4 class="card-title text-subtitle text-muted" id="dateToday"></h4>
						</div>
						<div class="row" style="margin-top: 20px">
							<div class="col-12 col-md-5">
							</div>
							<div class="col-12 col-md-2">
								<a href="#" class="btn btn-xl btn-success btn-block" >CLOCK IN</a>
							</div>
							<div class="col-12 col-md-5">
							</div>
						</div>
						<div class="row" style="text-align: center; margin-top: 20px">
							<h4 class="card-title text-subtitle text-muted">Last Clock Out at 10:10 PM
								Wednesday Feb 24, 2021</h4>
						</div>

						<div class="row" style="text-align: center; margin-top: 20px">
							<h4 class="card-title"><a href="<?=base_url()?>/employee/attendanceLog">View Time Log</a></h4>
						</div>


					</div>
				</div>
			</section>
		</div>

		<footer>
			<div class="footer clearfix mb-0 text-muted">
				<div class="float-start">
					<p>2021 &copy; Christopher John Gamo</p>
				</div>
				<div class="float-end">
					<p>Developed with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
							href="https://christophergamo.com">C. Gamo</a></p>
				</div>
			</div>
		</footer>
	</div>
</div>
<script src="<?=base_url()?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?=base_url()?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>/assets/js/main.js"></script>
<script src="<?=base_url()?>/assets/js/jquery.js"></script>
<script src="<?=base_url()?>/assets/js/moment.min.js"></script>
<script type="text/javascript">
	function clock() {
		let $date = new Date;
		$("#clock").text(moment($date).format('LTS'));
		$("#dateToday").text(moment($date).format('dddd MMM D, YYYY'));

	}
	setInterval(clock, 1000);
</script>
</body>

</html>
