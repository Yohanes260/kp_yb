<br><br><br><br>
<?php echo 'Selamat datang ' . $user['namaLengkap']; ?>

<div class="container">
	<?php if ($this->session->flashdata('flash')) : ?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Barang <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('message')) : ?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Profil <strong>berhasil</strong> <?= $this->session->flashdata('message'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row mt-4">
		<div class="col-md-6">
			<h3>Daftar Barang</h3>
			<form action="" method="POST">
				<div class="input-group mb-3 mt-3">
					<input type="text" class="form-control" placeholder="Cari data barang" name="cari" autocomplete="off">
					<div class="input-group-append">
						<input class="btn btn-primary" type="submit" name="submit"></input>
					</div>
				</div>
			</form>
			<ul class="list-group">
				<?php foreach ($admin as $adm) : ?>
					<li class="list-group-item">
						<?= $adm['namaBarang']; ?>
						<a href="<?= base_url(); ?>admin/hapus/<?= $adm['kodeBarang']; ?>" class="badge badge-danger float-right mr-2" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
						<a href="<?= base_url(); ?>admin/ubah/<?= $adm['kodeBarang']; ?>" class="badge badge-success float-right mr-2">Ubah</a>
						<a href="<?= base_url(); ?>admin/detail/<?= $adm['kodeBarang']; ?>" class="badge badge-primary float-right mr-2">Detail</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div>
		<a href="<?= base_url('admin/tambahBarang'); ?>" class="btn btn-primary mt-4">Tambah data barang</a>
	</div>
	<br><br>
</div>
