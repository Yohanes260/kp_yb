<div class="container">
	<br><br>
	<div class="mt-5">
		<div class="col-md-13">
			<div class="card">
				<div class="card-header">
					Detail Barang
				</div>
				<div class="col-sm-4 m-4">
					<img src="<?= base_url('assets/image/') . $customer['gambarBarang']; ?>" class="card-img">
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $customer['namaBarang']; ?></h5>
					<h5 class="card-title">Deskripsi : <?= $customer['deskripsi']; ?></h5>
					<h5 class="card-title mt-2">Stok : <?= $customer['stok']; ?></h5>
					<h5 class="card-title mt-2">Harga Sewa/hari : <?= $customer['hargaSewa/hari']; ?></h5>
					<a href="<?= base_url('customer/formsewa/') . $customer['kodeBarang']; ?>" class="btn btn-success mt-3">Sewa</a>
					<a href="<?= base_url('customer'); ?>" class="btn btn-primary mt-3 ml-2">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>
