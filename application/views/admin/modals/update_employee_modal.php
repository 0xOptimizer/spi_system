<div class="modal fade" id="UpdateEmployeeModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<form action="<?php echo base_url() . 'FORM_updateEmployee';?>" method="POST" class="feedback-recaptcha-container" enctype="multipart/form-data">
		<input id="UpdateUserID" type="hidden" name="userID">
		<input id="UpdateDefaultImage" type="hidden" name="defaultImage">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style="margin: 0 auto;">
					<input class="form-check-input cursor-pointer" type="checkbox" value="" id="UpdateEmployeeToggle">
					<label class="form-check-label cursor-pointer" for="UpdateEmployeeToggle">
						Update Employee
					</label>
				</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<!-- Left Part -->
					<div class="col-sm-12 col-md-6">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="form-row">
									<div class="form-group col-sm-12 col-md-12">
										<div class="form-group col-sm-12 text-center">
											<input type="file" id="UpdatePFPInput" name="pImage" style="display: none;">
											<input type="hidden" id="UpdatepImageChecker" name="pImageChecker">
											<img class="image-hover" id="UpdatePFPInputPreview" src="<?php echo base_url() ?>assets/images/faces/1.jpg" width="192" height="192" alt="Image Preview" style="border-radius: 8px;" loading="lazy">
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="form-row">
									<div class="form-group col-sm-12">
										<label class="input-label">FIRST NAME</label>
										<input id="UpdateFirstName" type="text" class="form-control" name="firstName" readonly>
									</div>
									<div class="form-group col-sm-12">
										<label class="input-label">MIDDLE NAME</label>
										<input id="UpdateMiddleName" type="text" class="form-control" name="middleName" readonly>
									</div>
									<div class="form-group col-sm-12">
										<label class="input-label">LAST NAME</label>
										<input id="UpdateLastName" type="text" class="form-control" name="lastName" readonly>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12">
								<div class="row">
									<div class="form-group col-sm-12 col-md-6">
										<label class="input-label">DATE OF BIRTH</label>
										<input id="UpdateDateOfBirth" type="date" class="form-control" name="birthDate" readonly>
									</div>
									<div class="form-group col-sm-12 col-md-6">
										<label class="input-label">NAME EXTENSION</label>
										<input id="UpdateNameExtension" type="text" class="form-control" name="nameExtension" readonly>
									</div>
									<div class="form-group col-sm-12">
										<label class="input-label">CONTACT</label>
										<input id="UpdateContactNumber" type="text" class="form-control" name="contactNumber" readonly>
									</div>
									<div class="form-group col-sm-12">
										<label class="input-label">ADDRESS</label>
										<input id="UpdateAddress" type="text" class="form-control" name="locationAddress" readonly>
									</div>
									<div class="form-group col-sm-12 mt-2 employee-comment-input">
										<label class="input-label">COMMENT</label>
										<input id="UpdateComment" type="text" class="form-control" name="adminComment" readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Right Part -->
					<div class="col-sm-12 col-md-6">
						<div class="row">
							<div class="col-sm-12 table-responsive">
								<label class="input-label">LATEST ACTIVITIES</label>
								<table class="table" id="attendanceLogTable">
									<thead style="display: none;">
									<tr>
										<th>Event</th>
										<th>Time</th>
									</tr>
									</thead>
									<tbody>
										<tr>
											<td>Visited linkasdasdasdasaaaaaaaaaaaaaaa.</td>
											<td class="text-muted">2 minutes ago</td>
										</tr>
										<tr>
											<td>Visited linkasdasdasdasaaaaaaaaaaaaaaa.</td>
											<td class="text-muted">2 minutes ago</td>
										</tr>
										<tr>
											<td>Visited linkasdasdasdasaaaaaaaaaaaaaaa.</td>
											<td class="text-muted">2 minutes ago</td>
										</tr>
										<tr>
											<td>Visited linkasdasdasdasaaaaaaaaaaaaaaa.</td>
											<td class="text-muted">2 minutes ago</td>
										</tr>
										<tr>
											<td>Visited linkasdasdasdasaaaaaaaaaaaaaaa.</td>
											<td class="text-muted">2 minutes ago</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-sm-12">
								<label class="input-label">LOGIN CREDENTIALS</label>
								<div class="clock-failed-banner my-2">
									<span class="text-center info-banner">
										<i class="bi bi-exclamation-diamond-fill"></i> No log in credentials set. This employee cannot log in.
									</span>
								</div>
								<div class="form-group col-sm-12">
									<label class="input-label">EMAIL</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="bi bi-envelope-fill h-100 w-100" style="font-size: 16px; margin-top: 5px;"></i></span>
										</div>
										<input type="text" class="form-control" name="loginEmail" readonly>
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="input-label">PASSWORD<!--  - <button type="button" class="btn btn-sm-primary"><i class="bi bi-brightness-high-fill"></i> show</button> --></label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="bi bi-key-fill h-100 w-100" style="font-size: 16px; margin-top: 5px;"></i></span>
										</div>
										<input type="password" class="form-control" name="loginPassword" readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="feedback-form modal-footer">
				<button type="submit" class="btn btn-success"><i class="bi bi-check-square"></i> Save Changes</button>
			</div>
		</div>
		</form>
	</div>
</div>