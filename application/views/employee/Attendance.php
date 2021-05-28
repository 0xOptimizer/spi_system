<?php

$globalHeader;

$userID = 'N/A';
if ($this->session->userdata('UserID')) {
	$userID = $this->session->userdata('UserID');
}
$clockType = 1;
$lastClockMessage = 'You have no attendance records yet!';
$getLatestAttendance = $this->Model_Selects->GetLatestAttendance($userID);
if ($getLatestAttendance->num_rows() > 0) {
	foreach($getLatestAttendance->result_array() as $row) {
		$lastClockDate = $row['Date'];
		$lastClockTime = $row['Time'];
		$lastClockDay = $row['Day'];
		$lastClockType = $row['LogType'];
		$lastClockTypeText = '';
		if ($lastClockType == 1) {
			$lastClockTypeText = 'In';
			$clockType = 0;
		} else {
			$lastClockTypeText = 'Out';
			$clockType = 1;
		}
		$lastClockMessage = 'Error fetching your last attendance record.';
		if ($lastClockDate != NULL || $lastClockTime != NULL || $lastClockDay != NULL || $lastClockType != NULL) {
			$lastClockMessage = 'Last Clock ' . $lastClockTypeText . ' at ' . $lastClockTime . ' on ' . $lastClockDay . ', ' . $lastClockDate;
		}
	}
}

?>
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
</style>
</head>
<body>
<div id="app">
	<?php $this->load->view('employee/template/sidebar') ?>
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
							<h4 class="card-title" id="salutation">Good Morning, <?=$userName?>!</h4>
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
								<button type="button" class="clock-btn btn btn-xl btn-success btn-block" >CLOCK IN</button>
							</div>
							<div class="col-12 col-md-5">
							</div>
						</div>
						<div class="row clock-banners clock-failed-banner" style="display: none;">
							<span class="text-center warning-banner">
								<i class="bi bi-exclamation-diamond-fill"></i> Error connecting to the database server. Please check your internet connection and try again!
							</span>
						</div>
						<div class="row" style="text-align: center; margin-top: 20px">
							<h4 class="card-title text-subtitle text-muted last-clock-message"><?=$lastClockMessage?></h4>
						</div>

						<div class="row" style="text-align: center; margin-top: 20px">
							<h4 class="card-title"><a href="<?=base_url()?>employee/log">View Time Log</a></h4>
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
<script src="<?=base_url()?>/assets/js/moment.min.js"></script>
<script type="text/javascript">
<?php if ($clockType == 1): ?>
	var isClockIn = true;
<?php else: ?>
	var isClockIn = false;
<?php endif; ?>
function clock() {
	let $date = new Date;
	$("#clock").text(moment($date).format('LTS'));
	$("#dateToday").text(moment($date).format('dddd - MMM D, YYYY'));
	let clockDate = moment($date).format('MMM D, YYYY');
	let clockTime = moment($date).format('LTS');
	let clockDay = moment($date).format('dddd');
	$('.clock-btn').data('date', clockDate);
	$('.clock-btn').data('time', clockTime);
	$('.clock-btn').data('day', clockDay);
	// if (isClockIn) {
	// 	isClockIn = false;
	// } else {
	// 	isClockIn = true;
	// }
	// refreshClockButton(isClockIn);
}
function refreshClockButton(isClockIn) {
	if (isClockIn) {
		$('.clock-btn').removeClass('btn-primary');
		$('.clock-btn').addClass('btn-success');
		$('.clock-btn').data('type', '1');
		$('.clock-btn').html('CLOCK IN');
	} else {
		$('.clock-btn').removeClass('btn-success');
		$('.clock-btn').addClass('btn-primary');
		$('.clock-btn').data('type', '0');
		$('.clock-btn').html('CLOCK OUT');
	}
}
setInterval(clock, 1000);
$('.sidebar-employee-attendance').addClass('active');
$(document).ready(function() {
	clock();
	refreshClockButton(isClockIn);

	$('.clock-btn').on('click', function() {
		$('.clock-banners').fadeOut();
		$(this).attr('disabled', true);
		$(this).addClass('disabled-hover');
		let date = $(this).data('date');
		let time = $(this).data('time');
		let day = $(this).data('day');
		let logType = $(this).data('type');
		$(this).html('<i class="spinner-border spinner-border-sm text-muted"></i>');
		$.ajax({
			url: "<?php echo base_url() . 'AJAX_setAttendance';?>",
			method: "POST",
			data: {date: date, time: time, day: day, logType: logType},
			dataType: "html",
			success: function(response){
				console.log(response);
				$('.clock-banners').fadeOut();
				let logTypeAfter;
				let logTypeText = '';
				if (logType == 1) {
					logTypeText = 'In';
					logTypeAfter = false;
				} else {
					logTypeText = 'Out';
					logTypeAfter = true;
				}
				refreshClockButton(logTypeAfter);
				$('.clock-btn').attr('disabled', false);
				$('.clock-btn').removeClass('disabled-hover');
				let clockMessage = 'Last Clock ' + logTypeText + ' at ' + time + ' on ' + day + ', ' + date;
				$('.last-clock-message').html(clockMessage);
			},
			error: function(xhr, textStatus, error){
				$('.clock-banners').fadeOut();
				$('.clock-failed-banner').fadeIn();
				console.log(xhr.statusText);
				console.log(textStatus);
				console.log(error);
				let logTypeValue;
				if (logType == 1) {
					logTypeValue = true; 
				} else {
					logTypeValue = false;
				}
				console.log(logTypeValue);
				refreshClockButton(logTypeValue);
				$('.clock-btn').attr('disabled', false);
				$('.clock-btn').removeClass('disabled-hover');
			}
		});
	});
});
</script>
</body>

</html>
