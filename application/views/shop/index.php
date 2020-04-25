<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- /.col-lg-3 -->
		<div class="col-lg-9">
			<div class="row">
				<?php foreach($jam as $j) : ?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<h4 class="card-title">
								<a href="#"><?= $j['nama']; ?></a>
							</h4>
							<h5>Rp. <?= number_format($j['price'], 2, ',', '.'); ?></h5>
							<p class="card-text"><?= $j['name']; ?></p>
							<p class="card-text"><?= $j['stok']; ?> tersedia</p>
						</div>
						<div class="card-footer">
							<a href="<?= base_url('shop/add_to_cart/') . $j['id']; ?>"
								class="btn btn-primary btn-sm">Add To Cart</a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.col-lg-9 -->
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->
