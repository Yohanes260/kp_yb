<div class="container pt-5">
	<div class="row mt-5">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Form Tambah Barang
				</div>
				<div class="card-body">
					<form action="" method="POST">
						<div class="form-group">
							<label for="kodeBarang">Kode Barang</label>
							<input type="text" name="kodeBarang" class="form-control" id="kodeBarang" value="<?= set_value('kodeBarang'); ?>">
							<small class=" form-text text-danger"><?= form_error('kodeBarang'); ?></small>
						</div>
						<div class="form-group">
							<label for="namaBarang">Nama Barang</label>
							<input type="text" name="namaBarang" class="form-control" id="namaBarang" value="<?= set_value('namaBarang'); ?>">
							<small class="form-text text-danger"><?= form_error('namaBarang'); ?></small>
						</div>
						<div class="form-group">
							<label for="gambarBarang">Gambar Barang</label><br>
							<input type="file" name="gambarBarang" id="gambarBarang">
							<small class="form-text text-danger"><?= form_error('gambarBarang'); ?></small>
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi Barang</label><br>
							<input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?= set_value('deskripsi'); ?>">
							<small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
						</div>
						<div class="form-group">
							<label for="stok">Stok Barang</label>
							<input type="number" name="stok" class="form-control" id="stok" value="<?= set_value('stok'); ?>">
							<small class="form-text text-danger"><?= form_error('stok'); ?></small>
						</div>
						<button type="submit" name="tambah" class="btn btn-primary float-left">Tambah Barang</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
