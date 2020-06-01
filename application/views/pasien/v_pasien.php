<!DOCTYPE HTML>
<html>
	<head>
		<title>Form Pasien</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/pasien_main.css" />
		<noscript><link rel="stylesheet" href="<?php echo base_url()?>assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>SELAMAT DATANG <?php echo strtoupper($_SESSION['nama']); ?></h1>
						<p>Sistem Informasi &nbsp;&bull;&nbsp; Klinik &nbsp;&bull;&nbsp; Dr.Eko</p>
						<nav>
							<ul>
								<a href="<?php echo base_url('pasien/poli_umum')?>"><img src="assets/img/tambah.png" alt="" width="100" height="100" class="fa-scroll" title="Poli Umum">&emsp;</a>
								<a href="<?php echo base_url('pasien/poli_gigi')?>"><img src="assets/img/gigis.png" alt="" width="100" height="100" class="fa-scroll" title="Poli Gigi"/>&emsp;</a>
								<a href="<?php echo base_url('pasien/riwayat_periksa')?>"><img src="assets/img/riwayat.png" width="100" height="100" class="fa-scroll" title="Riwayat Periksa"/>&emsp;</a>
								<a href="<?php echo base_url('pasien/pengaturan_pasien')?>"><img src="assets/img/setting.png" width="100" height="100" class="fa-scroll" title="Pengaturan"/>&emsp;</a>
								<a href="<?php echo base_url('Login/logout');?>"><img src="assets/img/logout.png" width="100" height="100" class="fa-scroll" title="Keluar"/>&emsp;</a>
							</ul>
						</nav>
					</header>

				<!-- Footer -->
					<footer id="footer">
						<strong><font size="5"><span class="copyright">&copy;</font><strong><font color='blue' size="5"></font> <a href="<?php echo base_url('pasien')?>"><font color='red' size="5">Klinik Dr.Eko</font><font size="5"> Sehat Dimulai Dari Saya</font></strong></strong></a>.</span>
					</footer>
			</div>
		</div>
		<script>
			window.onload = function() { document.body.classList.remove('is-preload'); }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>