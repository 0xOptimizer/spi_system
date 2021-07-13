<?php
$globalHeader;

date_default_timezone_set('Asia/Manila');
$date = date('M j, Y');

if ($this->input->get('date')) {
	$date = $this->input->get('date');
	$date = date('M j, Y', strtotime($date));
}
$isCurrentDate = false;
if ($date == date('M j, Y')) {
	$isCurrentDate = true;
}

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
						<div class="row">
							<div class="col-sm-12">
								<h5>Viewing list for <span style="text-decoration: underline;"><?=$date;?></span>
								<?php if ($isCurrentDate): ?>
								<span class="text-center success-banner-sm">
									<i class="bi bi-check-circle-fill"></i> LATEST
								</span>
								<?php else: ?>
								<span class="text-center info-banner-sm">
									<i class="bi bi-exclamation-diamond-fill"></i> NOT TODAY
								</span>
								<?php endif; ?>
								</h5>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table" id="attendanceLogTable" style="overflow: hidden;">
								<thead>
								<tr>
									<th></th>
									<?php for($i = 0; $i <= 23; $i++):
										if ($i == 0) {
											$hours = 12;
										} else {
											$hours = $i;
										}
										$hoursIndicator = 'AM';
										if ($hours > 11 && $i != 0) {
											$hoursIndicator = 'PM';
											if ($hours != 12) {
												$hours = $hours - 12;
											}
										}
										if ($hours < 10) {
											$hours = '0' . $hours;
										}
										$hours = $hours . ':00';
										?>
										<th class="rotate-text">
											<?=$hours?> <span style="font-size: 11px;"><?=$hoursIndicator?></span>
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
										$getEmployeeAttendance = $this->Model_Selects->GetEmployeeAttendanceInDate($row['UserID'], $date);
										// echo $this->db->last_query();
										$attendanceCount = $getEmployeeAttendance->num_rows();
										$hoursArray = [];
										$minutesArray = [];
										$typeArray = [];
										$clockInArray = [];
										$clockOutArray = [];
										// var_dump(strtotime('01:00'));
										if ($attendanceCount > 0) {
											foreach($getEmployeeAttendance->result_array() as $erow) {
												// $dateRaw = $erow['Date'];
												$timeRaw = new DateTime($erow['Time']);
												$hours = $timeRaw->format('H');
												$minutes = $timeRaw->format('i');
												$type = $erow['LogType'];
												if ($type == 1) {
													array_push($clockInArray, $erow['Time']);
												} else {
													array_push($clockOutArray, $erow['Time']);
												}
												array_push($hoursArray, $hours);
												array_push($minutesArray, $minutes);
												array_push($typeArray, $type);
											}
											// Getting last clock in
											$lastClockIn = $clockInArray[0];
											$lastClockIn = new DateTime($lastClockIn);
											$lastClockInHour = $lastClockIn->format('H');
											// Getting last clock out
											$lastClockOut = $clockOutArray[0];
											$lastClockOut = new DateTime($lastClockOut);
											$lastClockOutHour = $lastClockOut->format('H');
											// Getting range
											$range = $lastClockOut->diff($lastClockIn);
											$rangeCount = $range->format('%H');
											$timeTable = [];
											for ($i = 0; $i < $rangeCount; $i++) {
												$time = $lastClockInHour;
												$time += $i;
												array_push($timeTable, $time);
											}
										}
										// var_dump($hoursArray);
										// var_dump($timeArray);
										for($i = 0; $i < 24; $i++): ?>
										<td>
											<?php
											$isEmpty = false;
											$isFilled = false;
											$isStartHalfFilled = false;
											$isEndHalfFilled = false;
											if ($attendanceCount > 0) {
												if (in_array($i, $timeTable) && $lastClockIn < $lastClockOut) {
													$isFilled = true;
												} else {
													$isEmpty = true;
												}
												for($k = 0; $k < $attendanceCount; $k++) {
													if ($hoursArray[$k] == $i) {
														if ($minutesArray[$k] < 50) {
															if ($typeArray[$k] == '1') {
																$isStartHalfFilled = true;								
															} else {
																$isEndHalfFilled = true;
															}
														} else {
															$isFilled = true;
														}
													}
												}
											} else {
												$isEmpty = true;
											}
											// Check what to fill in the cell
											if ($isStartHalfFilled) {
												echo '<i class="bi bi-exclamation-diamond-fill"></i>';
											} elseif ($isEndHalfFilled) {
												echo '<i class="bi bi-diamond-half"></i>';
											} elseif ($isFilled) {
												echo '<i class="bi bi-diamond-fill"></i>';
											} else {
												echo '<i class="bi bi-diamond"></i>';
											}
											?>
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
$('.sidebar-admin-attendance-list').addClass('active');
$(document).ready(function() {

});
</script>

<script src="<?=base_url()?>/assets/js/main.js"></script>
</body>

</html>
