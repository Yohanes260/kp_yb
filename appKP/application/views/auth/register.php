<link href="<?= base_url('vendor/'); ?>assets/css/style1.css" rel="stylesheet">

<div class="container mt-5 pt-4	">
	<div class=" row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
				<div class="card-body">
					<h5 class="card-title text-center"><?= $title ?></h5>
					<form class="form-signin" action="<?= base_url("auth/register") ?>" method="POST">
						<div class="form-label-group mb-4">
							<input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?= set_value('username') ?>">
							<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-label-group mb-4">
							<input type="password" id="password" class="form-control" name="password" placeholder="Password">
							<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-label-group mb-4">
							<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" value="<?= set_value('nama') ?>">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class=" form-label-group mb-4">
							<input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>">
							<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class=" form-label-group mb-4 ml-2">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jk" id="jkl" value="Laki-laki">
								<label class="form-check-label" for="inlineRadio1">Laki-laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jk" id="jkp" value="Perempuan">
								<label class="form-check-label" for="inlineRadio2">Perempuan</label>
							</div>
							<br><?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-label-group mb-4">
							<input type="number" id="notelepon" class="form-control" name="notelepon" placeholder="Nomor Telepon" value="<?= set_value('notelepon') ?>">
							<?= form_error('notelepon', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Daftar</button>
						<hr class="my-4">

						<a href="<?= base_url(); ?> "> Sudah punya akun? Silakan Login</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
