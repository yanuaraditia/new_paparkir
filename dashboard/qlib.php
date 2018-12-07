<?php
$con = mysqli_connect("localhost","root","","paparkir");
$standar_tarif = 15000;
date_default_timezone_set('Asia/Jakarta');
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
class AdminClass
{	
	function __list_user($con)
	{
		$q	= "SELECT pengguna.id_pengguna, pengguna.nopol_pengguna, pengguna.nama_pengguna, jenis_kendaraan.nama_jenis, slot.kd_slot, slot.nama_slot, slot.tanggal_masuk, slot.status_parkir FROM pengguna LEFT JOIN slot ON pengguna.id_pengguna = slot.id_pengguna LEFT JOIN jenis_kendaraan ON pengguna.kd_jenis = jenis_kendaraan.kd_jenis";
		$d 	= mysqli_query($con,$q);
		return $d;
	}
	function __login_admin($con,$username,$userpass)
	{
		$q = "SELECT id_admin, password_admin, nama_admin,  email_admin, kd_area FROM admin WHERE id_admin = '$username'";
		$d = mysqli_query($con,$q);
		return $d;
	}
	function __maubayar($con,$id)
	{
		$q = "SELECT pengguna.id_pengguna,slot.nama_slot,slot.kd_slot,lantai.nama_lantai,area.nama_area,slot.tanggal_masuk FROM slot JOIN pengguna ON pengguna.id_pengguna = slot.id_pengguna JOIN lantai ON slot.kd_lantai = lantai.kd_lantai JOIN area ON lantai.kd_area = area.kd_area
		 WHERE slot.id_pengguna = '$id'";
		$d = mysqli_query($con,$q);
		return $d;
	}
	function __bayar($con,$id_pengguna,$kd_slot,$jumlah_bayar,$id_admin,$tanggal_bayar)
	{
		$q = "INSERT INTO `transaksi` (`kd_transaksi`, `id_pengguna`, `kd_slot`, `jumlah_bayar`, `id_admin`, `tanggal_bayar`) VALUES (NULL, '$id_pengguna', '$kd_slot', '$jumlah_bayar', '$id_admin', '$tanggal_bayar')";
		$d = mysqli_query($con,$q);
		return $d;
	}
	function __sudah_bayar($con,$id_pengguna)
	{
		$q = "UPDATE `slot` SET `id_pengguna` = NULL, `status_parkir` = NULL WHERE `slot`.`id_pengguna` = '$id_pengguna' ";
		$d = mysqli_query($con,$q);
		return $d;
	}
}

class SmartQuery
{
	function __vehicle_list($con)
	{
		$q = "SELECT * FROM jenis_kendaraan";
		$q = mysqli_query($con,$q);
		return $q;
	}

	function __area_list($con)
	{
		$q = "SELECT area.nama_area, area.alamat, area.kd_area FROM area JOIN slot ON slot.kd_area = area.kd_area WHERE slot.status_parkir IS NULL GROUP BY area.kd_area";
		$q = mysqli_query($con,$q);
		return $q;
	}

