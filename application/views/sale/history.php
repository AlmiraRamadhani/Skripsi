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
					<table id="penyewaan" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Customer</th>
								<th>Tanggal Pinjam</th>
								<th>Tanggal Kembali</th>
								<th>Status Bayar</th>
								<th>Status Pinjaman</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($penyewaan as $p) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $p['name']; ?></td>
									<td><?= date('d-m-Y', strtotime($p['tgl_sewa'])); ?></td>
									<td><?= date('d-m-Y', strtotime($p['tgl_kembali'])); ?></td>
									<td>
										<?= $p['status_bayar']; ?>
										<!-- konfirmasi pembayaran -->
										<?php if ($p['status_bayar'] == 'Belum Dibayar') : ?>
											<a href="<?= base_url('penyewaan/konfirmasi/') . $p['id']; ?>" class="btn btn-success btn-sm">Konfirmasi Bayar</a>
										<?php else : ?>
											<a href="#" class="btn btn-success btn-sm">Konfirmasi Bayar</a>
										<?php endif; ?>
									</td>
									<td>
										b
										<!-- konfirmasi peminjaman -->
										<?php if ($p['status_pinjaman'] == 'Masih Dipinjam') : ?>
											<a href="<?= base_url('penyewaan/konfirmasi/') . $p['id']; ?>" class="btn btn-success btn-sm">Dikembalikan</a>
										<?php else : ?>
											<a href="#" class="btn btn-success btn-sm">Dikembalikan</a>
										<?php endif; ?>
									</td>
									<td>
										<a href="<?= base_url('penyewaan/detail/') . $p['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
										<a href="<?= base_url('penyewaan/delete/') . $p['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
									</td>
								</tr>
							<?php $i++;
							endforeach; ?>
						</tbody>
					</table>
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