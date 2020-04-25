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
								<th>Product</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Total Price</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($this->cart->contents() as $items) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $items['name']; ?></td>
									<td><input type="number" name="small" id="small" class="form-control"></td>
									<td align="right"><?= number_format($items['owp'], 0, ',', '.'); ?></td>
									<td align="right"><?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
								</tr>
							<?php $i++;
							endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<td align="right" colspan="4">Total </td>
								<td align="right"><?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
							</tr>
						</tfoot>
					</table>
					<div style="text-align: center;">
						<a href="<?= base_url('shop/clear_cart'); ?>" class="btn btn-danger">Clear Cart</a>
						<a href="<?= base_url('shop'); ?>" class="btn btn-primary">Continue Shopping</a>
						<a href="<?= base_url('order'); ?>" class="btn btn-success">Checkout</a>
					</div>
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