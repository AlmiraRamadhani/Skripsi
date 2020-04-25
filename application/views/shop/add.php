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
                <form action="<?= base_url('sale'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <select name="name" id="name" class="form-control">
								<option value="">--Pilih Customer--</option>
								<?php foreach($customer as $c) : ?>
								<option value="<?= $c['id'] ?>"><?= $c['name']; ?></option>
								<?php endforeach; ?>
							</select>
                        </div>
                        <div class="form-group">
                            <label for="tp">Tanggal Pinjam</label>
                            <input type="date" class="form-control" id="tp" name="tp">
                            <?= form_error('tp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tk">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tk" name="tk">
                            <?= form_error('tk', '<small class="text-danger">', '</small>'); ?>
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