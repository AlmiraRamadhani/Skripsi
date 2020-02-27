<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="<?= base_url('auth/regis'); ?>"><b>Admin</b></a>
		</div>

		<div class="card">
			<div class="card-body register-card-body">
				<p class="login-box-msg">Register a new account</p>

				<form action="<?= base_url('auth/regis'); ?>" method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Full name" id="nama" name="nama" value="<?= set_value('nama'); ?>">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Email Address" id="email" name="email" value="<?= set_value('email'); ?>">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
						<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="password" class="form-control" placeholder="Confirm password" id="password2" name="password2">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col">
							<button type="submit" class="btn btn-primary btn-block">Register</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<br>

				<p class="mb-0 text-center">
					<a href="<?= base_url('admin'); ?>" class="text-center">Back to Dashboard</a>
				</p>
			</div>
			<!-- /.form-box -->
		</div><!-- /.card -->
	</div>
	<!-- /.register-box -->