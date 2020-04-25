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
					<h3 class="card-title">Tambah Data</h3>
				</div>
				<form action="<?= base_url('denda/add'); ?>" method="post">
					<div class="card-body">
						<div class="form-group">
							<label for="id">id</label>
							<select name="id" id="id" class="form-control">
								<option value="">--Id Transaksi--</option>
								<?php foreach ($shop as $c) : ?>
									<option value="<?= $c['id'] ?>"><?= $c['id']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="denda">Denda</label>
							<input type="text" class="form-control" id="denda" name="denda">
							<?= form_error('denda', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="fdate">Tanggal Awal</label>
							<input type="date" class="form-control" id="fdate" name="fdate">
							<?= form_error('fdate', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="ldate">Tanggal Akhir</label>
							<input type="date" class="form-control" id="ldate" name="ldate">
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