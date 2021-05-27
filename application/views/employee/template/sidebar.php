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
		<div class="sidebar-menu">
			<ul class="menu">
				<li class="sidebar-title">ORWELL</li>

				<li class="sidebar-item sidebar-admin-attendance-list">
					<a href="<?=base_url().'admin'?>" class='sidebar-link'>
						<i class="bi bi-calendar-check-fill"></i>
						<span>Attendance List</span>
					</a>
				</li>
				<li class="sidebar-item sidebar-admin-assignments">
					<a href="<?=base_url().'employee/requirements'?>" class='sidebar-link'>
						<i class="bi bi-diamond-half"></i>
						<span>Assignments</span>
					</a>
				</li>
				<li class="sidebar-item sidebar-admin-assignments">
					<a href="<?=base_url().'employee/requirements'?>" class='sidebar-link'>
						<i class="bi bi-person-lines-fill"></i>
						<span>Employees</span>
					</a>
				</li>

				<li class="sidebar-title">MENU</li>

				<li class="sidebar-item sidebar-employee-attendance">
					<a href="<?=base_url().'employee'?>" class='sidebar-link'>
						<i class="bi bi-person-badge-fill"></i>
						<span>Attendance</span>
					</a>
				</li>
				<li class="sidebar-item sidebar-employee-subjects">
					<a href="<?=base_url().'employee/requirements'?>" class='sidebar-link'>
						<i class="bi bi-collection-fill"></i>
						<span>Subjects</span>
					</a>
				</li>

				<li class="sidebar-title">ACCOUNT</li>

				<li class="sidebar-item">
					<a href="<?=base_url().'logout'?>" class='sidebar-link'>
						<i class="bi bi-door-open-fill"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</div>
	<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
	</div>
</div>