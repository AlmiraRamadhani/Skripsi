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
					<h3 class="card-title">Edit Data</h3>
				</div>
				<form action="" method="post">
					<div class="card-body">
						<input type="hidden" name="id" id="id" value="<?= $product['id']; ?>">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?= $product['name']; ?>">
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="harga">Harga Satu Minggu</label>
							<input type="text" class="form-control" id="owp" name="owp" value="<?= $product['owp']; ?>">
							<?= form_error('owp', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="harga">Harga Dua Minggu</label>
							<input type="text" class="form-control" id="twp" name="twp" value="<?= $product['twp']; ?>">
							<?= form_error('twp', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="harga">Harga Satu Bulan</label>
							<input type="text" class="form-control" id="omp" name="omp" value="<?= $product['omp']; ?>">
							<?= form_error('omp', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="harga">Harga Perpanjangan</label>
							<input type="text" class="form-control" id="ep" name="ep" value="<?= $product['ep']; ?>">
							<?= form_error('ep', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="berat">Berat</label>
							<input type="text" class="form-control" id="weight" name="weight" value="<?= $product['weight']; ?>">
							<?= form_error('weight', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">Stok</label>
							<input type="text" class="form-control" id="stock" name="stock" value="<?= $product['stock']; ?>">
							<?= form_error('stock', '<small class="text-danger">', '</small>'); ?>
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