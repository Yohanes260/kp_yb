<header id="header" class="fixed-top">
	<div class="container d-flex align-items-center">

		<a href="<?= base_url('customer') ?>" class="logo mr-auto"><img src="<?= base_url(); ?>assets/image/logocv.jpeg" alt="" class="img-fluid"></a>

		<!-- Uncomment below if you prefer to use text as a logo -->
		<!-- <h1 class="logo mr-auto"><a href="index.html">Butterfly</a></h1> -->

		<nav class="nav-menu d-none d-lg-block">
			<ul>
				<li class="active"><a href="<?= base_url('customer') ?>">Home</a></li>
				<li><a href="#about">Pemesanan</a></li>
				<li><a href="<?= base_url('customer/tentangkami') ?>">Tentang Kami</a></li>
				<li class="drop-down"><a href="">Akun</a>
					<ul>
						<li><a href="<?= base_url('customer/editProfile') ?>">Ubah Data Akun</a></li>
						<li><a href="<?= base_url('auth/logout') ?>">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</nav><!-- .nav-menu -->

	</div>
</header><!-- End Header -->
