<?php
$con = mysqli_connect("localhost","root","","paparkir");
date_default_timezone_set('Asia/Jakarta');

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
		$q = "SELECT * FROM area";
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
		$q = "SELECT id_pengguna, password_pengguna, nama_pengguna, nopol_pengguna FROM pengguna WHERE id_pengguna = '$username'";
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
		# code...
	}
}