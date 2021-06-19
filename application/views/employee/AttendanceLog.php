<?php
$globalHeader;

$getEmployeeAttendance = $this->Model_Selects->GetEmployeeAttendance($userID);

?>

	<link rel="stylesheet" href="<?=base_url()?>/assets/vendors/simple-datatables/style.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/daterangepicker.min.css">
	<style>
		input {
			color: inherit;
			background-color: transparent;
			border: none;
			border-color: transparent;
			width: 100%;
			height: 100%;
			margin: 0;
			margin-left: -0.2rem;
			padding: 0.2rem;
		}
		input[type]:focus {
			padding: 0.2rem;
			border-radius: 6px;
			outline: none;
			box-shadow: none !important;
			background-color: rgba(0, 0, 0, 0.08);
		}
		.dataTable-container {
			overflow-x: hidden !important;
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
						<a href="<?=base_url()?>employee/">Go Back</a>
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
						<div class="row message-banners comment-failed-banner" style="display: none;">
							<span class="text-center warning-banner">
								<i class="bi bi-exclamation-diamond-fill"></i> Unable to add comment to the date. Please check your internet connection and try again!
							</span>
						</div>
						<table class="table" id="attendanceLogTable">
							<thead>
							<tr>
								<th>Date and Time</th>
								<th>Day</th>
								<th>Log Type</th>
								<th>Comment</th>
							</tr>
							</thead>
							<tbody>
							<?php if ($getEmployeeAttendance->num_rows() > 0): 
								foreach ($getEmployeeAttendance->result_array() as $row):
									$logType = 'Clock In';
									$rowStyle = '';
									if ($row['LogType'] == 0) {
										$logType = 'Clock Out';
										$rowStyle = ' style="--bs-table-accent-bg: var(--bs-table-striped-bg);"';
									}
									echo '<tr' . $rowStyle . '>';
										echo '<td>' . $row['Date'] . ' ' . $row['Time'];
										echo '<td>' . $row['Day'];
										echo '<td>' . $logType;
										echo '<td>
												<div class="row">
													<div class="col-sm-1">
														<label for="comment_' . $row['ID'] . '"><span class="comment-pen_' . $row['ID'] . '"><i class="bi bi-pen-fill"></i></span>
													</div>
													<div class="col-sm-11">
														<input class="comment-input" id="comment_' . $row['ID'] . '" type="text" value="' . $row['Comment'] . '" data-id="' . $row['ID'] . '" data-defaultvalue="' . $row['Comment'] . '">
													</div>
												</div>
											</td>';
									echo '</tr>';
								endforeach;
							endif; ?>
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
<?php $this->load->view('main/globals/scripts.php'); ?>
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
$('.sidebar-employee-attendance').addClass('active');
$(document).ready(function() {
	$('body').on('input', '.comment-input', function() {
		let id = $(this).data('id');
		let value = $(this).val();
		let defaultValue = $(this).data('defaultvalue');
		// $('.comment-pen_' + id).html('<i class="bi bi-pen-fill text-muted"></i>');
		$.ajax({
			url: "<?php echo base_url() . 'AJAX_setAttendanceComment';?>",
			method: "POST",
			data: {id: id, value: value},
			dataType: "html",
			success: function(response){
				$('.comment-failed-banner').fadeOut();
				console.log('Comment added to ' + id);
				$('#comment_' + id).data('defaultvalue', value);
				// $('.comment-pen_' + id).html('<i class="bi bi-pen-fill"></i>');
			},
			error: function(xhr, textStatus, error){
				$('.comment-failed-banner').fadeIn();
				$('#comment_' + id).val(defaultValue);
				console.log(xhr.statusText);
				console.log(textStatus);
				console.log(error);
				// $('.comment-pen_' + id).html('<i class="bi bi-pen-fill"></i>');
			}
		});
	});
});
</script>

<script src="<?=base_url()?>/assets/js/main.js"></script>
</body>

</html>
