<?php
require_once('dashboard/qlib.php');
$jns = new SmartQuery();
if(isset($_POST['submit'])) {
	$tanggal_sekarang	= date('Y-m-d');
	$nama_pengguna		= $_POST['nama'];
	$password_pengguna	= $_POST['password'];
	$password_pengguna	= password_hash($password_pengguna,PASSWORD_DEFAULT);
	$email_pengguna		= $_POST['email'];
	$id_jenis			= $_POST['jenis_kendaraan'];
	$nopol				= $_POST['nopol'];
	$que 				= $jns->__daftar($con,$nama_pengguna,$password_pengguna,$email_pengguna,$id_jenis,$tanggal_sekarang,$nopol);
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
						<form class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card session" action="" method="post">
							<?php
							if(isset($que)) {
								$to      = $email_pengguna;
								$subject = 'Paparkir | Verifikasi';
								$cekd 	 = mysqli_query($con,"SELECT id_pengguna FROM pengguna WHERE email_pengguna = '$email_pengguna'");
								$ftc 	 = mysqli_fetch_assoc($cekd);
								$message = '
								 
								Terimakasih telah mendaftar!
								Akun anda telah terdaftar, berikut adalah informasi kredensial berkaitan dengan akun anda, bisa digunakan untuk login.
								 
								------------------------
								Username: '.$ftc['id_pengguna'].'
								Password: '.$_POST['password'].'
								------------------------
								 
								Harap jaga baik baik informasi kredensial ini, dan selamat berparkir
								Hormat Kami



								Yanuar Aditia
								CTO Paparkir
								 
								'; // Our message above including the link
								                     
								$headers = 'From:noreply@paparkir.com' . "\r\n"; // Set from headers
								mail($to, $subject, $message, $headers); // Send our email
								echo '<h4>Registrasi berhasil dilakukan, silahkan cek e-mail untuk info username dan password? <a href="login.php">Masuk</a></h4>';
							}
							else {
							?>
							<h4>Pendaftaran</h4>
							  <div class="mdl-textfield mdl-js-textfield">
							  	<input class="mdl-textfield__input" type="text" id="sample1" name="nama" required="true">
							  	<label class="mdl-textfield__label" for="sample1">Nama Lengkap</label>
							  </div>
							  <div class="mdl-textfield mdl-js-textfield">
							  	<input class="mdl-textfield__input" type="password" id="sample2" name="password" required="true">
							  	<label class="mdl-textfield__label" for="sample2">Password</label>
							  </div>
							  <div class="mdl-textfield mdl-js-textfield">
							  	<input class="mdl-textfield__input" type="mail" id="sample3" name="email" required="true">
							  	<label class="mdl-textfield__label" for="sample3">E-mail</label>
							  </div>
							  <div class="mdl-textfield mdl-js-textfield">
							  	<input class="mdl-textfield__input" type="mail" id="sample3" name="nopol" required="true">
							  	<label class="mdl-textfield__label" for="sample3">Nomor Polisi</label>
							  </div>
							  <div class="mdl-textfield mdl-js-textfield">
							  	<select class="mdl-textfield__input select" id="sample4" name="jenis_kendaraan" required="true">
							  		<?php
							  		$row = $jns->__vehicle_list($con);
							  		while($jenis=mysqli_fetch_array($row)) {
							  			echo "<option value=\"".$jenis['kd_jenis']."\">".$jenis['nama_jenis']."</option>";
							  		}
							  		?>
							  	</select>
							  </div>
							  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="submit">Daftar</button>
							  <span class="mdl-typography--text-center mdl-m-t-20">Sudah punya akun? <a href="login.php">Masuk</a></span>
							<?php } ?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="mdl/material.min.js"></script>
	</body>
</html>
