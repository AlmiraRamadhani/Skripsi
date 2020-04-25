<!-- Site wrapper -->
<div class="wrapper">

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
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Halaman Ganti Password</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/changePassword'); ?>" method="post">
                            <?php if ($this->session->flashdata('same_password')) : ?>
                                <div class="alert alert-danger" role="alert"><b><?= $this->session->flashdata('same_password'); ?></b></div>
                            <?php elseif ($this->session->flashdata('password_success')) : ?>
                                <div class="alert alert-success" role="alert"><b><?= $this->session->flashdata('password_success'); ?></b></div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="password"><b>Password Baru</b></label>
                                <input type="password" class="form-control" id="password1" name="password1">
                                <?php echo form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirm"><b>Konfirmasi Password Baru</b></label>
                                <input type="password" class="form-control" id="password2" name="password2">
                                <?php echo form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-fw fa-key"></i> Ganti Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->