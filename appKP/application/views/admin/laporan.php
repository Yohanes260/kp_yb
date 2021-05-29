<br><br><br><br>

<div class="container">
	<div class="row-mt-4">
		<div class="col-md-5">
			<h3>Daftar Laporan Transaksi</h3>
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
					</tr>
				</thead>
				<tbody>
					<?php foreach ($laporan as $l) { ?>
						<tr>
							<td><?= $l['nama'] ?></td>
							<td><?= $l['namaBarang'] ?></td>
							<td><?= $l['alamat'] ?></td>
							<td><?= $l['noHp'] ?></td>
							<td><?= $l['hargaSewa/hari'] ?></td>
							<td><?= $l['jumlah'] ?></td>
							<td><?= $l['tanggalPinjam'] ?></td>
							<td><?= $l['tanggalKembali'] ?></td>
							<td><?= round((strtotime($l['tanggalKembali']) - strtotime($l['tanggalPinjam'])) / (60 * 60 * 24)) * $l['hargaSewa/hari'] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
