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
					<table id="user" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama User</th>
								<th>Email</th>
								<th>Subject</th>
								<th>Comment</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; foreach($user as $u) : ?>
							<tr>
								<td><?= $i; ?></td>
								<td><?=$u['nama'];?></td>
								<td><?=$u['email'];?></td>
								<td><?=$u['subject'];?></td>
								<td><?=$u['comment'];?></td>
								<td>
									<!-- <a href="<?= base_url('category/update/') . $k['id']; ?>"
										class="btn btn-success btn-sm">Edit</a> -->
									<a href="<?= base_url('category/delete/') . $u['id']; ?>"
										class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							<?php $i++; endforeach; ?>
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
