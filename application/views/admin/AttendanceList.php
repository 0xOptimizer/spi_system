<?php
$globalHeader;

?>
<style>
	.rotate-text {
		-webkit-transform:rotate(-75deg);
	}
</style>
</head>
<body>
<div id="app">
	<?php $this->load->view('main/template/sidebar') ?>
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
						<h3>Attendance List</h3>
						<p class="text-subtitle text-muted">All employees attendance for the day is listed here.</p>
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
					<div class="card-body">
						<div class="row message-banners comment-failed-banner" style="display: none;">
							<span class="text-center warning-banner">
								<i class="bi bi-exclamation-diamond-fill"></i> Unable to add comment to the date. Please check your internet connection and try again!
							</span>
						</div>
						<div class="table-responsive">
							<table class="table" id="attendanceLogTable">
								<thead>
								<tr>
									<th></th>
									<?php for($i = 1; $i <= 24; $i++):
										$hours = $i;
										$hoursIndicator = 'AM';
										if ($hours > 12) {
											$hoursIndicator = 'PM';
											$hours = $hours - 12;
										}
										if ($hours < 10) {
											$hours = '0' . $hours;
										}
										$hours = $hours . ':00';
										?>
										<th class="rotate-text">
											<?=$hours?> <?=$hoursIndicator?>
										</th>
									<?php endfor; ?>
								</tr>
								</thead>
								<tbody>
									<?php
									$getAllEmployees = $this->Model_Selects->GetAllEmployees();
									if ($getAllEmployees->num_rows() > 0):
										foreach($getAllEmployees->result_array() as $row):
											// Info Handler
											// ~ name
											$fullName = '';
											$fullNameHover = '';
											$isFullNameHoverable = false;
											if ($lastName) {
												$fullName = $fullName . $row['LastName'] . ', ';
												$fullNameHover = $fullNameHover . $row['LastName'] . ', ';
											} else {
												$fullNameHover = $fullNameHover . '[<i>No Last Name</i>], ';
												$isFullNameHoverable = true;
											}
											if ($firstName) {
												$fullName = $fullName . $row['FirstName'] . ' ';
												$fullNameHover = $fullNameHover . $row['FirstName'] . ' ';
											} else {
												$fullNameHover = $fullNameHover . '[<i>No First Name</i>] ';
												$isFullNameHoverable = true;
											}
											if ($nameExtension) {
												$fullName = $fullName . ', ' . $row['NameExtension'];
												$fullNameHover = $fullNameHover . ', ' . $row['NameExtension'];
											}
											if (strlen($fullName) > 90) {
												$fullName = substr($fullName, 0, 90);
												$fullName = $fullName . '...';
												$isFullNameHoverable = true;
											}
									?>
									<tr>
										<td>
											<i><?=$fullName?></i>
										</td>
										<?php
										$date = date('M j, Y');
										$getEmployeeAttendance = $this->Model_Selects->GetEmployeeAttendanceInDate($row['UserID'], $date);
										// echo $this->db->last_query();
										$timeArray = [];
										var_dump(strtotime('01:00'));
										if ($getEmployeeAttendance->num_rows() > 0) {
											foreach($getEmployeeAttendance->result_array() as $erow) {
												array_push($timeArray, strtotime($erow['Time']));
											}
										}
										// var_dump($timeArray);
										for($k = 0; $k <= 24; $k++): ?>
										<td>
											<?php ?>
											<i class="bi bi-diamond"></i>
										</td>
										<?php endfor; ?>
									</tr>
									<?php endforeach;
									endif; ?>
								</tbody>
							</table>
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
<?php $this->load->view('main/globals/scripts.php'); ?>
<script src="<?=base_url()?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?=base_url()?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>/assets/js/main.js"></script>
<script src="<?=base_url()?>/assets/js/jquery.js"></script>
<script>
$('.sidebar-admin-attendance').addClass('active');
$(document).ready(function() {

});
</script>

<script src="<?=base_url()?>/assets/js/main.js"></script>
</body>

</html>
