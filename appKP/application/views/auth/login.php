<link href="<?= base_url('vendor/'); ?>assets/css/style1.css" rel="stylesheet">

<div class="container mt-5 pt-4	">
	<div class=" row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
				<div class="card-body">
					<h5 class="card-title text-center"><?= $title ?></h5>

					<?= $this->session->flashdata('message'); ?>
					<form class="form-signin" method="post" action="<?= base_url('auth') ?>">
						<div class="form-label-group mb-4">
							<input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?= set_value('username') ?>">
							<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-label-group mb-4">
							<input type="password" id="password" class="form-control" name="password" placeholder="Password">
							<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>


						<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
						<hr class="my-4">

						<a href="<?php base_url(); ?>auth/register" class="text-center">Daftar Akun</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
