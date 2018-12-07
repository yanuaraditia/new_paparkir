<?php
session_start();
require_once('qlib.php');
if(!isset($_SESSION['nama_pengguna'])) {
	header('location:../login.php');
}
$oop = new SmartQuery();
$body = new BodyContent();
if(isset($_GET['area'])) {
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<title>Pemesanan | <?php echo $_SESSION['nama_pengguna'];?></title>

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
	</head>
	<body>
		<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
			<header class="demo-header mdl-layout__header mdl-color-text--grey-600">
				<div class="mdl-layout__header-row">
					<span class="mdl-layout-title">
						<a class="mdl-list__item-secondary-action mdl-button mdl-js-button mdl-button--icon" href="index.php"><i class="material-icons">arrow_backward</i></a>
					</span>
					<div class="mdl-layout-spacer"></div>
				</div>
			</header>
			<?php 
			echo $body->__head_nav();			?>
			<main class="mdl-layout__content">
				<div class="mdl-grid demo-content">
					<div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
						<?php
						$map = $oop->__fetch_maps($con,base64_decode($_GET['area']));
						?>
						<iframe src="https://www.google.com/maps/embed?pb=<?php echo $map['tag_map'];?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
						<a class="mdl-button mdl-js-button" href="book.php?area=<?php echo $_GET['area'];?>">Seluruh Lokasi</a>
						<?php
						$lok = $oop->__all_lantai($con,base64_decode($_GET['area']));
						while($lantai=mysqli_fetch_array($lok)) {
							echo "<a class=\"mdl-button mdl-js-button\" href=\"?lantai=".base64_encode($lantai['kd_lantai'])."\">".$lantai['nama_lantai']."</a>";
						}
						?>
					</div>
					<div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
						<ul class="demo-list-three mdl-list">
							<?php
							$area = $oop->__list_lokasi($con,base64_decode($_GET['area']));
							$row = mysqli_num_rows($area);
							if($row>0) {
								while($view=mysqli_fetch_array($area)) {
							?>
							<li class="mdl-list__item mdl-list__item--three-line">
								<span class="mdl-list__item-primary-content">
									<span>Slot <?php echo $view['nama_slot'];?></span>
									<span class="mdl-list__item-text-body">Posisi : <?php echo $view['nama_lantai'];?></span>
								</span>
								<span class="mdl-list__item-secondary-content">
									<a class="mdl-list__item-secondary-action mdl-button mdl-js-button mdl-button--icon" href="confirm.php?do=<?php echo base64_encode($view['kd_slot']);?>"><i class="material-icons">check</i></a>
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
					</div>
				</div>
			</main>
		</div>
		<script src="../mdl/material.min.js"></script>
	</body>
</html>
<?php
}
else {
	header('location:../dashboard');
}