<?php
session_start();
if (isset($_SESSION['id_pengguna'])) {
    header("location: dashboard/");
}

require_once "dashboard/qlib.php";
$oop = new SmartQuery();
if (isset($_POST['login'])) {
    $username = $_POST['id_pengguna'];
    $userpass = $_POST['password'];
    $sql = $oop->__login($con,$username,$userpass);
    list($username, $password, $nama, $nopol, $jenis) = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        if (password_verify($userpass, $password)) {
            session_start();
            $_SESSION['id_pengguna'] = $username;
            $_SESSION['nama_pengguna'] = $nama;
            $_SESSION['nopol_pengguna'] = $nopol;
            $_SESSION['jenis_kendaraan'] = $jenis;
            header("location: dashboard/");
            die();
        } else {
            echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="./";
                  </script>';
        }
    } else {
       echo '<script language="javascript">
                window.alert("LOGIN GAGAL! Silakan coba lagi");
                window.location.href="./";
             </script>';
    }
}
?>
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
	</head>
	<body class="user-page">
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
					<a class="mdl-navigation__link" href="index.php">Beranda</a>
					<div class="paparkir-drawer-separator"></div>
					<span class="mdl-navigation__link">Laman Kami</span>
					<a class="mdl-navigation__link" href="partner.paparkir.com" target="_blank">Mitra Paparkir</a>
					<a class="mdl-navigation__link" href="mailto:admin@paparkir.com">Join Paparkir Dev</a>
					<div class="paparkir-drawer-separator"></div>
					<span class="mdl-navigation__link">Supported By</span>
					<a class="mdl-navigation__link" href="http://amikom.ac.id"><img src="images/amikom.png"></a>
					<a class="mdl-navigation__link" href="http://amikombizpark.com"><img src="images/abp.png"></a>
				</nav>
			</div>

			<div class="android-content mdl-layout__content">
				<a name="top"></a>
				<div class="paparkir-pricing-section" id="harga">
					<div class="android-card-container mdl-grid">
						<form class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card session" action="" method="POST">
							<h4>Masuk</h4>
							  <div class="mdl-textfield mdl-js-textfield">
							  	<input class="mdl-textfield__input" type="text" id="sample1" name="id_pengguna">
							  	<label class="mdl-textfield__label" for="sample1">ID Pengguna</label>
							  </div>
							  <div class="mdl-textfield mdl-js-textfield">
							  	<input class="mdl-textfield__input" type="password" id="sample1" name="password">
							  	<label class="mdl-textfield__label" for="sample1">Password</label>
							  </div>
							  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="login">Masuk</button>
							  <span class="mdl-typography--text-center mdl-m-t-20">Belum punya akun? <a href="register.php">Daftar</a></span>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="mdl/material.min.js"></script>
	</body>
</html>
