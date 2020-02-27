<!-- Page Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-3">
			<h3 class="my-4">Penyewaan Scaffolding Samarinda</h3>
			<div class="list-group">
				<a href="<?= base_url('shop'); ?>" class="list-group-item">Semua Kategori</a>
				<a href="<?= base_url('shop/index/1'); ?>" class="list-group-item">Per 1 Minggu</a>
				<a href="<?= base_url('shop/index/2'); ?>" class="list-group-item">Per 2 Minggu</a>
				<a href="<?= base_url('shop/index/3'); ?>" class="list-group-item">Per 1 Bulan</a>
			</div>
		</div>
		<!-- /.col-lg-3 -->
		<div class="col-lg-9">
			<!-- <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img class="d-block img-fluid" src="<?= base_url('assets/'); ?>img/scaffolding/scaffolding-1.jpg"
							alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="<?= base_url('assets/'); ?>img/scaffolding/scaffolding-2.jpg"
							alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="<?= base_url('assets/'); ?>img/scaffolding/scaffolding-3.jpg"
							alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div> -->
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
