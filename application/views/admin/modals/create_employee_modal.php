<div class="modal fade" id="NewEmployeeModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?php echo base_url() . 'FORM_addNewEmployee';?>" method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style="margin: 0 auto;"><i class="bi bi-person-badge-fill" style="font-size: 24px;"></i> New Employee</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-12">
								<div class="form-group col-sm-12 text-center">
									<input type="file" id="PFPInput" name="pImage" style="display: none;">
									<input type="hidden" id="pImageChecker" name="pImageChecker">
									<img class="image-hover" id="PFPInputPreview" src="<?php echo base_url() ?>assets/images/faces/1.jpg" width="192" height="192" alt="Image Preview" style="border-radius: 8px;">
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-row">
							<div class="form-group col-sm-12">
								<label class="input-label">FIRST NAME</label>
								<input type="text" class="form-control" name="firstName">
							</div>
							<div class="form-group col-sm-12">
								<label class="input-label">MIDDLE NAME</label>
								<input type="text" class="form-control" name="middleName">
							</div>
							<div class="form-group col-sm-12">
								<label class="input-label">LAST NAME</label>
								<input type="text" class="form-control" name="lastName">
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12">
						<div class="row">
							<div class="form-group col-sm-12 col-md-6">
								<label class="input-label">DATE OF BIRTH</label>
								<input type="date" class="form-control" name="birthDate">
							</div>
							<div class="form-group col-sm-12 col-md-6">
								<label class="input-label">NAME EXTENSION</label>
								<input type="text" class="form-control" name="nameExtension">
							</div>
							<div class="form-group col-sm-12">
								<label class="input-label">CONTACT</label>
								<input type="text" class="form-control" name="contactNumber">
							</div>
							<div class="form-group col-sm-12">
								<label class="input-label">ADDRESS</label>
								<input type="text" class="form-control" name="locationAddress">
							</div>
							<div class="form-group col-sm-12 mt-2 employee-comment-input" style="display: none;">
								<label class="input-label">COMMENT</label>
								<input type="text" class="form-control" name="adminComment">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="feedback-form modal-footer">
				<button type="button" class="btn btn-primary employee-add-new-comment-btn"><i class="bi bi-pen-fill"></i> Comment</button>
				<button type="submit" class="btn btn-success"><i class="bi bi-check-square"></i> Save</button>
			</div>
		</div>
		</form>
	</div>
</div>