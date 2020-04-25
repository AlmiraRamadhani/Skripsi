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
							<label for="idtrans">Id Transaksi</label>
							<input type="text" class="form-control" id="idtrans" name="idtrans" value="<?= $product['idtrans']; ?>">
							<?= form_error('idtrans', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="denda">Alamat</label>
							<input type="text" class="form-control" id="denda" name="denda" value="<?= $product['denda']; ?>">
							<?= form_error('denda', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="fdate">Harga</label>
							<input type="date" class="form-control" id="fdate" name="fdate" value="<?= $product['fdate']; ?>">
							<?= form_error('fdate', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="ldate">Tanggal Akhir</label>
							<input type="date" class="form-control" id="ldate" name="ldate" value="<?= $product['ldate']; ?>">
							<?= form_error('ldate', '<small class="text-danger">', '</small>'); ?>
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