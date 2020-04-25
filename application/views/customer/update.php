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
							<input type="text" class="form-control" id="nik" name="nik"
								value="<?= $customer['nik']; ?>">
							<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="name">Nama</label>
							<input type="text" class="form-control" id="name" name="name"
								value="<?= $customer['name']; ?>">
							<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">Alamat</label>
							<input type="text" class="form-control" id="address" name="address"
								value="<?= $customer['address']; ?>">
							<?= form_error('address', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">No. Tlp</label>
							<input type="text" class="form-control" id="phone" name="phone"
								value="<?= $customer['phone']; ?>">
							<?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">Perusahaan</label>
							<input type="text" class="form-control" id="company" name="company"
								value="<?= $customer['company']; ?>">
							<?= form_error('company', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">Proyek</label>
							<input type="text" class="form-control" id="project" name="project"
								value="<?= $customer['project']; ?>">
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
