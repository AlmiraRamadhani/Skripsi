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
				<div class="card-body">
					<a href="<?= base_url('product/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data</a>
					<br>
					<table id="product" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Kategori</th>
								<th>Nama Barang</th>
								<th>Harga</th>
								<th>Berat</th>
								<th>Stok</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($product as $p) : ?>
							<tr>
								<th><?= ++$start; ?></th>
								<td><?=$p['id_kategori'];?></td>
								<td><?= $p['nama']; ?></td>
								<td>Rp. <?= number_format($p['harga'], 2, ',', '.'); ?></td>
								<td><?= number_format($p['berat']); ?> gram</td>
								<td><?= $p['stok']; ?></td>
								<td>
									<a href="<?= base_url('product/update/') . $p['id']; ?>"
										class="btn btn-success btn-sm">Edit</a>
									<a href="<?= base_url('product/delete/') . $p['id']; ?>"
										class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<?= $this->pagination->create_links(); ?>

				</div>
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
