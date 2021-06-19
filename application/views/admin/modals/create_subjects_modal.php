<div class="modal fade" id="NewSubjectModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?php echo base_url() . 'FORM_addNewSubject';?>" method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style="margin: 0 auto;"><i class="bi bi-bookmark-plus" style="font-size: 24px;"></i> New Subject</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="form-group col-sm-12">
						<label class="input-label">SUBJECT CODE</label>
						<input type="text" class="form-control w-50" name="subjectCode">
					</div>
					<div class="form-group col-sm-12">
						<label class="input-label">SUBJECT DESCRIPTION</label>
						<input type="text" class="form-control" name="subjectDescription">
					</div>
					<div class="form-group col-sm-12">
						<label class="input-label">SCHEDULE</label>
						<input type="text" class="form-control" name="schedule">
					</div>
					<div class="form-group col-sm-12 col-md-6">
						<label class="input-label">COURSE</label>
						<input type="text" class="form-control" name="course">
					</div>
					<div class="form-group col-sm-12 col-md-6">
						<label class="input-label">SECTION</label>
						<input type="text" class="form-control" name="section">
					</div>
				</div>
			</div>
			<div class="feedback-form modal-footer">
				<button type="submit" class="btn btn-success"><i class="bi bi-check"></i> Save</button>
			</div>
		</div>
		</form>
	</div>
</div>