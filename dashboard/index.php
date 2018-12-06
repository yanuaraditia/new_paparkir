<?php
session_start();
require_once('qlib.php');
if(!isset($_SESSION['id_pengguna'])&&isset($_SESSION['nama_pengguna'])) {
	header('location:../login.php');
}
$oop = new SmartQuery();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<title>Dashboard | <?php echo $_SESSION['nama_pengguna'];?></title>

		<meta name="mobile-web-app-capable" content="yes">
		<link rel="icon" sizes="192x192" href="images/android-desktop.png">

		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-title" content="Material Design Lite">
		<link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

		<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
		<meta name="msapplication-TileColor" content="#3372DF">

		<link rel="icon" href="..images/favicon.png" sizes="32x32" type="image/png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans:400|Roboto:400,400italic,500,500italic,700,700italic|Roboto+Mono:400,500,700|Material+Icons">
		<link rel="stylesheet" href="../mdl/material.css">
		<link rel="stylesheet" href="styles.css">
		<style>
		#view-source {
			position: fixed;
			display: block;
			right: 0;
			bottom: 0;
			margin-right: 40px;
			margin-bottom: 40px;
			z-index: 900;
		}
		</style>
	</head>
	<body>
		<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
			<header class="demo-header mdl-layout__header mdl-color-text--grey-600">
				<div class="mdl-layout__header-row">
					<span class="mdl-layout-title">Home</span>
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
					<img src="images/user.jpg" class="demo-avatar">
					<div class="demo-avatar-dropdown">
						<span><?php echo $_SESSION['nama_pengguna'];?></span>
						<div class="mdl-layout-spacer"></div>
						<button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
							<i class="material-icons" role="presentation">expand_more</i>
							<span class="visuallyhidden">Accounts</span>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
							<li class="mdl-menu__item">Pengaturan Akun</li>
							<li class="mdl-menu__item">Keluar</li>
						</ul>
					</div>
				</header>
				<nav class="demo-navigation mdl-navigation mdl-colorized">
					<a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">home</i>Menu Utama</a>
					<a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">inbox</i>Notifikasi</a>
					<a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">history</i>Riwayat</a>
					<a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">card_giftcard</i>Upgrade</a>
					<div class="mdl-layout-spacer"></div>
					<a class="mdl-navigation__link mdl-smart-btn" href=""><i class="material-icons" role="presentation">help_outline</i>Bantuan</a>
				</nav>
			</div>
			<main class="mdl-layout__content">
				<div class="mdl-grid demo-content">
					<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
						<div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
							<h2 class="mdl-card__title-text mdl-color-text--white">AA 4556 RD
								<button id="demo-menu-lower-left" class="mdl-button mdl-js-button mdl-button--icon">
									<i class="material-icons">expand_more</i>
								</button>
							</h2>
							<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect"
									for="demo-menu-lower-left">
								<li class="mdl-menu__item">Some Action</li>
								<li class="mdl-menu__item">Another Action</li>
							</ul>
						</div>
						<div class="mdl-card__supporting-text mdl-color-text--grey-600">
							Non dolore elit adipisicing ea reprehenderit consectetur culpa.
						</div>
					</div>
					<div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
						<ul class="demo-list-three mdl-list">
							<?php
							$area = $oop->__area_list($con);
							$row = mysqli_num_rows($area);
							if($row>0) {
								while($view=mysqli_fetch_array($area)) {
							?>
							<li class="mdl-list__item mdl-list__item--three-line">
								<span class="mdl-list__item-primary-content">
									<span><?php echo $view['nama_area'];?></span>
									<span class="mdl-list__item-text-body"><?php echo $view['alamat'];?></span>
								</span>
								<span class="mdl-list__item-secondary-content">
									<a class="mdl-list__item-secondary-action mdl-button mdl-js-button mdl-button--icon" href="#"><i class="material-icons">arrow_forward</i></a>
								</span>
							</li>
							<?php }} else { ?>
							<li class="mdl-list__item mdl-list__item--three-line">
								<span class="mdl-list__item-primary-content">
									<span>Lokasi Tidak Tersedia</span>
								</span>
							</li>
							<?php }?>
						</ul>
						<div class="mdl-card__actions mdl-card--border search-input">
							<form action="#">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label search-input mdl-search--iconset">
									<input class="mdl-textfield__input" type="text" id="sample3">
									<label class="mdl-textfield__label" for="sample3"><i class="material-icons">search</i><span>Cari Lokasi</label>
								</div>
							</form>
						</div>
					</div>
					<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
						<div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
							<h2 class="mdl-card__title-text mdl-color-text--white">AA 4556 RD</h2>
						</div>
					</div>
					<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
						<div class="mdl-card__title mdl-card--expand mdl-color--purple-300">
							<h2 class="mdl-card__title-text mdl-color-text--white">Belum Terparkir</h2>
						</div>
					</div>
					<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
						<div class="mdl-card__title mdl-card--expand mdl-color--green-300">
							<h2 class="mdl-card__title-text mdl-color-text--white">Rp.-</h2>
						</div>
					</div>
				</div>
			</main>
		</div>
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
				<defs>
					<mask id="piemask" maskContentUnits="objectBoundingBox">
						<circle cx=0.5 cy=0.5 r=0.49 fill="white" />
						<circle cx=0.5 cy=0.5 r=0.40 fill="black" />
					</mask>
					<g id="piechart">
						<circle cx=0.5 cy=0.5 r=0.5 />
						<path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
					</g>
				</defs>
			</svg>
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
				<defs>
					<g id="chart">
						<g id="Gridlines">
							<line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
							<line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
							<line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
							<line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
							<line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
						</g>
						<g id="Numbers">
							<text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
							<text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
							<text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
							<text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
							<text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
							<text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
							<text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
							<text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
							<text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
							<text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
							<text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
							<text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
						</g>
						<g id="Layer_5">
							<polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
							294.5,80.5 380,165.2 437,75.5 469.5,223.3 	"/>
						</g>
						<g id="Layer_4">
							<polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
							296.7,128 380.7,184.3 436.7,125 	"/>
						</g>
					</g>
				</defs>
			</svg>
		<script src="../mdl/material.min.js"></script>
	</body>
</html>
