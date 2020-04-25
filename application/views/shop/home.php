<!-- Site wrapper -->
<div class="wrapper">

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h3>Add To Cart</h3>
					</div>
					<div class="col-sm-6">
						<a href="<?= base_url('shop/show_cart/'); ?>">Cart</a>
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
					<?php foreach ($jam as $j) : ?>
						<div class="col-lg-4 col-md-3 mb-4">
							<div class="card h-10">
								<!-- <h4 class="card-title">
										<a href="#"><?= $j['name']; ?></a>
									</h4> -->
								<p class="card-text"><?= $j['name']; ?></p>
								<p class="card-text"><?= $j['stock']; ?> tersedia</p>
								<?php echo anchor('shop/add_to_cart/' .$j['id'], '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>
							</div>
						</div>
					<?php endforeach; ?>
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