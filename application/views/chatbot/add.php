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
				<form action="<?= base_url('chatbot/add'); ?>" method="post">
					<div class="card-body">
						<div class="form-group">
							<label for="chatbot">Pertanyaan</label>
							<input type="text" class="form-control" id="question" name="question">
							<?= form_error('chatbot', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="chatbot">jawaban</label>
							<input type="text" class="form-control" id="answer" name="answer">
							<?= form_error('chatbot', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
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