	function __daftar($con,$nama_pengguna,$password_pengguna,$email_pengguna,$id_jenis,$tanggal_sekarang,$plat_nomor)
	{
		$q = "INSERT INTO `pengguna` (`id_pengguna`, `password_pengguna`, `nama_pengguna`, `email_pengguna`, `kd_jenis`, `nopol_pengguna`, `kelas`) VALUES (NULL, '$password_pengguna', '$nama_pengguna', '$email_pengguna', '$id_jenis', '$plat_nomor', '1')";
		$d = mysqli_query($con,$q);
		return $d;
	}
	function __login($con,$username,$userpass)
	{
		$q = "SELECT pengguna.id_pengguna, pengguna.password_pengguna, pengguna.nama_pengguna, pengguna.nopol_pengguna, jenis_kendaraan.nama_jenis FROM pengguna JOIN jenis_kendaraan ON pengguna.kd_jenis = jenis_kendaraan.kd_jenis WHERE id_pengguna = '$username'";
		$d = mysqli_query($con,$q);
		return $d;
	}
	function __check_parking($con,$id)
	{
		$q = "SELECT area.nama_area, lantai.nama_lantai, slot.nama_slot,slot.tanggal_masuk,slot.status_parkir,slot.id_pengguna FROM slot JOIN lantai ON slot.kd_lantai = lantai.kd_lantai JOIN area ON lantai.kd_area = area.kd_area WHERE slot.id_pengguna = '$id'";
		$d = mysqli_query($con,$q);
		$f = mysqli_fetch_assoc($d);
		return $f;
	}
	function __list_lokasi($con,$kd_area)
	{
		$q = "SELECT slot.nama_slot, slot.kd_slot, lantai.nama_lantai FROM slot JOIN lantai ON slot.kd_lantai = lantai.kd_lantai WHERE slot.kd_area = '$kd_area' AND slot.status_parkir IS NULL";
		$d = mysqli_query($con,$q);
		return $d;
	}
	function __all_lantai($con,$kd_area)
	{
		$q = "SELECT * FROM lantai WHERE kd_area = '$kd_area'";
		$d = mysqli_query($con,$q);
		return $d;
	}
	function __fetch_maps($con,$kd_area)
	{
		$q = "SELECT tag_map FROM area WHERE kd_area = '$kd_area'";
		$d = mysqli_query($con,$q);
		$f = mysqli_fetch_assoc($d);
		return $f;
	}
	function __book($con,$kd_slot,$id_pengguna,$date)
	{
		$q = "UPDATE slot SET id_pengguna = '$id_pengguna', tanggal_masuk = '$date' WHERE slot.kd_slot = '$kd_slot'";
		$d = mysqli_query($con,$q);
		return $d;
	}
	function __expired($con,$id_pengguna)
	{
		$q = "UPDATE slot SET status_parkir = NULL, id_pengguna = NULL WHERE slot.id_pengguna = '$id_pengguna' ";
		$d = mysqli_query($con,$q);
		return $d;
	}
}

class BodyContent
{
	
	function __head_top($active)
	{
		echo "<a class=\"mdl-navigation__link\" href=\"index.php\">Beranda</a>";
		echo "<a class=\"mdl-navigation__link\" href=\"#\">Beranda</a>";
	}
	function __head_nav()
	{
?>
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

<?php
	}

	function __timer()
	{
?>
<?php
    if (isset($_SESSION["mulai"])) { 
        //jika session sudah ada
        $telah_berlalu = time() - $_SESSION["mulai"];
    } else { 
        //jika session belum ada
        $_SESSION["mulai"]  = time();
        $telah_berlalu      = 0;
    } 
 
    $temp_waktu = (15*60) - $telah_berlalu; //dijadikan detik dan dikurangi waktu yang berlalu
    $temp_menit = (int)($temp_waktu/60);                //dijadikan menit lagi
    $temp_detik = $temp_waktu%60;                       //sisa bagi untuk detik
     
    if ($temp_menit < 60) {
        $jam    = 0; 
        $menit  = $temp_menit; 
        $detik  = $temp_detik; 
    } else {       
        $jam    = (int)($temp_menit/60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
        $menit  = $temp_menit%60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
        $detik  = $temp_detik;
    }   
?>
<head>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var detik   = <?= $detik; ?>;
            var menit   = <?= $menit; ?>;
            var jam     = <?= $jam; ?>;
                  
            function hitung() {
                setTimeout(hitung,1000);
  
                if(menit < 10 && jam == 0){
                    var peringatan = 'style="color:red"';
                };
                $('#timer').html(
                    '<h4 '+peringatan+'>' + menit + ' menit : ' + detik + ' detik</h4>'
                );
                detik --;
  
                if(detik < 0) {
                    detik = 59;
                    menit --;
  
                    if(menit < 0) {
                        menit = 59;
                        jam --;
  
                        if(jam < 0) { 
                            clearInterval(hitung); 
                            alert('Waktu anda telah berakhir, booking anda dibatalkan, silahkan pilih lokasi lain');
                            window.location.href="confirm.php?cf=<?php echo base64_encode($_SESSION['id_pengguna']);?>";
                        } 
                    } 
                } 
            }           
            hitung();
        });
    </script>
</head>
<body>        
    <div id='timer'></div>
</body>
<?php
	}
}
?>