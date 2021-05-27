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

	<link rel="stylesheet" href="<?=base_url()?>/assets/vendors/simple-datatables/style.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/app.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/daterangepicker.min.css">
	<style>
		.spi-logo{
			margin: auto;
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
						<p class="text-subtitle text-muted">Your attendance log.</p>
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
					<div class="card-header" style="text-align: right">
						<a href="<?=base_url()?>/employee/">Go Back</a>
					</div>

					<div class="card-body">

						<div class="row" style="margin-bottom: 10px">
							<div class="col-10">
								Date Range:
							</div>
							<div class="col-12 col-md-5">
								<input type="text" class="form-control" id="dateInformation">
							</div>
						</div>
						<table class="table table-striped" id="attendanceLogTable">
							<thead>
							<tr>
								<th>Date and Time</th>
								<th>Day</th>
								<th>Log Type</th>
								<th>Comment</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>February 24, 2021 7:21 AM</td>
								<td>Wednesday</td>
								<td>Clock In</td>
								<td><i class="bi bi-pen-fill"></i></td>
							</tr>

							<tr>
								<td>February 24, 2021 10:10 PM</td>
								<td>Wednesday</td>
								<td>Clock Out</td>
								<td><i class="bi bi-pen-fill"></i></td>
							</tr>
							</tbody>
						</table>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="<?=base_url()?>/assets/js/jquery.daterangepicker.min.js"></script>
<script>
	// Simple Datatable
	let attendanceLogTable = document.querySelector('#attendanceLogTable');
	let dataTable = new simpleDatatables.DataTable(attendanceLogTable);

	$('#dateInformation').dateRangePicker();

</script>

<script src="<?=base_url()?>/assets/js/main.js"></script>
</body>

</html>
