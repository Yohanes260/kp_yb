<div class="container">
	<br><br>
	<div class="mt-5">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Detail Barang
				</div>
				<div class="col-sm-4 m-4">
					<img src="<?= base_url('assets/image/') . $admin['gambarBarang']; ?>" class="card-img" alt="...">
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $admin['namaBarang']; ?></h5>
					<h5 class="card-title">Deskripsi : <?= $admin['deskripsi']; ?></h5>
					<h5 class="card-title mt-2">Stok : <?= $admin['stok']; ?></h5>
					<h5 class="card-title mt-2">Harga Sewa/hari : <?= $admin['hargaSewa/hari']; ?></h5>
					<a href="<?= base_url('admin'); ?>" class="btn btn-primary mt-3">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>
