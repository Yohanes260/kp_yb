<div class="container">
	<br><br><br><br>
	<div class="row-mt-3">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					Form Edit Profile
				</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group row">
							<label for="username" class="col-sm-4 col-form-label">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="namaLengkap" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="namaLengkap" name="namaLengkap" value="<?= $user['namaLengkap'] ?>">
								<?= form_error('namaLengkap', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
								<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="nomortelepon" class="col-sm-4 col-form-label">Nomor Telepon</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nomortelepon" name="nomortelepon" value="<?= $user['nomortelepon'] ?>">
								<?= form_error('nomortelepon', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="jenisKelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="jenisKelamin" name="jenisKelamin" value="<?= $user['jenisKelamin'] ?>">
								<?= form_error('jenisKelamin', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<button type="submit" class="btn btn-primary mt-3">Simpan</button>
						<a href="<?= base_url('customer'); ?>" class="btn  btn-danger mt-3 ml-2">Batal</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
