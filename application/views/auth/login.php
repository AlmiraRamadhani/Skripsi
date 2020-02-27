<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?= base_url('auth'); ?>"><b>Admin</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to access our website</p>

				<?= $this->session->flashdata('message'); ?>

				<form action="<?= base_url('auth'); ?>" method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Username" name="username" id="username">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
						<?= form_error('username'); ?>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="password" class="form-control" placeholder="Password" name="password" id="password">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<?= form_error('password'); ?>
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<br>

				<p class="mb-0 text-center">
					<a href="<?= base_url('home'); ?>" class="text-center"><i class="fa fa-home"></i> To Home</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->