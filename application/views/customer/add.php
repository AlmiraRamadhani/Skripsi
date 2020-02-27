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
							<label for="cat">No KTP</label>
							<input type="text" class="form-control" id="id_ktp" name="id_ktp">
							<?= form_error('id_ktp', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="cat">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama">
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="cat">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat">
							<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="cat">No. Tlp</label>
							<input type="text" class="form-control" id="no_tlp" name="no_tlp">
							<?= form_error('no_tlp', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="cat">Perusahaan</label>
							<input type="text" class="form-control" id="perusahaan" name="perusahaan">
							<?= form_error('perusahaan', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="cat">Proyek</label>
							<input type="text" class="form-control" id="proyek" name="proyek">
							<?= form_error('proyek', '<small class="text-danger">', '</small>'); ?>
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
