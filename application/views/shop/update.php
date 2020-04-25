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
                    <h3 class="card-title">Tambah Transaksi</h3>
                </div>
                <form action="<?= base_url('shop/'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tp">tanggal pinjam</label>
                            <input type="text" class="form-control" id="tp" name="tp">
                            <?= form_error('tp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tk">Tanggal Kembali</label>
                            <input type="text" class="form-control" id="tk" name="tk">
                            <?= form_error('tk', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="sb">Status Bayar</label>
                            <input type="text" class="form-control" id="sb" name="sb">
                            <?= form_error('sb', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="sp">Status Pinjam</label>
                            <input type="text" class="form-control" id="sp" name="sp">
                            <?= form_error('sp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <!-- <?php foreach ($jam as $j) : ?>
                                <p class="card-text"><?= $j['nama']; ?></p>
                                <p class="card-text"><?= $j['stok']; ?> tersedia</p>
                                <a href="<?= base_url('shop/add_to_cart/') . $j['id']; ?>" class="btn btn-primary btn-sm">Add To Cart</a>
                            <?php endforeach; ?> -->
                            <a href="<?= base_url('shop'); ?>" class="nav-link">Tambahkan Barang</a>
                        </div>
                        <div class=" form-group">
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