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

	function __daftar($nama_pengguna,$password_pengguna,$email_pengguna,$id_jenis,$tanggal_sekarang)
	{
		$q = "INSERT INTO `user` (`id_username`, `nama_pengguna`, `password_pengguna`, `email_pengguna`, `id_jenis`, `registered_on`, `updated_on`) VALUES (NULL, '$nama_pengguna', '$password_pengguna', '$email_pengguna', '$id_jenis', '$tanggal_sekarang', NULL);";
		return $q;
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