<div class="container pt-5">
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Form Sewa Barang
				</div>
				<div class="card-body">
					<form action="<?= site_url('customer/tambah_pemesanan') ?>" method="POST">
						<div class="form-group">
							<label for="id_customer">ID Customer</label>
							<input type="text" name="id_customer" class="form-control" id="id_customer" value="<?= $user['id']; ?>" readonly>
							<!-- <small class=" form-text text-danger"><?= form_error('id_customer'); ?></small> -->
						</div>
						<div class="form-group">
							<label for="kodeBarang">Kode Barang</label>
							<input type="text" name="kodeBarang" class="form-control" id="kodeBarang" value="<?= $customer['kodeBarang']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama Peminjam</label>
							<input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama'); ?>">
						</div>
						<div class="form-group">
							<label for="alamat">Alamat Pengantaran</label>
							<input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat'); ?>">
						</div>
						<div class="form-group">
							<label for="telepon">Nomor Telepon</label><br>
							<input type="number" name="telepon" class="form-control" id="telepon" value="<?= set_value('telepon'); ?>">
						</div>
						<div class="form-group">
							<label for="tanggalpinjam">Tanggal Pinjam</label>
							<input type="date" name="tanggalpinjam" class="form-control" id="tanggalpinjam" value="<?= set_value('tanggalpinjam'); ?>">
						</div>
						<div class="form-group">
							<label for="tanggalkembali">Tanggal Kembali</label>
							<input type="date" name="tanggalkembali" class="form-control" id="tanggalkembali" value="<?= set_value('tanggalkembali'); ?>">
						</div>
						<div class="form-group">
							<label for="biaya">Biaya</label>
							<input type="number" name="biaya" class="form-control" id="biaya" value="<?= $customer['hargaSewa/hari'] ?>" readonly>
						</div>
						<br>
						<button type="submit" name="tambah" class="btn btn-primary float-left">Sewa Barang</button>
						<a href="<?= base_url('customer'); ?>" class="btn btn-danger ml-3">Batal</a>
					</form>
				</div>
			</div>
			<br>
		</div>
	</div>
</div>
