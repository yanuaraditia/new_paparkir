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
					<div class="paparkir-find-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
						<label class="mdl-button mdl-js-button mdl-button--icon" id="more-button">
              <i class="material-icons">account_circle</i>
						</label>
						<div class="mdl-textfield__expandable-holder">
							<input class="mdl-textfield__input" type="text" id="search-field">
						</div>
					</div>
					<div class="android-navigation-container">
						<nav class="android-navigation mdl-navigation">
							<a class="mdl-navigation__link" href="#">Beranda</a>
							<a class="mdl-navigation__link" href="#fitur">Fitur</a>
							<a class="mdl-navigation__link" href="#harga">Harga</a>
						</nav>
					</div>
					<span class="android-mobile-title mdl-layout-title">
						<img class="android-logo-image" src="images/android-logo.png">
					</span>
					<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
						<li class="mdl-menu__item"><a href="dashboard/login.php">Login</li>
						<li disabled class="mdl-menu__item">Register</li>
					</ul>
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
				<div class="android-be-together-section mdl-typography--text-center">
					<div class="logo-font android-slogan">Kemudahan parkir dalam genggaman.</div>
					<div class="logo-font android-sub-slogan">sudah ngga jaman lagi macet.</div>
					<div class="logo-font android-create-character">
						<a href="" class="android-smart mdl-button mdl-js-button">Check Out Now</a>
					</div>

					<a href="#screens">
						<button class="android-fab mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect">
							<i class="material-icons">expand_more</i>
						</button>
					</a>
				</div>
				<div class="traffic-jam-section" id="fitur">
					<div class="traffic-jam-band mdl-shadow--2dp">
						<div class="traffic-jam-band-text">
							<div class="mdl-typography--display-2 mdl-typography--font-thin">Waktumu berharga bung, masih mau ditipu terus?</div>
							<p class="mdl-typography--headline mdl-typography--font-thin poster-front">
								Hardware, cloud, dan aplikasi sinkron secara real-time, menggunakan dedicated hardware sehingga informasi tentang slot parkirmu tersaji rinci. Kami peduli dengan waktu, dan kami berfikir untuk itu. 
							</p>
							<p>
								<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="">
									Selengkapnya&nbsp;<i class="material-icons notranslate cloud-button__icon cloud-button__icon--internal">arrow_forward</i>
								</a>
							</p>
						</div>
					</div>
				</div>
				<div class="paparkir-pricing-section" id="harga">
					<div class="android-section-title mdl-typography--display-1-color-contrast">Biaya yang kami tawarkan</div>
					<p class="mdl-typography--font-light">Harga yang kami tawarkan bersifat flexibel dan dapat berubah sewaktu-waktu tergantung dengan ketentuan promo.</p>
					<div class="android-card-container mdl-grid">
						<div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card">
							<div class="mdl-card__title">
								 <h4 class="mdl-card__title-text">Freemium</h4>
							</div>
							<div class="mdl-card__supporting-text">
								<h2 class="display-2">Rp. 0</h2>
								<ul class="mdl-list payment">
									<li class="mdl-list__item">
										<span class="mdl-list__item-primary-content">
											Fitur Dasar
										</span>
									</li>
									<li class="mdl-list__item">
										<span class="mdl-list__item-primary-content">
											Aktif 3 hari
										</span>
									</li>
								</ul>
							</div>
							<div class="mdl-card__actions">
								 <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="">
									 Cek Sekarang
									 <i class="material-icons notranslate cloud-button__icon cloud-button__icon--internal">arrow_forward</i>
								 </a>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card premium">
							<div class="mdl-card__title">
								 <h4 class="mdl-card__title-text">Premium</h4><br>
							</div>
							<div class="mdl-card__supporting-text">
								<h2 class="display-2">Rp. 60K</h2>
								<ul class="mdl-list payment">
									<li class="mdl-list__item">
										<span class="mdl-list__item-primary-content">
											Fitur Utama
										</span>
									</li>
									<li class="mdl-list__item">
										<span class="mdl-list__item-primary-content">
											Aktif 6 bulan
										</span>
									</li>
								</ul>
							</div>
							<div class="mdl-card__actions">
								 <a class="mdl-button mdl-js-button" href="">
									 Cek Sekarang
									 <i class="material-icons notranslate cloud-button__icon cloud-button__icon--internal">arrow_forward</i>
								 </a>
							</div>
						</div>

						<div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card">
							<div class="mdl-card__title">
								 <h4 class="mdl-card__title-text">Ekslusif</h4>
							</div>
							<div class="mdl-card__supporting-text">
								<h2 class="display-2">Rp. 90K</h2>
								<ul class="mdl-list payment">
									<li class="mdl-list__item">
										<span class="mdl-list__item-primary-content">
											Fitur Extra
										</span>
									</li>
									<li class="mdl-list__item">
										<span class="mdl-list__item-primary-content">
											Aktif 1 tahun
										</span>
									</li>
								</ul>
							</div>
							<div class="mdl-card__actions">
								 <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="">
									 Cek Sekarang
									 <i class="material-icons notranslate cloud-button__icon cloud-button__icon--internal">arrow_forward</i>
								 </a>
							</div>
						</div>
					</div>
				</div>

				<div class="android-customized-section">
					<div class="android-customized-section-text">
						<div class="mdl-typography--font-light mdl-typography--display-1-color-contrast">Dunia dalam genggaman itu nyata</div>
						<p class="mdl-typography--font-light">
							Sistem ini dikembangkan untuk seluruh platform dan dioptimalkan untuk platform mobile atau genggam, karena kami percaya apapun akan ada dihadapanmu.
						</p>
					</div>
					<div class="android-customized-section-image"></div>
				</div>
				<footer class="android-footer mdl-mega-footer">
					<div class="mdl-mega-footer--middle-section">
						<p class="mdl-typography--font-light copy">PT. Sarana Parkir Teknotama</p>
					</div>

					<div class="mdl-mega-footer--bottom-section">
						Hak Cipta &copy; 2018 Terpelihara | 
						<a class="android-link mdl-typography--font-light" href="tos.html">Terms of Service</a> | 
						<a class="android-link mdl-typography--font-light" href="">Privacy Policy</a> | 
						<a class="android-link mdl-typography--font-light" href="">Acceptable Use Policy</a>
					</div>

				</footer>
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
