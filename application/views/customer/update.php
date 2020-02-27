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
				<form action="" method="post">
					<div class="card-body">
						<input type="hidden" name="id" id="id" value="<?= $customer['id']; ?>">
						<div class="form-group">
							<label for="stok">No KTP</label>
							<input type="text" class="form-control" id="id_ktp" name="id_ktp"
								value="<?= $customer['id_ktp']; ?>">
							<?= form_error('id_ktp', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="name">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama"
								value="<?= $customer['nama']; ?>">
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat"
								value="<?= $customer['alamat']; ?>">
							<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">No. Tlp</label>
							<input type="text" class="form-control" id="no_tlp" name="no_tlp"
								value="<?= $customer['no_tlp']; ?>">
							<?= form_error('no_tlp', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">Perusahaan</label>
							<input type="text" class="form-control" id="perusahaan" name="perusahaan"
								value="<?= $customer['perusahaan']; ?>">
							<?= form_error('perusahaan', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">Proyek</label>
							<input type="text" class="form-control" id="proyek" name="proyek"
								value="<?= $customer['proyek']; ?>">
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
