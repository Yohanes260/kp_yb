<br><br><br>
<!-- <?php echo 'Selamat datang ' . $user['namaLengkap']; ?> -->

<div class="container">
	<div class="row mt-4">
		<div class="col-md-6">
			<h3>Daftar Pemesanan</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Nama Barang</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Tanggal Pinjam</th>
						<th>Tanggal Kembali</th>
						<th>Total</th>
						<th>Kondisi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pemesanan as $p) { ?>
						<tr>
							<td><?= $p['nama'] ?></td>
							<td><?= $p['namaBarang'] ?></td>
							<td><?= $p['alamat'] ?></td>
							<td><?= $p['noHp'] ?></td>
							<td><?= $p['hargaSewa/hari'] ?></td>
							<td><?= $p['jumlah'] ?></td>
							<td><?= $p['tanggalPinjam'] ?></td>
							<td><?= $p['tanggalKembali'] ?></td>
							<td><?= round((strtotime($p['tanggalKembali']) - strtotime($p['tanggalPinjam'])) / (60 * 60 * 24)) * $p['hargaSewa/hari'] ?></td>
							<td>
								<?php if ($p['kondisi'] == 0) { ?>
									Menunggu Konfirmasi
								<?php } else if ($p['kondisi'] == 1) { ?>
									Peminjaman di konfirmasi
								<?php } else if ($p['kondisi'] == 2) { ?>
									Barang Sedang Dipinjam
								<?php } else if ($p['kondisi'] == 3) { ?>
									Barang Sudah Dikembalikan
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
