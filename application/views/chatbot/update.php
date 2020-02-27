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
				<form action="" method="post">
					<div class="card-body">
						<input type="hidden" name="id" id="id" value="<?= $question['id']; ?>">
						<div class="form-group">
							<label for="name">Pertanyaan</label>
							<input type="text" class="form-control" id="question" name="question" value="<?= $question['question']; ?>">
							<?= form_error('question', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="name">Jawaban</label>
							<input type="text" class="form-control" id="answer" name="answer" value="<?= $question['answer']; ?>">
							<?= form_error('answer', '<small class="text-danger">', '</small>'); ?>
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