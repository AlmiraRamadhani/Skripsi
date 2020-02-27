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
					<!-- <div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Blank Page</li>
						</ol>
					</div> -->
				</div>
			</div>
			<!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Default box -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Detail Penjualan</h3>
				</div>
				<div class="card-body">
					<table id="detail-penjualan" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Product ID</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                            $total = 0; 
                            foreach($penjualan as $o) :
                            $subtotal = $o['qty'] * $o['price'];
                            $total += $subtotal; 
                            ?>
							<tr>
								<td><?= $o['product_id']; ?></td>
								<td><?= $o['product_name']; ?></td>
								<td><?= $o['qty']; ?></td>
								<td>Rp. <?= number_format($o['price'], 0, ',', '.'); ?></td>
								<td>Rp. <?= number_format($subtotal, 0, ',', '.'); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right">Total Pembelian</td>
								<td>Rp. <?= number_format($total, 0, ',', '.'); ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					Footer
				</div>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<footer class="main-footer">
		<div class="float-right d-none d-sm-block">
			<b>Version</b> 3.0.0-rc.5
		</div>
		<strong>Copyright &copy; 2019 ALMIRA.</strong>
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
