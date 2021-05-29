<div class="container">
	<br><br><br>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Form Ubah Barang
				</div>
				<div class="card-body">
					<form method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="kodeBarang" value="<?= $admin['kodeBarang'] ?>">
						<div class="form-group">
							<label for="kodeBarang">Kode Barang</label>
							<input type="text" name="kodeBarang" class="form-control" id="kodeBarang" value="<?= $admin['kodeBarang']; ?>" readonly>
							<small class="form-text text-danger"><?= form_error('kodeBarang'); ?></small>
						</div>
						<div class="form-group">
							<label for="namaBarang">Nama Barang</label>
							<input type="text" name="namaBarang" class="form-control" id="namaBarang" value="<?= $admin['namaBarang']; ?>">
							<small class="form-text text-danger"><?= form_error('namaBarang'); ?></small>
						</div>
						<div class="form-group">
							<label for="gambarBarang">Gambar Barang</label><br>
							<div class="col-sm-3">
								<img src="<?= base_url('assets/image/') . $admin['gambarBarang']; ?>" class="card-img">
							</div>
							<input type="file" name="gambarBarang" id="gambarBarang">
							<small class="form-text text-danger"><?= form_error('gambarBarang'); ?></small>
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi Barang</label><br>
							<input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?= $admin['deskripsi']; ?>">
							<small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
						</div>
						<div class="form-group">
							<label for="stok">Stok Barang</label>
							<input type="number" name="stok" class="form-control" id="stok" value="<?= $admin['stok']; ?>">
							<small class="form-text text-danger"><?= form_error('stok'); ?></small>
						</div>
						<div class="form-group">
							<label for="hargaSewa/hari">Harga Sewa/hari</label>
							<input type="number" name="hargaSewa/hari" class="form-control" id="hargaSewa/hari" value="<?= $admin['hargaSewa/hari']; ?>">
							<small class="form-text text-danger"><?= form_error('hargaSewa/hari'); ?></small>
						</div>
						<button type="submit" name="ubah" class="btn btn-primary float-left">Ubah Barang</button>
						<a href="<?= base_url('admin'); ?>" class="btn btn-danger ml-3">Batal</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
