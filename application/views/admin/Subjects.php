<?php
$globalHeader;

$getSubjects = $this->Model_Selects->GetSubjects();

?>

	<link rel="stylesheet" href="<?=base_url()?>/assets/vendors/simple-datatables/style.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/daterangepicker.min.css">
	<style>

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
						<h3>Subject List</h3>
						<p class="text-subtitle text-muted">Manage subjects and assign teachers here.</p>
					</div>
					<div class="col-12 col-md-6 order-md-2 order-first">
						<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?=base_url();?>admin">Admin</a></li>
								<li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url();?>admin/subjects">Subjects List</a></li>
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
						<table class="table" id="attendanceLogTable">
							<thead>
							<tr>
								<th>Subject Code and Description</th>
								<th>Teachers Assigned</th>
								<th>Schedule</th>
								<th>Course and Section</th>
							</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<button type="button" class="btn btn-primary create-new-subject-btn"><i class="bi bi-plus-square"></i> Add a new subject</button>
									</td>
									<td>
										--
									</td>
									<td>
										--
									</td>
									<td>
										--
									</td>
								</tr>
							<?php if ($getSubjects->num_rows() > 0): 
								foreach ($getSubjects->result_array() as $row):
									echo '<tr>';
										echo '<td>' . $row['SubjectCode'] . ' - ' . $row['Description'];
										echo '<td> <button type="button" class="choose-btn btn btn-primary"><i class="bi bi-plus"></i></button>' . '</td>';
										echo '<td>' . $row['Schedule'] . '</td>';
										echo '<td>' . $row['Course'] . ' (Section: ' . $row['Section'] . ')';
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
<!-- Create a new subject modal -->
<?php $this->load->view('admin/modals/create_subjects_modal.php'); ?>
<!-- Chosoe employee modal -->
<?php $this->load->view('admin/modals/choose_employee_modal.php'); ?>
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

$('.sidebar-admin-subjects').addClass('active');
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
	$('.create-new-subject-btn').on('click', function() {
		$('#NewSubjectModal').modal('show');
	});
	$('.choose-btn').on('click', function() {
		$('#ChooseEmployeeModal').modal('show');
	});
});
</script>

<script src="<?=base_url()?>/assets/js/main.js"></script>
</body>

</html>
