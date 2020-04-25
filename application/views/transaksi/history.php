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
                    <table id="product" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Customer</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Selesai</th>
                                <th>Status Peminjaman</th>
                                <th>Status Pembayaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaksi as $p) : ?>
                                <tr>
                                    <th><?= ++$start; ?></th>
                                    <td><?= $p['name']; ?></td>
                                    <td><?= $p['fdate']; ?></td>
                                    <td><?= $p['ldate']; ?></td>
                                    <td><?= $p['borrow']; ?></td>
                                    <td><?= $p['cost']; ?></td>
                                    <td>
                                        <a href="<?= base_url('transaksi/detail/') . $p['id']; ?>" class="btn btn-success btn-sm">Detail</a>
                                        <a href="<?= base_url('transaksi/update/') . $p['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="<?= base_url('transaksi/delete/') . $p['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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