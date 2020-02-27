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
					<a href="<?= base_url('chatbot/add'); ?>" class="btn btn-primary">Tambah Data</a>
					<br><br>
					<table id="question" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Question</th>
								<th>Answer</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($question as $k) : ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $k['question']; ?></td>
									<td><?= $k['answer']; ?></td>
									<td>
										<a href="<?= base_url('chatbot/update/') . $k['id']; ?>" class="btn btn-success btn-sm">Edit</a>
										<a href="<?= base_url('chatbot/delete/') . $k['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
									</td>
								</tr>
							<?php $i++;
							endforeach; ?>
						</tbody>
					</table>
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