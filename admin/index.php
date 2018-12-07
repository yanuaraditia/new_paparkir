<?php
session_start();
require_once('../dashboard/qlib.php');
if (!isset($_SESSION['id_admin'])) {
		header("location: login.php");
}
$oop = new AdminClass();
?>
<!doctype html>
<html lang="en" id="load_content">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<title>Dashboard | <?php echo $_SESSION['nama_admin'];?></title>

		<meta name="mobile-web-app-capable" content="yes">
		<link rel="icon" sizes="192x192" href="../images/android-desktop.png">

		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-title" content="Material Design Lite">
		<link rel="apple-touch-icon-precomposed" href="../images/ios-desktop.png">

		<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
		<meta name="msapplication-TileColor" content="#3372DF">

		<link rel="icon" href="..images/favicon.png" sizes="32x32" type="image/png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans:400|Roboto:400,400italic,500,500italic,700,700italic|Roboto+Mono:400,500,700|Material+Icons">
		<link rel="stylesheet" href="../mdl/material.css">
		<link rel="stylesheet" href="styles.css">

	</head>
	<body>
		<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
			<header class="demo-header mdl-layout__header mdl-color-text--grey-600">
				<div class="mdl-layout__header-row">
					<span class="mdl-layout-title">Menu Utama</span>
					<div class="mdl-layout-spacer"></div>
					<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
						<i class="material-icons">more_vert</i>
					</button>
					<ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
						<li class="mdl-menu__item">About</li>
						<li class="mdl-menu__item">Contact</li>
						<li class="mdl-menu__item">Legal information</li>
					</ul>
				</div>
			</header>
			<div class="demo-drawer mdl-layout__drawer mdl-coloriex mdl-color-text--blue-grey-50">
				<header class="demo-drawer-header">
					<div class="demo-avatar-dropdown">
						<span><?php echo $_SESSION['nama_admin'];?></span>
						<div class="mdl-layout-spacer"></div>
						<button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
							<i class="material-icons" role="presentation">expand_more</i>
							<span class="visuallyhidden">Accounts</span>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
							<li class="mdl-menu__item" disabled="">Pengaturan Akun</li>
							<li class="mdl-menu__item"><a href="logout.php">Keluar</a></li>
						</ul>
					</div>
				</header>
				<nav class="demo-navigation mdl-navigation mdl-colorized">
					<a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">home</i>Menu Utama</a>
					<div class="mdl-layout-spacer"></div>
					<a class="mdl-navigation__link mdl-smart-btn" href=""><i class="material-icons" role="presentation">help_outline</i>Bantuan</a>
				</nav>
			</div>
			<main class="mdl-layout__content" id="load_content">
				<div class="mdl-grid demo-content">
					<div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
						<table class="mdl-data-table mdl-js-data-table" width="100%">
							<thead>
								<tr>
									<th class="mdl-data-table__cell--numeric">ID</th>
									<th class="mdl-data-table__cell--non-numeric">Nama Pengguna</th>
									<th class="mdl-data-table__cell--non-numeric">Nomor Polisi</th>
									<th class="mdl-data-table__cell--non-numeric">Jenis Kendaraan</th>
									<th class="mdl-data-table__cell--non-numeric">Kondisi</th>
									<th class="mdl-data-table__cell--non-numeric">Total Tarif</th>
									<th class="mdl-data-table__cell--non-numeric">Bayar</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$do = $oop->__list_user($con);
							while($view=mysqli_fetch_array($do)) {
							?>
								<tr>
									<td class="mdl-data-table__cell--numeric"><?php echo $view['id_pengguna'];?></td>
									<td class="mdl-data-table__cell--non-numeric"><?php echo $view['nama_pengguna'];?></td>
									<td class="mdl-data-table__cell--non-numeric"><?php echo $view['nopol_pengguna'];?></td>
									<td class="mdl-data-table__cell--non-numeric"><?php echo $view['nama_jenis'];?></td>
									<?php
									if($view['status_parkir']==NULL) {
									echo "<td class=\"mdl-data-table__cell--non-numeric\">Belum Terparkir</td>";
									echo "<td class=\"mdl-data-table__cell--non-numeric\">-</td>";
									echo "<td></td>";
									}
									else {
									$masuk = New DateTime($view['tanggal_masuk']);
									$sekarang = New DateTime(date('Y-m-d'));
									$total_hari = $masuk->diff($sekarang);
									$total_bayar = $standar_tarif*($total_hari->days+1);
									echo "<td class=\"mdl-data-table__cell--non-numeric\">Terparkir</td>";
									echo "<td class=\"mdl-data-table__cell--non-numeric\">Rp.".$total_bayar."</td>";
									echo "<td class=\"mdl-data-table__cell--non-numeric\"><a class=\"mdl-button mdl-js-button mdl-button--icon\" href=\"bayar.php?id=".base64_encode($view['id_pengguna'])."\"><i class=\"material-icons\">check</i></a></td>";
									}
									?>
								</tr>
								<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</main>
		</div>
		<script src="../mdl/material.min.js"></script>
	</body>
</html>
