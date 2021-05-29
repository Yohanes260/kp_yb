<br><br><br><br>
<div class="ml-3">
	<?php echo 'Selamat datang ' . $user['namaLengkap']; ?>
</div>
<hr>
<div class="container">
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
	<div class="row">
		<div class="col-md-4">
			<h3>Daftar Barang</h3>
			<form action="" method="POST">
				<div class="input-group mb-3 mt-3">
					<input type="text" class="form-control" placeholder="Cari data barang" name="cari" autocomplete="off">
					<div class="input-group-append">
						<input class="btn btn-primary" type="submit" name="submit"></input>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-8"></div>
		<?php foreach ($customer as $cust) : ?>
			<div class="col-md-3 col-sm-6 mt-4">
				<a href="<?= base_url(); ?>customer/detail/<?= $cust['kodeBarang']; ?>" class="text-secondary">
					<div class="card card-block">
						<h4 class="card-title text-right"><i class="material-icons"></i></h4>
						<img src="<?= base_url('assets/image/') . $cust['gambarBarang']; ?>" class="card-img" alt="Photo of sunset" height="250px">

						<h5 class="card-title mt-5 mb-3" style="font-size: 15px;"><?= $cust['namaBarang']; ?></h5>
						<!-- <p class="card-text"> <?= $cust['deskripsi']; ?></p> -->
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
	<br><br>
</div>
