<!-- Site wrapper -->
<div class="wrapper">
	<!-- Navbar -->
	<?= $navbar; ?>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<?= $sidebar; ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1><?= $title; ?></h1>
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Tambah Customer</h3>
				</div>
				<form action="<?= base_url('customer/add'); ?>" method="post">
					<div class="card-body">
					<div class="form-group">
							<label for="nik">No KTP</label>
							<input type="text" class="form-control" id="nik" name="nik">
							<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="name">Nama</label>
							<input type="text" class="form-control" id="name" name="name">
							<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="address">Alamat</label>
							<input type="text" class="form-control" id="address" name="address">
							<?= form_error('address', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="phone">No. Tlp</label>
							<input type="text" class="form-control" id="phone" name="phone">
							<?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="company">Perusahaan</label>
							<input type="text" class="form-control" id="company" name="company">
							<?= form_error('company', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="project">Proyek</label>
							<input type="text" class="form-control" id="project" name="project">
							<?= form_error('project', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Submit</button>
						</div>
					</div>
				</form>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
