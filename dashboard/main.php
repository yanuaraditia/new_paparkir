<?php
if(!isset($co)) {
	header('location:index.php');
}
else {
?>
			<main class="mdl-layout__content" id="load_content">
				<div class="mdl-grid demo-content">
					<?php
					if($co['id_pengguna']==$_SESSION['id_pengguna']) {
					?>
					<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
						<div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
							<h2 class="mdl-card__title-text mdl-color-text--white"><?php echo $_SESSION['nopol_pengguna'];?>
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
							<?php
							if($co['id_pengguna']==$_SESSION['id_pengguna'] && $co['status_parkir']==NULL) {
							?>
								Sistem akan menunggu anda dalam waktu 15 menit. Jika waktu tersebut dilewati maka slot akan diubah menjadi kadaluwarsa.<br/>
								Halaman akan disegarkan secara otomatis, jika tidak gunakan tombol dibawah.
								<?php echo $body->__timer();?><br/>
								<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="index.php">Refresh</a>
							<?php
							}
							else {
							?>
								Terhitung sejak <?php echo tgl_indo($co['tanggal_masuk']);?> kendaraan anda telah terparkir dalam sistem kami, selamat menikmati layanan kami.<br/>
							<?php } ?>
						</div>
					</div>
					<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
						<div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
							<h2 class="mdl-card__title-text mdl-color-text--white"><?php echo $_SESSION['jenis_kendaraan'];?></h2>
						</div>
					</div>
					<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
						<div class="mdl-card__title mdl-card--expand mdl-color--purple-300">
							<?php
							if($co['status_parkir']==0){
								echo "<h2 class=\"mdl-card__title-text mdl-color-text--white\">Menunggu Kendaraan</h2>";
							}
							elseif($co['status_parkir']==1){
								echo "<h2 class=\"mdl-card__title-text mdl-color-text--white\">".$co['nama_area']." | ".$co['nama_lantai']." | ".$co['nama_slot']."</h2>";
							}
							else {
								echo "<h2 class=\"mdl-card__title-text mdl-color-text--white\">-</h2>";
							}
							?>
						</div>
					</div>
					<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
						<div class="mdl-card__title mdl-card--expand mdl-color--green-300">
							<?php
							if($co['status_parkir']==NULL) {
								echo "<h2 class=\"mdl-card__title-text mdl-color-text--white\">-</h2>";
							}
							else {
						    	$masuk = New DateTime($co['tanggal_masuk']);
						    	$sekarang = New DateTime(date('Y-m-d'));
						    	$total_hari = $masuk->diff($sekarang);
						    	$total_bayar = $standar_tarif*($total_hari->days+1);
								echo "<h2 class=\"mdl-card__title-text mdl-color-text--white\">Rp.".$total_bayar."</h2>";
						    }
					    	?>
						</div>
					</div>
					<?php
					}
					else {
					?>
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
									<a class="mdl-list__item-secondary-action mdl-button mdl-js-button mdl-button--icon" href="book.php?area=<?php echo base64_encode($view['kd_area']);?>"><i class="material-icons">arrow_forward</i></a>
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
					<?php }?>
				</div>
			</main>
<?php }?>