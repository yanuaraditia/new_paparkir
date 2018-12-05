<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<title>Paparkir | Kemudahan Parkir Dalam Genggaman</title>
    	<meta name="description" content="Sistem pencarian parkir beserta detektor otomatis. Kendaraan akan tercatat secara otomatis, dan sistem bergerak dengan model realtime.">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans:400|Roboto:400,400italic,500,500italic,700,700italic|Roboto+Mono:400,500,700|Material+Icons">
		<link rel="icon" href="images/favicon.png" sizes="32x32" type="image/png">
		<link rel="stylesheet" href="mdl/material.css">
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
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
			<div class="android-header mdl-layout__header mdl-layout__header--waterfall">
				<div class="mdl-layout__header-row">
					<span class="android-title mdl-layout-title">
						<img class="android-logo-image" src="images/android-logo.png">
					</span>
					<div class="android-header-spacer mdl-layout-spacer"></div>
					<span class="android-mobile-title mdl-layout-title">
						<img class="android-logo-image" src="images/android-logo.png">
					</span>
				</div>
			</div>

			<div class="paparkir-drawer mdl-layout__drawer">
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="">Beranda</a>
					<a class="mdl-navigation__link" href="#fitur">Fitur</a>
					<a class="mdl-navigation__link" href="#harga">Harga</a>
					<div class="paparkir-drawer-separator"></div>
					<span class="mdl-navigation__link" href="">Laman Kami</span>
					<a class="mdl-navigation__link" href="partner.paparkir.com" target="_blank">Mitra Paparkir</a>
					<a class="mdl-navigation__link" href="mailto:admin@paparkir.com">Join Paparkir Dev</a>
					<div class="paparkir-drawer-separator"></div>
					<span class="mdl-navigation__link" href="">Supported By</span>
					<a class="mdl-navigation__link" href=""><img src="images/amikom.png"></a>
					<a class="mdl-navigation__link" href=""><img src="images/abp.png"></a>
				</nav>
			</div>

			<div class="android-content mdl-layout__content">
				<a name="top"></a>
				<div class="paparkir-pricing-section" id="harga">
					<div class="android-card-container mdl-grid">
						<form class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card session">
							<h4>Masuk</h4>
							  <div class="mdl-textfield mdl-js-textfield">
							  	<input class="mdl-textfield__input" type="text" id="sample1">
							  	<label class="mdl-textfield__label" for="sample1">Username</label>
							  </div>
							  <div class="mdl-textfield mdl-js-textfield">
							  	<input class="mdl-textfield__input" type="password" id="sample1">
							  	<label class="mdl-textfield__label" for="sample1">Password</label>
							  </div>
							  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Masuk</button>
							  <span class="mdl-typography--text-center mdl-m-t-20">Belum punya akun? <a href="register.php">Daftar</a></span>
						</form>
					</div>
				</div>
			</div>
		</div>
		<a id="view-source" class="mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect"><i class="material-icons">contacts</i></a>
		<ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect"
				data-mdl-for="view-source">
			<li class="mdl-menu__item"><a href="https://api.whatsapp.com/send?phone=082243374043" target="_blank">WhatsApp</a></li>
			<li class="mdl-menu__item"><a href="https://facebook.com/paparkir" target="_blank">Facebook</a></li>
			<li class="mdl-menu__item"><a href="https://instagram.com/paparkir" target="_blank">Instagram</a></li>
			<li class="mdl-menu__item"><a href="mailto:paparkir@gmail.com" target="_blank">paparkir@gmail.com</a></li>
		</ul>
		<script src="mdl/material.min.js"></script>
	</body>
</html>
